{{-- home_superior.blade.phpからhome.blade.phpに変更してます --}}
@extends('common.layout')

@section('title')
  {{$title}}
@endsection

@section('body')
    <!--<h1 class="text-info tac"><img src="img/logo_s.png" alt="skロゴ小"></h1>-->
    <p class="btn01"><a href="{{route('report.create')}}"></a></p>
    <p class="btn02"><a href="{{route('report.index')}}"></a></p>
    @if (isset( Auth::user()->pos_cd ) && Auth::user()->pos_cd < 30)
    <p class="btn03"><a href="{{route('report.approve')}}"></a></p>
    @endif
    @if (isset( Auth::user()->sys_admin ) && Auth::user()->sys_admin == 1)
    <p class="btn04"><a href="{{route('user.admin')}}"></a></p>
    @endif
@endsection