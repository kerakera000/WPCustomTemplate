<?php get_header(); ?>

<section class="section__newscustom">
    <h2> text-align: centerのお知らせ</h2>
    <div class="section__newscustom-inner">
        <?php
            /*指定したタクソノミー、ターム名の取得。表示*/
            $terms = get_terms( 'news-cat', array('slug' => 'news1'));
            $term = $terms[0];
            echo '<h3 class="section__newscustom-inner--title">'.$term->name.'</h2>';
        ?>
        <?php
            /*選択したタクソノミー の項目取得*/
            $args = array(
                'post_type' => 'news', //カスタム投稿タイプ名の指定
                'posts_per_page' => -1, //投稿の取得数の指定
                'order' => 'DESC',      //投稿の表示順の指定
                'post_status' => 'publish', //投稿の状態の指定3
                'tax_query' => array(
                array(
                    'taxonomy' => 'news-cat',  //カスタムタクソノミー
                    'terms' => array('news1'), //カスタムタクソノミーのカテゴリー（タクソノミーターム）
                    'field' => 'slug'
                ),
                ),
            );
            $the_query = new WP_Query( $args );

            if ($the_query->have_posts()) {     //
                while ($the_query->have_posts()) {
                    $the_query->the_post();

                    $title = the_title(NULL, NULL, false);
        ?>

            <div class="section__newscustom-inner--content">
                <p class="section__newscustom-inner--content--news-time">
                    <?php the_time('Y.m.d'); ?> ｜
                </p>
                <p class="section__newscustom-inner--content--news-title">
                    <a href="<?php echo esc_url(the_permalink()); ?>">
                        <?php echo $title ?>
                    </a>
                </p>
            </div>

        <?php  }
            } else { ?>
            <p class="news-not-found">News記事がありません。</p>
        <?php  } ?>
        <?php wp_reset_postdata(); /* クエリ(サブループ)のリセット */ ?>
    </div>
</section>

<section class="section__testcustom">
    <h2>position指定ACF付きテストページ</h2>
    <div class="section__testcustom-box">
        <div class="section__testcustom-box--relative">
            <?php
                /*指定したタクソノミー、ターム名の取得。表示*/
                $terms = get_terms( 'test-cat', array('slug' => 'test1'));
                $term = $terms[0];
                echo '<h3 class="section__testcustom-box--title">'.$term->name.'</h2>';
            ?>
            <?php
                $args = array(
                    'post_type' => 'test', //カスタム投稿タイプ名の指定
                    'posts_per_page' => -1, //投稿の取得数の指定
                );
                $the_query = new WP_Query( $args );
            ?>

            <?php if ( $the_query->have_posts() ): ?>
                <ul>
                    <?php while ( $the_query->have_posts() ): $the_query->the_post(); ?>
                        <li>
                            <?php the_post_thumbnail('thumbnail'); ?>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; wp_reset_postdata(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>