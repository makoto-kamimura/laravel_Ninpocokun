@extends('test.testcommon.layout')

@section('title')
  {{$title}}
@endsection

@section('body')
	<section>
        <h1>@yield('title')</h1>
        <form action="dailyreport_confirm" method="post">
            <div class="dailytitle">
                <label for="">タイトル</label><br>
                <input type="search" list="list">
                <datalist id="list">
                    <option value="日報確認お願い致します"></option>
                    <option value="日報確認お願い致します"></option>
                    <option value="日報確認お願い致します"></option>
                </datalist>
            </div>
        	<div class="">
                <label for="">作業内容</label>
                <textarea cols="70" rows="10" name="sagyou" required></textarea>
            </div>
            <div class="">
                <label for="">進捗状況</label>
                <textarea cols="70" rows="5" name="shintyoku"></textarea>
            </div>
            <div class="">
                <label for="">残作業</label>
                <textarea cols="70" rows="5" name="zansagyou"></textarea>
            </div>
            <div class="">
                <label for="">引継ぎ事項</label>
                <textarea cols="70" rows="5" name="hikitsugi"></textarea>
            </div>
            <!--
            <div class="">
                <label for="">添付ファイル</label>
                <input type="file" name="file" multiple="multiple">
            </div>
            -->
			<div class='btn_box tac'>
            	<input class='btn' type="submit" value="確認する">
            </div>
        </form>
	</section>
@endsection