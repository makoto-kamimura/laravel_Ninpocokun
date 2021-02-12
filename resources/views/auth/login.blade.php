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
                    <option disabled=disabled {{!isset($get_cookie['department']) ? "selected" : ""}}>選択してください</option>
                    @foreach($deps as $dep)
                    <option value="{{$dep->cd}}" {{isset($get_cookie['department']) && $get_cookie['department'] == $dep->cd ? "selected" : ""}}>{{$dep->name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="divisions">所属課</label>                
                
                @if(isset($divs) && $divs->count() > 0)
                <select name="divisions" id="divisions">
                  @if($divs->count() > 1)
                    <option disabled {{!isset($get_cookie['division']) ? "selected" : ""}}>選択してください</option>
                  @endif
                  @foreach($divs as $div)
                    <option value="{{$div->cd}}" {{isset($get_cookie['division']) && $get_cookie['division'] == $div->cd ? "selected" : ""}}>{{$div->name}}</option>                
                  @endforeach
                </select>
                @else
                <select name="divisions" id="divisions" disabled>
                  @if(isset($get_cookie['division']))
                    <option value="0" selected></option>
                  @endif
                </select>
                @endif                
            </div>
            <div>
                <label for="name">名前</label>
                @if(isset($users) && $users->count() > 0)
                <select name="cd" id="cd">
                  @if($users->count() > 1)
                    <option disabled {{!isset($get_cookie['user_cd']) ? "selected" : ""}}>選択してください</option>
                  @endif
                  @foreach($users as $user)
                    <option value="{{$user->user_cd}}" {{isset($get_cookie['user_cd']) && $get_cookie['user_cd'] == $user->user_cd ? "selected" : ""}}>{{$user->user_name}}</option>                
                  @endforeach
                </select>
                @else
                <select name="cd" id="cd" disabled></select>
                @endif
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