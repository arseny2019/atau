<?php
get_header();

$term = get_queried_object();

$query = new WP_Query(array(
    'post_status' => 'publish',
    'equipment_type' => $term->slug,
    'posts_per_page' => 6
));
$text = carbon_get_term_meta($term->term_id, 'text');
?>
    <section class="category">
        <div class="container"><h1 class="category__title"><?php echo $term->name; ?></h1>
            <?php
            if (!empty($query->posts)) {
                ?>
                <div class="category__grid">
                    <?php
                    foreach ($query->posts as $post) {
                        ?>
                        <div class="category__item">
                            <img class="category__item-image"
                                 src="<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>"/>
                            <div class="category__item-title"><?php echo $post->post_title; ?></div>
                            <div class="category__item-text"><?php echo $post->post_excerpt; ?></div>
                            <a class="category__item-link" href="<?php echo $post->guid; ?>">Подробнее</a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>
            <?php if ($query->found_posts > 6) { ?>
                <button
                        class="category__more main-button js-more-button"
                        data-taxonomy="equipment_type"
                        data-term="<?php echo $term->slug; ?>"
                        data-offset="1"
                >Показать еще</button>
            <?php } ?>
            <div class="category__text">
                <?php echo wpautop($text); ?>
            </div>
            <div class="category__text-more">Еще</div>
        </div>
    </section>
<?php

get_footer();
