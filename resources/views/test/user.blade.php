@extends('common.layout')

@section('tagu')
  {{$tagu}}
@endsection

@section('title2')
  {{$title2}}
@endsection

@section('body')
    <section>
	    <!--<h1>■@yield('title1')</h1>-->
        <p class="btn04"><a href="usertouroku"></a></p>
    </section>
	<section>
        <h1>@yield('title2')</h1>
        <table class="items sort-table m0a tac approval" border="1">
            <thead>
                <tr> 
                    <th>社員番号</th>
                    <th>所属部署</th>
                    <th>氏名</th>
                    <th>退職日</th>
                    <th>情シス</th>
                </tr>
            </thead>
            <tbody>
            <!--@if (isset($msgs1, $msgs2, $msgs3))-->
                <tr class="clickable-row item" data-href="usertouroku_confirm"> 
                    <td>0001</td>
                    <td>代表取締役</td>
                    <td>表三郎</td>
                    <td>ー</td>
                    <td>×</td>
                </tr>
                <tr class="clickable-row item" data-href="usertouroku_confirm"> 
                    <td>0002</td>
                    <td>専務取締役</td>
                    <td>表四郎</td>
                    <td>ー</td>
                    <td>×</td>
                </tr> 
                <tr class="clickable-row item" data-href="usertouroku_confirm"> 
                    <td>0003</td>
                    <td>常務取締役</td>
                    <td>表五郎</td>
                    <td>ー</td>
                    <td>×</td>
                </tr> 
                <tr class="clickable-row item" data-href="usertouroku_confirm"> 
                    <td>0004</td>
                    <td>本部長</td>
                    <td>山田太郎</td>
                    <td>ー</td>
                    <td>×</td>
                </tr> 
                <tr class="clickable-row item" data-href="usertouroku_confirm"> 
                    <td>0005</td>
                    <td>総務部長</td>
                    <td>宗武蔵</td>
                    <td>ー</td>
                    <td>×</td>
                </tr>
                <tr class="clickable-row item" data-href="usertouroku_confirm"> 
                    <td>0006</td>
                    <td>営業部長</td>
                    <td>英仰角</td>
                    <td>ー</td>
                    <td>×</td>
                </tr> 
                <tr class="clickable-row item" data-href="usertouroku_confirm"> 
                    <td>0007</td>
                    <td>工務部長</td>
                    <td>幸村田</td>
                    <td>ー</td>
                    <td>×</td>
                </tr> 
                <tr class="clickable-row item" data-href="usertouroku_confirm"> 
                    <td>0008</td>
                    <td>総務課長</td>
                    <td>さだまさし</td>
                    <td>ー</td>
                    <td>×</td>
                </tr> 
                <tr class="clickable-row item" data-href="usertouroku_confirm"> 
                    <td>0009</td>
                    <td>営業課長</td>
                    <td>武田鉄矢</td>
                    <td>ー</td>
                    <td>×</td>
                </tr> 
                <tr class="clickable-row item" data-href="usertouroku_confirm"> 
                    <td>0010</td>
                    <td>工務課長</td>
                    <td>松本人志</td>
                    <td>ー</td>
                    <td>×</td>
                </tr> 
                <tr class="clickable-row item" data-href="usertouroku_confirm"> 
                    <td>0011</td>
                    <td>情報システム課</td>
                    <td>橋本環奈</td>
                    <td>21-01-20</td>
                    <td>○</td>
                </tr> 
 
                <!--
                <tr class="clickable-row item"> 
                @foreach ($msgs5 as $msg5)
                    <td>{{$msg5}}</td>
                @endforeach
                </tr> 
            @endif-->
            </tbody>
        </table>
	</section>

@endsection