{{-- user.blade.phpからadmin.blade.phpに変更 --}}
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
        <p class="btn04"><a href="{{route('user.create')}}"></a></p>
    </section>
	<section>
        <h1>@yield('title2')</h1>
        <table border="1" class="m0a tac approval">
            <tr> 
                <th>社員コード</th>
                <th>所属部門/所属課</th>
                <th>名前</th>
                <th>退職日</th>
                <th>システム管理者</th>
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