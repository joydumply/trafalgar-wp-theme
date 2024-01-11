<?php 
    $testimonials = get_field('testimonials');
    if(isset($testimonials) && !empty($testimonials)):
    ?>
    <section id="testimonials" class="testimonials container">
        <div class="testimonials_wrap">
            <div class="section_title center">
                <?= $testimonials['title']; ?>
            </div>

            <div class="testimonials_slider">
                <?php foreach($testimonials['testimonials'] as $item): ?>
                <div class="slide">
                    <div class="slide_inner">
                        <div class="person_info">
                            <div class="avatar">
                                <?= wp_get_attachment_image($item['avatar'], 'testimonial_avatar') ?>
                            </div>
                            <div class="info">
                                <div class="name">
                                    <?= $item['name'] ?>
                                </div>
                                <div class="position">
                                    <?= $item['position'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="text">
                            "<?= esc_html($item['text']); ?>"
                        </div>     
                    </div>                   
                </div>
                <?php endforeach; ?>
            </div>
            <div class="slider_navs"></div>
        </div>
    </section>
<?php endif; ?>