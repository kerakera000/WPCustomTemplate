# ubuntu WP開発用　テンプレートです

## 使い方

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