{{-- dailylist.blade.phpからlist.blade.phpに変更 --}}
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
        <table class="items sort-table m0a tac" border="1">
        <!--<table class="m0a tac" border="1">-->
            <thead>
                <tr> 
                    <th>報告日</th>
                    <th>件名</th>
                    <th class="dailylist_th3">ステータス</th>
                </tr>
            </thead>
            <tbody>
            @if (isset($err_msgs1, $err_msgs2, $err_msgs3))
                <tr class="item clickable-row" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-07 10:00</td>
                    <td class="dailylist_td2 dailylist">作業内容が表示されます作業内容が表示されます作業内容が表示されます</td>
                    <td class="dailylist_td3">未承認</td>
                </tr>
                <tr class="item clickable-row" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-08 10:00</td>
                    <td class="dailylist_td2 dailylist">作業内容が表示されます作業内容が表示されます作業内容が表示されます</td>
                    <td class="dailylist_td3">未承認</td>
                </tr>
                <tr class="item clickable-row" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-09 10:00</td>
                    <td class="dailylist_td2 dailylist">作業内容が表示されます作業内容が表示されます作業内容が表示されます</td>
                    <td class="dailylist_td3">未承認</td>
                </tr>
                <tr class="item clickable-row" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-10 10:00</td>
                    <td class="dailylist_td2 dailylist">作業内容が表示されます作業内容が表示されます作業内容が表示されます</td>
                    <td class="dailylist_td3">未承認</td>
                </tr>
                <tr class="item clickable-row" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-11 10:00</td>
                    <td class="dailylist_td2 dailylist">作業内容が表示されます作業内容が表示されます作業内容が表示されます</td>
                    <td class="dailylist_td3">未承認</td>
                </tr>
                <tr class="item clickable-row" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-12 10:00</td>
                    <td class="dailylist_td2 dailylist">作業内容が表示されます作業内容が表示されます作業内容が表示されます</td>
                    <td class="dailylist_td3">未承認</td>
                </tr>
                <tr class="item clickable-row" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-13 10:00</td>
                    <td class="dailylist_td2 dailylist">作業内容が表示されます作業内容が表示されます作業内容が表示されます</td>
                    <td class="dailylist_td3">未承認</td>
                </tr>
                <tr class="item clickable-row" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-14 10:00</td>
                    <td class="dailylist_td2 dailylist">作業内容が表示されます作業内容が表示されます作業内容が表示されます</td>
                    <td class="dailylist_td3">未承認</td>
                </tr>
            @endif
            </tbody>
        </table>
        <!-- 202画面にて遷移ボタンがある為修正、コメントアウト対応_210125_kamimura-->
        <!-- <p class="btn01"><a href="{{route('report.create')}}"></a></p> -->
    </section>
	<section>
        <h1>@yield('title2')</h1>
        <table class="items sort-table m0a tac" border="1">
        <!--<table class="m0a tac" border="1">-->
            <thead>
                <tr> 
                    <th>報告日</th>
                    <th>件名</th>
                    <th class="dailylist_th3">ステータス</th>
                </tr>
             </thead>
             <tbody>
            @if (isset($err_msgs1, $err_msgs2, $err_msgs3))
                <tr class="item clickable-row" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-07 10:00</td>
                    <td class="dailylist_td2 dailylist">作業内容が表示されます作業内容が表示されます作業内容が表示されます</td>
                    <td class="dailylist_td3">完了</td>
                </tr>
                <tr class="item clickable-row" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-08 10:00</td>
                    <td class="dailylist_td2 dailylist">作業内容が表示されます作業内容が表示されます作業内容が表示されます</td>
                    <td class="dailylist_td3">完了</td>
                </tr>
                <tr class="item clickable-row" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-09 10:00</td>
                    <td class="dailylist_td2 dailylist">作業内容が表示されます作業内容が表示されます作業内容が表示されます</td>
                    <td class="dailylist_td3">完了</td>
                </tr>
                <tr class="item clickable-row" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-10 10:00</td>
                    <td class="dailylist_td2 dailylist">作業内容が表示されます作業内容が表示されます作業内容が表示されます</td>
                    <td class="dailylist_td3">完了</td>
                </tr>
                <tr class="item clickable-row" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-11 10:00</td>
                    <td class="dailylist_td2 dailylist">作業内容が表示されます作業内容が表示されます作業内容が表示されます</td>
                    <td class="dailylist_td3">完了</td>
                </tr>
                <tr class="item clickable-row" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-12 10:00</td>
                    <td class="dailylist_td2 dailylist">作業内容が表示されます作業内容が表示されます作業内容が表示されます</td>
                    <td class="dailylist_td3">完了</td>
                </tr>
                <tr class="item clickable-row" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-13 10:00</td>
                    <td class="dailylist_td2 dailylist">作業内容が表示されます作業内容が表示されます作業内容が表示されます</td>
                    <td class="dailylist_td3">完了</td>
                </tr>
                <tr class="item clickable-row" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-14 10:00</td>
                    <td class="dailylist_td2 dailylist">作業内容が表示されます作業内容が表示されます作業内容が表示されます</td>
                    <td class="dailylist_td3">完了</td>
                </tr>
            @endif
            </tbody>
        </table>
	</section>
    <script>

$('table.items').pagination({
            itemElement : '> > tr.item' // アイテムの要素
        });

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

