<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="/css/sticky-footer.css" rel="stylesheet" media="screen">
</head>
<body>
 
<!-- ヘッダー -->
@include('layouts.partials.header')
 
<div class="container">
 
  <div class="row" id="content">
  <div class="col-md-3">
  <!-- サイドバー -->
  @include('layouts.partials.sidebar')
  </div>
  <div class="col-md-9">
  <!-- コンテンツ -->
  @yield('content')
  </div>
  </div>
 
</div>
 
<!-- フッター -->
@include('layouts.partials.footer')
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>