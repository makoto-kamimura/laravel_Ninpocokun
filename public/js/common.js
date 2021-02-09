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
  /*
  if (!(path == "/login")){
    $('#pclist').css('display', 'block');
  }
  */
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



//チェックボックスを記憶
   function alertDebug(arg) {
         //alert(arg);   // ﾃﾞﾊﾞｯｸﾞ時に有効化すると良い
      }
 
      function save_restore1_checkbox(target_class) {
         var cbstate;
 
         window.addEventListener('load', function () {
            cbstate = JSON.parse(localStorage['CBState'] || '{}');
            alertDebug('cbstate = ' + JSON.stringify(cbstate));
            for (var key in cbstate) { // cbstateはobjectで、このようにforﾙｰﾌﾟすると var key はobjectのｷｰが来るのだ。知らなんだ。
               alertDebug('key=' + key);
               var el_lst = document.querySelectorAll('input[data-savekey="' + key + '"].' + target_class);
               set_checkbox_checked_all(el_lst, true);
            }
 
            var cb = document.getElementsByClassName(target_class);
            alertDebug('cb = ' + JSON.stringify(cb));
 
            for (var c = 0; c < cb.length; c++) {
               alertDebug('cb[' + c + ']:name=' + cb[c].name + ', value=' + cb[c].value);
 
               cb[c].addEventListener('click', function (evt) {
                  var savekey = this.getAttribute('data-savekey');
                  alertDebug('click:savekey_value=' + savekey + ', checked=' + this.checked);
                  if (this.checked) {
                     cbstate[savekey] = true;
                  }
                  else if (cbstate[savekey]) {
                     delete cbstate[savekey];
                  }
                  localStorage['CBState'] = JSON.stringify(cbstate);
               });
            }
         });
 
         function set_checkbox_checked_all(el_lst, checked) {
            for (var c = 0; c < el_lst.length; c++) {
               var el = el_lst[c];
               alertDebug('el=' + JSON.stringify(el) + ' ,el.name=' + el.name);
               if (el) {
                  alertDebug('el.checked=' + el.checked);
                  el.checked = checked;
               }
            }
         }
      }

      save_restore1_checkbox('save-state1');