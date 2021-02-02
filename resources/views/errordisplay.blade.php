@extends('common.layout')

@section('tagu')
  {{$tagu}}
@endsection

@php
  $css = 'errordisplay.css';
@endphp

@section('body')
	<section class="tac">
        <p class="error tac">エラーが発生しました<br><span>システム管理者に確認してください</span></p>
	</section>
@endsection