{{-- dailylist_superior.blade.phpをapprove.blade.phpに変更 --}}

@extends('common.layout')

@section('jq_plugins')
<script src="/js/jquery.pagination.js"></script> 
<script src="/js/jquery.tablesorter.min.js"></script>
@endsection

@section('page_js')
<script src="/js/report/approve.js"></script>
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
        <table class="items sort-table m0a tac approval" border="1">
            <thead>
                <tr>
                    <th style="display:none">no</th>  
                    <th>報告日</th>
                    <th>所属部署</th>
                    <th>申請者</th>
                    <th>件名</th>
                    <th>ステータス</th>
                </tr>
            </thead>
            @if (isset($reports))
            <tbody>
                @foreach($reports as $report)
                <tr class="item clickable-row" data-href="/report/{{$report -> no}}">
                    <td style="display:none">{{$report -> no}}</td>  
                    <td>{{$report -> created_at}}</td>
                    <td>{{$report -> dep_div_name}}</td>
                    <td>{{$report -> user_name}}</td>
                    <td class="dailylist">{{$report -> sagyou}}</td>
                    <td>{{$report -> stat_name}} </td>
                </tr>
                @endforeach 
            </tbody>
            @endif
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
                    <th>件名</th>
                    <th>ステータス</th>
                </tr>
            </thead>
            @if (isset($reports2))
            <tbody>
                @foreach($reports2 as $report2)
                <tr class="item clickable-row" data-href="/report/{{$report2 -> no}}"> 
                    <td>{{$report2 -> created_at}}</td>
                    <td>{{$report2 -> dep_div_name}}</td>
                    <td>{{$report2 -> user_name}}</td>
                    <td class="dailylist">{{$report2 -> sagyou}}</td>
                    <td>{{$report2 -> stat_name}}</td>
                </tr>
                @endforeach 
            @endif
            </tbody>
        </table>
	</section>
@endsection