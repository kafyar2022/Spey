@extends('layouts.master')

@section('title', $page[$locale . '_title'])

@section('content')
  <main class="contacts-page">
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
      <img class="vitrin-img" src="{{ asset('img/contacts-vitrin-bg.jpg') }}">
      <div class="container vitrin-container">
        <div class="vitrin-left">
          <h1 class="vitrin-title">{!! $page['vitrin-title'] !!}</h1>
          <p class="vitrin__text">{!! $page['vitrin-text'] !!}</p>
          <div class="vitrin__link-wrap">
            <div class="vitrin-dropdown" data-family="vitrin-dropdown">
              <button class="button vitrin-dropdown__button" data-family="vitrin-dropdown" type="button">{{ __('Select region') }}</button>
              <div class="vitrin-dropdown__content" data-family="vitrin-dropdown">
                <ul class="vitrin-dropdown__list" data-family="vitrin-dropdown">
                  @foreach ($speySites as $site)
                    <li class="vitrin-dropdown__item" data-family="vitrin-dropdown">
                      <a class="vitrin-dropdown__link" data-family="vitrin-dropdown" href="{{ route('contacts') }}?site={{ $site->id }}#geography-presence">{{ $site->title }}</a>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="cooperation" id="cooperation">
      <div class="container">
        <h2 class="cooperation__title">{!! $page['cooperation-title'] !!}</h2>
        <div>{!! $page['cooperation-text'] !!}</div>
      </div>
    </section>
    <section class="contacts-geography-presence" id="geography-presence">
      <div class="container">
        <h2 class="geography-presence-title">{!! $page['geography-title'] !!}</h2>
      </div>
      <div class="geography-container">
        <ul class="geography-countries">
          @foreach ($speySites as $site)
            <li class="countries-item">
              <a class="countries-link {{ $activeSite->id == $site->id ? 'current' : '' }}" href="{{ route('contacts') }}?site={{ $site->id }}#geography-presence">{!! $site->location !!}</a>
            </li>
          @endforeach
        </ul>
      </div>
      <div class="container">
        <ul class="geography-info">
          <li class="geography-info__item">
            <span class="geography-info__icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                <path d="M2.549,232.574H1.777a.579.579,0,1,1,0-1.159h.772V230.1H1.777a.579.579,0,0,1,0-1.159h.772V227.63H1.777a.579.579,0,0,1,0-1.159h.772V224H.579a.58.58,0,0,0-.579.579v9.887a.58.58,0,0,0,.579.579H2.551C2.549,234.276,2.549,234.777,2.549,232.574Z" transform="translate(0 -215.046)" fill="#fff" />
                <path d="M162.1.579A.58.58,0,0,0,161.523,0h-4.944A.58.58,0,0,0,156,.579v.734h6.1Z" transform="translate(-149.841)" fill="#fff" />
                <path d="M307.978,200A3.983,3.983,0,0,0,304,203.978c0,1.757,2.374,4.275,3.59,5.374a.58.58,0,0,0,.776,0c1.244-1.124,3.59-3.627,3.59-5.374A3.983,3.983,0,0,0,307.978,200Zm.927,4.557h-1.854a.579.579,0,1,1,0-1.159H308.9a.579.579,0,1,1,0,1.159Z" transform="translate(-291.956 -191.973)" fill="#fff" />
                <path d="M111.41,80.349h-4.673v-.716c-1.575-1.5-3.862-4.054-3.862-6.241a5.22,5.22,0,0,1,3.862-5.064V64.59a.585.585,0,0,0-.579-.59H96.579a.585.585,0,0,0-.579.59V81.528h15.41a.59.59,0,0,0,0-1.179Zm-8.651-15.092h.927a.59.59,0,0,1,0,1.179h-.927a.59.59,0,0,1,0-1.179ZM99.978,76.5h-.927a.59.59,0,0,1,0-1.179h.927a.59.59,0,0,1,0,1.179Zm0-2.515h-.927a.59.59,0,0,1,0-1.179h.927a.59.59,0,0,1,0,1.179Zm0-2.515h-.927a.59.59,0,0,1,0-1.179h.927a.59.59,0,0,1,0,1.179Zm0-2.515h-.927a.59.59,0,0,1,0-1.179h.927a.59.59,0,0,1,0,1.179Zm0-2.515h-.927a.59.59,0,0,1,0-1.179h.927a.59.59,0,0,1,0,1.179Zm2.2,1.926a.585.585,0,0,1,.579-.59h.927a.59.59,0,0,1,0,1.179h-.927A.585.585,0,0,1,102.18,68.362Z" transform="translate(-91.99 -61.528)" fill="#fff" />
              </svg>
            </span>
            <p class="geography-info__content">{!! $activeSite->address !!}</p>
            <span class="geography-info__location-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                <g transform="translate(5.589 5.589)">
                  <path d="M137.911,136a1.911,1.911,0,1,0,1.911,1.911A1.914,1.914,0,0,0,137.911,136Zm0,2.73a.819.819,0,1,1,.819-.819A.82.82,0,0,1,137.911,138.73Z" transform="translate(-136 -136)" fill="#fff" />
                </g>
                <path d="M14.375,6.875H13.088A5.633,5.633,0,0,0,8.125,1.912V.625a.625.625,0,1,0-1.25,0V1.912A5.633,5.633,0,0,0,1.912,6.875H.625a.625.625,0,1,0,0,1.25H1.912a5.633,5.633,0,0,0,4.963,4.963v1.287a.625.625,0,0,0,1.25,0V13.088a5.633,5.633,0,0,0,4.963-4.963h1.287a.625.625,0,0,0,0-1.25Zm-6.875,5A4.375,4.375,0,1,1,11.875,7.5,4.38,4.38,0,0,1,7.5,11.875Z" fill="#fff" />
              </svg>
            </span>
            <span class="geography-info__title">{{ $activeSite->title }}</span>
          </li>
          <li class="geography-info__item">
            <span class="geography-info__icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="16.949" height="20" viewBox="0 0 16.949 20">
                <path d="M32.265,16.6a.493.493,0,1,1-.959-.229,2.972,2.972,0,0,0-.385-2.7,1.5,1.5,0,0,0-1.452-.366c-1.233.233-2.019,1.3-2.929,2.531a10.837,10.837,0,0,1-2.893,2.987,7.688,7.688,0,0,1-4,1.172q-.193,0-.384-.011a4.255,4.255,0,0,1-3.35-1.62,2.713,2.713,0,0,1,.289-3.28l-.5-.666a1.154,1.154,0,0,1,.219-1.6l3.218-2.48a1.139,1.139,0,0,1,.7-.239,1.155,1.155,0,0,1,.921.461l1.187,1.586a10.787,10.787,0,0,0,3.2-2.34A11,11,0,0,0,27.463,6.55L25.879,5.33a1.154,1.154,0,0,1-.219-1.6L28.107.461A1.156,1.156,0,0,1,29.028,0a1.139,1.139,0,0,1,.7.239l1.852,1.427.007.006a.481.481,0,0,1,.04.038c.012.012.023.023.033.035s.013.018.019.027a.486.486,0,0,1,.037.058l.007.014a.5.5,0,0,1,.03.079v0c.047.172,1.08,4.284-4.527,9.975-4.03,4.09-7.269,4.7-8.841,4.7h0a4,4,0,0,1-1-.1h0a.481.481,0,0,1-.075-.029l-.021-.01a.483.483,0,0,1-.052-.034c-.011-.008-.022-.015-.032-.023s-.022-.021-.033-.032a.5.5,0,0,1-.037-.041l-.007-.008-.3-.4a1.638,1.638,0,0,0-.1,1.893c.941,1.371,3.88,1.739,6.4.178a9.926,9.926,0,0,0,2.618-2.734c.99-1.342,1.926-2.61,3.539-2.914A2.49,2.49,0,0,1,31.634,13,3.912,3.912,0,0,1,32.265,16.6Z" transform="translate(-15.476)" fill="#fff" />
              </svg>
            </span>
            <div class="geography-info__content">
              @foreach ($activeSite->phones as $phone)
                <a href="tel:{{ $phone->numbers }}">{{ $phone->numbers }}</a>
              @endforeach
            </div>
            <span class="geography-info__location-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                <g transform="translate(5.589 5.589)">
                  <path d="M137.911,136a1.911,1.911,0,1,0,1.911,1.911A1.914,1.914,0,0,0,137.911,136Zm0,2.73a.819.819,0,1,1,.819-.819A.82.82,0,0,1,137.911,138.73Z" transform="translate(-136 -136)" fill="#fff" />
                </g>
                <path d="M14.375,6.875H13.088A5.633,5.633,0,0,0,8.125,1.912V.625a.625.625,0,1,0-1.25,0V1.912A5.633,5.633,0,0,0,1.912,6.875H.625a.625.625,0,1,0,0,1.25H1.912a5.633,5.633,0,0,0,4.963,4.963v1.287a.625.625,0,0,0,1.25,0V13.088a5.633,5.633,0,0,0,4.963-4.963h1.287a.625.625,0,0,0,0-1.25Zm-6.875,5A4.375,4.375,0,1,1,11.875,7.5,4.38,4.38,0,0,1,7.5,11.875Z" fill="#fff" />
              </svg>
            </span>
            <span class="geography-info__title">{{ $activeSite->title }}</span>
          </li>
          <li class="geography-info__item">
            <span class="geography-info__icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="21.82" height="20" viewBox="0 0 21.82 20">
                <path d="M.055,165.367v10.525l6.435-5.849Zm0,0" transform="translate(-0.052 -158.466)" fill="#fff" />
                <path d="M261.544.051A5.482,5.482,0,0,0,256.028,5.5V9.581a4.137,4.137,0,0,0,8.273,0V6.4a2.758,2.758,0,0,0-5.515,0v3.63h1.838V6.4a.919.919,0,0,1,1.839,0V9.581a2.3,2.3,0,0,1-4.6,0V5.5a3.677,3.677,0,0,1,7.354,0V9.581a4.966,4.966,0,0,1-1.839,3.846v.805l3.677,3.245V5.5A5.482,5.482,0,0,0,261.544.051Zm0,0" transform="translate(-245.239 -0.051)" fill="#fff" />
                <path d="M17.264,289.043H15.457a5.346,5.346,0,0,1-2.852-.816l-.625.46a1.828,1.828,0,0,1-2.137,0l-2.727-2L.3,292.962a.92.92,0,0,0,.614,1.6h20a.917.917,0,0,0,.909-.919.935.935,0,0,0-.3-.678Zm0,0" transform="translate(0 -274.559)" fill="#fff" />
                <path d="M.434,108.369l10.112,7.354a.932.932,0,0,0,1.08,0c.138-.092.264-.2.4-.287a5.552,5.552,0,0,1-1.861-4.137v-4.6H.974a.922.922,0,0,0-.919.919.91.91,0,0,0,.379.747Zm0,0" transform="translate(-0.052 -102.2)" fill="#fff" />
              </svg>
            </span>
            <a class="geography-info__content" href="mailto:{{ $activeSite->email }}">{{ $activeSite->email }}</a>
            <span class="geography-info__location-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                <g transform="translate(5.589 5.589)">
                  <path d="M137.911,136a1.911,1.911,0,1,0,1.911,1.911A1.914,1.914,0,0,0,137.911,136Zm0,2.73a.819.819,0,1,1,.819-.819A.82.82,0,0,1,137.911,138.73Z" transform="translate(-136 -136)" fill="#fff" />
                </g>
                <path d="M14.375,6.875H13.088A5.633,5.633,0,0,0,8.125,1.912V.625a.625.625,0,1,0-1.25,0V1.912A5.633,5.633,0,0,0,1.912,6.875H.625a.625.625,0,1,0,0,1.25H1.912a5.633,5.633,0,0,0,4.963,4.963v1.287a.625.625,0,0,0,1.25,0V13.088a5.633,5.633,0,0,0,4.963-4.963h1.287a.625.625,0,0,0,0-1.25Zm-6.875,5A4.375,4.375,0,1,1,11.875,7.5,4.38,4.38,0,0,1,7.5,11.875Z" fill="#fff" />
              </svg>
            </span>
            <span class="geography-info__title">{{ $activeSite->title }}</span>
          </li>
        </ul>
      </div>
      <div class="map-wrap">
        {!! $activeSite->map !!}
      </div>
    </section>
    <section class="pharmacovigilanc" id="pharmacovigilance">
      <div class="container pharmacovigilanc__container">
        <div class="pharmacovigilanc-first">
          <h2 class="pharmacovigilanc__title">{!! $page['pharmacovigilance-title'] !!}</h2>
          <div>{!! $page['pharmacovigilance-text'] !!}</div>
        </div>
        <div class="pharmacovigilanc-form">
          <h2 class="contact-us__title">{!! $page['contacts-form-title'] !!}</h2>
          <form class="contact-form">
            <span class="contact-form__icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                <path d="M113.82,0h-7.056a1.764,1.764,0,0,0,0,3.528h7.056a1.764,1.764,0,1,0,0-3.528Z" transform="translate(-98.879)" fill="#fff" />
                <g transform="translate(0 1.764)">
                  <path d="M19.607,30H18.437a3.517,3.517,0,0,1-1.756,3.042v.473a3.517,3.517,0,0,1-3.512,3.515H9.657a3.517,3.517,0,0,1-3.512-3.515v-.473A3.517,3.517,0,0,1,4.39,30H3.219A3.224,3.224,0,0,0,0,33.222V55.014a3.224,3.224,0,0,0,3.219,3.222H19.607a3.224,3.224,0,0,0,3.219-3.222V33.222A3.224,3.224,0,0,0,19.607,30ZM6.146,51.675H4.39a.879.879,0,0,1,0-1.757H6.146a.879.879,0,0,1,0,1.757Zm0-3.515H4.39a.879.879,0,0,1,0-1.757H6.146a.879.879,0,0,1,0,1.757Zm0-3.515H4.39a.879.879,0,0,1,0-1.757H6.146a.879.879,0,0,1,0,1.757Zm0-3.515H4.39a.879.879,0,0,1,0-1.757H6.146a.879.879,0,0,1,0,1.757ZM8.779,50.8a.878.878,0,0,1,.878-.879H15.51a.879.879,0,0,1,0,1.757H9.657A.878.878,0,0,1,8.779,50.8Zm9.657,4.394H14.925a.879.879,0,0,1,0-1.757h3.512a.879.879,0,0,1,0,1.757Zm0-7.03H9.657a.879.879,0,0,1,0-1.757h8.779a.879.879,0,0,1,0,1.757ZM8.779,43.767a.878.878,0,0,1,.878-.879h7.024a.879.879,0,0,1,0,1.757H9.657A.878.878,0,0,1,8.779,43.767Zm9.657-2.636H9.657a.879.879,0,0,1,0-1.757h8.779a.879.879,0,0,1,0,1.757Z" transform="translate(0 -30)" fill="#fff" />
                </g>
                <path d="M136.764,91.764h3.528A1.764,1.764,0,0,0,142.056,90H135A1.764,1.764,0,0,0,136.764,91.764Z" transform="translate(-127.115 -84.728)" fill="#fff" />
                <path d="M454.551,432l.747,3.984a.882.882,0,0,0,1.734,0l.747-3.984Z" transform="translate(-427.929 -406.704)" fill="#fff" />
                <g transform="translate(26.472 2.47)">
                  <path d="M455.528,47.88V43.764a1.764,1.764,0,1,0-3.528,0V47.88Z" transform="translate(-452 -42)" fill="#fff" />
                  <path d="M452,172h3.528v13.524H452Z" transform="translate(-452 -164.356)" fill="#fff" />
                </g>
              </svg>
            </span>
            @csrf
            <input class="contact-form__input" name="name" type="text" placeholder="{{ __('Name') }}">
            <input class="contact-form__input contact-form__input--medicine" name="medicine" type="text" placeholder="{{ __('Name of Medicine') }}">
            <input class="contact-form__input" name="email" type="email" placeholder="{{ __('Email') }}">
            <input class="contact-form__input" name="phone" type="number" placeholder="{{ __('Phone') }}">
            <textarea class="contact-form__textarea" name="message" placeholder="{{ __('Enter your Message here...') }}"></textarea>
            <button class="button contact-form__submit-btn" type="submit">{{ __('Send') }}</button>
          </form>
        </div>
      </div>
    </section>
  </main>
@endsection
