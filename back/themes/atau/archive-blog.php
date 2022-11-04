<?php

get_header();

$query = new WP_Query(
    array(
        'post_status' => 'publish',
        'posts_per_page' => 9,
        'post_type' => 'blog'
    )
);
?>
    <section class="blog">
        <div class="container">
            <h2 class="blog__title">Новости</h2>
            <?php if (!empty($query->posts)) { ?>
                <div class="blog__top">
                    <div class="blog__main">
                        <div class="blog__item">
                            <img
                                    class="blog__item-image"
                                    src="<?php echo get_the_post_thumbnail_url($query->posts[0]->ID); ?>"/>
                            <div class="blog__item-title"><?php echo $query->posts[0]->post_title; ?></div>
                            <div class="blog__item-text">
                                <?php echo $query->posts[0]->post_excerpt; ?>
                            </div>
                            <a class="blog__item-link"
                               href="<?php echo $query->posts[0]->guid; ?>"><span>Читать полностью</span><span>Подробнее</span></a>
                        </div>
                    </div>
                    <div class="blog__secondary">
                        <?php if ($query->posts[1]) { ?>
                            <div class="blog__item">
                                <img class="blog__item-image"
                                     src="<?php echo get_the_post_thumbnail_url($query->posts[1]->ID); ?>"/>
                                <div class="blog__item-title"><?php echo $query->posts[1]->post_title; ?></div>
                                <div class="blog__item-text">
                                    <?php echo $query->posts[1]->post_excerpt; ?>
                                </div>
                                <a class="blog__item-link"
                                   href="<?php echo $query->posts[1]->guid; ?>"><span>Читать полностью</span><span>Подробнее</span></a>
                            </div>
                        <?php } ?>
                        <?php if ($query->posts[2]) { ?>
                            <div class="blog__item">
                                <img class="blog__item-image"
                                     src="<?php echo get_the_post_thumbnail_url($query->posts[2]->ID); ?>"/>
                                <div class="blog__item-title"><?php echo $query->posts[2]->post_title; ?></div>
                                <div class="blog__item-text"><?php echo $query->posts[2]->post_excerpt; ?>
                                </div>
                                <a class="blog__item-link"
                                   href="<?php echo $query->posts[2]->guid; ?>"><span>Читать полностью</span><span>Подробнее</span></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="blog__grid">
                    <?php for ($i = 3; $i < count($query->posts); $i++) { ?>
                        <div class="blog__item">
                            <img class="blog__item-image"
                                 src="<?php echo get_the_post_thumbnail_url($query->posts[$i]->ID); ?>"/>
                            <div class="blog__item-title"><?php echo $query->posts[$i]->post_title; ?></div>
                            <div class="blog__item-text">
                                <?php echo $query->posts[$i]->post_excerpt; ?>
                            </div>
                            <a class="blog__item-link"
                               href="<?php echo $query->posts[$i]->guid; ?>"><span>Читать полностью</span><span>Подробнее</span></a>
                        </div>
                    <?php } ?>
                </div>
                <?php if ($query->found_posts > 9) { ?>
                    <button class="blog__more main-button js-more-button" data-offset="1">Показать еще</button>
                <?php } ?>
            <?php } ?>
        </div>
    </section>
<?php
get_footer();
