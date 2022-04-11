@extends('layouts.master')

@section('title', $page[$locale . '_title'])

@section('content')
  <main class="home-page">
    <section class="vitrin" id="vitrin">
      <img class="vitrin-img" src="{{ asset('img/home-vitrin-bg.jpg') }}">
      <div class="container vitrin-container">
        <div class="vitrin-left">
          <h1 class="vitrin-title">{!! $page['vitrin-title'] !!}</h1>
          <p class="vitrin__text vitrin__text--home">{!! $page['vitrin-text'] !!}</p>
          <div class="vitrin__link-wrap">
            <a class="button vitrin__link" href="{{ route('about') }}">{{ __('Learn more') }}</a>
          </div>
        </div>
      </div>
    </section>
    <section class="our-values" id="values">
      <div class="our-values-inner">
        <h2 class="our-values-title">{!! $page['our-values-title'] !!}</h2>
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
    <section class="industry-news" id="news">
      <h2 class="industry-news-title">{!! $page['industry-news-title'] !!}</h2>
      <div class="owl-carousel industry-news-carousel">
        @foreach ($data->newsCategories as $newsCategory)
          <a class="news-categories-item" href="{{ route('news.read', $newsCategory->new->slug) }}">
            <h3 class="news-categories-title">{!! $newsCategory->title !!}</h3>
            <div class="news-categories-description">{!! $newsCategory->new->title !!}</div>
            <div class="news-categories-read">
              <span class="news-categories-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14.525" viewBox="0 0 8 14.525">
                  <g transform="translate(0 14.525) rotate(-90)">
                    <path d="M13.276.216,7.263,6.229,1.251.215A.733.733,0,0,0,.214,1.253l6.53,6.532h0a.732.732,0,0,0,1.036,0l6.53-6.532A.733.733,0,1,0,13.276.216Z" fill="#fff" />
                  </g>
                </svg>
              </span>
              {{ __('Read article') }}
            </div>
          </a>
        @endforeach
      </div>
    </section>
    <section class="products-categories" id="products">
      <div class="container">
        <h2 class="products-block-title">{!! $page['products-block-title'] !!}</h2>
        <ul class="products-categories-list">
          @foreach ($data->productsCategories as $category)
            <li class="products-categories-item">
              <a class="products-categories-link" href="{{ route('products') }}?category={{ $category->id }}#products">
                {{-- <div class="products-categories-icon">{!! $category->icon !!}</div> --}}
                <span class="products-categories-title">{!! $category->title !!}</span>
                <div class="view-more">
                  <span class="view-more-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14.525" viewBox="0 0 8 14.525">
                      <g transform="translate(0 14.525) rotate(-90)">
                        <path d="M13.276.216,7.263,6.229,1.251.215A.733.733,0,0,0,.214,1.253l6.53,6.532h0a.732.732,0,0,0,1.036,0l6.53-6.532A.733.733,0,1,0,13.276.216Z" fill="#fff"></path>
                      </g>
                    </svg>
                  </span>
                  <span class="view-more-text">{!! __('View <br> products') !!}</span>
                </div>
              </a>
            </li>
          @endforeach
        </ul>
        <div class="products-block-info">
          <p>
            {{ $data->productsCategoriesQuantity }} {{ __('categories') }} {{ __('and') }}<br>
            <b>{{ $data->productsQuantity }} {{ __('products') }}</b>
          </p>
          <a class="link products-block-link" href="{{ route('products') }}#products">{{ __('All products') }}</a>
        </div>
      </div>
    </section>
    <section class="popular-products" id="popular-products">
      <div class="container">
        <h2 class="popular-products-title">{!! $page['popular-products-title'] !!}</h2>
        <div class="owl-carousel popular-products-carousel">
          @foreach ($data->popularProducts as $product)
            <x-products-card :product="$product" />
          @endforeach
        </div>
        <a class="link popular-products__link" href="{{ route('products') }}#products">{{ __('All products') }}</a>
      </div>
    </section>
  </main>
@endsection
