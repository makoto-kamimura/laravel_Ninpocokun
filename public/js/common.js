$(function($) {
//パスワード表示・非表示
$('#password_disp')
  .on('change',
    function() {
        if($('#password_disp').prop('checked')) {
          $('#password').attr({'type':'text'})
        } else {
          $('#password').attr({'type':'password'})
        }
    }
  )



  $('#password_disp2')
  .on('change',
    function() {
        if($('#password_disp2').prop('checked')) {
          $('#password_check').attr({'type':'text'})
        } else {
          $('#password_check').attr({'type':'password'})
        }
    }
  )



//ログインページタグ削除
$(window).on('load',function() {
  // パスの取得
  var path = location.pathname

  if ((path == "/login") || (path == "/errordisplay")){
    $('ul#pclist').remove();
    $('div#nav-drawer').remove();
    $('p.homelink').children().contents().unwrap();
  }
<<<<<<< Updated upstream
=======
  /*
  if (!(path == "/login")){
    $('#pclist').css('display', 'block');
  }
  */
>>>>>>> Stashed changes
});



//自動遷移
$(window).on('load',function() {
  // パスの取得
  var path = location.pathname

  if ((path == "/dailyreport_complete") || (path == "/usertouroku_complete")) {
    setTimeout(function(){
      window.location.href = 'home';
    }, 2000);
  }
});



//'未承認'が含まれるかどうか確認
$(window).on('load',function() {
  // パスの取得
  var path = location.pathname

  if ((path == "/dailylist") || (path == "/dailylist_superior")){

    $(function() {
      $('td:contains("未承認")').css('color', 'red');
      $('td:contains("未承認")').wrapInner('<a />');
    });

  }
});



//行全体にリンクを付与
  //data-hrefの属性を持つtrを選択しclassにclickableを付加
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



//ページネーション設定
  $('table.items').pagination({
    itemElement : '> > tr.item' // アイテムの要素
  });

  $("div:has(p.prev-page)").addClass("pagenation");
  $("div.pagenation").wrapInner("<div>");
  $(".pagenation p.prev-page button").append("< 前の５件");
  $(".pagenation p.next-page button").prepend("次の５件 >");



//ソート設定
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



//パスワードチェック
  function CheckPassword(confirm){
    // 入力値取得
    var input1 = password.value;
    var input2 = password_check.value;
    // パスワード比較
    if(input1 != input2){
      confirm.setCustomValidity("入力値が一致しません。");
    }else{
      confirm.setCustomValidity('');
    }
  }
