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
        <table class="sort-table m0a tac" border="1">
        <!--<table class="m0a tac" border="1">-->
            <thead>
                <tr> 
                    <th>報告日</th>
                    <th>作業内容</th>
                    <th class="dailylist_th3">ステータス</th>
                </tr>
            </thead>
            <tbody>
            @if (isset($err_msgs1, $err_msgs2, $err_msgs3))
                <tr class="clickable-row" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-07 10:00</td>
                    <td class="dailylist_td2 dailylist"></td>
                    <td class="dailylist_td3">未承認</td>
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
    <script>
        $(function(){
            $('.sort-table').tablesorter({
                textExtraction: function(node){
                    var attr = $(node).attr('data-value');
                    if(typeof attr !== 'undefined' && attr !== false){
                        return attr;
                    }
                    return $(node).text();
                }
            });
        });
    </script>
@endsection

