# LaravelでPHPUnitを使ってテストする手法について

PHPUnit_起動
'./vendor/bin/phpunit'

<https://qiita.com/shindex/items/4f28f8e06ef2d10e8d2b>

# Gitのブランチモデルについて

master & develop & feature

【開発作業の流れ】
1. masterブランチからdevelopブランチを作成
2. developブランチから実装する機能毎にfeatureブランチを作成
3. featureブランチで実装完了した機能はdevelopブランチにマージ
4. リリース時点でdevelop → masterマージ

<https://qiita.com/y-okudera/items/0b57830d2f56d1d51692>

# コミットメッセージについて

|動詞|	説明|
| ---- | ---- |
|Add:|	（機能・ファイルなどを）追加する|
|Fix:|	（コードなどを）修正する|
|Improve:|	（コードなどを）改善する|
|Update:|	（パッケージやドキュメントなどを）更新する|
|Remove:|	（ファイル名やコードを）除去する|
|Rename:|	（ファイル名を）変更する|
|Move:|	（AをBに）移動する|
|Change:|	（AをBに）変更する|

<https://www.tam-tam.co.jp/tipsnote/program/post16686.html>

# Markdown記法について

<https://qiita.com/oreo/items/82183bfbaac69971917f>