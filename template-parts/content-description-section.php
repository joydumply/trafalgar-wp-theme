<?php 
    $description_section = get_field('description_section');
    if(isset($description_section) && !empty($description_section)):
    ?>
    <section id="description_section" class="description_section">
        <?php 
        foreach($description_section as $item):
        ?>
            <div class="description_section_item">
                <div class="img">
                    <?php echo wp_get_attachment_image($item['image'], 'full') ?>
                </div>
                <div class="description_section_info">
                    <div class="section_title">
                        <?= esc_html($item['title']); ?>
                    </div>
                    <div class="section_description">
                        <?= esc_html($item['description']) ?>
                    </div>

                    <?php 
                    $isDownloadClasss = $item['button']['is_download'] ? 'download' : '';
                    ?>

                    <a class="btn <?= $isDownloadClasss ?>" href="<?= $item['button']['link'] ?>">
                        <?= $item['button']['label'] ?>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
<?php endif ;?>