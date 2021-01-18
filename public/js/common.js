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
const pwd = document.getElementById('password');
const pwdCheck = document.getElementById('password-check');
pwdCheck.addEventListener('change', function() {
  if(pwdCheck.checked) {
    pwd.setAttribute('type', 'text');
  } else {
    pwd.setAttribute('type', 'password');
  }
}, false);



//ログインページaタグ削除
$(window).on('load',function() {
  // パスの取得
  var path = location.pathname

  if (path == "/"){
    $('p.homelink').children().contents().unwrap();
  }
});



//自動遷移
$(window).on('load',function() {
  // パスの取得
  var path = location.pathname

  if (path == "/dailyreport_complete" || path == "usertouroku_complete") {
    setTimeout(function(){
      window.location.href = 'home';
    }, 2000);
  }
});