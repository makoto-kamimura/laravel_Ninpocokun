@extends('common.layout')

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
        <table border="1" class="m0a tac approval">
            <tr> 
                <th>報告日</th>
                <th>所属</th>
                <th>申請者</th>
                <th>件名</th>
                <th>ステータス</th>
            </tr>
            @if (isset($msgs1, $msgs2, $msgs3))
                <tr> 
                @foreach ($msgs1 as $msg1)
                    <td>{{$msg1}}</td>
                @endforeach
                </tr> 
                <tr> 
                @foreach ($msgs2 as $msg2)
                    <td>{{$msg2}}</td>
                @endforeach
                </tr> 
                <tr> 
                @foreach ($msgs3 as $msg3)
                    <td>{{$msg3}}</td>
                @endforeach
                </tr>
                <tr> 
                @foreach ($msgs4 as $msg4)
                    <td>{{$msg4}}</td>
                @endforeach
                </tr> 
                <tr> 
                @foreach ($msgs5 as $msg5)
                    <td>{{$msg5}}</td>
                @endforeach
                </tr> 
            @endif
        </table>
    </section>
	<section>
        <h1>@yield('title2')</h1>
        <table border="1" class="m0a tac">
            <tr> 
                <th>報告日</th>
                <th>件名</th>
                <th>ステータス</th>
            </tr>
            @if (isset($err_msgs1, $err_msgs2, $err_msgs3, $err_msgs4, $err_msgs5))
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
                <tr> 
                @foreach ($err_msgs4 as $err_msg4)
                    <td>{{$err_msg4}}</td>
                @endforeach
                </tr> 
                <tr> 
                @foreach ($err_msgs5 as $err_msg5)
                    <td>{{$err_msg5}}</td>
                @endforeach
                </tr> 
            @endif
        </table>
	</section>
@endsection