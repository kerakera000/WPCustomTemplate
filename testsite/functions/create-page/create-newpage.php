<?php
    function create_custom_page() {
        $pages = array(
            // array('title' => 'newspage', 'template' => 'page-news.php'),
            // array('title' => 'aboutpage', 'template' => 'page-about.php'),
            // array('title' => 'businesspage', 'template' => 'page-business.php'),
            // array('title' => 'blogpage', 'template' => 'page-blog.php'),
            // array('title' => 'contactpage', 'template' => 'page-contact.php'),
            // array('title' => 'faqpage', 'template' => 'page-faq.php'),
            // array('title' => 'recruitpage', 'template' => 'page-recruit.php'),
            // array('title' => 'workspage', 'template' => 'page-works.php'),
            // array('title' => 'privacypolicypage', 'template' => 'page-privacypolicy.php')
        );
    
        foreach ($pages as $page) {
            $existing_page = get_page_by_title($page['title']);
            if (!$existing_page) {
                $new_page = array(
                    'post_title'    => $page['title'],
                    'post_content'  => 'ここにカスタムページの内容を記述します。',
                    'post_status'   => 'publish',
                    'post_author'   => 1,
                    'post_type'     => 'page',
                    'post_name'     => $page['title'],
                    'page_template' => $page['template']
                );
                wp_insert_post($new_page);
            }
        }
    }
    
    add_action('after_setup_theme', 'create_custom_page');