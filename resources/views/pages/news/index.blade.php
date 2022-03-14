@extends('layouts.master')

@section('title', $page[$locale . '_title'])

@section('content')
  <main class="news-page">
    <div class="container breadcrumbs-container">
      <ul class="breadcrumbs book-read-page__breadcrumbs">
        <li class="breadcrumbs-item">
          <a class="breadcrumbs-link" href="{{ route('home') }}">{{ __('Home') }}</a>
          <svg width="5" height="6" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 3c0 1.845 2.23 2.77 3.536 1.464a2.071 2.071 0 000-2.928C2.23.23 0 1.155 0 3z" fill="#0033ab" />
          </svg>
        </li>
        <li class="breadcrumbs-item">
          <a class="breadcrumbs-link current">{{ $page[$locale . '_title'] }}</a>
        </li>
      </ul>
    </div>
    <section class="vitrin" id="vitrin">
      <img class="vitrin-img" src="{{ asset('img/news-vitrin-bg.jpg') }}">
      <div class="container vitrin-container">
        <div class="vitrin-left">
          <h1 class="vitrin-title">{!! $page['vitrin-title'] !!}</h1>
          <p class="vitrin__text">{!! $page['vitrin-text'] !!}</p>
          <div class="vitrin__link-wrap">
            <div class="vitrin-dropdown" data-family="vitrin-dropdown">
              <button class="button vitrin-dropdown__button" data-family="vitrin-dropdown" type="button">{{ __('Select category') }}</button>
              <div class="vitrin-dropdown__content" data-family="vitrin-dropdown">
                <ul class="vitrin-dropdown__list" data-family="vitrin-dropdown">
                  @foreach ($data->categories as $category)
                    <li class="vitrin-dropdown__item" data-family="vitrin-dropdown">
                      <a class="vitrin-dropdown__link" data-family="vitrin-dropdown" href="{{ route('news') }}?category={{ $category->id }}#all-news">{!! $category->title !!}</a>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="all-news" id="all-news">
      <div class="container">
        @if (isset($currentCategory))
          <h2 class="all-news__title">{{ $currentCategory->title }}</h2>
        @else
          <h2 class="all-news__title">{!! $page['all-news-title'] !!}</h2>
        @endif
        <ul class="all-news__list">
          @foreach ($data->news as $news)
            <li class="all-news__item">
              <x-news-card :news="$news" />
            </li>
          @endforeach
        </ul>
        {{ $data->news->links('components/pagination') }}
      </div>
    </section>
  </main>
@endsection
