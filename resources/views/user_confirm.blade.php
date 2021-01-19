@extends('common.layout')

@section('title')
  {{$title}}
@endsection
@section('body')
<section>
<div>
    <ul>
        <li>所属：{{$user['department']}}</li>
        <li>所属課：{{$user['division']}}</li>
        <li>役職：{{$user['position']}}</li>
        <li>姓(漢字)：{{$user['sei1']}}</li>
        <li>名(漢字)：{{$user['mei1']}}</li>
        <li>姓(かな)：{{$user['sei2']}}</li>
        <li>名(かな)：{{$user['mei2']}}</li>
        <li>メールアドレス：{{$user['email']}}</li>
        <li>パスワード：{{$user['password']}}</li>
    </ul>
    <form action="{{route('create')}}" method="post">
      <!-- CSRF保護 -->
      @csrf
    <div class='btn_box tac'>
      <input class='btn' type="submit" value="登録する">
    </div>
  </form>
</div>
</section>
@endsection