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
                        <td>@yield('err_msgs2')</td>
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
             <div class="comment">
                <label for="">コメント</label>
                <textarea cols="70" rows="5" name="comment" id="comment" maxlength="360"></textarea>
            </div>
            <div class='btn_box tac'>
                <input class='btn' type="submit" value="登録する">
            </div>
        </form>
	</section>
@endsection