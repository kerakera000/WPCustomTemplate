# WP カスタム投稿カスタムフィールド使いまわし用テンプレート

## 作成目的や使用方法など

### 作成目的  
カスタム投稿とacfカスタムフィールドの使い方の理解度を深めるため

### 使用方法やどこに何があるかなど  
　1. testsite/function.php内にカスタム投稿を作成している  
　2. カスタム投稿の呼び出しテストはindex.phpで作っている  
　3. カスタムフィールドはWP側でプラグイン(acf)をインストールして使用  
　4. カスタムフィールドを呼び出して使用しているページはsingle-test.phpに作成している  

## docker構築あれこれはここから

### 1.docker-compose.yml内の下記の番号を変える。  
　asterisk 初めて使うか毎回dockerデータベース消してるなら変えなくてもいいかも

　　　　wp:  
　　　　　ports:  
　　　　　　- '8080:80'   

### 2.ターミナルで　`sudo docker-compose up -d`　のみ

*testsiteの中身をマウントしているからそこにオリジナルテーマ内容を書き込む*

## 不具合発生時などのコマンド一覧

* docker停止  
    `docker-compose down`

* dockerデータベース削除  
    `docker-compose down --volumes`

* マウントが出来てるかの確認手順  
　1. `docker ps` でターミナルでコンテナが上がっているかの確認  
　2. `docker exec -it {wpの方のcontainer_id} bash` 打つ  
　3. `cd ./wp-content/themes/`　でディレクトリ移動  
　4. `ls`　で表示された中に*testsite*があるか確認する  