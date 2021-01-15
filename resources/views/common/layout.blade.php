<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="css/destyle.css">
    <link rel="stylesheet" href="css/common.css">

    <link rel="stylesheet" href="css/{{$css}}">

    <title>@yield('title')</title>
  </head>
  <body>
    <header>
      <p><span><img src="img/title.png" alt="OMOTEDASBURO"></span><span>OMOTEDASBURO</span></p>
    </header>
    <section class="main">
        @yield('body')
    </section>
    <footer class='tac'>
          <small>Presentation by scratch</small>
    </footer>
 
    <script type="text/javascript" src="js/{{$js}}"></script>

  </body>
</html>