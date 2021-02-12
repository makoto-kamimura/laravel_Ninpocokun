{{-- usertouroku_confirm.blade.phpからファイル名変更 --}}

@extends('common.layout')

@section('jq_plugins','')

@section('page_js')
<script src="/js/auth/confirm.js"></script>
@endsection

@section('title')
  {{$title}}
@endsection

@section('body')
	<section>
        <h1>@yield('title')</h1>
        <form action="{{route('user.store')}}" method="post">
          @csrf
            <table class="confirm">
                <tr>
                    <th>社員コード</th>
                    <td colspan="2">
                        @isset($user['cd'])
                        {{ $user['cd'] }}
                        @else
                        登録時に自動採番されます
                        @endisset
                    </td>
                </tr>
                <tr>
                    <th>所属部門</th>
                    <td colspan="2">{{ $de }}</td>
                </tr>
                @isset($user['division'])
                <tr>
                    <th>所属課</th>
                    <td colspan="2">{{ $di }}</td>
                    <input type="hidden" name="division" value="{{$user['division']}}">
                </tr>
                @endisset
                <tr>
                    <th>役職</th>
                    <td colspan="2">{{ $po }}</td>
                </tr>
                @isset($user['taishoku_date'])
                <tr>
                    <th>退職日</th>
                    <td colspan="2">{{ $user['taishoku_date'] }}</td>
                </tr>
                @endisset
                <tr>
                    <th>システム管理者</th>
                    @if($user['sys_admin'] == 1)
                    <td colspan="2">　○　</td>
                    @else
                    <td colspan="2">　×　</td>
                    @endif
                    <input type="hidden" name="sys_admin" value="{{ $user['sys_admin'] }}">
                </tr>
                <tr>
                    <th>氏名（漢字）</th>
                    <td class="name_td">{{ $user['sei'] }}</td>
                    <td>{{ $user['mei'] }}</td>
                </tr>                
                <tr>
                    <th>氏名（カナ）</th>
                    <td class="name_td">{{ $user['sei_kana'] }}</td>
                    <td>{{ $user['mei_kana'] }}</td>
                </tr>
                <tr>
                    <th>パスワード</th>
                    <td colspan="2">{{$user['password']}}</td>
                </tr>
            </table>
            {{-- リダイレクト先に値を渡す為 --}}
            <div class="hidden">
                @isset($user['cd'])
                <input type="hidden" name="cd" value="{{$user['cd']}}">
                @endisset
                <input type="hidden" name="department" value="{{ $user['department'] }}">
                <input type="hidden" name="position" value="{{ $user['position'] }}">
                <input type="hidden" name="taishoku_date" value="{{ $user['taishoku_date'] }}">
                <input type="hidden" name="sei" value="{{ $user['sei'] }}">
                <input type="hidden" name="mei" value="{{ $user['mei'] }}">
                <input type="hidden" name="sei_kana" value="{{ $user['sei_kana'] }}">
                <input type="hidden" name="mei_kana" value="{{ $user['mei_kana'] }}">
            </div>

            <div class='btn_box tac'>
                <table class='btn'>
                <tr>
                    <td><input class='btn' type="submit" name="submit" value="登録する"></td>
                    <td><input class='btn btn2' type="submit" name="submit" value="修正する"></td>
                </tr>
                </table>
            </div>

        </form>
	</section>
@endsection