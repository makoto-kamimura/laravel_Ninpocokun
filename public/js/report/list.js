$(function(){

    // ページネーションの設定
    initPagenation('table.items','tr.item');

    // 行クリックで別ページへ遷移する設定
    addClickEventToElement();


    // ウィンドウロード時のイベント登録
    $(window).on('load',function() {
        // '未承認'が含まれるかどうか確認 ←Blade側でするべきかと思われる
        $('td:contains("未承認")').css('color', 'red').wrapInner('<a />');
    });

    
});