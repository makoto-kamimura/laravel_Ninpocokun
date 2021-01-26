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
        <table id="" class="items sort-table m0a tac" border="1">
        <!--<table class="m0a tac" border="1">-->
            <thead>
                <tr> 
                    <th>報告日</th>
                    <th>作業内容</th>
                    <th class="dailylist_th3">ステータス</th>
                </tr>
            </thead>
            <tbody>
                <tr class="clickable-row item" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-01 10:00</td>
                    <td class="dailylist_td2 dailylist"></td>
                    <td class="dailylist_td3">未承認</td>
                </tr>
                <tr class="clickable-row item" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-02 10:00</td>
                    <td class="dailylist_td2 dailylist"></td>
                    <td class="dailylist_td3">未承認</td>
                </tr>
                <tr class="clickable-row item" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-03 10:00</td>
                    <td class="dailylist_td2 dailylist"></td>
                    <td class="dailylist_td3">承認</td>
                </tr>
                <tr class="clickable-row item" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-04 10:00</td>
                    <td class="dailylist_td2 dailylist"></td>
                    <td class="dailylist_td3">承認</td>
                </tr>
                <tr class="clickable-row item" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-05 10:00</td>
                    <td class="dailylist_td2 dailylist"></td>
                    <td class="dailylist_td3">承認</td>
                </tr>
                <tr class="clickable-row item" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-06 10:00</td>
                    <td class="dailylist_td2 dailylist"></td>
                    <td class="dailylist_td3">承認</td>
                </tr>
                <tr class="clickable-row item" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-07 10:00</td>
                    <td class="dailylist_td2 dailylist"></td>
                    <td class="dailylist_td3">承認</td>
                </tr>
                <tr class="clickable-row item" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-08 10:00</td>
                    <td class="dailylist_td2 dailylist"></td>
                    <td class="dailylist_td3">承認</td>
                </tr>
                <tr class="clickable-row item" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-09 10:00</td>
                    <td class="dailylist_td2 dailylist"></td>
                    <td class="dailylist_td3">承認</td>
                </tr>
                <tr class="clickable-row item" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-10 10:00</td>
                    <td class="dailylist_td2 dailylist"></td>
                    <td class="dailylist_td3">承認</td>
                </tr>
                <tr class="clickable-row item" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-11 10:00</td>
                    <td class="dailylist_td2 dailylist"></td>
                    <td class="dailylist_td3">承認</td>
                </tr>
                <tr class="clickable-row item" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-12 10:00</td>
                    <td class="dailylist_td2 dailylist"></td>
                    <td class="dailylist_td3">承認</td>
                </tr>
                <tr class="clickable-row item" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-13 10:00</td>
                    <td class="dailylist_td2 dailylist"></td>
                    <td class="dailylist_td3">承認</td>
                </tr>
                <tr class="clickable-row item" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-14 10:00</td>
                    <td class="dailylist_td2 dailylist"></td>
                    <td class="dailylist_td3">承認</td>
                </tr>
                <tr class="clickable-row item" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-15 10:00</td>
                    <td class="dailylist_td2 dailylist"></td>
                    <td class="dailylist_td3">承認</td>
                </tr>
                <tr class="clickable-row item" data-href="dailyreport_confirm">
                    <td class="dailylist_td1">2021-01-16 10:00</td>
                    <td class="dailylist_td2 dailylist"></td>
                    <td class="dailylist_td3">承認</td>
                </tr>
                
                <!--
                <tr class="clickable-row item" data-href="dailyreport_confirm"> 
                @foreach ($err_msgs2 as $err_msg2)
                    <td>{{$err_msg2}}</td>
                @endforeach
                </tr>-->
            </tbody>
        </table>
	</section>

@endsection

