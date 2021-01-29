@extends('common.layout')

@section('jq_plugins')
<script src="/js/jquery.cookie.js"></script>
@endsection

@section('page_js')
<script src="/js/auth/login.js"></script>
@endsection

@section('title')
  {{$title}}
@endsection

@section('body')
      <div class="pw-form">
        @auth
        <p>ログイン中</p>
        @endauth
        <h1 class="text-info tac"><img src="img/logo.png" alt="skロゴ"></h1>
        {{$errors}}
        @if (isset($err_msgs))
          <ul id="error_box">
            @foreach ($err_msgs as $err_msg)
              <li>{{$err_msg}}</li>
            @endforeach
          </ul>
        @endif
        <form action="{{route('login')}}" method="post" class="tac pw-form-container">
        @csrf
            <div class="departments">
                <label for="departments">所属部門</label>
                <select name="departments" id="departments">
                    <option disabled=disabled selected>選択してください</option>
                    <option value="1">社長</option>
                    <option value="10">工務部</option>
                    <option value="20">営業部</option>
                    <option value="30">総務部</option>
                </select>
            </div>
            <div>
                <label for="divisions">所属課</label>
                <select name="divisions" id="divisions" disabled></select>
            </div>
            <div>
                <label for="name">名前</label>
                <select name="name" id="name" disabled></select>
            </div>
            <div>
              <label for="cd">社員コード</label>
              <input type="text" class="field" name="cd" id="cd">
            </div>
            <div>
                <label for="password">パスワード</label>
                <input type="password" name="password" class="field" id="password" minlength="8" maxlength="16" pattern="[a-zA-Z0-9]+" onpaste="return false">
            </div>
            <div id="password_subbox">
                <input type="checkbox" id="password-check">パスワードを表示する
            </div>
            <div class='btn_box tac'>
                <input class="btn btn-primary" type="submit" id="login_submit" value="ログイン">
            </div>
        </form>
      </div>
@endsection