

/**
 * パスワードの表示/非表示を切り替えるイベントを登録
 * @param {String} toggleElemSelector 切替を行う要素のセレクタ
 * @param {String} targetElemSelector 操作対象要素のセレクタ
 */
function passwordFieldToggle(toggleElemSelector,targetElemSelector){
    $(toggleElemSelector)
    .on('change',
      function() {
          if($(toggleElemSelector).prop('checked')) {
            $(targetElemSelector).attr({'type':'text'});
          } else {
            $(targetElemSelector).attr({'type':'password'});
          }
      }
    )
}


/**
 * ajax通信のベースとなるメソッド
 * @param {Array[6]} params 
 * [0]:{String} url
 * [1]:{String} type(POST,GET等)
 * [2]:{Map} 送信するデータ(「キー名: 値」のハッシュ形式）
 * [3]:{function}成功時に実行する関数。 無名関数を代入(function(data){～} )
 * [4]:{function}失敗時に実行する関数。 無名関数を代入(function(data){～} )
 * [5]:{function}通信後、成功失敗いずれの場合でも実行する関数。 無名関数を代入(function(data){～} )
 */
function ajaxbase(params){    
    $.ajax({
        url:params[0],
        type:params[1],
        data:params[2]
    })
    // Ajaxリクエストが成功した時発動
    .done( (data) => {
      params[3](data); 
    })
    // Ajaxリクエストが失敗した時発動
    .fail( (data) => {
      params[4](data);
    })
    // Ajaxリクエストが成功・失敗どちらでも発動
    .always( (data) => {
      params[5](data);

    });     
  }


/**
 * ページネーション設定(「jquery.pagination.js」が必要)
 * @param {String} tableElemSelector ページング設定対象のテーブルを指すセレクタ
 * @param {String} trElemSelector テーブル内の行を指すセレクタ
 */
function initPagenation(tableElemSelector,trElemSelector){
  $(tableElemSelector).pagination({
      itemElement : '> > ' + trElemSelector // アイテムの要素
  });

  $("div:has(p.prev-page)").addClass("pagenation");
  $("div.pagenation").wrapInner("<div>");
  $(".pagenation p.prev-page button").append("< 前の５件");
  $(".pagenation p.next-page button").prepend("次の５件 >");
}


/**
 * 1.trのclassにclickableを付加し、クリックイベントを登録
 * 2.tr内をクリック時にdata-href属性で指定したURIに遷移する設定を行う
 * ※対象要素にはdata-href属性が存在する事が前提
 */
function addClickEventToElement(){
    $('tr[data-href]').addClass('clickable') 
    //クリックイベント
    .click(function(e) {
      //e.targetはクリックした要素自体、それがa要素以外であれば
      if(!$(e.target).is('a')){
        //その要素の先祖要素で一番近いtrの
        //data-href属性の値に書かれているURLに遷移する
        window.location = $(e.target).closest('tr').data('href');
      }
    });
}


/**
 * 自動遷移を行う
 * @param {String} transHref 自動遷移先
 * @param {Number} waitTime 自動遷移までの待ち時間(ミリ秒)
 */
function setAutoTransition(transHref,waitTime){
    setTimeout(function(){
        window.location.href = transHref;
    }, waitTime);
}



    
