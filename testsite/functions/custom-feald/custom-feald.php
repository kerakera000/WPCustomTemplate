<?php 

function add_custom_fields(){
    $post_types = array('works','news','recruit'); //投稿タイプ名を配列にまとめる
    foreach ($post_types as $post_type) { //各投稿タイプに対してメタボックスを追加する
        add_meta_box(
            'custom_setting', //編集画面セクションのHTML ID
            'カテゴリ一覧用の情報', //編集画面セクションのタイトル、画面上に表示される
            'insert_custom_fields', //編集画面セクションにHTML出力する関数
            $post_type, //投稿タイプ名
            'normal' //編集画面セクションが表示される部分
        );
    }
}
add_action('admin_menu', 'add_custom_fields');

function custom_metabox_edit_form_tag(){
  echo ' enctype="multipart/form-data"';
}
//画像をアップする場合は、multipart/form-dataの設定が必要なので、post_edit_form_tagをフックしてformタグに追加
add_action('post_edit_form_tag', 'custom_metabox_edit_form_tag');

// カスタムフィールドの入力エリア

function insert_custom_fields(){
    global $post;
    $main_text = get_post_meta($post->ID,'main_text',true);
    $sub_title = get_post_meta($post->ID,'sub_title',true);
    $content_text = get_post_meta($post->ID,'content_text',true);
    $hoge_thumbnail = get_post_meta($post->ID,'hoge_thumbnail',true);
    $link_text = get_post_meta($post->ID,'link_text',true); // ここで定義する
    if(get_post_type() == 'news'){ // newsの場合は会社名を表示しない
        echo'<div style="display: flex; align-items: flex-start; justify-content: center; flex-direction: column;">
                <div style="display: flex; align-items: flex-start; justify-content: center;">
                    <p style="font-weight:bold; font-size:16px">カテゴリ一覧用のタイトル</p>
                </div> 
                <input style="width: 100%; height: 2.3rem;" type="text" name="main_text" value="'.$main_text.'" />
            </div>';
        echo'<div style="display: flex; align-items: flex-start; justify-content: center; flex-direction: column;">
                <div style="display: flex; align-items: flex-start; justify-content: center;">
                    <p style="font-weight:bold; font-size:16px">リンク</p>
                </div> 
                <input style="width: 100%; height: 2.3rem;" type="text" name="link_text" value="'.$link_text.'" />
            </div>';
    }else if(get_post_type() == 'recruit'){
            echo'<div style="display: flex; align-items: flex-start; justify-content: center; flex-direction: column;">
                <div style="display: flex; align-items: flex-start; justify-content: center;">
                    <p style="font-weight:bold; font-size:16px">リクルートカードのタイトル</p>
                </div> 
                <input style="width: 100%; height: 2.3rem;" type="text" name="main_text" value="'.$main_text.'" />
            </div>';

            echo'<div style="display: flex; align-items: flex-start; justify-content: center; flex-direction: column;">
                <div style="display: flex; align-items: flex-start; justify-content: center;">
                    <p style="font-weight:bold; font-size:16px">リクルートカードのサブタイトル</p>
                </div> 
                <input style="width: 100%; height: 2.3rem;" type="text" name="sub_title" value="'.$sub_title.'" />
            </div>';

            echo'<div style="display: flex; align-items: flex-start; justify-content: center; flex-direction: column;">
                <div style="display: flex; align-items: flex-start; justify-content: center;">
                    <p style="font-weight:bold; font-size:16px">リクルートカードの内容</p>
                </div> 
                <input style="width: 100%; height: 2.3rem;" type="text" name="content_text" value="'.$content_text.'" />
            </div>';

            echo'<div style="display: flex; align-items: flex-start; justify-content: center; flex-direction: column;">
                <div style="display: flex; align-items: flex-start; justify-content: center;">
                    <p style="font-weight:bold; font-size:16px">リンク</p>
                </div> 
                <input style="width: 100%; height: 2.3rem;" type="text" name="link_text" value="'.$link_text.'" />
            </div>';
    }else {
        $hoge_name = get_post_meta(
        $post->ID, //投稿ID
        'hoge_name', //キー名
        true //戻り値を文字列にする場合true(falseの場合は配列)
    );
        echo'<div style="display: flex; align-items: flex-start; justify-content: center; flex-direction: column;">
                <div style="display: flex; align-items: flex-start; justify-content: center;">
                    <p style="font-weight:bold; font-size:16px">会社名</p>
                </div> 
                <input style="width: 100%; height: 2.3rem;" type="text" name="hoge_name" value="'.$hoge_name.'" />
            </div>';

        echo'<div style="display: flex; align-items: flex-start; justify-content: center; flex-direction: column;">
                <div style="display: flex; align-items: flex-start; justify-content: center;">
                    <p style="font-weight:bold; font-size:16px">リンク</p>
                </div> 
                <input style="width: 100%; height: 2.3rem;" type="text" name="link_text" value="'.$link_text.'" />
            </div>';

        echo'<div style="display: flex; align-items: flex-start; justify-content: center; flex-direction: column;">
                <div style="display: flex; align-items: flex-start; justify-content: center;">
                    <p style="font-weight:bold; font-size:16px">作業内容</p>
                </div> 
                <input style="width: 100%; height: 2.3rem;" type="text" name="main_text" value="'.$main_text.'" />
            </div>';
    }
        echo'<div style="display: flex; align-items: flex-start; justify-content: center; flex-direction: column;">
                <div style="display: flex; align-items: flex-start; justify-content: center;">
                    <p style="font-weight:bold; font-size:16px">画像</p>
                </div> 
                <input style="width: 100%; height: 2.3rem;" type="file" name="hoge_thumbnail" accept="image/*" />
            </div>';

    if (isset($hoge_thumbnail) && strlen($hoge_thumbnail) > 0) {
        echo '<div style="display: flex; align-items: flex-start; justify-content: center; flex-direction: column;">
                    <div><img style="width: 200px;display: block;margin: 1em;" src="' . wp_get_attachment_url($hoge_thumbnail) . '">
                </div>';
    } else {
        echo '<div style="display: flex; align-items: flex-start; justify-content: center; flex-direction: column;">
                <div><img style="width: 200px;display: block;margin: 1em;" src="' . get_stylesheet_directory_uri() . '/images/icon/ogimg.png">
            </div>';
    }
}


