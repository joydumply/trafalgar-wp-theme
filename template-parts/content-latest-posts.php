<?php
    $args = array(
        'posts_per_page' => 3, 
        'orderby' => 'date', 
        'order' => 'DESC'
    );
    
    $recent_posts = new WP_Query($args);
    if ($recent_posts->have_posts()) :
    ?>
    <section id="latest_posts" class="latest_posts">
        <div class="section_title center">
            Check out our latest article
        </div>
        <div class="latest_posts_wrap">
            <?php
                while ($recent_posts->have_posts()) :
                    $recent_posts->the_post();
            ?>

            <div class="post">
                <div class="img">
                    <?php the_post_thumbnail( 'post_thumbnails' ); ?>
                </div>
                <div class="info">
                    <div class="title"><?php the_title(); ?></div>
                    <div class="excerpt">
                        <?php the_excerpt(); ?>
                    </div>

                    <a href="<?php the_permalink(); ?>" class="readmore">
                        Read more
                    </a>
                </div>
            </div>

            <?php endwhile;  wp_reset_postdata(); ?>
            
        </div>
        <a href="#" class="btn latest_posts_btn">
                View all
        </a>
    </section>
<?php endif; ?>