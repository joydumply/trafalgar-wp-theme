<?php 
$item = $args['item'];
?>
<div class="item">
    <div class="img">
        <?php echo wp_get_attachment_image($item['icon']); ?>
    </div>
    <div class="item_title">
        <?= esc_html($item['title']); ?>
    </div>
    <div class="item_description">
        <?= esc_html($item['description']) ?>
    </div>
</div>