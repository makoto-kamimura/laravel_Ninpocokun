{{-- dailyreport_confirm.blade.phpからconfirm.phpへ変更 --}}
@extends('common.layout')

@section('jq_plugins','')

@section('page_js')
<script src="/js/report/confirm.js"></script>
@endsection

@section('tagu')
{{$tagu}}
@endsection

@section('title')
{{$title}}
@endsection

@section('body')
<section>
  <!-- <h1>@yield('title')</h1> -->
  <h1>日報報告</h1>
  @if ($is_auth)
  <form action="{{route('report.remand')}}" method="post">
  @else
  <form action="{{route('report.store')}}" method="post">
  @endif
    @csrf
    <table border="1" class="m0a">
      <tr>
        <th>本日の作業内容</th>
        <td class="todaywork">
          {{$report -> sagyou}}
        </td>
      </tr>
      <tr>
        <th>進捗状況</th>
        <td>{{$report -> shintyoku}}</td>
      </tr>
      <tr>
        <th>残作業</th>
        <td>{{$report -> zansagyou}}</td>
      </tr>
      <tr>
        <th>引き継ぎ事項</th>
        <td>{{$report -> hikitsugi}}</td>
      </tr>
    </table>
    <div class="comment">
    @if($is_auth)
      <p>コメント</p>
      @if ($report-> status == 1 )
      <p>{{$report -> comment}}</p>
      @else
      <textarea cols="70" rows="5" name="comment" maxlength="360" placeholder="コメントを入力">{{$report -> comment}}</textarea>
      @endif
      <input type="hidden" name="sagyou" value="{{$report -> sagyou}}">
      <input type="hidden" name="shintyoku" value="{{$report-> shintyoku }}">
      <input type="hidden" name="zansagyou" value="{{$report -> zansagyou}}">
      <input type="hidden" name="hikitsugi" value="{{$report -> hikitsugi}}">
    @else
      @if ($report-> status == 1 )
      <p>コメント</p>
      <p>{{old('comment' , $report -> comment) }}</p>
      <input type="hidden" name="comment" value="{{ $report-> comment }}">
      @else
      <input type="hidden" name="comment" value="{{ \Session::get('comment') }}">
      @endif
      <input type="hidden" name="sagyou" value="{{$report -> sagyou}}">
      <input type="hidden" name="shintyoku" value="{{$report-> shintyoku }}">
      <input type="hidden" name="zansagyou" value="{{$report -> zansagyou}}">
      <input type="hidden" name="hikitsugi" value="{{$report -> hikitsugi}}">
    @endif
    </div>
    <!-- 新規日報登録/編集は下記_20210125_kamimura -->
    @if($report -> status < 1 )
    <div class='btn_box tac'>
    <table class='btn'>
      <tr>
        <td><input class='btn btn1' type="submit" name="submit" value="{{ $is_auth ? '承認する' : '登録する' }}"></td>
        <td><input class='btn btn2' type="submit" name="submit" value="{{ $is_auth ? '否認する' : '修正する' }}"></td>
      </tr>
    </table>
    </div>
    @endif

    <!-- 日報承認/否認は下記_20210125_kamimura -->
    <!-- <table class='btn'>
      <tr>
        <td><input class='btn' type="submit" value="承認する"></td>
        <td><input class='btn' type="submit" value="否認する"></td>
      </tr>
    </table> -->

  </form>
</section>
@endsection