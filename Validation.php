<?php
class Validation
{

    private $title;
    private $author;
    private $publisher;
    private $price;
    private $error_array;

    public function __construct($title, $author, $publisher,$price){
        $this->title = $title;
        $this->author = $author;
        $this->publisher = $publisher;
        $this->price = $price;
        $this->error_array = array();
    }

    public function validate(){
        //内容をチェックする
        if(mb_strlen($this->title) == 0){
            array_push($this->error_array, "タイトルが空欄です");
        }
        if(mb_strlen($this->title) > 10){
            array_push($this->error_array, "タイトルは10文字以内です");
        }

        if(mb_strlen($this->author) == 0){
            array_push($this->error_array, "著者が空欄です");
        }
        if(mb_strlen($this->author) > 10){
            array_push($this->error_array, "著者は10文字以内です");
        }

        if(mb_strlen($this->publisher) == 0){
            array_push($this->error_array, "出版社が空欄です");
        }
        if(mb_strlen($this->publisher) > 10){
            array_push($this->error_array, "出版社は10文字以内です");
        }

        if(!is_numeric($this->price)){
            array_push($this->error_array, "価格が空欄か数字以外が入力されています");
          }else{
            if(intval($this->price) < 0){
              array_push($this->error_array, "価格にマイナスの値が入力されています");
            }
          }
        return $this->error_array;
    }
}