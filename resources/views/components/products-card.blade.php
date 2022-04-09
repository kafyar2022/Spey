@props(['product'])

<a class="product-card" data-type="product-card" href="{{ route('products.read', ['slug' => $product->slug]) }}">
  <img class="product-card__img" data-type="product-card" src="{{ asset('img/products/' . $product->img) }}" alt="{{ $product->title }}">
  <div class="product-card__body" data-type="product-card">
    <h3 class="product-card__title" data-type="product-card">
      {!! $product->title !!}
      <div class="product-card__mode" data-type="product-card">{{!$product->category->trashed ? $product->category->$title : ''}}</div>
    </h3>
    <div class="products-card__view-more">
      <span class="products-card__view-more-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14.525" viewBox="0 0 8 14.525">
          <g transform="translate(0 14.525) rotate(-90)">
            <path d="M13.276.216,7.263,6.229,1.251.215A.733.733,0,0,0,.214,1.253l6.53,6.532h0a.732.732,0,0,0,1.036,0l6.53-6.532A.733.733,0,1,0,13.276.216Z" fill="#fff"></path>
          </g>
        </svg>
      </span>
      {{ __('View product') }}
    </div>
    <div class="product-card__category-icon" data-type="product-card">
      <span style="{{'background-image: url(../img/product-icons/' . $product->icon . ')'}}"></span>
    </div>
  </div>
</a>