function save_custom_fields( $post_id ) {
    //textの保存処理
    if(isset($_POST['main_text'])){
        update_post_meta($post_id, 'main_text', $_POST['main_text']);
    }else{
        delete_post_meta($post_id, 'main_text');
    }
    if(isset($_POST['sub_title'])){
        update_post_meta($post_id, 'sub_title', $_POST['sub_title']);
    }else{
        delete_post_meta($post_id, 'sub_title');
    }
    if(isset($_POST['content_text'])){
        update_post_meta($post_id, 'content_text', $_POST['content_text']);
    }else{
        delete_post_meta($post_id, 'content_text');
    }
    if(isset($_POST['link_text'])){
        update_post_meta($post_id, 'link_text', $_POST['link_text']);
    }else{
        delete_post_meta($post_id, 'link_text');
    }
    if(isset($_POST['hoge_name'])){
        //hoge_nameキーで、$_POST['hoge_name']を保存
        update_post_meta($post_id, 'hoge_name', $_POST['hoge_name']);
    }else{
        //hoge_nameキーの情報を削除
        delete_post_meta($post_id, 'hoge_name');
    }
    //画像の保存処理
    if(isset($_FILES['hoge_thumbnail']) && $_FILES["hoge_thumbnail"]["size"] !== 0){
        $file_name = basename($_FILES['hoge_thumbnail']['name']);
        $file_name = trim($file_name);
        $file_name = str_replace(" ", "-", $file_name);

        $wp_upload_dir = wp_upload_dir(); //現在のuploadディクレトリのパスとURLを入れた配列
        $upload_file = $_FILES['hoge_thumbnail']['tmp_name'];
        $upload_path = $wp_upload_dir['path'].'/'.$file_name; //uploadsディレクトリ以下などに配置する場合は$wp_upload_dir['basedir']を利用する
        //画像ファイルをuploadディクレトリに移動させる
        move_uploaded_file($upload_file,$upload_path);

        $file_type = $_FILES['hoge_thumbnail']['type'];
        //正規表現で拡張子なしのスラッグ名を生成
        $slug_name = preg_replace('/\.[^.]+$/', '', basename($upload_path));

        if(file_exists($upload_path)){
            //保存に成功してファイルが存在する場合は、wp_postsテーブルなどに情報を追加
            $attachment = array(
                'guid'           => $wp_upload_dir['url'].'/'.basename($file_name), 
                'post_mime_type' => $file_type, 
                'post_title' => $slug_name, 
                'post_content' => '', 
                'post_status' => 'inherit'
            );
            //添付ファイルを追加
            $attach_id = wp_insert_attachment($attachment,$upload_path,$post_id);
            if(!function_exists('wp_generate_attachment_metadata')){
                require_once(ABSPATH . "wp-admin" . '/includes/image.php');
            }
            //添付ファイルのメタデータを生成し、wp_postsテーブルに情報を保存
            $attach_data = wp_generate_attachment_metadata($attach_id,$upload_path);
            wp_update_attachment_metadata($attach_id,$attach_data);
            //wp_postmetaテーブルに画像のattachment_id(wp_postsテーブルのレコードのID)を保存
            update_post_meta($post_id, 'hoge_thumbnail',$attach_id);
        }else{
            //保存失敗
            echo '画像保存に失敗しました';
            exit;
        }
    }
}
add_action('save_post', 'save_custom_fields');


?>