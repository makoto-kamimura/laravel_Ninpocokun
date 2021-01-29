{{-- dailylist.blade.phpからlist.blade.phpに変更 --}}
@extends('common.layout')

@section('jq_plugins')
<script src="/js/jquery.pagination.js"></script> 
<script src="/js/jquery.tablesorter.min.js"></script>
@endsection

@section('page_js')
<script src="/js/report/list.js"></script>
@endsection

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
            @if (isset($reports))
                @foreach($reports as $report)
                <tr class="item clickable-row" data-href="/report/{{$report->no}}/edit">
                    <td class="dailylist_td1">{{$report -> created_at}}</td>
                    <td class="dailylist_td2 dailylist">{{$report -> sagyou}}</td>
                    <td class="dailylist_td3">{{$report -> name}}</td>
                </tr>
                @endforeach
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
            @if (isset($reports2))
                @foreach($reports2 as $report2)
                <tr class="item clickable-row" data-href="/report/{{$report2->no}}">
                    <td class="dailylist_td1">{{$report2 -> created_at}}</td>
                    <td class="dailylist_td2 dailylist">{{$report2 -> sagyou}}</td>
                    <td class="dailylist_td3">{{$report2 -> name}}</td>
                </tr>
                @endforeach
            @endif
            </tbody>
        </table>
	</section>
@endsection

