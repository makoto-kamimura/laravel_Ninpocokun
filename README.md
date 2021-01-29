# scratch

日報管理システム "にんぽこくん(仮)"

創造社デザイン専門学校
情報セキュリティ管理者資格コース一年
進級WS課題対応リポジトリ

# DEMO

---------------------------------------------

# Features

---------------------------------------------

# Requirement

* PHP
* laravel
* brade

# Installation

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


# Usage

---------------------------------------------

# Note

---------------------------------------------

# Author

aaaa

* 代表取締役	前島さん		DB・PHP 及び 実務全般のフォロー

* アルバイト	藤井さん		フロントエンド（HTML・CSS）

* 資料作成責任者	栗田さん		ドキュメント（要件定義書・基本設計書）

* 技術責任者	久保田さん		バックエンド（サーバー・実装）

* 開発総責任者	上村さん		総取り纏め（タスク管理・PM）

# License
"scratch" is Confidential.