<?php 
    $hero = get_field('hero');
    if(isset($hero) && !empty($hero)):
    ?>
    <section id="hero" class="hero">
        <div class="hero_container container d-flex justify-content-between align-items-center">
            <div class="hero_content ">
                <div class="title">
                    <?= esc_html($hero['title']) ?>
                </div>
                <div class="description">
                    <?= esc_html($hero['description']) ?>
                </div>

                <div class="consult_btn btn primary">
                    Consult today
                </div>
            </div>

            <div class="hero_image">
                <?php 
                    if($hero['image']){
                        $image = wp_get_attachment_image($hero['image'], 'hero');
                        if($image){
                            echo $image;
                        }
                    }
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>