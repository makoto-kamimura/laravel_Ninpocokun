//プルダウンメニュー
const divisionMenu = 
      {
        "総務部": ["人事課１", "人事課２"],
        "営業部": ["営業課１", "営業課２"],
        "工務部": ["工務課１", "工務課２"]
      };

function createMenu01(selectDivision){
  let divisionList = document.getElementById('division');
  divisionList.disabled = false;
  divisionList.innerHTML = '';
  let option = document.createElement('option');
  option.innerHTML = '選択してください';
  option.defaultSelected = true;
  option.disabled = true;
  divisionList.appendChild(option);
  
  divisionMenu[selectDivision].forEach( divisionmenu => {
    let option = document.createElement('option');
    option.value = divisionmenu;
    option.innerHTML = divisionmenu;
    divisionList.appendChild(option);  
  });    
}

const nameMenu = 
      {
        "人事課１": ["人事課１太郎", "人事課１次郎"],
        "人事課２": ["人事課２太郎", "人事課２次郎"],
        "営業課１": ["営業課１太郎", "営業課１次郎"],
        "営業課２": ["営業課２太郎", "営業課２次郎"],
        "工務課１": ["工務課１太郎", "工務課１次郎"],
        "工務課２": ["工務課２太郎", "工務課２次郎"]
      };

function createMenu02(selectName){
  let nameList = document.getElementById('name');
  nameList.disabled = false;
  nameList.innerHTML = '';
  let option = document.createElement('option');
  option.innerHTML = '選択してください';
  option.defaultSelected = true;
  option.disabled = true;
  nameList.appendChild(option);
  
  nameMenu[selectName].forEach( namemenu => {
    let option = document.createElement('option');
    option.innerHTML = namemenu;
    nameList.appendChild(option);  
  });
}



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

  if (path == "/"){
    $('ul#pclist').remove();
    $('div#nav-drawer').remove();
    $('p.homelink').children().contents().unwrap();
  }
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
$(function($) {
  //data-hrefの属性を持つtrを選択しclassにclickableを付加
  $('tr[data-href]').addClass('clickable')
    //クリックイベント
    .click(function(e) {
      //e.targetはクリックした要素自体、それがa要素以外であれば
      if(!$(e.target).is('a')){
        //その要素の先祖要素で一番近いtrの
        //data-href属性の値に書かれているURLに遷移する
        window.location = $(e.target).closest('tr').data('href');}
  });
});



//ページネーション設定
$(function(){
  $("div:has(p.prev-page)").addClass("pagenation");
  $("div.pagenation").wrapInner("<div>");
  $(".pagenation p.prev-page button").append("< 前の１０件");
  $(".pagenation p.next-page button").prepend("次の１０件 >");
});

