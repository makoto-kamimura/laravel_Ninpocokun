@extends('common.layout')

@section('title')
  {{$title}}
@endsection

@section('body')
	<h1>■@yield('title')</h1>
	<section>
        <form action="" method="post">
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
            <div class="position">
                <label for="position">役職</label>
                <select name="position" id="position">
                	<option disabled selected>選択してください</option>
                    <option value="役員">役員</option>
                    <option value="上長">上長</option>
                    <option value="社員">社員</option>
                </select>
            </div>
        	<div class="name">
                <label for="employeecode">名前</label>
                <input type="text" name="sei1" ipattern="" placeholder="姓" required>
                <input type="text" name="mei1" ipattern="" placeholder="名" required>
            </div>
            <div class="name">
                <label for="employeecode">名前（カナ）</label>
                <input type="text" name="sei2" ipattern="" placeholder="セイ" required>
                <input type="text" name="mei2" ipattern="" placeholder="メイ" required>
            </div>
            <div>
            	<label>メールアドレス</label>
  				<input class="email" type="email" name="email" autocomplete="email" required>
			</div>
			<div>
				<label>メールアドレス確認</label>
  				<input class="email" type="email" name="email" autocomplete="email" required>
			</div>
			<div>
                <label for="password">パスワード</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <label for="password">パスワード確認</label>
                <input type="password" name="password" id="password" required>
            </div>
			<div class='btn_box tac'>
            	<input class='btn' type="submit" value="登録する">
            </div>
        </form>
	</section>

@endsection