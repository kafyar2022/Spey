<div class="container">
  <h2 class="all-products__title">
    {{ isset($currentCategory) ? $currentCategory[$locale . '_title'] : __('All products') }}
    @if (isset($recipe))
      (@if ($recipe)
        {{ __('With recipe') }}
      @else
        {{ __('Without recipe') }}
      @endif)
    @endif
  </h2>
  <ul class="all-products__list">
    @if ($products->count() == 0)
      {{ __('No products') }}
    @else
      @foreach ($products as $product)
        <li class="all-products__item">
          <x-products-card :product="$product" />
        </li>
      @endforeach
    @endif
  </ul>
  <div class="all-products__pagination">
    {{ $products->links('components/pagination') }}
  </div>
  @if (isset($currentCategory))
    <input data-id="current-category" type="hidden" value="{{ $currentCategory->id }}">
  @else
    <input data-id="current-category" type="hidden" value="null">
  @endif
</div>
