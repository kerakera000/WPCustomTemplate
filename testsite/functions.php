<?php
    /* ---------- カスタム投稿タイプを追加 ---------- */
    add_action( 'init', 'create_post_type' );
        function create_post_type() {
            register_post_type( // カスタム投稿タイプの追加関数
                'test', //カスタム投稿タイプ名（半角英数字の小文字）
                    array( //オプション（以下）
                    'label' => 'テスト', // 管理画面上の表示（日本語でもOK）
                    'public' => true, // 管理画面に表示するかどうかの指定
                    'has_archive' => true, // 投稿した記事の一覧ページを作成する
                    'menu_position' => 5, // 管理画面メニューの表示位置（投稿の下に追加）
                    'show_in_rest' => true, // Gutenbergの有効化
                    'supports' => array( // サポートする機能（以下）
                        'title',  // タイトル
                        'editor', // エディター
                        'thumbnail', // アイキャッチ画像
                        'revisions' // リビジョンの保存
                    ),
                )
            );
            register_post_type( // カスタム投稿タイプの追加関数
                'news', //カスタム投稿タイプ名（半角英数字の小文字）
                    array( //オプション（以下）
                    'label' => 'ニュース', // 管理画面上の表示（日本語でもOK）
                    'public' => true, // 管理画面に表示するかどうかの指定
                    'has_archive' => true, // 投稿した記事の一覧ページを作成する
                    'menu_position' => 5, // 管理画面メニューの表示位置（投稿の下に追加）
                    'show_in_rest' => true, // Gutenbergの有効化
                    'supports' => array( // サポートする機能（以下）
                        'title',  // タイトル
                        'editor', // エディター
                        'thumbnail', // アイキャッチ画像
                        'revisions' // リビジョンの保存
                    ),
                )
            );
        }

    add_action('init', 'custom_taxonomy_cat');
        function custom_taxonomy_cat(){
            register_taxonomy( // カスタムタクソノミーの追加関数
                'news-cat', // カテゴリーの名前（半角英数字の小文字）
                'news',     // カテゴリーを追加したいカスタム投稿タイプ名
                array(      // オプション（以下
                'label' => 'ニュースカテゴリー', // 表示名称
                'public' => true, // 管理画面に表示するかどうかの指定
                'hierarchical' => true, // 階層を持たせるかどうか
                'show_in_rest' => true, // REST APIの有効化。ブロックエディタの有効化。
                )
            );
            register_taxonomy( // カスタムタクソノミーの追加関数
                'test-cat', // カテゴリーの名前（半角英数字の小文字）
                'test',     // カテゴリーを追加したいカスタム投稿タイプ名
                array(      // オプション（以下
                'label' => 'テストカテゴリー', // 表示名称
                'public' => true, // 管理画面に表示するかどうかの指定
                'hierarchical' => true, // 階層を持たせるかどうか
                'show_in_rest' => true, // REST APIの有効化。ブロックエディタの有効化。
                )
            );
        }

    add_action('init', 'custom_taxonomy_tag');
        function custom_taxonomy_tag(){
            register_taxonomy(
            'news-tag', // タグの名前（半角英数字の小文字）
            'news',     // タグを追加したいカスタム投稿タイプ
                array(      // オプション（以下）
                    'label' => 'タグ', // 表示名
                    'public' => true, // このタクソノミーを利用する場合かどうか
                    'hierarchical' => false, // 階層を持たせるかどうか
                    'show_in_rest' => true, // REST APIの有効化。ブロックエディタの有効化。
                    'update_count_callback' => '_update_post_term_count',
                )
            );
        }
    
    add_theme_support('post-thumbnails'); //投稿編集のアイキャッチ設定を表示する内容

    function load_scripts(){

        wp_enqueue_script(
            'mainjs', //名前（なんでも良い）
            get_theme_file_uri( '/js/main.js' ),  //読み込むファイル
            array( 'jquery' ), //jQueryを先に読む
            '', //特にいらない
            true // HTMLの最後で読み込むかどうか
        );

    }
    add_action( 'wp_enqueue_scripts', 'load_scripts' );
?>
