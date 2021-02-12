<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-store, max-age=0">

    <!-- CSS -->
    <link rel="stylesheet" href="/css/destyle.css">

    <link rel="stylesheet" href="/css/common.css">
    <link rel="stylesheet" href="/css/{{$css}}">

    <script src="/js/jquery-3.5.1.min.js"></script>
    @yield('jq_plugins')
    <script src="/js/utility.js"></script>
    @yield('page_js')

    <title>@yield('title')</title>
  </head>
  <body>
    <header>
      <p class="homelink"><a href="{{route('main')}}"><span><img src="/img/title.png" alt="OMOTEDASBURO"></span><span>OMOTESABURO</span></a></p>
      @if(Auth::check())
      <p class="userdisp">
        {{-- {{ Session::get('dep_name') }} --}}
        {{ Session::get('username') }}@if(Session::has('last_login'))（最終ログイン：{{ Session::get('last_login')}}）@endif</p>
      <ul id="pclist">
          @if (isset( Auth::user()->sys_admin ) && Auth::user()->sys_admin == 1)
          <li class="odd"><a href="{{route('user.admin')}}"><img src="/img/menu01.png" alt="ユーザー管理"></a></li>
          @endif
          @if (isset( Auth::user()->pos_cd ) && Auth::user()->pos_cd < 30)
          <li class="even"><a href="{{route('report.approve')}}"><img src="/img/menu02.png" alt="日報承認"></a></li>
          @endif
          @if (isset( Auth::user()->pos_cd ) && Auth::user()->pos_cd != 1)
          <li class="odd"><a href="{{route('report.index')}}"><img src="/img/menu03.png" alt="日報一覧"></a></li>
          <li class="even"><a href="{{route('report.create')}}"><img src="/img/menu04.png" alt="日報登録"></a></li>
          @endif
          <li class="logout"><a href="{{route('user.logout')}}"><img src="/img/logout.png" alt="ログアウト"></a></li>
      </ul>
      <div id="nav-drawer">
        <input id="nav-input" type="checkbox" class="nav-unshown">
        <label id="nav-open" for="nav-input"><span></span></label>
        <label class="nav-unshown" id="nav-close" for="nav-input"></label>
        <div id="nav-content">

          <ul id="splist">
              @if (isset( Auth::user()->sys_admin ) && Auth::user()->sys_admin == 1)
              <li><a href="{{route('user.admin')}}">ユーザー管理</a></li>
              @endif
              @if (isset( Auth::user()->pos_cd ) && Auth::user()->pos_cd < 30)
              <li><a href="{{route('report.approve')}}">日報承認・確認</a></li>
              @endif
              @if(isset( Auth::user()->pos_cd ) && Auth::user()->dep_cd != 1)
              <li><a href="{{route('report.index')}}">日報一覧</a></li>
              <li><a href="{{route('report.create')}}">日報登録</a></li>
              @endif
              <li><a href="{{route('user.logout')}}">ログアウト</a></li>
            {{-- @if (isset( $sys_admin ) && $sys_admin == 1)
            <li><a href="user">ユーザー管理</a></li>
            @endif
            @if (isset( $pos_cd ) && $pos_cd < 30)
            <li><a href="dailylist_superior">日報承認・確認</a></li>
            @endif
            <li><a href="{{route('report.index')}}">日報一覧</a></li>
            <li><a href="{{route('report.create')}}">日報登録</a></li>
            <li><a href="login">ログアウト</a></li> --}}
          </ul>
        </div>
      </div>
      @endif
    </header>
    <section class="main">
        @yield('body')
    </section>
    <footer class='tac'>
          <small>scratch</small>
    </footer>
  </body>
</html>