@extends('common.layout')

@section('title')
  {{$title}}
@endsection

@section('body')
	<section>
        <h1>@yield('title')</h1>
        <form action="usertouroku_confirm" method="post">
        	<div class="departments">
                <label for="departments">所属部門</label>
                <select name="departments" id="departments" onchange="createMenu01(this.value)">
                    <option disabled selected>選択してください</option>
                    <option value="総務部">総務部</option>
                    <option value="営業部">営業部</option>
                    <option value="工務部">工務部</option>
                </select>
            </div>
            <div class="divisions">
                <label for="divisions">所属課</label>
                <select name="divisions" id="divisions" disabled onchange="createMenu02(this.value)"></select>
            </div>
            <div>
                <label for="info">情報システム課</label>
                <input type="checkbox" name="info" id="info">
            </div>
            <div class="positions">
                <label for="positions">役職</label>
                <select name="positions" id="positions">
                	<option disabled selected>選択してください</option>
                    <option value="役員">役員</option>
                    <option value="上長">上長</option>
                    <option value="社員">社員</option>
                </select>
            </div>
            <div>
                <label>入社日</label>
                <input type="date" name="nyusya_date" id="nyusya_date">
            </div>
            <div>
                <label>退社日</label>
                <input type="date" name="taishoku_date" id="nyusya_date">
            </div>
        	<div class="name">
                <label>名前（漢字）</label>
                <input type="text" name="sei" class="name" pattern="" placeholder="姓">
                <input type="text" name="mei" class="name" pattern="" placeholder="名">
            </div>
            <div class="name">
                <label>名前（カナ）</label>
                <input type="text" name="sei_kana" class="name" pattern="[\u30A1-\u30F6]*" placeholder="セイ" required>
                <input type="text" name="mei_kana" class="name" pattern="[\u30A1-\u30F6]*" placeholder="メイ" required>
            </div>
            <div>
            	<label>メールアドレス</label>
  				<input class="email" type="email" name="email" autocomplete="email" required>
			</div>
			<div>
				<label>メールアドレス確認</label>
  				<input class="email" type="email" name="email" autocomplete="email" required>
			</div>
			<div class="password_box">
                <label for="password">パスワード</label>
                <input type="password" name="password" class="field" id="password" minlength="8" maxlength="16" pattern="[a-zA-Z0-9]+" onpaste="return false" required>
            </div>
            <div class="password_subbox">
                <input type="checkbox" id="password_disp">パスワードを表示する
            </div>
            <div class="password_box">
                <label for="password">パスワード確認</label>
                <input type="password" name="password_check" class="field" id="password_check" minlength="8" maxlength="16" pattern="[a-zA-Z0-9]+" onpaste="return false" required>
            </div>
            <div class="password_subbox">
                <input type="checkbox" id="password_disp2">パスワードを表示する
            </div>
			<div class='btn_box tac'>
            	<input class='btn' type="submit" value="確認する">
            </div>
        </form>
	</section>
@endsection