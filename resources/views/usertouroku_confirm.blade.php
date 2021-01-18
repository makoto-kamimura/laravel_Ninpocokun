@extends('common.layout')

@section('title')
  {{$title}}
@endsection

@section('id')
  {{$id}}
@endsection

@section('department')
  {{$department}}
@endsection

@section('division')
  {{$division}}
@endsection

@section('position')
  {{$position}}
@endsection

@section('sei1')
  {{$sei1}}
@endsection

@section('mei1')
  {{$mei1}}
@endsection

@section('sei2')
  {{$sei2}}
@endsection

@section('mei2')
  {{$mei2}}
@endsection

@section('email')
  {{$email}}
@endsection

@section('password')
  {{$password}}
@endsection

@section('body')
	<section>
        <h1>@yield('title')</h1>
        <form action="usertouroku_complete" method="post">
            <table>
                <tr>
                    <th>社員番号</th>
                    <td SPAN="2">@yield('id')</td>
                </tr>
                <tr>
                    <th>所属部</th>
                    <td colspan="2">@yield('department')</td>
                </tr>
                <tr>
                    <th>所属課</th>
                    <td colspan="2">@yield('division')</td>
                </tr>
                <tr>
                    <th>役職</th>
                    <td colspan="2">@yield('position')</td>
                </tr>
                <tr>
                    <th>氏名（漢字）</th>
                    <td class="name_td">@yield('sei1')</td>
                    <td>@yield('mei1')</td>
                </tr>                
                <tr>
                    <th>氏名（カナ）</th>
                    <td class="name_td">@yield('sei2')</td>
                    <td>@yield('mei2')</td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td colspan="2">@yield('email')</td>
                </tr>
                <tr>
                    <th>パスワード</th>
                    <td colspan="2"@yield('password')</td>
                </tr>
            </table>

            <div class='btn_box tac'>
                <a href="usertouroku" class="btn_return">戻る</a>
            	<input class='btn' type="submit" value="登録する">
            </div>
        </form>
	</section>
@endsection