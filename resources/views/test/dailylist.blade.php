@extends('test.testcommon.layout')

@section('tagu')
  {{$tagu}}
@endsection

@section('title1')
  {{$title1}}
@endsection

@section('title2')
  {{$title2}}
@endsection

@section('body')
    <section>
	    <h1>@yield('title1')</h1>
        <p class="btn01"><a href="dailyreport"></a></p>
    </section>
	<section>
        <h1>@yield('title2')</h1>
        <table border="1" class="m0a tac">
            <tr> 
                <th>報告日</th>
                <th>件名</th>
                <th>ステータス</th>
            </tr>
            @if (isset($err_msgs1, $err_msgs2, $err_msgs3))
                <tr> 
                @foreach ($err_msgs1 as $err_msg1)
                    <td>{{$err_msg1}}</td>
                @endforeach
                </tr> 
                <tr> 
                @foreach ($err_msgs2 as $err_msg2)
                    <td>{{$err_msg2}}</td>
                @endforeach
                </tr> 
                <tr> 
                @foreach ($err_msgs3 as $err_msg3)
                    <td>{{$err_msg3}}</td>
                @endforeach
                </tr> 
            @endif
        </table>
	</section>
@endsection