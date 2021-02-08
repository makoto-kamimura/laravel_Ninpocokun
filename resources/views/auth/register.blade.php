{{-- usertouroku.blade.phpよりタイトル変更 --}}

@extends('common.layout')

@section('jq_plugins')
<script src="/js/jquery.cookie.js"></script>
@endsection

@section('page_js')
<script src="/js/auth/register.js"></script>
@endsection

@section('title')
  {{$title}}
@endsection

@section('body')
	<section>
        <h1>@yield('title')</h1>
        @if ($errors->any())
        <div class="">
            <ul id="error_box">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        <form action="{{route('user.confirm')}}" method="post">
        @csrf

        <div class="employeecode">
                <label>社員コード</label>                        
                @empty($cd)
                <label>自動採番</label>
                @else
                <label>{{ old('cd' , $cd )}}</label>
                <input type="hidden" name="cd" id="cd" value="{{ old('cd' , $cd )}}">
                @endempty
            </div>

        	<div class="department">
                <label for="department">所属部門</label>
                <select name="department" id="department">
                    <option disabled selected>選択してください</option>
                    @foreach($deps as $dep)
                    <option value="{{$dep->cd}}" {{ old('department' ,$user -> dep_cd) == $dep->cd ? "selected" : ""}}>{{$dep->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="division">
                <label for="division">所属課</label>
                <select name="division" id="division" {{isset($divs) && $divs->count() > 0 ? "" : "disabled"}}>
                @if(isset($divs) && $divs->count() > 0)
                    <option disabled selected>選択してください</option>
                @foreach($divs as $div)
                    <option value="{{$div->cd}}" {{old('division' , $user -> div_cd) == $div->cd ? "selected" : ""}}>{{$div->name}}</option>                
                @endforeach
                @else
                    <option value="0" selected></option>
                @endif
                </select>
            </div>
            <div>
                <label for="sys_admin">システム管理者</label>
                <input type="checkbox" name="sys_admin" id="sys_admin" value="{{ old('sys_admin' , $user -> sys_admin ) }}"  @if( old('sys_admin' , $user -> sys_admin ) == 1) checked = "checked" @endif >
            </div>
            <div class="position">
                <label for="position">役職</label>
                <select name="position" id="position">
                	<option disabled selected>選択してください</option>
                    @foreach($pos as $po)
                    <option value="{{$po->cd}}" {{ old('position' , $user -> pos_cd) == $po->cd ? "selected" : ""}}>{{$po->name}}</option>
                    @endforeach
                </select>
            </div>
            <!-- 0119_ToDo起票_要件等箇所_20210125_kamimura -->
            <!-- <div>
                <label>入社日</label>
                <input type="date" name="enter">
            </div> -->
            <!-- ユーザー情報変更時のみ項目表示を想定_20210125_kamimura -->
            <div>
                <label>退職日</label>
                <input type="date" name="taishoku_date" value="{{ old('taishoku_date' , $user -> taishoku_date ) }}">
            </div>
        	<div class="name">
                <label>名前（漢字）</label>
                <input type="text" name="sei" class="name" placeholder="姓" value="{{ old('sei' , $user -> sei ) }}" minlength="1" maxlength="6" required>
                <input type="text" name="mei" class="name" placeholder="名" value="{{ old('mei' , $user -> mei ) }}" minlength="1" maxlength="10"  required>
            </div>
            <div class="name">
                <label>名前（カナ）</label>
                <input type="text" name="sei_kana" class="name" pattern="[\u30A1-\u30F6]*" placeholder="セイ"  value="{{ old('sei_kana', $user -> sei_kana) }}" minlength="1" maxlength="10" required>
                <input type="text" name="mei_kana" class="name" pattern="[\u30A1-\u30F6]*" placeholder="メイ" value="{{ old('mei_kana', $user -> mei_kana) }}" minlength="1" maxlength="20"  required>
            </div>
            <div class="password_box">
    			<div class="password_mainbox">
                    <label for="password">パスワード</label>
                    <input type="password" name="password" class="field" id="password" minlength="8" maxlength="16" pattern="[a-zA-Z0-9]+" onpaste="return false" required>
                </div>
                <div class="password_subbox">
                    <input type="checkbox" id="password_disp">パスワードを表示する
                </div>
            </div> 
            <div class="password_box">
                <div class="password_mainbox">
                    <label for="password">パスワード確認</label>
                    <input type="password" name="password_confirmation" class="field" id="password_confirmation" minlength="8" maxlength="16" pattern="[a-zA-Z0-9]+" onpaste="return false" required>
                </div>
                <div class="password_subbox">
                    <input type="checkbox" id="password_disp2">パスワードを表示する
                </div>
            </div>

			<div class='btn_box tac'>
            	<input id="submit_form" class='btn' type="button" value="確認する">
            </div>
        </form>
	</section>
@endsection