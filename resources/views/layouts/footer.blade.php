<footer class="footer">
  <div class="container footer__container">
    <nav class="footer-navigations">
      <ul class="footer-navigation">
        <li class="footer-navigation__item" data-action="show">{{ __('About us') }}</li>
        <li class="footer-navigation__item">
          <a class="footer-navigation__link" href="{{ route('about') }}#history">{{ __('History') }}</a>
        </li>
        <li class="footer-navigation__item">
          <a class="footer-navigation__link" href="{{ route('about') }}#geography">{{ __('Geography of presence') }}</a>
        </li>
      </ul>
      <ul class="footer-navigation">
        <li class="footer-navigation__item" data-action="show">{{ __('Products') }}</li>
        @foreach ($footer->products as $category)
          <li class="footer-navigation__item">
            <a class="footer-navigation__link" data-type="footer-category" href="{{ route('products') }}?category={{ $category->id }}#products">{{ $category->title }}</a>
          </li>
        @endforeach
      </ul>
      <ul class="footer-navigation">
        <li class="footer-navigation__item" data-action="show">{{ __('Industry news') }}</li>
        @foreach ($footer->news as $category)
          <li class="footer-navigation__item">
            <a class="footer-navigation__link" href="{{ route('news') }}?category={{ $category->id }}#all-news">{{ $category->title }}</a>
          </li>
        @endforeach
      </ul>
    </nav>
    <div class="site-info">
      <div class="site-info__content">
        <div class="site-info__contacts">
          <h3 class="site-info__title">{{ __('Contacts') }}</h3>
          {{ __('Address') }}: <br>
          {!! $currentSite->address !!} <br> <br>
          @foreach ($currentSite->phones as $phone)
            {{-- {{ $phone->numbers }} <br> --}}
          @endforeach
          <a href="mailto:{{ $currentSite->email }}">{{ $currentSite->email }}</a>
        </div>
        <button class="scroll-top-btn" id="top" type="button">
          <svg xmlns="http://www.w3.org/2000/svg" width="20.008" height="9.782" viewBox="0 0 20.008 9.782">
            <path id="Expand_More" d="M18.286.264,10,7.617,1.724.263A1.1,1.1,0,0,0,.3.263a.829.829,0,0,0,0,1.269L9.29,9.519h0a1.1,1.1,0,0,0,1.427,0l8.995-7.987a.83.83,0,0,0,0-1.27A1.1,1.1,0,0,0,18.286.264Z" transform="translate(0)" fill="#fff" />
          </svg>
        </button>
      </div>
      <div class="site-info__copyright">© {{ date('Y') }} | Spey - {{ __('International pharmaceutical company') }}</div>
    </div>
  </div>
</footer>
