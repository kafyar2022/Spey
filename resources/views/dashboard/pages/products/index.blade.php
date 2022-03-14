@extends('dashboard.layouts.master')

@section('content')
  <header class="header">
    <form class="search-form" action="{{ route('dashboard.products.search') }}" method="get">
      @csrf
      <input class="search-input" type="search" name="keyword" placeholder="Поиск по Продуктам..." autocomplete="off" value="{{ isset($keyword) ? $keyword : '' }}">
      <button class="search-submit-btn" type="submit">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488.4 488.4">
          <path d="M0 203.25c0 112.1 91.2 203.2 203.2 203.2 51.6 0 98.8-19.4 134.7-51.2l129.5 129.5c2.4 2.4 5.5 3.6 8.7 3.6s6.3-1.2 8.7-3.6c4.8-4.8 4.8-12.5 0-17.3l-129.6-129.5c31.8-35.9 51.2-83 51.2-134.7C406.4 91.15 315.2.05 203.2.05S0 91.15 0 203.25zm381.9 0c0 98.5-80.2 178.7-178.7 178.7s-178.7-80.2-178.7-178.7 80.2-178.7 178.7-178.7 178.7 80.1 178.7 178.7z" />
        </svg>
      </button>
    </form>
    <ul class="header-navigation">
      <li class="header-navigation-item">
        <a class="header-navigation-link current" href="{{ route('dashboard') }}">Продукты: {{ $productsQuantity }}</a>
      </li>
      <li class="header-navigation-item">
        <a class="header-navigation-link" href="{{ route('dashboard.products.categories') }}">Категории: {{ $categoriesQuantity }}</a>
      </li>
      <li class="header-navigation-item">
        <a class="header-navigation-link green-bg white" href="{{ route('dashboard.products.create') }}">Добавить новый продукт</a>
      </li>
    </ul>
  </header>
  <ul class="breadcrumbs book-read-page__breadcrumbs">
    <li class="breadcrumbs-item">
      <a class="breadcrumbs-link current" href="{{ route('dashboard') }}">Продукты</a>
    </li>
  </ul>
  <main class="products-page">
    @if ($products && $products->count() > 0)
      <ul class="list">
        @foreach ($products as $product)
          <li class="list-item">
            <span class="list-item-title">{{ $rank++ }}. {{ $product->title }}</span>
            <a class="list-action" href="{{ route('dashboard.products.update', $product->id) }}">
              <svg fill="#fff" width="25" height="25" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 217.855 217.855">
                <path d="M215.658 53.55L164.305 2.196a7.5 7.5 0 00-10.606 0L3.809 152.086a7.505 7.505 0 00-2.193 5.075L.005 210.127a7.502 7.502 0 007.725 7.724l52.964-1.613a7.502 7.502 0 005.075-2.192l149.89-149.889a7.501 7.501 0 00-.001-10.607zM57.264 201.336l-42.024 1.28 1.279-42.026 91.124-91.125 40.75 40.743-91.129 91.128zM159 99.602L118.249 58.86l40.752-40.753 40.746 40.747L159 99.602z" />
              </svg>
            </a>
            <button class="list-action red-bg" type="button" data-action="delete-product" data-product="{{ $product->id }}">
              <svg width="25" height="25" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" class="svg-inline--fa fa-trash-alt fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="#fff" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path>
              </svg>
            </button>
          </li>
        @endforeach
      </ul>
      {{ $products->links('components/pagination') }}
    @else
      <p>Продуктов не найдено</p>
    @endif
    <div class="confirm-modal hidden">
      <form class="confirm-form" action="{{ route('products.delete') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="">
        <p class="confirm-msg">Вы действительно хотите удалить этот продукт?</p>
        <div class="form-btn-wrap">
          <button class="form-btn green-bg" type="reset" data-action="cancel">Отмена</button>
          <button class="form-btn red-bg" type="submit">Удалить</button>
        </div>
      </form>
    </div>
  </main>
@endsection
