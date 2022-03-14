@extends('layouts.master')

@section('title', $page[$locale . '_title'])

@section('content')
  <main class="about-page">
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
      <img class="vitrin-img" src="{{ asset('img/about-vitrin-bg.jpg') }}">
      <div class="container vitrin-container">
        <div class="vitrin-left">
          <h1 class="vitrin-title">{!! $page['vitrin-title'] !!}</h1>
          <p class="vitrin__text">{!! $page['vitrin-text'] !!}</p>
          <div class="vitrin__link-wrap">
            <a class="button vitrin__link" href="{{ route('contacts') }}#cooperation">{{ __('Cooperate with us') }}</a>
          </div>
        </div>
      </div>
    </section>
    <section class="our-history hidden" id="history">
      <div class="container">
        <h2 class="our-history-title">{!! $page['our-history-title'] !!}</h2>
        <ul class="histories" data-family="history">
          @foreach ($data->histories as $key => $history)
            <li class="histories__item" data-row="{{ $key + 1 }}" data-family="history">
              <h3 class="histories__title" data-family="history">
                <div data-family="history">{!! $history->title !!}</div>
                <span class="histories__year" data-family="history">{{ $history->year }}</span>
              </h3>
              <div class="histories__inner" data-family="history">
                <p class="histories__text" data-family="history">{!! $history->text !!}</p>
                <button class="histories__button" type="button" data-family="history">
                  {{ __('Learn more') }}
                  <svg data-family="history" xmlns="http://www.w3.org/2000/svg" width="4" height="8.182" viewBox="0 0 4 8.182">
                    <path data-family="history" id="Expand_More" d="M7.477.108,4.091,3.115.7.107a.45.45,0,0,0-.584,0,.339.339,0,0,0,0,.519L3.8,3.893h0a.45.45,0,0,0,.584,0L8.061.626a.339.339,0,0,0,0-.519A.45.45,0,0,0,7.477.108Z" transform="translate(0 8.182) rotate(-90)" fill="#8f8f8f" />
                  </svg>
                </button>
              </div>
            </li>
          @endforeach
        </ul>
        <button class="our-history__view-all-btn" type="button" data-family="history">
          <span class="our-history__view-all-text" data-family="history">
            {!! __('View all <br> <b>Years</b>') !!}
          </span>
          <span class="our-history__view-all-icon" data-family="history">
            <svg data-family="history" xmlns="http://www.w3.org/2000/svg" width="20.008" height="9.782" viewBox="0 0 20.008 9.782">
              <path data-family="history" id="Expand_More" d="M18.286.264,10,7.617,1.724.263A1.1,1.1,0,0,0,.3.263a.829.829,0,0,0,0,1.269L9.29,9.519h0a1.1,1.1,0,0,0,1.427,0l8.995-7.987a.83.83,0,0,0,0-1.27A1.1,1.1,0,0,0,18.286.264Z" transform="translate(0)" fill="#fff" />
            </svg>
          </span>
        </button>
      </div>
    </section>
    <section class="present-time" id="present-time">
      <div class="container present-time__container">
        <h2 class="present-time__title">{!! $page['present-time-title'] !!}</h2>
        {!! $page['present-time-text'] !!}
      </div>
    </section>
    <section class="company-in-numbers" id="companies">
      <div class="container">
        <h2 class="company-numbers__title">{!! $page['company-number-title'] !!}</h2>
        <div class="company-carousel-wrap">
          <div class="owl-carousel company-carousel">
            @foreach ($data->companies as $company)
              <div class="company-numbers-item">
                <span class="company-numbers-value">{{ $company->quantity }}</span>
                <h3 class="company-numbers-title">{!! $company->title !!}</h3>
                <p class="company-numbers-text">{!! $company->text !!}</p>
              </div>
            @endforeach
          </div>
          <span class="company-carousel__icon company-carousel__prev-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14.525" viewBox="0 0 8 14.525">
              <g id="download" transform="translate(0 14.525) rotate(-90)">
                <path id="Expand_More" d="M13.276.216,7.263,6.229,1.251.215A.733.733,0,0,0,.214,1.253l6.53,6.532h0a.732.732,0,0,0,1.036,0l6.53-6.532A.733.733,0,1,0,13.276.216Z" fill="#fff" />
              </g>
            </svg>
          </span>
          <span class="company-carousel__icon company-carousel__next-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14.525" viewBox="0 0 8 14.525">
              <g id="download" transform="translate(0 14.525) rotate(-90)">
                <path id="Expand_More" d="M13.276.216,7.263,6.229,1.251.215A.733.733,0,0,0,.214,1.253l6.53,6.532h0a.732.732,0,0,0,1.036,0l6.53-6.532A.733.733,0,1,0,13.276.216Z" fill="#fff" />
              </g>
            </svg>
          </span>
        </div>
        <ul class="mission-vision" id="mission-vision">
          <li class="mission-vision-item">
            <div class="mission-vision-content">
              <h3 class="mission-vision-title">{!! $page['our-mission-title'] !!}</h3>
              <p class="mission-vision-text">{!! $page['our-mission-text'] !!}</p>
            </div>
          </li>
          <li class="mission-vision-item">
            <div class="mission-vision-content">
              <h3 class="mission-vision-title">{!! $page['our-vision-title'] !!}</h3>
              <p class="mission-vision-text">{!! $page['our-vision-text'] !!}</p>
            </div>
          </li>
        </ul>
      </div>
    </section>
    <section class="about-page-values">
      <div class="container">
        <h2 class="about-page-values__title">{{ __('Our values') }}</h2>
        <div class="owl-carousel values-carousel">
          @foreach ($data->values as $value)
            <div class="values-item">
              <h3 class="values-title">{!! $value->title !!}</h3>
              <p class="values-text">{!! $value->text !!}</p>
            </div>
          @endforeach
        </div>
      </div>
    </section>
    <section class="rdp-areas" id="rdp">
      <div class="container">
        <h2 class="rdp-areas__heading">{!! $page['rdp-title'] !!}</h2>
        <div class="rdp-areas-carousel__wrap">
          <div class="owl-carousel rdp-areas-carousel">
            <img class="rdp-areas-carousel__img" src="{{ asset('img/rdp-areas.jpg') }}">
            <img class="rdp-areas-carousel__img" src="{{ asset('img/rdp-areas.jpg') }}">
            <img class="rdp-areas-carousel__img" src="{{ asset('img/rdp-areas.jpg') }}">
          </div>
          <span class="more-icon rdp-areas-carousel__prev-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14.525" viewBox="0 0 8 14.525">
              <g id="download" transform="translate(0 14.525) rotate(-90)">
                <path id="Expand_More" d="M13.276.216,7.263,6.229,1.251.215A.733.733,0,0,0,.214,1.253l6.53,6.532h0a.732.732,0,0,0,1.036,0l6.53-6.532A.733.733,0,1,0,13.276.216Z" fill="#fff" />
              </g>
            </svg>
          </span>
          <span class="more-icon rdp-areas-carousel__next-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14.525" viewBox="0 0 8 14.525">
              <g id="download" transform="translate(0 14.525) rotate(-90)">
                <path id="Expand_More" d="M13.276.216,7.263,6.229,1.251.215A.733.733,0,0,0,.214,1.253l6.53,6.532h0a.732.732,0,0,0,1.036,0l6.53-6.532A.733.733,0,1,0,13.276.216Z" fill="#fff" />
              </g>
            </svg>
          </span>
        </div>
        <div class="rdp-text">{!! $page['rdp-text'] !!}</div>
      </div>
    </section>
    <section class="geography-presence" id="geography">
      <div class="container">
        <h2 id="geography-presence">{!! $page['geography-title'] !!}</h2>
      </div>
      <div class="map-wrap">
        {!! $data->siteMap !!}
      </div>
      <div class="geography-container">
        <ul class="geography-countries">
          @foreach ($data->sites as $site)
            <li class="countries-item">
              <a class="countries-link {{ $data->siteID == $site->id ? 'current' : '' }}" href="{{ route('about') }}?site={{ $site->id }}#geography-presence">{!! $site->location !!}</a>
            </li>
          @endforeach
        </ul>
      </div>
    </section>
  </main>
@endsection
