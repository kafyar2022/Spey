@extends('layouts.master')

@section('title', $news->title)

@section('meta-tags')
  @php
  //remove tags and slice body
  $share_text = preg_replace('#<[^>]+>#', ' ', $news->text);
  $share_text = mb_strlen($share_text) < 170 ? $share_text : mb_substr($share_text, 0, 166) . '...';
  @endphp
  <meta name="description" content="{{ $share_text }}">
  <meta property="og:description" content="{{ $share_text }}">
  <meta property="og:title" content="{{ $news->title }}" />
  <meta property="og:image" content="{{ asset('img/news/' . $news->img) }}">
  <meta property="og:image:alt" content="{{ $news->title }}">
  <meta name="twitter:title" content="{{ $news->title }}">
  <meta name="twitter:image" content="{{ asset('img/news/' . $news->img) }}">
@endsection

@section('content')
  <main class="news-read-page">
    <div class="container breadcrumbs-container">
      <ul class="breadcrumbs book-read-page__breadcrumbs">
        <li class="breadcrumbs-item">
          <a class="breadcrumbs-link" href="{{ route('home') }}">{{ __('Home') }}</a>
          <svg width="5" height="6" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 3c0 1.845 2.23 2.77 3.536 1.464a2.071 2.071 0 000-2.928C2.23.23 0 1.155 0 3z" fill="#0033ab" />
          </svg>
        </li>
        <li class="breadcrumbs-item">
          <a class="breadcrumbs-link" href="{{ route('news') }}">{{ __('Industry news') }}</a>
          <svg width="5" height="6" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 3c0 1.845 2.23 2.77 3.536 1.464a2.071 2.071 0 000-2.928C2.23.23 0 1.155 0 3z" fill="#0033ab" />
          </svg>
        </li>
        <li class="breadcrumbs-item">
          <a class="breadcrumbs-link">{{ $news->title }}</a>
        </li>
      </ul>
    </div>
    <section class="report">
      <div class="container report-container">
        <h2 class="report-title">{{ $news->title }}</h2>
        <img class="report-img" src="{{ asset('img/news/' . $news->img) }}" alt="{{ $news->title }}">
        <div class="report-content">{!! $news->text !!}</div>
      </div>
    </section>
    <section class="reports"></section>
  </main>
@endsection
