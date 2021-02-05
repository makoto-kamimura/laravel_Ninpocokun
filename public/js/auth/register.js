$(function(){

    //　ブラウザのキャッシュ対策(スーパーリロード替わり)
    // $('#division').empty().attr('disabled','disabled');
    // $('#department').eq(0).attr('selected','selected');
    // $('input[type="submit"]').attr('disabled','disabled');
    
    // 「パスワードを表示する」チェックボックスの変更時イベント登録(パスワード欄)
    passwordFieldToggle('#password_disp','#password');
    
    // 「パスワードを表示する」チェックボックスの変更時イベント登録(パスワード確認欄)
    passwordFieldToggle('#password_disp2','#password_confirmation');

    // 「所属部門」セレクトボックスの変更時イベント登録
    $("#department").on('change',function(){checkSelect($(this),'部');get_div();});

    // 「所属課」セレクトボックスの変更時イベント登録
    $('#division').on('change',function(){checkSelect($(this),'課')});

    // 「役職」セレクトボックスの変更時イベント登録
    $('#position').on('change',function(){checkSelect($(this),'役職')});

    // システム管理者のチェックon/off設定
    $("#sys_admin").on("click", function(){
        if($(this).prop("checked") == true){
            $(this).val(1).attr('checked','checked');
        }else{
            $(this).val(0).removeAttr('checked') ;
        }
    });

    // 「確認する」ボタンクリックイベント(バリデーション実装)
    $('#submit_form').on('click',function(){
      var isValid = 0;
      isValid += checkSelect($('#department'),'部') ? 0 : 1;
      isValid += checkSelect($('#division'),'課') ? 0 : 1;
      isValid += checkSelect($('#position'),'役職') ? 0 : 1;
      isValid += checkPassword("#password","#password_confirmation") ? 0 : 1;
      if(isValid > 0 || !$('form').get(0).checkValidity()){
        $('form').get(0).reportValidity();
      } else {
        $('form').submit();
      }
      
    })

    /**
     * ajax通信を用いて課情報を取得
     */
    function get_div(){
        $('#division').attr('disabled','disabled').empty();
        var params = [6];
        params[0] = '/get_div/' + $("#department").val();
        params[1] = 'GET';
        params[2] = '';
        params[3] = function(data){
          $('#login_submit').attr('disabled','disabled');
          if(data.length > 0){
            $('#division').removeAttr('disabled','disabled')  
            if(data.length == 1){
                $('input[type="submit"]').removeAttr('disabled','disabled');
            } else {
                $('#division').append('<option disabled selected>選択してください</option>');
            }

            $.each(data,
              function(index, val) {
                $('#division').append('<option value=' + val.cd + '>' + val.name + '</option>');
              }
            );
          } else {
            $('#division').append('<option value= "0" selected></option>');
            $('input[type="submit"]').removeAttr('disabled','disabled');
          }
        };
        params[4] = function(data){};
        params[5] = function(data){};
        ajaxbase(params);
      }

      // 課セレクトボックスチェック
    function checkSelect(targetJqObj,targetName){
      // var val = targetJqObj.val();
      if (targetJqObj.val() == null){
        targetJqObj[0].setCustomValidity(targetName + "を選択して下さい。");
        return false;
      }else{
        targetJqObj[0].setCustomValidity("");
        return true;
      }
    }


      //　パスワードチェック
    function checkPassword(pwSelector,ckSelector){
      // 入力値取得
      var input1 = $(pwSelector).val();
      var input2 = $(ckSelector).val();
      // パスワード比較
      if(input1 != input2){
        $(ckSelector)[0].setCustomValidity("パスワードが一致しません。");
        return false;
      }else{
        $(ckSelector)[0].setCustomValidity("");
        return true;
      }
    }




});