@extends('common.layout')

@section('title')
  {{$title}}
@endsection

@section('body')
      <div>
        <h1 class="text-info tac"><img src="img/logo.png" alt="skロゴ"></h1>
        @if (isset($err_msgs))
          <ul>
            @foreach ($err_msgs as $err_msg)
              <li>{{$err_msg}}</li>
            @endforeach
          </ul>
        @endif
        <form action="" method="post" class="tac">
            <div class="bumon">
                <label for="bumon">所属部門</label>
                <select name="bumon" id="bumon" onchange="createMenu01(this.value)">
                    <option disabled selected>選択してください</option>
                    <option value="総務部">総務部</option>
                    <option value="営業部">営業部</option>
                    <option value="工務部">工務部</option>
                </select>
            </div>
            <div>
                <label for="ka">所属課</label>
                <select name="ka" id="ka" disabled onchange="createMenu02(this.value)"></select>
            </div>
            <div>
                <label for="name">名前</label>
                <select name="name" id="name" disabled></select>
            </div>
            <div>
                <label for="password">パスワード</label>
                <input type="password" name="password" id="password">
            </div>
            <div class='btn_box tac'>
                <input class="btn btn-primary" type="submit" value="ログイン">
            </div>
        </form>
      </div>
@endsection