$(function(){
    // textareaへの入力時イベント(文字数カウントとカット)
    $('textarea').on('input',function(){charCount($(this),360)});

    // textareaからフォーカスが外れたタイミングのイベント(文字数カウントとカット)
    $('textarea').on('blur',function(){charCount($(this),360)});

    // 「確認する」ボタンクリックイベント(バリデーション実装)
    $('#submit_form').on('click',function(){
        var isValid = 0;
        $('textarea').each(
            function(i,elem){
                isValid += charCount($(elem),360) ? 0 : 1;
            }
        );

        if(isValid > 0 || !$('form').get(0).checkValidity()){
            $('form').get(0).reportValidity();
        } else {
            $('form').submit();
        }
    })

    /**
     * textareaに入力された文字数をカウントし、
     * 最大文字数を超過する分はカット
     * @param {Jquery Object} targetJqObj 
     * @param {Number} maxLength 
     */
    function charCount(targetJqObj,maxLength){
        var inputStr =  targetJqObj.val();
        if(inputStr.length > maxLength){
            targetJqObj.val(inputStr.substr(0, maxLength));
            targetJqObj[0].setCustomValidity("文字数は改行含め" + maxLength + "文字迄です。");
            setTimeout(function(){
                targetJqObj[0].setCustomValidity("");
            },5000);
            return false;
        } else {
            return true;
        }
    }
    
});