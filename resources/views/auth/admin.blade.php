{{-- user.blade.phpからadmin.blade.phpに変更 --}}
@extends('common.layout')

@section('jq_plugins')
<script src="/js/jquery.pagination.js"></script> 
<script src="/js/jquery.tablesorter.min.js"></script>
@endsection

@section('page_js')
<script src="/js/auth/admin.js"></script>
@endsection

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
        <table border="1" class="m0a tac approval items">
            <tr> 
                <th>社員コード</th>
                <th>所属部門/所属課</th>
                <th>名前</th>
                <th>退職日</th>
                <th>システム管理者</th>
            </tr>
            @if (isset($users))
            @foreach ($users as $user)
            <tr  class="item" data-href="/auth/edit/{{$user->user_cd}}">
                <td>{{$user->user_disp_cd}}</td>
                <td>{{$user->dep_div_name}}</td>
                <td>{{$user->user_name}}</td>
                <td>{{$user->taishoku_date}}</td>
                <td>{{$user->sys_admin}}</td>
            </tr>
            @endforeach 
            @endif
        </table>
	</section>
@endsection