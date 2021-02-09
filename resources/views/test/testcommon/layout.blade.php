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

    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="js/{{$js}}"></script>

    <script src="js/jquery.cookie.js"></script>  

    <script src="js/jquery.pagination.js"></script>

    <script src="js/jquery.tablesorter.js"></script>

    <title>@yield('title')</title>
  </head>
  <body>
    <header>
      <p class="homelink"><a href="home"><span><img src="img/title.png" alt="OMOTEDASBURO"></span><span>OMOTESABURO</span></a></p>
      <ul id="pclist" class="listbox">
        <li class="odd"><a href="user"><img src="img/menu01.png" alt="ユーザー管理"></a></li>
        <li class="even"><a href="dailylist_superior"><img src="img/menu02.png" alt="日報承認"></a></li>
        <li class="odd"><a href="dailylist"><img src="img/menu03.png" alt="日報一覧"></a></li>
        <li class="even"><a href="dailyreport"><img src="img/menu04.png" alt="日報登録"></a></li>
        <li class="logout"><a href="/login"><img src="img/logout.png" alt="ログアウト"></a></li>
      </ul>
      <div id="nav-drawer">
        <input id="nav-input" type="checkbox" class="nav-unshown">
        <label id="nav-open" for="nav-input"><span></span></label>
        <label class="nav-unshown" id="nav-close" for="nav-input"></label>
        <div id="nav-content">
          <ul id="splist">
            <li><a href="user">ユーザー管理</a></li>
            <li><a href="dailylist_superior">日報承認・確認</a></li>
            <li><a href="dailylist">日報一覧</a></li>
            <li><a href="dailyreport">日報登録</a></li>
            <li><a href="login">ログアウト</a></li>
          </ul>
        </div>
      </div>
    </header>
    <section class="main">
        @yield('body')
    </section>
    <footer class='tac'>
          <small>scratch</small>
    </footer>
  </body>
</html>