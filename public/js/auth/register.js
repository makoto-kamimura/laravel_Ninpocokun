$(function(){

    //　ブラウザのキャッシュ対策(スーパーリロード替わり)
    // $('#division').empty().attr('disabled','disabled');
    // $('#department').eq(0).attr('selected','selected');
    // $('input[type="submit"]').attr('disabled','disabled');
    
    // 「パスワードを表示する」チェックボックスの変更時イベント登録(パスワード欄)
    passwordFieldToggle('#password_disp','#password');
    
    // 「パスワードを表示する」チェックボックスの変更時イベント登録(パスワード確認欄)
    passwordFieldToggle('#password_disp2','#password_check');

    // 「所属部門」セレクトボックスの変更時イベント登録
    $("#department").on('change',function(){get_div()});

    // システム管理者のチェックon/off設定
    $("#sys_admin").on("click", function(){
        if($(this).prop("checked") == true){
            $(this).val(1).attr('checked','checked');
        }else{
            $(this).val(0).removeAttr('checked') ;
        }
    });

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

});