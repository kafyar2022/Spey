@extends('dashboard.layouts.master')

@section('content')
    <header class="header">
        <form class="search-form" action="{{route('dashboard.histories.search')}}" method="get">
            @csrf
            <input class="search-input" type="search" name="keyword" placeholder="Поиск Истории..." autocomplete="off" value="{{isset($keyword) ? $keyword : ''}}">
            <button class="search-submit-btn" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488.4 488.4"><path d="M0 203.25c0 112.1 91.2 203.2 203.2 203.2 51.6 0 98.8-19.4 134.7-51.2l129.5 129.5c2.4 2.4 5.5 3.6 8.7 3.6s6.3-1.2 8.7-3.6c4.8-4.8 4.8-12.5 0-17.3l-129.6-129.5c31.8-35.9 51.2-83 51.2-134.7C406.4 91.15 315.2.05 203.2.05S0 91.15 0 203.25zm381.9 0c0 98.5-80.2 178.7-178.7 178.7s-178.7-80.2-178.7-178.7 80.2-178.7 178.7-178.7 178.7 80.1 178.7 178.7z"/></svg>
            </button>
        </form>
        <ul class="header-navigation">
            <li class="header-navigation-item">
                <a class="header-navigation-link" href="{{route('dashboard.histories')}}">Истории: {{$historiesQuantity}}</a>
            </li>
            <li class="header-navigation-item">
                <a class="header-navigation-link green-bg white current">Добавить новую историю</a>
            </li>
        </ul>
    </header>
    <ul class="breadcrumbs book-read-page__breadcrumbs">
        <li class="breadcrumbs-item">
            <a class="breadcrumbs-link" href="{{route('dashboard.histories')}}">Истории</a>
            <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 10L5 5L0 0V10Z" fill="#0033ab"></path>
            </svg>
        </li>
        <li class="breadcrumbs-item">
            <a class="breadcrumbs-link current" href="{{route('dashboard.histories.create')}}">Добавление</a>
        </li>
    </ul>
    <main class="histories-create-page">
        <form class="form" action="{{route('histories.create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label class="form-label">Год
                <input class="form-input" type="number" name="year" value="{{old('year')}}">
            </label>
            <label class="form-label">Название на русском
                <input class="form-input" type="text" name="ru-title" value="{{old('ru-title')}}">
            </label>
            <label class="form-label">Название на английском
                <input class="form-input" type="text" name="en-title" value="{{old('en-title')}}">
            </label>
            <label class="form-label form-label-textarea">Текст на русском:
                <textarea class="form-textarea" name="ru-text">{{old('ru-text')}}</textarea>
            </label>
            <label class="form-label form-label-textarea">Текст на английском:
                <textarea class="form-textarea" name="en-text">{{old('en-text')}}</textarea>
            </label>
            <div class="form-btn-wrap">
                <button class="form-btn green-bg" type="submit">Добавить</button>
                <a class="form-btn red-bg" href="javascript:window.location.href=window.location.href">Отмена</a>
            </div>
        </form>
    </main>
@endsection