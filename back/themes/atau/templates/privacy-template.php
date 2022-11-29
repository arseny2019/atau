<?php
// Template name: Шаблон для политики конфиденциальности

get_header();
global $post;
?>
    <section class="category">
        <div class="container">
            <h2><?php echo get_the_title(); ?></h2>
            <?php echo wpautop($post->post_content); ?>
        </div>
    </section>
<?php
get_footer();
