@extends('common.layout')

@section('jq_plugins')
<script src="/js/jquery.cookie.js"></script>
@endsection

@section('page_js')
<script src="/js/auth/login.js"></script>
@endsection

@section('body')
      <div class="pw-form">
        <h1 class="text-info tac"><img src="img/logo.png" alt="skロゴ"></h1>
        @if (isset($errors))
          <ul id="error_box">
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        @endif
        <form action="{{route('login')}}" method="post" class="tac pw-form-container">
        @csrf
            <div class="departments">
                <label for="departments">所属部門</label>
                <select name="departments" id="departments">
                    <option disabled=disabled selected>選択してください</option>
                    @foreach($deps as $dep)
                    <option value="{{$dep->cd}}">{{$dep->name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="divisions">所属課</label>
                <select name="divisions" id="divisions" disabled></select>
            </div>
            <div>
                <label for="name">名前</label>
                <select name="cd" id="cd" disabled></select>
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