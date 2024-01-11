<?php 
    $services = get_field('services');
    if(isset($services) && !empty($services)):
    ?>
    <section id="services" class="services">
        <div class="container">
            <div class="services_wrap">
                <div class="section_title center">
                    <?= esc_html($services['title']); ?>
                </div>
                <div class="section_description center">
                    <?= esc_html($services['description']); ?>
                </div>

                <?php 
                if(!empty($services['service_item'])):
                    $service_item_cont = count($services['service_item']);
                ?>
                <div id="service_items" class="service_items">
                    <?php 
                    $counter = 0;
                    foreach($services['service_item'] as $item):
                        if($counter >= 6) break;
                        ?>
                        <?php get_template_part('template-parts/content-service','item', $args = array('item' => $item)); ?>
                    <?php 
                    $counter++;
                    endforeach ;?>
                </div>
                <?php 
                if($service_item_cont > 6):
                ?>
                    <div id="loadMoreServices" class="btn service_btn">
                        Load More
                    </div>
                <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>