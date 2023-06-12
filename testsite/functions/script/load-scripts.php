<?php
    //JSの読み込み
    function load_scripts(){
        //js
        wp_enqueue_script(
            'normaljs',
            get_theme_file_uri( '/js/normal.js' ), 
            true // HTMLの最後で読み込むかどうか
        );
        //jquery
         wp_enqueue_script(
            'jquery', 
            get_stylesheet_directory_uri() . 
            '/js/jquery.js', 
            array('jquery'), '', 
            true
        );

    }
    add_action( 'wp_enqueue_scripts', 'load_scripts' );
?>