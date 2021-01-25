{{-- dailyreport_confirm.blade.phpからconfirm.phpへ変更 --}}
@extends('common.layout')

@section('tagu')
{{$tagu}}
@endsection

@section('title')
{{$title}}
@endsection

@section('err_msgs1')
{{$err_msgs1}}
@endsection

@section('err_msgs2')
{{$err_msgs2}}
@endsection

@section('err_msgs3')
{{$err_msgs3}}
@endsection

@section('err_msgs4')
{{$err_msgs4}}
@endsection

@section('err_msgs5')
{{$err_msgs5}}
@endsection

@section('body')
<section>
  <h1>@yield('title')</h1>
  <form action="dailyreport_complete.php" method="post">
    <table border="1" class="m0a">
      @if (isset($err_msgs1, $err_msgs2, $err_msgs3, $err_msgs4, $err_msgs5))
      <!--<tr> 
                        <th>タイトル</th>
                        <td>@yield('err_msgs1')</td>
                    </tr>-->
      <tr>
        <th>本日の作業内容</th>
        <td class="todaywork">
          テストテストテストテストテストテストテストテストテストテストテストテストテストテストテスト
        </td>
      </tr>
      <tr>
        <th>進捗状況</th>
        <td>@yield('err_msgs3')</td>
      </tr>
      <tr>
        <th>残作業</th>
        <td>@yield('err_msgs4')</td>
      </tr>
      <tr>
        <th>引き継ぎ事項</th>
        <td>@yield('err_msgs5')</td>
      </tr>
      @endif
    </table>

    <div class='btn_box tac'>
      <input class='btn' type="submit" value="登録する">
    </div>
    
    <!-- 一般社員は下記 / 上長の場合での表記対応ば別途対応_20210125_kamimura -->
    <table class='btn'>
      <tr>
        <td><input class='btn' type="submit" value="登録する"></td>
        <td><input class='btn' type="submit" value="修正する"></td>
      </tr>
    </table>

  </form>
</section>
@endsection