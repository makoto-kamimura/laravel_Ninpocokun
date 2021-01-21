@extends('common.layout')

@section('tagu')
  {{$tagu}}
@endsection

@section('title2')
  {{$title2}}
@endsection

@section('body')
    <section>
	    <!--<h1>■@yield('title1')</h1>-->
        <p class="btn04"><a href="usertouroku"></a></p>
    </section>
	<section>
        <h1>@yield('title2')</h1>
        <table border="1" class="m0a tac approval">
            <tr> 
                <th>社員番号</th>
                <th>所属部署</th>
                <th>氏名</th>
                <th>退職日</th>
                <th>情シス</th>
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
@endsection