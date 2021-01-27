{{-- dailylist_superior.blade.phpをapprove.blade.phpに変更 --}}

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
        <table class="items sort-table m0a tac approval" border="1">
            <thead>
                <tr> 
                    <th>報告日</th>
                    <th>所属部署</th>
                    <th>申請者</th>
                    <th>件名</th>
                    <th>ステータス</th>
                </tr>
            </thead>
            @if (isset($msgs1, $msgs2, $msgs3, $err_msgs4, $err_msgs5))
            <tbody>
            <tr class="item clickable-row" data-href="dailyreport_confirm"> 
                    <td>2021-01-07 10:00</td>
                    <td>営業部一課</td>
                    <td>山田太郎</td>
                    <td class="dailylist">作業報告が表示されます作業報告が表示されます作業報告が表示されます</td>
                    <td>未承認</td>
                </tr> 
                <tr class="item clickable-row" data-href="dailyreport_confirm"> 
                    <td>2021-01-08 10:00</td>
                    <td>営業部二課</td>
                    <td>山田一郎</td>
                    <td class="dailylist">作業報告が表示されます作業報告が表示されます作業報告が表示されます</td>
                    <td>未承認</td>
                </tr> 
                <tr class="item clickable-row" data-href="dailyreport_confirm"> 
                    <td>2021-01-09 10:00</td>
                    <td>営業部一課</td>
                    <td>山田次郎</td>
                    <td class="dailylist">作業報告が表示されます作業報告が表示されます作業報告が表示されます</td>
                    <td>未承認</td>
                </tr> 
                <tr class="item clickable-row" data-href="dailyreport_confirm"> 
                    <td>2021-01-10 10:00</td>
                    <td>営業部一課</td>
                    <td>山田三郎</td>
                    <td class="dailylist">作業報告が表示されます作業報告が表示されます作業報告が表示されます</td>
                    <td>未承認</td>
                </tr> 
                <tr class="item clickable-row" data-href="dailyreport_confirm"> 
                    <td>2021-01-11 10:00</td>
                    <td>営業部一課</td>
                    <td>山田四郎</td>
                    <td class="dailylist">作業報告が表示されます作業報告が表示されます作業報告が表示されます</td>
                    <td>未承認</td>
                </tr> 
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
            @if (isset($err_msgs1, $err_msgs2, $err_msgs3, $err_msgs4, $err_msgs5))
            <tbody>
                <tr class="item clickable-row" data-href="dailyreport_confirm"> 
                    <td>2021-01-07 10:00</td>
                    <td>営業部一課</td>
                    <td>山田太郎</td>
                    <td class="dailylist">作業報告が表示されます作業報告が表示されます作業報告が表示されます</td>
                    <td>完了</td>
                </tr> 
                <tr class="item clickable-row" data-href="dailyreport_confirm"> 
                    <td>2021-01-08 10:00</td>
                    <td>営業部二課</td>
                    <td>山田一郎</td>
                    <td class="dailylist">作業報告が表示されます作業報告が表示されます作業報告が表示されます</td>
                    <td>完了</td>
                </tr> 
                <tr class="item clickable-row" data-href="dailyreport_confirm"> 
                    <td>2021-01-09 10:00</td>
                    <td>営業部一課</td>
                    <td>山田次郎</td>
                    <td class="dailylist">作業報告が表示されます作業報告が表示されます作業報告が表示されます</td>
                    <td>完了</td>
                </tr> 
                <tr class="item clickable-row" data-href="dailyreport_confirm"> 
                    <td>2021-01-10 10:00</td>
                    <td>営業部一課</td>
                    <td>山田三郎</td>
                    <td class="dailylist">作業報告が表示されます作業報告が表示されます作業報告が表示されます</td>
                    <td>完了</td>
                </tr> 
                <tr class="item clickable-row" data-href="dailyreport_confirm"> 
                    <td>2021-01-11 10:00</td>
                    <td>営業部一課</td>
                    <td>山田四郎</td>
                    <td class="dailylist">作業報告が表示されます作業報告が表示されます作業報告が表示されます</td>
                    <td>完了</td>
                </tr> 
            @endif
            </tbody>
        </table>
	</section>
    <script>

        $('table.items').pagination({
            itemElement : '> > tr.item' // アイテムの要素
        });

        $(function(){
            $('.sort-table').tablesorter({
                textExtraction: function(node){
                    var attr = $(node).attr('data-value');
                    if(typeof attr !== 'undefined' && attr !== false){
                        return attr;
                    }
                    return $(node).text();
                }
            });
        });
    </script>
@endsection