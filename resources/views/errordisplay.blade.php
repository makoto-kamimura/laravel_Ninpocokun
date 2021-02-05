@extends('common.layout')

@section('jq_plugins','')

@section('page_js')
<script src="/js/errordisplay.js"></script>
@endsection

@php
  $css = 'errordisplay.css';
@endphp

@section('title','エラー')

@section('tagu')
  {{$tagu}}
@endsection



@section('body')
	<section class="tac">
        <p class="error tac">{{$tagu}}エラーが発生しました<br><span>{{$message}}</span></p>
	</section>
@endsection