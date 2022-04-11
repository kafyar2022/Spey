<aside class="sidebar">
  <nav class="main-navigation">
    <ul class="page-navigation">
      <li class="page-navigation-item">
        <a class="page-navigation-link home" target="_blank" href="{{ route('home') }}">Главная</a>
      </li>
      <li class="page-navigation-item">
        <a class="page-navigation-link products {{ $route == 'dashboard' ||
        $route == 'dashboard.products.categories' ||
        $route == 'dashboard.products.create' ||
        $route == 'dashboard.products.update' ||
        $route == 'dashboard.products.search' ||
        $route == 'dashboard.products.categories.search'
            ? 'current'
            : '' }}" href="{{ route('dashboard') }}">Продукты</a>
      </li>
      <li class="page-navigation-item">
        <a class="page-navigation-link news
                    {{ $route == 'dashboard.news' ||
                    $route == 'dashboard.news.categories' ||
                    $route == 'dashboard.news.create' ||
                    $route == 'dashboard.news.update' ||
                    $route == 'dashboard.news.search' ||
                    $route == 'dashboard.news.categories.search'
                        ? 'current'
                        : '' }}" href="{{ route('dashboard.news') }}">Новости</a>
      </li>
      {{-- <li class="page-navigation-item">
                <a class="page-navigation-link histories
                    {{$route == 'dashboard.histories'
                    || $route == 'dashboard.histories.create'
                    || $route == 'dashboard.histories.update'
                    || $route == 'dashboard.histories.search' ? 'current' : ''}}" href="{{route('dashboard.histories')}}">Истории</a>
            </li> --}}
      <li class="page-navigation-item">
        <a class="page-navigation-link logout" href="{{ route('auth.logout') }}">Выход</a>
      </li>
    </ul>
  </nav>
</aside>
