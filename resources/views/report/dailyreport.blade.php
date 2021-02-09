@extends('common.layout')

@section('jq_plugins','')

@section('page_js')
<script src="/js/report/dailyreport.js"></script>
@endsection

@section('title')
  {{$title}}
@endsection

@section('body')
	<section>
        <!-- <h1>@yield('title')</h1> -->
        <h1>日報報告</h1>
        @if ($errors->any())
        <div class="">
            <ul id="error_box">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{route('report.confirm')}}" method="post">
            @csrf
            <!-- <div class="dailytitle">
                <label for="">タイトル</label><br>
                <input type="search" list="list">
                <datalist id="list">
                    <option value="日報確認お願い致します"></option>
                    <option value="日報確認お願い致します"></option>
                    <option value="日報確認お願い致します"></option>
                </datalist>
            </div> -->
        	<div class="">
                <label for="">本日の作業内容</label>
                <textarea cols="70" rows="10" name="sagyou" required placeholder="本日の作業内容">{{ old('sagyou' , $report -> sagyou ) }}</textarea>
            </div>
            <div class="">
                <label for="">進捗状況</label>
                <textarea cols="70" rows="5" name="shintyoku" required  placeholder="進捗状況">{{ old('shintyoku' , $report -> shintyoku ) }}</textarea>
            </div>
            <div class="">
                <label for="">残作業</label>
                <textarea cols="70" rows="5" name="zansagyou" required  placeholder="残作業">{{ old('zansagyou' , $report -> zansagyou ) }}</textarea>
            </div>
            <div class="">
                <label for="">引き継ぎ事項</label>
                <textarea cols="70" rows="5" name="hikitsugi" required  placeholder="引き継ぎ事項">{{ old('hikitsugi' , $report -> hikitsugi ) }}</textarea>
            </div>
            <div class="">
            <!-- 差し戻し時のみ上長のコメント表示を想定_20210125_kamimura-->
            @if(old('comment' , $report -> comment ) == !NULL)
            <div class="comment">
                <label for="">コメント</label>
                <p name="comment"> {{ old( 'comment', $report -> comment) }} </p>
                <input type="hidden" name="comment" value="{{$report -> comment}}">
            </div>
            @endif
            <!--
            <div class="">
                <label for="">添付ファイル</label>
                <input type="file" name="file" multiple="multiple">
            </div>
            -->
			<div class='btn_box tac'>
            	<input id='submit_form' class='btn' type='button' value="確認する">
            </div>
        </form>
	</section>
@endsection