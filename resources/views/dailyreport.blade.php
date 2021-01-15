@extends('common.layout')

@section('title')
  {{$title}}
@endsection

@section('body')
	<h1>■@yield('title')</h1>
	<section>
        <form action="" method="post">
        	<div class="">
                <label for="">●●●●</label>
                <textarea cols="70" rows="5" name="dailyreport" required></textarea>
            </div>
            <div class="">
                <label for="">●●●●</label>
                <textarea cols="70" rows="5" name="dailyreport" required></textarea>
            </div>
            <div class="">
                <label for="">●●●●</label>
                <textarea cols="70" rows="5" name="dailyreport" required></textarea>
            </div>
            <div class="">
                <label for="">●●●●</label>
                <textarea cols="70" rows="5" name="dailyreport" required></textarea>
            </div>
			<div class='btn_box tac'>
            	<input class='btn' type="submit" value="登録する">
            </div>
        </form>
	</section>

@endsection