{{-- usertouroku.blade.phpよりタイトル変更 --}}

@extends('common.layout')

@section('title')
  {{$title}}
@endsection

@section('body')
	<section>
        <h1>@yield('title')</h1>
        <p>バリデーションエラー確認用{{ $errors }}</p>
        <form action="{{route('user.confirm')}}" method="post">
        @csrf

        <div class="employeecode">
                <label>社員コード</label>
                <label>自動採番</label>
            </div>

        	<div class="department">
                <label for="department">所属部門</label>
                <select name="department" id="department" onchange="createMenu01(this.value)">
                    <option disabled selected>選択してください</option>
                    <option value="総務部">総務部</option>
                    <option value="営業部">営業部</option>
                    <option value="工務部">工務部</option>
                </select>
            </div>
            <div class="division">
                <label for="division">所属課</label>
                <select name="division" id="division" disabled onchange="createMenu02(this.value)"></select>
            </div>
            <div>
                <label for="sys_admin">システム管理者</label>
                <input type="checkbox" name="sys_admin" id="sys_admin" value="{{ old('sys_admin' , $user -> sys_admin ) }}">
            </div>
            <div class="position">
                <label for="position">役職</label>
                <select name="position" id="position">2
                	<option disabled selected>選択してください</option>
                    <option value="役員">役員</option>
                    <option value="上長">上長</option>
                    <option value="社員">社員</option>
                </select>
            </div>
            <!-- 0119_ToDo起票_要件等箇所_20210125_kamimura -->
            <!-- <div>
                <label>入社日</label>
                <input type="date" name="enter">
            </div> -->
            <!-- ユーザー情報変更時のみ項目表示を想定_20210125_kamimura -->
            <div>
                <label>退社日</label>
                <input type="date" name="taishoku_date" value="{{ old('taishoku_date' , $user -> taishoku_date ) }}">
            </div>
        	<div class="name">
                <label>名前（漢字）</label>
                <input type="text" name="sei" class="name" placeholder="姓" value="{{ old('sei' , $user -> sei ) }}">
                <input type="text" name="mei" class="name" placeholder="名" value="{{ old('mei' , $user -> mei ) }}">
            </div>
            <div class="name">
                <label>名前（カナ）</label>
                <input type="text" name="sei_kana" class="name" pattern="[\u30A1-\u30F6]*" placeholder="セイ"  value="{{ old('sei_kana', $user -> sei_kana) }}"required>
                <input type="text" name="mei_kana" class="name" pattern="[\u30A1-\u30F6]*" placeholder="メイ" value="{{ old('mei_kana', $user -> mei_kana) }}" required>
            </div>
			<div id="password_box">
                <label for="password">パスワード</label>
                <input type="password" name="password" class="field" id="password" minlength="8" maxlength="16" pattern="[a-zA-Z0-9]+" onpaste="return false" required>
            </div>
            <div id="password_subbox">
                <input type="checkbox" id="password-check">パスワードを表示する
            </div>
            <div id="password_box">
                <label for="password">パスワード確認</label>
                <input type="password" name="password" class="field" id="password" minlength="8" maxlength="16" pattern="[a-zA-Z0-9]+" onpaste="return false" required>
            </div>
            <div id="password_subbox">
                <input type="checkbox" id="password-check">パスワードを表示する
            </div>
			<div class='btn_box tac'>
            	<input class='btn' type="submit" value="確認する">
            </div>
        </form>
	</section>
@endsection