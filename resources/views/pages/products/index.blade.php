@extends('layouts.master')

@section('title', $page[$locale . '_title'])

@section('content')
  <main class="products-page" data-id="products-page">
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
      <img class="vitrin-img" src="{{ asset('img/products-vitrin-bg.jpg') }}">
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
    <section class="product-search" data-id="product-search" id="search">
      <div class="container product-search__container">
        <h2 class="product-search__title" id="products">{!! $page['products-search-title'] !!}</h2>
        <form class="product-search__form" action="{{ route('products.search') }}" method="POST">
          @csrf
          <label class="product-search__label">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
              <path d="M19.734,18.448l-6.2-6.2a7.573,7.573,0,1,0-5.959,2.9c1.762,0,4.673-1.617,4.673-1.617l6.2,6.2a.909.909,0,0,0,1.286-1.286ZM1.818,7.576a5.758,5.758,0,1,1,5.758,5.758A5.764,5.764,0,0,1,1.818,7.576Z" fill="#1d1d1d" />
            </svg>
            <input class="product-search__input" data-id="search-input" name="keyword" type="search" placeholder="{{ __('Search by Product Name') }}" autocomplete="off">
          </label>
          <button class="visually-hidden" data-id="search-submit-btn" type="submit"></button>
        </form>
        <div class="product-filter" data-id="product-filter">
          <a class="product-filter__link current" data-action="filter" data-filter="all">{{ __('All') }}</a>
          <a class="product-filter__link" data-action="filter" data-filter="with-recipe">{{ __('With recipe') }}</a>
          <a class="product-filter__link" data-action="filter" data-filter="without-recipe">{{ __('Without recipe') }}</a>
        </div>
        <div class="product-categories {{ isset($currentCategory) ? '' : 'hidden' }}" data-id="products-categories">
          <button class="product-categories__dropdown-btn" type="button" data-action="categories-btn">
            <svg data-action="categories-btn" xmlns="http://www.w3.org/2000/svg" width="12.666" height="20" viewBox="0 0 12.666 20">
              <g data-action="categories-btn" transform="translate(-1026 429) rotate(-90)">
                <rect data-action="categories-btn" width="20" height="2.5" rx="1" transform="translate(409 1026)" fill="#fff" />
                <rect data-action="categories-btn" width="14" height="2.5" rx="1" transform="translate(412 1031.083)" fill="#fff" />
                <rect data-action="categories-btn" width="4" height="2.5" rx="1" transform="translate(417 1036.166)" fill="#fff" />
              </g>
            </svg>
            {{ __('Search by Categories') }}
          </button>
          <div class="product-categories__content-wrap">
            <ul class="product-categories__content">
              @foreach ($data->categories as $category)
                <li class="product-categories__item">
                  <a class="product-categories__link @isset($currentCategory) {{ $currentCategory->id == $category->id ? 'current' : '' }} @endisset" data-name="category-link" data-type="category" data-category="{{ $category->id }}" href="#">
                    <span data-type="category" data-category="{{ $category->id }}">{!! $category->title !!}</span>
                    <span data-type="category" data-category="{{ $category->id }}">{!! $category->title !!}</span>
                  </a>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section class="all-products" data-id="products-section" id="products">
      <div class="container">
        <h2 class="title all-products__title">
          {!! isset($currentCategory) ? $currentCategory[$locale . '_title'] : $page['all-products-title'] !!}
        </h2>
        <ul class="all-products__list">
          @if ($data->products->count() == 0)
            {{ __('No products') }}
          @else
            @foreach ($data->products as $product)
              <li class="all-products__item">
                <x-products-card :product="$product" />
              </li>
            @endforeach
          @endif
        </ul>
        <div class="all-products__pagination">
          {{ $data->products->links('components/pagination') }}
        </div>
      </div>
      @if (isset($currentCategory))
        <input data-id="current-category" type="hidden" value="{{ $currentCategory->id }}">
      @else
        <input data-id="current-category" type="hidden" value="null">
      @endif
    </section>
  </main>
@endsection
