$(function(){
    //　ブラウザのキャッシュ対策(スーパーリロード替わり)
    // $('#cd').empty().attr('disabled','disabled');
    // $('#login_submit').attr('disabled','disabled');

    // 「所属部門」セレクトボックスの変更時イベント登録
    $("#departments").on('change',function(){get_div()});

    // 「所属課」セレクトボックスの変更時イベント登録
    $("#divisions").on('change',function(){get_user('div')});

    // 「名前」セレクトボックスの変更時イベント登録
    $("#cd").on('change',function(){change_user()});

    // 「パスワードを表示する」チェックボックスの変更時イベント登録
    passwordFieldToggle('#password-check','#password');


    $('#login_submit').on('click',function(){
      $.cookie("departments", $("#departments").val(), { expires: 30 });
      $.cookie("divisions", $("#divisions").val() == null ? 0 : $("#divisions").val(), { expires: 30 });
      $.cookie("name", $("#cd").val(), { expires: 30 });
    });

    /**
     * ajax通信を用いて課情報を取得
     */
    function get_div(){
        var params = [6];
        // params[0] = '/get_user/dep/' + $("#bumon").val();
        params[0] = '/get_div/' + $("#departments").val();
        params[1] = 'GET';
        params[2] = '';
        params[3] = function(data){
          $('#divisions')
          .attr('disabled','disabled')
          .empty();
    
          $('#cd')
          .attr('disabled','disabled')
          .empty();
    
          $('#login_submit')
          .attr('disabled','disabled')
    
          $('#cd')
          .empty();
          if(data.length>0){
            $('#divisions')
              .removeAttr('disabled','disabled')
              .empty()
              .append('<option disabled="" selected="">選択してください</option>');
            $.each(data,
              function(index, val) {
                $('#divisions').append('<option value=' + val.cd + '>' + val.name + '</option>');
              }
            );
          } else {
            get_user('dep');
          }
        };
        params[4] = function(data){};
        params[5] = function(data){};
        ajaxbase(params);
      }
    
      /**
       * ajax通信を用いて社員情報を取得
       * @param {string} mode 
       * 'dep':部から取得
       * 'div':課から取得
       */
      function get_user(mode){
        var params = [6];
        if(mode == 'dep'){
          params[0] = '/get_user/dep/' + $("#departments").val();
        } else if(mode == 'div'){
          params[0] = '/get_user/div/' + $("#departments").val() + '/' + $("#divisions").val();
        } 
        params[1] = 'GET';
        params[2] = '';
        params[3] = function(data){
          $('#login_submit').attr('disabled','disabled');
          if(data.length>0){
            $('#cd')
              .prop('disabled', false)
              .empty();
              if(data.length == 1){
                $.each(data,
                  function(index, val) {
                    $('#cd').append('<option value=' + val.user_cd + ' selected >' + val.user_name + '</option>');
                    $('#login_submit').prop('disabled',false);
                  }
                )            
              } else {
                $('#cd').append('<option disabled="" selected>選択してください</option>');
                $.each(data,
                  function(index, val) {
                    $('#cd').append('<option value=' + val.user_cd + '>' + val.user_name + '</option>');
                  }
                )
              };
          } else {
            $('#cd')
            .prop('disabled', true)
            .empty();
          }
        }
        params[4] = function(data){};
        params[5] = function(data){};
        ajaxbase(params);
    
      }
    
      /**
       * 「名前」セレクトボックスを変更すると、「ログイン」ボタンが活性化
       */
      function change_user(){
        $('#login_submit').prop('disabled',false);
      }

      // $('#divisions').eq(0).attr('selected','selected');



});