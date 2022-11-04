<?php
// Template name: Шаблон для политики конфиденциальности

get_header();
global $post;
?>
    <section class="category">
        <div class="container">
            <h2>Политика конфиденциальности</h2>
            <?php echo wpautop($post->post_content); ?>
        </div>
    </section>
<?php
get_footer();
