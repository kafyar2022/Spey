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
      <input type="hidden" name="product-id" value="{{ $product->id }}">
      <fieldset class="form__element form__element--long form__element--photo">
        <legend class="form__label">Фотография продукта</legend>
        <img class="form__photo-preview {{ $product->img ? 'transparent-bg' : '' }}" src="{{ asset('img/products/' . $product->img) }}" alt="Фотография продукта" width="40" height="44">
        <input class="form__photo-input visually-hidden" type="file" id="photo" name="photo" accept="image/*">
        <label class="form__file-label" for="photo">Редактировать</label>
      </fieldset>
      <fieldset class="form__element form__element--long">
        <legend class="form__label">Иконки для продукта</legend>
        <input class="product-icon-input visually-hidden" id="gel" type="radio" name="icon" value="gel.svg" {{ $product->icon === 'gel.svg' ? 'checked' : '' }}>
        <label class="product-icon product-icon--gel" for="gel">Гель</label>
        <input class="product-icon-input visually-hidden" id="draje" type="radio" name="icon" value="draje.svg" {{ $product->icon === 'draje.svg' ? 'checked' : '' }}>
        <label class="product-icon product-icon--draje" for="draje">Драже</label>
        <input class="product-icon-input visually-hidden" id="drops" type="radio" name="icon" value="drops.svg" {{ $product->icon === 'drops.svg' ? 'checked' : '' }}>
        <label class="product-icon product-icon--drops" for="drops">Капли</label>
        <input class="product-icon-input visually-hidden" id="capsules" type="radio" name="icon" value="capsules.svg" {{ $product->icon === 'capsules.svg' ? 'checked' : '' }}>
        <label class="product-icon product-icon--capsules" for="capsules">Капсулы</label>
        <input class="product-icon-input visually-hidden" id="cream" type="radio" name="icon" value="cream.svg" {{ $product->icon === 'cream.svg' ? 'checked' : '' }}>
        <label class="product-icon product-icon--cream" for="cream">Крем</label>
        <input class="product-icon-input visually-hidden" id="mix" type="radio" name="icon" value="mix.svg" {{ $product->icon === 'mix.svg' ? 'checked' : '' }}>
        <label class="product-icon product-icon--mix" for="mix">Раствор</label>
        <input class="product-icon-input visually-hidden" id="syrop" type="radio" name="icon" value="syrop.svg" {{ $product->icon === 'syrop.svg' ? 'checked' : '' }}>
        <label class="product-icon product-icon--syrop" for="syrop">Сироп</label>
        <input class="product-icon-input visually-hidden" id="sprey" type="radio" name="icon" value="sprey.svg" {{ $product->icon === 'sprey.svg' ? 'checked' : '' }}>
        <label class="product-icon product-icon--sprey" for="sprey">Спрей</label>
        <input class="product-icon-input visually-hidden" id="suspension" type="radio" name="icon" value="suspension.svg" {{ $product->icon === 'suspension.svg' ? 'checked' : '' }}>
        <label class="product-icon product-icon--suspension" for="suspension">Суспензия</label>
        <input class="product-icon-input visually-hidden" id="tablets" type="radio" name="icon" value="tablets.svg" {{ $product->icon === 'tablets.svg' ? 'checked' : '' }}>
        <label class="product-icon product-icon--tablets" for="tablets">Таблетки</label>
        <input class="product-icon-input visually-hidden" id="injuction" type="radio" name="icon" value="injuction.svg" {{ $product->icon === 'injuction.svg' ? 'checked' : '' }}>
        <label class="product-icon product-icon--injuction" for="injuction">Укол</label>
        <input class="product-icon-input visually-hidden" id="ampulse" type="radio" name="icon" value="ampulse.svg" {{ $product->icon === 'ampulse.svg' ? 'checked' : '' }}>
        <label class="product-icon product-icon--ampulse" for="ampulse">Ампулы</label>
      </fieldset>
      <fieldset class="form__element">
        <label class="form__label" for="categories">Категория</label>
        <select class="form__select" name="category-id" id="categories" required>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
          @endforeach
        </select>
      </fieldset>
      <fieldset class="form__element">
        <label class="form__label" for="prescription">Тип применения</label>
        <select class="form__select" name="prescription" id="prescription" required>
          <option value="1" {{ $product->recipe ? 'selected' : '' }}>Рецептурный</option>
          <option value="0" {{ !$product->recipe ? 'selected' : '' }}>Без рецепта</option>
        </select>
      </fieldset>
      <fieldset class="form__element">
        <label class="form__label" for="ru-title">Название на русском</label>
        <input class="form__input" type="text" name="ru-title" id="ru-title" placeholder="Лактоспей беби" autocomplete="off" required data-pristine-required-message="Объязательное поле" value="{{ $product->ru_title }}">
      </fieldset>
      <fieldset class="form__element">
        <label class="form__label" for="en-title">Название на английском</label>
        <input class="form__input" type="text" name="en-title" id="en-title" autocomplete="off" placeholder="Lactospey Baby" required data-pristine-required-message="Объязательное поле" value="{{ $product->en_title }}">
      </fieldset>
      <fieldset class="form__element form__element--file">
        <legend class="form__label">Инструкция на русском</legend>
        <p class="form__file-preview" data-instruction="ru">{{ $product->ru_instruction ? $product->ru_instruction : 'Файл не выбран' }}</p>
        <div class="form-actions__wrap">
          <label class="form-actions__edit" for="ru-instruction">Редактировать</label>
          <input class="visually-hidden" id="ru-instruction" type="file" name="ru-instruction">
          <button class="form-actions__delete" data-action="delete-ru-instruction" type="button">Удалить</button>
          <input class="visually-hidden" type="checkbox" name="ru-instruction-deleted">
        </div>
      </fieldset>
      <fieldset class="form__element form__element--file">
        <legend class="form__label">Инструкция на английском</legend>
        <p class="form__file-preview" data-instruction="en">{{ $product->en_instruction ? $product->en_instruction : 'Файл не выбран' }}</p>
        <div class="form-actions__wrap">
          <label class="form-actions__edit" for="en-instruction">Редактировать</label>
          <input class="visually-hidden" id="en-instruction" type="file" name="en-instruction">
          <button class="form-actions__delete" data-action="delete-en-instruction" type="button">Удалить</button>
          <input class="visually-hidden" type="checkbox" name="en-instruction-deleted">
        </div>
      </fieldset>
      <fieldset class="form__element form__element--wide form__element--desc">
        <legend class="form__label">Описание на русском</legend>
        <textarea class="form__textarea" name="ru-description" placeholder="Описание продукта на русском языке">{{ $product->ru_description }}</textarea>
      </fieldset>
      <fieldset class="form__element form__element--wide form__element--desc">
        <legend class="form__label">Описание на английском</legend>
        <textarea class="form__textarea" name="en-description" placeholder="Product description in English">{{ $product->en_description }}</textarea>
      </fieldset>
      <fieldset class="form__element form__element--wide form__element--long">
        <legend class="form__label">Состав на русском</legend>
        <textarea class="simditor-textarea" name="ru-composition" placeholder="Состав продукта на русском языке">{{ $product->ru_composition }}</textarea>
      </fieldset>
      <fieldset class="form__element form__element--wide form__element--long">
        <legend class="form__label">Состав на английском</legend>
        <textarea class="simditor-textarea" name="en-composition" placeholder="Product composition in English">{{ $product->en_composition }}</textarea>
      </fieldset>
      <fieldset class="form__element form__element--wide form__element--long">
        <legend class="form__label">Показания к применению на русском</legend>
        <textarea class="simditor-textarea" name="ru-indications" placeholder="Показания к применению на русском языке">{{ $product->ru_indications }}</textarea>
      </fieldset>
      <fieldset class="form__element form__element--wide form__element--long">
        <legend class="form__label">Показания к применению на английском</legend>
        <textarea class="simditor-textarea" name="en-indications" placeholder="Indications for use in English">{{ $product->en_indications }}</textarea>
      </fieldset>
      <fieldset class="form__element form__element--wide form__element--long">
        <legend class="form__label">Способ применения на русском</legend>
        <textarea class="simditor-textarea" name="ru-method" placeholder="Способ применения на русском языке">{{ $product->ru_method }}</textarea>
      </fieldset>
      <fieldset class="form__element form__element--wide form__element--long">
        <legend class="form__label">Способ применения на английском</legend>
        <textarea class="simditor-textarea" name="en-method" placeholder="How to use method in English">{{ $product->en_method }}</textarea>
      </fieldset>
      <fieldset class="form__element form__element--submit">
        <button class="form__submit" type="submit">Редактировать</button> или <a class="form__reset" href="javascript:window.location.href=window.location.href">отменить</a>
      </fieldset>
    </form>
  </main>
@endsection
