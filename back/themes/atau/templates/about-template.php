<?php
// Template name: Шаблон страницы О Компании
get_header();
global $post;

$features = carbon_get_post_meta($post->ID, 'features');
$workers = carbon_get_post_meta($post->ID, 'workers');
$achievements = carbon_get_post_meta($post->ID, 'achievements');
$advantages = carbon_get_post_meta($post->ID, 'advantages');
?>
    <section class="about">
        <div class="about__features">
            <?php
            foreach ($features as $feature) {
                ?>
                <div class="about__feature"><?php echo $feature['text']; ?></div>
            <?php } ?>
        </div>
        <div class="container"><h2 class="about__title">О компании</h2>
            <p class="about__text">
                <?php echo $post->post_content; ?>
            </p>
            <div class="about__more"><span>Показать еще</span></div>
            <div class="about__features about__features_mobile">
                <?php
                foreach ($features as $feature) {
                    ?>
                    <div class="about__feature"><?php echo $feature['text']; ?></div>
                <?php } ?>
            </div>
            <div class="about__emloyers">
                <h2 class="about__emloyers-title">Представители нашей компании</h2>
                <div class="employers-slider-container">
                    <div class="swiper employers-slider">
                        <div class="swiper-wrapper">
                            <?php foreach ($workers as $worker) {
                                $image_url = wp_get_attachment_image_url($worker['image'], 'full');
                                ?>
                                <div class="swiper-slide employers-slider__slide">
                                    <img class="employers-slider__image" src="<?php echo $image_url; ?>"/>
                                    <p class="employers-slider__title"><?php echo $worker['name']; ?></p>
                                    <span class="employers-slider__subtitle"><?php echo $worker['post']; ?></span>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="employers-slider-arrows">
                    <div class="employers-slider-arrow employers-slider-arrow_prev">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="30" cy="30" r="30" transform="rotate(-180 30 30)" fill="currentColor"></circle>
                            <path d="M40 30L24 44L34 30L24 16L40 30Z" fill="white"></path>
                        </svg>
                    </div>
                    <div class="employers-slider-arrow employers-slider-arrow_next">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="30" cy="30" r="30" transform="rotate(-180 30 30)" fill="currentColor"></circle>
                            <path d="M40 30L24 44L34 30L24 16L40 30Z" fill="white"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="achievs">
        <h2 class="achievs__title">Достижения</h2>
        <div class="achievs__grid">
            <?php for ($i = 0; $i < count($achievements); $i++) {
                ?>
                <div class="achievs__item js-achievs-item<?php
                if ($i === (count($achievements) - 1) / 2) echo ' achievs__item_active'
                ?>">
                    <div class="achievs__item-year"><?php echo $achievements[$i]['year']; ?></div>
                    <div class="achievs__item-text">
                        <?php echo $achievements[$i]['text']; ?>
                    </div>
                </div>
                <?php
            } ?>
        </div>
        <div class="achievs__mobile-text"></div>
    </div>
    <section class="advantages">
        <div class="container"><h2 class="advantages__title">Наши преимущества</h2>
            <div class="advantages__grid">
                <?php foreach ($advantages as $advantage){
                    $image_url = wp_get_attachment_image_url($advantage['image']);
                    ?>
                    <div class="advantages__item">
                        <img class="advantages__item-image" src="<?php echo $image_url; ?>"/>
                        <div class="advantages__item-title"><?php echo $advantage['title']; ?></div>
                        <div class="advantages__item-text"><?php echo $advantage['text']; ?></div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <div class="partners">
        <div class="container">
            <?php
            $args = array(
                'post_type' => 'partner',
                'post_status' => 'publish',
                'posts_per_page' => -1
            );
            $query = new WP_Query($args);
            ?>
            <h2 class="partners__title"><?php echo carbon_get_theme_option('main-block5-title'); ?></h2>
            <div class="partners__grid">
                <?php foreach ($query->posts as $partner) {
                    ?>
                    <img class="partners__item" src="<?php echo get_the_post_thumbnail_url($partner->ID, 'full'); ?>"/>
                <?php } ?>
            </div>
        </div>
    </div>
<?php
get_footer();

