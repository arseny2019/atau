<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package atau
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body>
<?php wp_body_open(); ?>
<div class="not-found-container">
    <div class="not-found">
        <div class="not-found__title">404</div>
        <div class="not-found__subtitle">Страница не найдена</div>
        <a class="not-found__button main-button" href="/">Вернуться на главную</a></div>
</div>
</body>
</html>
