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
        <a class="header-navigation-link" href="{{ route('dashboard') }}">Продукты: {{ $productsQuantity }}</a>
      </li>
      <li class="header-navigation-item">
        <a class="header-navigation-link" href="{{ route('dashboard.products.categories') }}">Категории: {{ $categories->count() }}</a>
      </li>
      <li class="header-navigation-item">
        <a class="header-navigation-link green-bg white" href="{{ route('dashboard.products.create') }}">Добавить новый продукт</a>
      </li>
    </ul>
  </header>
  <ul class="breadcrumbs book-read-page__breadcrumbs">
    <li class="breadcrumbs-item">
      <a class="breadcrumbs-link" href="{{ route('dashboard') }}">Продукты</a>
      <svg width="5" height="10" viewBox="0 0 5 10" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 10L5 5L0 0V10Z" fill="#0033ab"></path>
      </svg>
    </li>
    <li class="breadcrumbs-item">
      <a class="breadcrumbs-link current" href="{{ route('dashboard.products.update', $product->id) }}">{{ $product->ru_title }}</a>
    </li>
  </ul>
  <main class="products-update-page">
    <form class="form" action="{{ route('products.update') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{ $product->id }}">
      <label class="form-label">Выберите категорию продукта
        <select class="form-select" name="category-id">
          @php
            $old = old('category-id');
            if ($old == '') {
                $old = $product->category->id;
            }
          @endphp
          @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ $old == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
          @endforeach
        </select>
      </label>
      <label class="form-label">Название продукта на русском
        <input class="form-input" type="text" name="ru-title" value="{{ old('ru-title') == '' ? $product->ru_title : old('ru-title') }}">
      </label>
      <label class="form-label">Название продукта на английском
        <input class="form-input" type="text" name="en-title" value="{{ old('en-title') == '' ? $product->en_title : old('en-title') }}">
      </label>
      <label class="form-label">Выберите картинку для продукта
        <input class="form-input" type="file" name="img">
      </label>
      <label class="form-label">Инструкция на русском
        <input class="form-input" type="file" name="ru-instruction">
      </label>
      <label class="form-label">Инструкция на английском
        <input class="form-input" type="file" name="en-instruction">
      </label>
      <div class="form-item">
        Тип лекарства:
        <div class="form-item-content">
          <label class="form-label form-label-radio">
            <input class="form-input" type="radio" name="recipe" value="true" {{ $product->recipe == true ? 'checked' : '' }}> Рецептурный
          </label>
          <label class="form-label form-label-radio">
            <input class="form-input" type="radio" name="recipe" value="false" {{ $product->recipe == false ? 'checked' : '' }}> Без рецепта
          </label>
        </div>
      </div>
      <p>Выберите иконку:</p>
      <ul class="product-icon-list">
        <li class="product-icon-item">
          <input id="ampulse" class="visually-hidden" type="radio" name="icon" value="ampulse.svg">
          <label for="ampulse"></label>
        </li>
        <li class="product-icon-item">
          <input id="capsules" class="visually-hidden" type="radio" name="icon" value="capsules.svg">
          <label for="capsules"></label>
        </li>
        <li class="product-icon-item">
          <input id="cream" class="visually-hidden" type="radio" name="icon" value="cream.svg">
          <label for="cream"></label>
        </li>
        <li class="product-icon-item">
          <input id="draje" class="visually-hidden" type="radio" name="icon" value="draje.svg">
          <label for="draje"></label>
        </li>
        <li class="product-icon-item">
          <input id="drops" class="visually-hidden" type="radio" name="icon" value="drops.svg">
          <label for="drops"></label>
        </li>
        <li class="product-icon-item">
          <input id="gel" class="visually-hidden" type="radio" name="icon" value="gel.svg">
          <label for="gel"></label>
        </li>
        <li class="product-icon-item">
          <input id="injuction" class="visually-hidden" type="radio" name="icon" value="injuction.svg">
          <label for="injuction"></label>
        </li>
        <li class="product-icon-item">
          <input id="mix" class="visually-hidden" type="radio" name="icon" value="mix.svg">
          <label for="mix"></label>
        </li>
        <li class="product-icon-item">
          <input id="sprey-2" class="visually-hidden" type="radio" name="icon" value="sprey-2.svg">
          <label for="sprey-2"></label>
        </li>
        <li class="product-icon-item">
          <input id="sprey" class="visually-hidden" type="radio" name="icon" value="sprey.svg">
          <label for="sprey"></label>
        </li>
        <li class="product-icon-item">
          <input id="suspension" class="visually-hidden" type="radio" name="icon" value="suspension.svg">
          <label for="suspension"></label>
        </li>
        <li class="product-icon-item">
          <input id="syrop" class="visually-hidden" type="radio" name="icon" value="syrop.svg">
          <label for="syrop"></label>
        </li>
        <li class="product-icon-item">
          <input id="tablets" class="visually-hidden" type="radio" name="icon" value="tablets.svg">
          <label for="tablets"></label>
        </li>
      </ul>
      <label class="form-label form-label-textarea">Состав на русском:
        <textarea class="simditor-textarea" name="ru-composition">{{ old('ru-composition') == '' ? $product->ru_composition : old('ru-composition') }}</textarea>
      </label>
      <label class="form-label form-label-textarea">Состав на английском:
        <textarea class="simditor-textarea" name="en-composition">{{ old('en-composition') == '' ? $product->en_composition : old('en-composition') }}</textarea>
      </label>
      <label class="form-label form-label-textarea">Показания к применению на русском:
        <textarea class="simditor-textarea" name="ru-indications">{{ old('ru-indications') == '' ? $product->ru_indications : old('ru-indications') }}</textarea>
      </label>
      <label class="form-label form-label-textarea">Показания к применению на английском:
        <textarea class="simditor-textarea" name="en-indications">{{ old('en-indications') == '' ? $product->en_indications : old('en-indications') }}</textarea>
      </label>
      <label class="form-label form-label-textarea">Способ применения применению на русском:
        <textarea class="simditor-textarea" name="ru-method">{{ old('ru-method') == '' ? $product->ru_method : old('ru-method') }}</textarea>
      </label>
      <label class="form-label form-label-textarea">Способ применения применению на английском:
        <textarea class="simditor-textarea" name="en-method">{{ old('en-method') == '' ? $product->en_method : old('en-method') }}</textarea>
      </label>
      <label class="form-label form-label-textarea">Описание на русском:
        <textarea class="form-textarea" name="ru-description">{{ old('ru-description') == '' ? $product->ru_description : old('ru-description') }}</textarea>
      </label>
      <label class="form-label form-label-textarea">Описание на английском:
        <textarea class="form-textarea" name="en-description">{{ old('en-description') == '' ? $product->en_description : old('en-description') }}</textarea>
      </label>
      <div class="form-btn-wrap">
        <button class="form-btn green-bg" type="submit">Редактировать</button>
        <button class="form-btn red-bg" type="button" data-action="delete-product">Удалить</button>
      </div>
    </form>
    <div class="confirm-modal hidden">
      <form class="confirm-form" action="{{ route('products.delete') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">
        <p class="confirm-msg">Вы действительно хотите удалить этот продукт?</p>
        <div class="form-btn-wrap">
          <button class="form-btn green-bg" type="reset" data-action="cancel">Отмена</button>
          <button class="form-btn red-bg" type="submit">Удалить</button>
        </div>
      </form>
    </div>
  </main>
@endsection
