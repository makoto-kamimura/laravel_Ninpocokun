Option Explicit

'// INIT
Dim fso, tso, args
Dim DB_DATABASE, DB_USERNAME, DB_PASSWORD
Set fso = WScript.CreateObject("Scripting.FileSystemObject")

'引数の取得とDB接続用変数への代入
Set args = WScript.Arguments
DB_DATABASE = args.item(0)
DB_USERNAME = args.item(1)
DB_PASSWORD = args.item(2)

'シェルオブジェクト作成
Dim objShell
Set objShell = CreateObject("WScript.Shell")

' ArrayList作成
Dim ary
Set ary = CreateObject("System.Collections.ArrayList")

'tmp.batが残っている場合は削除
IF fso.FileExists("tmp.bat") THEN
    fso.DeleteFile "tmp.bat"
    WScript.Sleep 1500
END IF

'// メイン処理開始
FindFolder fso.GetFolder(".")

Set tso = fso.OpenTextFile("tmp.bat", 2, true)
tso.Write("cd c:\xampp\mysql\bin" & vbCrLf)

' For Each文によるループ処理
Dim item
For Each item In ary
    IF fso.GetExtensionName(item) = "sql" THEN
    	 tso.Write("mysql -u " & DB_USERNAME & " -p " & DB_PASSWORD & " " & DB_DATABASE & " < " & item & vbCrlf)
    END IF
Next

tso.close
WScript.Sleep 2500
objShell.Run  "tmp.bat",1,True
WScript.Sleep 3000
fso.DeleteFile "tmp.bat"

'// 後処理
Set fso = Nothing
Set objShell = Nothing
Set ary = Nothing

'//===================================================================
'// サブフォルダも再帰して一覧を表示
Sub FindFolder(ByVal objMainFolder)
    Dim objSubFolder
    Dim objFile

    '// フォルダがあれば再帰
    For Each objSubFolder In objMainFolder.SubFolders
        FindFolder objSubFolder
    Next

    '// フォルダの中のファイル情報を表示　　：　日時　サイズ　ファイル名　フォルダパス
    For Each objFile In objMainFolder.files
        ary.add objFile.path
    Next
End Sub



