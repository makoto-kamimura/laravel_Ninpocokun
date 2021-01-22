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
        <table class="sort-table m0a tac approval" border="1">
            <thead>
                <tr> 
                    <th>報告日</th>
                    <th>所属部署</th>
                    <th>申請者</th>
                    <th>作業内容</th>
                    <th>ステータス</th>
                </tr>
            </thead>
            @if (isset($msgs1, $msgs2, $msgs3, $err_msgs4, $err_msgs5))
            <tbody>
                <tr class="clickable-row" data-href="dailyreport_confirm_superior"> 
                    <td>2021-01-07 10:00</td>
                    <td>営業部一課</td>
                    <td>山田太郎</td>
                    <td class="dailylist">作業報告</td>
                    <td>未承認</td>
                </tr> 
                <tr class="clickable-row" data-href="dailyreport_confirm_superior"> 
                @foreach ($msgs2 as $msg2)
                    <td>{{$msg2}}</td>
                @endforeach
                </tr> 
                <tr class="clickable-row" data-href="dailyreport_confirm_superior"> 
                @foreach ($msgs3 as $msg3)
                    <td>{{$msg3}}</td>
                @endforeach
                </tr>
                <tr class="clickable-row" data-href="dailyreport_confirm_superior"> 
                @foreach ($msgs4 as $msg4)
                    <td>{{$msg4}}</td>
                @endforeach
                </tr> 
                <tr class="clickable-row" data-href="dailyreport_confirm_superior"> 
                @foreach ($msgs5 as $msg5)
                    <td>{{$msg5}}</td>
                @endforeach
                </tr>
            </tbody>
            @endif
        </table>
    </section>
	<section>
        <h1>@yield('title2')</h1>
        <table class="sort-table m0a tac general" border="1">
            <tr> 
                <th>報告日</th>
                <th>所属部署</th>
                <th>申請者</th>
                <th>作業内容</th>
                <th>ステータス</th>
            </tr>
            @if (isset($err_msgs1, $err_msgs2, $err_msgs3, $err_msgs4, $err_msgs5))
                <tr class="clickable-row" data-href="dailyreport_confirm_superior"> 
                    <td>2021-01-07 10:00</td>
                    <td>営業部一課</td>
                    <td>山田太郎</td>
                    <td class="dailylist">作業報告</td>
                    <td>未承認</td>
                </tr> 
                <tr class="status clickable-row" data-href="dailyreport_confirm"> 
                @foreach ($err_msgs2 as $err_msg2)
                    <td>{{$err_msg2}}</td>
                @endforeach
                </tr> 
                <tr class="status clickable-row" data-href="dailyreport_confirm"> 
                @foreach ($err_msgs3 as $err_msg3)
                    <td>{{$err_msg3}}</td>
                @endforeach
                </tr>
                <tr class="status clickable-row" data-href="dailyreport_confirm"> 
                @foreach ($err_msgs4 as $err_msg4)
                    <td>{{$err_msg4}}</td>
                @endforeach
                </tr> 
                <tr class="status clickable-row" data-href="dailyreport_confirm"> 
                @foreach ($err_msgs5 as $err_msg5)
                    <td>{{$err_msg5}}</td>
                @endforeach
                </tr> 
            @endif
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