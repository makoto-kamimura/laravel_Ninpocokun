$(function(){

    // ページネーションの設定
    initPagenation('table.items','tr.item');

    // 行クリックで別ページへ遷移する設定
    addClickEventToElement();
    
});