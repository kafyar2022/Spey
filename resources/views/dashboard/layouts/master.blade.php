<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="robots" content="none">
  <meta name="googlebot" content="noindex, nofollow">
  <meta name="yandex" content="none">
  <title>Spey - международная фармацевтическая компания</title>
  {{-- Simditor styles --}}
  <link rel="stylesheet" href="{{ asset('css/simditor.css') }}">
  {{-- App Styles --}}
  <link rel="stylesheet" href="{{ mix('css/dashboard.css') }}">
</head>

<body class="body">
  <div class="modal modal--fail {{ session()->has('fail') ? '' : 'hidden' }}">{{ session()->get('fail') }}</div>
  <div class="modal modal--success {{ session()->has('success') ? '' : 'hidden' }}">{{ session()->get('success') }}</div>

  @if ($errors->any())
    <div class="modal modal--fail">
      <ul class="form-errors">
        @foreach ($errors->all() as $error)
          <li class="form-errors__item">{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  @include('dashboard.layouts.sidebar')

  @yield('content')

  <!-- JQuery 3.6  -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  {{-- Simditor scripts --}}
  <script src="{{ asset('js/module.js') }}"></script>
  <script src="{{ asset('js/hotkeys.js') }}"></script>
  <script src="{{ asset('js/uploader.js') }}"></script>
  <script src="{{ asset('js/simditor.js') }}"></script>
  {{-- App Scripts --}}
  <script src="{{ mix('js/dashboard.js') }}"></script>
</body>

</html>
