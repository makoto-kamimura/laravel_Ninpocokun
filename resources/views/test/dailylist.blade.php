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
        <p class="btn01"><a href="dailyreport"></a></p>
    </section>
	<section>
        <h1>@yield('title2')</h1>
        <table id="grid-basic" class="table table-condensed table-hover table-striped m0a tac" border="1">
        <!--<table class="m0a tac" border="1">-->
            <thead>
                <tr> 
                    <th>報告日</th>
                    <th>件名</th>
                    <th>ステータス</th>
                </tr>
            </thead>
            <tbody>
            @if (isset($err_msgs1, $err_msgs2, $err_msgs3))
                <tr class="clickable-row" data-href="dailyreport_confirm">
                @foreach ($err_msgs1 as $err_msg1)
                    <td>{{$err_msg1}}</td>
                @endforeach
                </tr> 
                <tr class="clickable-row" data-href="dailyreport_confirm"> 
                @foreach ($err_msgs2 as $err_msg2)
                    <td>{{$err_msg2}}</td>
                @endforeach
                </tr> 
                <tr class="clickable-row" data-href="dailyreport_confirm"> 
                @foreach ($err_msgs3 as $err_msg3)
                    <td>{{$err_msg3}}</td>
                @endforeach
                </tr>
                <tr class="clickable-row" data-href="dailyreport_confirm"> 
                @foreach ($err_msgs1 as $err_msg1)
                    <td>{{$err_msg1}}</td>
                @endforeach
                </tr> 
                <tr class="clickable-row" data-href="dailyreport_confirm"> 
                @foreach ($err_msgs2 as $err_msg2)
                    <td>{{$err_msg2}}</td>
                @endforeach
                </tr> 
                <tr class="clickable-row" data-href="dailyreport_confirm"> 
                @foreach ($err_msgs3 as $err_msg3)
                    <td>{{$err_msg3}}</td>
                @endforeach
                </tr> 
                <tr class="clickable-row" data-href="dailyreport_confirm"> 
                @foreach ($err_msgs1 as $err_msg1)
                    <td>{{$err_msg1}}</td>
                @endforeach
                </tr> 
                <tr class="clickable-row" data-href="dailyreport_confirm"> 
                @foreach ($err_msgs2 as $err_msg2)
                    <td>{{$err_msg2}}</td>
                @endforeach
                </tr> 
                <tr class="clickable-row" data-href="dailyreport_confirm"> 
                @foreach ($err_msgs3 as $err_msg3)
                    <td>{{$err_msg3}}</td>
                @endforeach
                </tr> 
                <tr class="clickable-row" data-href="dailyreport_confirm"> 
                @foreach ($err_msgs1 as $err_msg1)
                    <td>{{$err_msg1}}</td>
                @endforeach
                </tr> 
                <tr class="clickable-row" data-href="dailyreport_confirm"> 
                @foreach ($err_msgs2 as $err_msg2)
                    <td>{{$err_msg2}}</td>
                @endforeach
                </tr> 
                <tr class="clickable-row" data-href="dailyreport_confirm"> 
                @foreach ($err_msgs3 as $err_msg3)
                    <td>{{$err_msg3}}</td>
                @endforeach
                </tr> 
                <tr class="clickable-row" data-href="dailyreport_confirm"> 
                @foreach ($err_msgs1 as $err_msg1)
                    <td>{{$err_msg1}}</td>
                @endforeach
                </tr> 
                <tr class="clickable-row" data-href="dailyreport_confirm"> 
                @foreach ($err_msgs2 as $err_msg2)
                    <td>{{$err_msg2}}</td>
                @endforeach
                </tr> 
                <tr class="clickable-row" data-href="dailyreport_confirm"> 
                @foreach ($err_msgs3 as $err_msg3)
                    <td>{{$err_msg3}}</td>
                @endforeach
                </tr> 
                <tr class="clickable-row" data-href="dailyreport_confirm"> 
                @foreach ($err_msgs1 as $err_msg1)
                    <td>{{$err_msg1}}</td>
                @endforeach
                </tr> 
                <tr class="clickable-row" data-href="dailyreport_confirm"> 
                @foreach ($err_msgs2 as $err_msg2)
                    <td>{{$err_msg2}}</td>
                @endforeach
                </tr> 
                <tr class="clickable-row" data-href="dailyreport_confirm"> 
                @foreach ($err_msgs3 as $err_msg3)
                    <td>{{$err_msg3}}</td>
                @endforeach
                </tr>
                <tr class="clickable-row" data-href="dailyreport_confirm"> 
                @foreach ($err_msgs2 as $err_msg2)
                    <td>{{$err_msg2}}</td>
                @endforeach
                </tr> 
                <tr class="clickable-row" data-href="dailyreport_confirm"> 
                @foreach ($err_msgs3 as $err_msg3)
                    <td>{{$err_msg3}}</td>
                @endforeach
                </tr> 
            @endif
            </tbody>
        </table>
	</section>
@endsection

