@props(['news'])

<a class="news-card" href="{{ route('news.read', ['slug' => $news->slug]) }}">
  <img class="news-card__img" src="{{ asset('img/news/' . $news->img) }}" alt="{{ $news->title }}">
  <div class="news-card__info-wrap">
    <h3 class="news-card__category">{!! $news->category[$locale . '_title'] !!}</h3>
    <p class="news-card__title">{!! $news->title !!}</p>
    <div class="news-card__more">
      <span class="news-card__more-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14.525" viewBox="0 0 8 14.525">
          <g id="download" transform="translate(0 14.525) rotate(-90)">
            <path id="Expand_More" d="M13.276.216,7.263,6.229,1.251.215A.733.733,0,0,0,.214,1.253l6.53,6.532h0a.732.732,0,0,0,1.036,0l6.53-6.532A.733.733,0,1,0,13.276.216Z" fill="#fff" />
          </g>
        </svg>
      </span>
      {{ __('Read article') }}
    </div>
  </div>
</a>
