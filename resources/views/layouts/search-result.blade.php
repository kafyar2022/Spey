<ul class="results">
  @foreach ($result->products as $product)
    <li class="results-item">
      <a class="results-link" href="{{route('products.read', $product->slug)}}">
        <span class="results-title">{!! $product->title !!}</span>
        <span class="results-breadcrumbs">{{__('Products')}}</span>
        <span class="results-more-icon">
          <svg width="21" height="21" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M13.5 6.497l4 4.002-4 4.001M4.5 10.5h13"/></g></svg>
        </span>
      </a>
    </li>
  @endforeach
  @foreach ($result->news as $news)
    <li class="results-item">
      <a class="results-link" href="{{route('news.read', $news->slug)}}">
        <span class="results-title">{!! $news->title !!}</span>
        <span class="results-breadcrumbs">{{__('Industry news')}}</span>
        <span class="results-more-icon">
          <svg width="21" height="21" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M13.5 6.497l4 4.002-4 4.001M4.5 10.5h13"/></g></svg>
        </span>
      </a>
    </li>
  @endforeach
  @foreach ($result->texts as $text)
    <li class="results-item">
      <a class="results-link" href="{{route($text->page->route)}}?keyword={{$keyword}}#{{$text->anchor}}">
        <span class="results-title">{!! $text->text !!}</span>
        <span class="results-breadcrumbs">{{$text->page[$locale . '_title']}}</span>
        <span class="results-more-icon">
          <svg width="21" height="21" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M13.5 6.497l4 4.002-4 4.001M4.5 10.5h13"/></g></svg>
        </span>
      </a>
    </li>
  @endforeach
  @if ($result->products->count() == 0 && $result->news->count() == 0 && $result->texts->count() == 0)
    <li class="results-link">{{__('No results were found for your search')}}...</li>
  @endif
</ul>
