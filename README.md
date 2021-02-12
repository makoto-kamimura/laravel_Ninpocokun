# scratch

日報管理システム "にんぽこくん。"

創造社デザイン専門学校
情報セキュリティ管理者資格コース一年 チーム"scratch"
進級WS課題対応リポジトリ

# DEMO
ログイン画面
![test](/README_img/201_ログイン画面.png) 
メインメニュー画面
![test](/README_img/202_メインメニュー画面.png) 
日報一覧確認画面
![test](/README_img/203_日報一覧確認画面.png)
個別日報入力画面 
![test](/README_img/204_個別日報入力画面.png) 
個別日報入力内容確認画面
![test](/README_img/205_個別日報入力内容確認画面.png) 
ユーザー登録・変更画面
![test](/README_img/207_ユーザー登録・変更画面.png) 
ユーザー情報登録確認画面
![test](/README_img/208_ユーザー情報登録確認画面.png)
ユーザー情報登録・変更完了画面
![test](/README_img/209_ユーザー情報登録・変更完了画面.png) 
承認メニュー画面
![test](/README_img/210_承認メニュー画面.png) 
個別日報入力内容完了画面
![test](/README_img/211_個別日報入力内容完了画面.png) 
ユーザー管理画面
![test](/README_img/216_ユーザー管理画面.png) 
エラー画面
![test](/README_img/219_エラー画面.png) 

# Requirement

* PHP
* laravel
* brade

# Installation

Laravelのプロジェクトをgit cloneしたときの手順について
```参考資料
http://vdeep.net/laravel-git-clone
```

```
SQLファイルローダ(sql_file_exec.vbs)の使用方法・注意点等
```
【使用の前提】
・mysqlをxamppで運用している事。
・C:\xampp\mysql\binにmysql.exeが存在している事。
・SQLファイルに同名の既存DBオブジェクト削除処理が記述されている事。(DROP (DB_OBJECT_TYPE) IF EXISTS (DB_OBJECT_NAME))

【使用方法】
コマンドプロンプトでscratchフォルダに移動して、以下のコマンドを実行。
cscript sql_lib\sql_file_exec.vbs (データベース名) (DBユーザー名) (DBパスワード)

【実行失敗時】
「sql_lib」フォルダ内のtmp.batを削除する。

# Author

* 実務全般担当        前島さん		DB・PHP・JS 及び 実務全般のフォロー

* デザイン担当      河野さん		画面デザイン及びドキュメント（要件定義書)

* ドキュメント担当  栗田さん		ドキュメント（基本設計書）

* フロント担当      藤井さん		フロントエンド（HTML・CSS・JS）

* バック担当        久保田さん		バックエンド（PHP・laravel・blade）

* マネジメント担当  上村    		総取り纏め（タスク管理・git管理・サポート）

# License
"scratch" is Confidential.
