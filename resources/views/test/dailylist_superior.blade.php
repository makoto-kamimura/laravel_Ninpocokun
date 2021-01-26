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

@section('belong1')
  {{$belong1}}
@endsection

@section('belong2')
  {{$belong2}}
@endsection

@section('belong3')
  {{$belong3}}
@endsection

@section('name1')
  {{$name1}}
@endsection

@section('name2')
  {{$name2}}
@endsection

@section('name3')
  {{$name3}}
@endsection

@section('body')
    <section>
	    <h1>@yield('title1')</h1>
        <!--
        <aside>
            <p class="notice"><a href="/home">@yield('belong1') @yield('name1')の承認申請依頼が届きました。</a><span>×</span></p>
            <p class="notice"><a href="/home">@yield('belong2') @yield('name2')の承認申請依頼が届きました。</a><span>×</span></p>
            <p class="notice"><a href="/home">@yield('belong3') @yield('name3')の承認申請依頼が届きました。</a><span>×</span></p>
        </aside>
        -->
        <table class="items sort-table m0a tac approval" border="1">
            <thead>
                <tr> 
                    <th>報告日</th>
                    <th>所属部署</th>
                    <th>申請者</th>
                    <th>作業内容</th>
                    <th>ステータス</th>
                </tr>
            </thead>
            <tbody>
            <!--@if (isset($msgs1, $msgs2, $msgs3, $err_msgs4, $err_msgs5))-->
                <tr class="clickable-row item" data-href="dailyreport_confirm_superior"> 
                    <td>2021-01-01 10:00</td>
                    <td>営業部一課</td>
                    <td>山田太郎</td>
                    <td class="dailylist">作業報告</td>
                    <td>未承認</td>
                </tr>
                <tr class="clickable-row item" data-href="dailyreport_confirm_superior"> 
                    <td>2021-01-02 10:00</td>
                    <td>営業部一課</td>
                    <td>山田太郎</td>
                    <td class="dailylist">作業報告</td>
                    <td>未承認</td>
                </tr> 
                <tr class="clickable-row item" data-href="dailyreport_confirm_superior"> 
                    <td>2021-01-03 10:00</td>
                    <td>営業部一課</td>
                    <td>山田太郎</td>
                    <td class="dailylist">作業報告</td>
                    <td>承認</td>
                </tr> 
                <tr class="clickable-row item" data-href="dailyreport_confirm_superior"> 
                    <td>2021-01-04 10:00</td>
                    <td>営業部一課</td>
                    <td>山田太郎</td>
                    <td class="dailylist">作業報告</td>
                    <td>承認</td>
                </tr>
                <tr class="clickable-row item" data-href="dailyreport_confirm_superior"> 
                    <td>2021-01-05 10:00</td>
                    <td>営業部一課</td>
                    <td>山田太郎</td>
                    <td class="dailylist">作業報告</td>
                    <td>承認</td>
                </tr>
                <tr class="clickable-row item" data-href="dailyreport_confirm_superior"> 
                    <td>2021-01-06 10:00</td>
                    <td>営業部一課</td>
                    <td>山田太郎</td>
                    <td class="dailylist">作業報告</td>
                    <td>承認</td>
                </tr> 
                <tr class="clickable-row item" data-href="dailyreport_confirm_superior"> 
                    <td>2021-01-07 10:00</td>
                    <td>営業部一課</td>
                    <td>山田太郎</td>
                    <td class="dailylist">作業報告</td>
                    <td>承認</td>
                </tr> 
                <tr class="clickable-row item" data-href="dailyreport_confirm_superior"> 
                    <td>2021-01-08 10:00</td>
                    <td>営業部一課</td>
                    <td>山田太郎</td>
                    <td class="dailylist">作業報告</td>
                    <td>承認</td>
                </tr> 
                <tr class="clickable-row item" data-href="dailyreport_confirm_superior"> 
                    <td>2021-01-09 10:00</td>
                    <td>営業部一課</td>
                    <td>山田太郎</td>
                    <td class="dailylist">作業報告</td>
                    <td>承認</td>
                </tr> 
                <tr class="clickable-row item" data-href="dailyreport_confirm_superior"> 
                    <td>2021-01-10 10:00</td>
                    <td>営業部一課</td>
                    <td>山田太郎</td>
                    <td class="dailylist">作業報告</td>
                    <td>承認</td>
                </tr> 
                <tr class="clickable-row item" data-href="dailyreport_confirm_superior"> 
                    <td>2021-01-11 10:00</td>
                    <td>営業部一課</td>
                    <td>山田太郎</td>
                    <td class="dailylist">作業報告</td>
                    <td>承認</td>
                </tr> 

                <!--
                <tr class="clickable-row item" data-href="dailyreport_confirm_superior"> 
                @foreach ($msgs5 as $msg5)
                    <td>{{$msg5}}</td>
                @endforeach
                </tr>
            @endif-->
            </tbody>
        </table>
    </section>
	<section>
        <h1>@yield('title2')</h1>
        <table class="items sort-table m0a tac general" border="1">
            <thead>
                <tr> 
                    <th>報告日</th>
                    <th>所属部署</th>
                    <th>申請者</th>
                    <th>作業内容</th>
                    <th>ステータス</th>
                </tr>
            </thead>
            <tbody>
            <!--@if (isset($err_msgs1, $err_msgs2, $err_msgs3, $err_msgs4, $err_msgs5))-->
                <tr class="clickable-row item" data-href="dailyreport_confirm_superior"> 
                    <td>2021-01-01 10:00</td>
                    <td>営業部一課</td>
                    <td>山田太郎</td>
                    <td class="dailylist">作業報告</td>
                    <td>未承認</td>
                </tr>
                <tr class="clickable-row item" data-href="dailyreport_confirm_superior"> 
                    <td>2021-01-02 10:00</td>
                    <td>営業部一課</td>
                    <td>山田太郎</td>
                    <td class="dailylist">作業報告</td>
                    <td>未承認</td>
                </tr> 
                <tr class="clickable-row item" data-href="dailyreport_confirm_superior"> 
                    <td>2021-01-03 10:00</td>
                    <td>営業部一課</td>
                    <td>山田太郎</td>
                    <td class="dailylist">作業報告</td>
                    <td>承認</td>
                </tr> 
                <tr class="clickable-row item" data-href="dailyreport_confirm_superior"> 
                    <td>2021-01-04 10:00</td>
                    <td>営業部一課</td>
                    <td>山田太郎</td>
                    <td class="dailylist">作業報告</td>
                    <td>承認</td>
                </tr>
                <tr class="clickable-row item" data-href="dailyreport_confirm_superior"> 
                    <td>2021-01-05 10:00</td>
                    <td>営業部一課</td>
                    <td>山田太郎</td>
                    <td class="dailylist">作業報告</td>
                    <td>承認</td>
                </tr>
                <tr class="clickable-row item" data-href="dailyreport_confirm_superior"> 
                    <td>2021-01-06 10:00</td>
                    <td>営業部一課</td>
                    <td>山田太郎</td>
                    <td class="dailylist">作業報告</td>
                    <td>承認</td>
                </tr> 
                <tr class="clickable-row item" data-href="dailyreport_confirm_superior"> 
                    <td>2021-01-07 10:00</td>
                    <td>営業部一課</td>
                    <td>山田太郎</td>
                    <td class="dailylist">作業報告</td>
                    <td>承認</td>
                </tr> 
                <tr class="clickable-row item" data-href="dailyreport_confirm_superior"> 
                    <td>2021-01-08 10:00</td>
                    <td>営業部一課</td>
                    <td>山田太郎</td>
                    <td class="dailylist">作業報告</td>
                    <td>承認</td>
                </tr> 
                <tr class="clickable-row item" data-href="dailyreport_confirm_superior"> 
                    <td>2021-01-09 10:00</td>
                    <td>営業部一課</td>
                    <td>山田太郎</td>
                    <td class="dailylist">作業報告</td>
                    <td>承認</td>
                </tr> 
                <tr class="clickable-row item" data-href="dailyreport_confirm_superior"> 
                    <td>2021-01-10 10:00</td>
                    <td>営業部一課</td>
                    <td>山田太郎</td>
                    <td class="dailylist">作業報告</td>
                    <td>承認</td>
                </tr> 
                <tr class="clickable-row item" data-href="dailyreport_confirm_superior"> 
                    <td>2021-01-11 10:00</td>
                    <td>営業部一課</td>
                    <td>山田太郎</td>
                    <td class="dailylist">作業報告</td>
                    <td>承認</td>
                </tr> 

                <!--
                <tr class="status clickable-row item" data-href="dailyreport_confirm"> 
                @foreach ($err_msgs5 as $err_msg5)
                    <td>{{$err_msg5}}</td>
                @endforeach
                </tr>
            @endif-->
            </tbody>
        </table>
	</section>

@endsection