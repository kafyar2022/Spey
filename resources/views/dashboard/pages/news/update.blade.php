@extends('dashboard.layouts.master')

@section('content')
    <header class="header">
        <form class="search-form" action="{{route('dashboard.news.search')}}" method="get">
            @csrf
            <input class="search-input" type="search" name="keyword" placeholder="Поиск по Новостям..." autocomplete="off" value="{{isset($keyword) ? $keyword : ''}}">
            <button class="search-submit-btn" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488.4 488.4"><path d="M0 203.25c0 112.1 91.2 203.2 203.2 203.2 51.6 0 98.8-19.4 134.7-51.2l129.5 129.5c2.4 2.4 5.5 3.6 8.7 3.6s6.3-1.2 8.7-3.6c4.8-4.8 4.8-12.5 0-17.3l-129.6-129.5c31.8-35.9 51.2-83 51.2-134.7C406.4 91.15 315.2.05 203.2.05S0 91.15 0 203.25zm381.9 0c0 98.5-80.2 178.7-178.7 178.7s-178.7-80.2-178.7-178.7 80.2-178.7 178.7-178.7 178.7 80.1 178.7 178.7z"/></svg>
            </button>
        </form>
        <ul class="header-navigation">
            <li class="header-navigation-item">
                <a class="header-navigation-link" href="{{route('dashboard.news')}}">Новости: {{$newsQuantity}}</a>
            </li>
            <li class="header-navigation-item">
                <a class="header-navigation-link" href="{{route('dashboard.news.categories')}}">Категории: {{$categories->count()}}</a>
            </li>
            <li class="header-navigation-item">
                <a class="header-navigation-link green-bg white" href="{{route('dashboard.news.create')}}">Добавить новости</a>
            </li>
        </ul>
    </header>
    <ul class="breadcrumbs book-read-page__breadcrumbs">
        <li class="breadcrumbs-item">
            <a class="breadcrumbs-link" href="{{route('dashboard.news')}}">Новости</a>
            <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 10L5 5L0 0V10Z" fill="#0033ab"></path>
            </svg>
        </li>
        <li class="breadcrumbs-item">
            <a class="breadcrumbs-link current" href="{{route('dashboard.news.update', $news->id)}}">{{$news->ru_title}}</a>
        </li>
    </ul>
    <main class="news-update-page">
        <form class="form" action="{{route('news.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$news->id}}">
            <label class="form-label">Выберите категорию новостей
                <select class="form-select" name="category-id">
                    @php 
                        $old = old('category-id');
                        if ($old == '') {
                            $old = $news->category->id;
                        }
                    @endphp
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{$old == $category->id ? 'selected' : ''}}>{{$category->title}}</option>
                    @endforeach
                </select>
            </label>
            <label class="form-label">Название на русском
                <input class="form-input" type="text" name="ru-title" value="{{old('ru-title') == '' ? $news->ru_title : old('ru-title')}}">
            </label>
            <label class="form-label">Название на английском
                <input class="form-input" type="text" name="en-title" value="{{old('en-title') == '' ? $news->en_title : old('en-title')}}">
            </label>
            <label class="form-label">Выберите картинку
                <input class="form-input" type="file" name="img">
            </label>
            <label class="form-label form-label-textarea">Новость на русском:
                <textarea class="simditor-textarea" name="ru-text">{{ old('ru-text') == '' ? $news->ru_text : old('ru-text') }}</textarea>
            </label>
            <label class="form-label form-label-textarea">Новость на английском:
                <textarea class="simditor-textarea" name="en-text">{{ old('en-text') == '' ? $news->en_text : old('en-text') }}</textarea>
            </label>
            <div class="form-btn-wrap">
                <button class="form-btn green-bg" type="submit">Редактировать</button>
                <button class="form-btn red-bg" type="button" data-action="delete-news">Удалить</button>
            </div>
        </form>
        <div class="confirm-modal hidden">
            <form class="confirm-form" action="{{route('news.delete')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$news->id}}">
                <p class="confirm-msg">Вы действительно хотите удалить эту новость?</p>
                <div class="form-btn-wrap">
                    <button class="form-btn green-bg" type="reset" data-action="cancel">Отмена</button>
                    <button class="form-btn red-bg" type="submit">Удалить</button>
                </div>
            </form>
        </div>
    </main>
@endsection