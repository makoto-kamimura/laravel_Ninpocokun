{{-- usertouroku_confirm.blade.phpからファイル名変更 --}}

@extends('common.layout')

@section('title')
  {{$title}}
@endsection

@section('body')
	<section>
        <h1>@yield('title')</h1>
        <form action="{{route('user.store')}}" method="post">
          @csrf
            <table>
                <tr>
                    <th>社員コード</th>
                    <td SPAN="2">登録時に自動採番されます</td>
                </tr>
                <tr>
                    <th>所属部門</th>
                    <td colspan="2">{{$_POST['department']}}</td>
                </tr>
                <tr>
                    <th>所属課</th>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <th>役職</th>
                    <td colspan="2">{{$_POST['position']}}</td>
                </tr>
                <tr>
                    <th>氏名（漢字）</th>
                    <td class="name_td">{{$_POST['sei']}}</td>
                    <td>{{$_POST['mei']}}</td>
                </tr>                
                <tr>
                    <th>氏名（カナ）</th>
                    <td class="name_td">{{$_POST['sei_kana']}}</td>
                    <td>{{$_POST['mei_kana']}}</td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td colspan="2">{{$_POST['email']}}</td>
                </tr>
                <tr>
                    <th>パスワード</th>
                    <td colspan="2">{{$_POST['password']}}</td>
                </tr>
            </table>

            <div class='btn_box tac'>
    <table class='btn'>
      <tr>
        <td><input class='btn' type="submit" value="登録する"></td>
        <td><input class='btn' type="submit" value="修正する"></td>
      </tr>
    </table>
    </div>

        </form>
	</section>
@endsection