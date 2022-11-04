<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

$default_page_container = Container::make('theme_options', 'Настройки темы')
    ->set_icon('dashicons-admin-generic')
    ->set_page_menu_position(25)
    ->add_tab('Главная', array(
        Field::make('media_gallery', 'main_slider', __('Слайдер'))->set_type('image'),
        Field::make('text', 'main-block1-title', __('Заголовок для 1го информационного блока'))
            ->set_width(50),
        Field::make('textarea', 'main-block1-text', __('Текст для 1го информационного блока'))
            ->set_width(50),
        Field::make('complex', 'main-block-1-features', 'Особенности для 1го информационного блока')
            ->add_fields(array(
                Field::make('text', 'title', 'Название')->set_width(75),
                Field::make('image', 'image', 'Иконка')->set_width(25),
                Field::make('text', 'text', 'Текст')
            )),
        Field::make('text', 'main-block2-title', __('Заголовок для 2го информационного блока (Категории)'))->set_width(50),
        Field::make('text', 'main-block2-subtitle', __('Подзаголовок для 2го информационного блока (Категории)'))
            ->set_width(50),
        Field::make('text', 'main-block3-title', __('Заголовок для 3го информационного блока (Отзывы)')),
        Field::make('text', 'main-block4-title', __('Заголовок для 4го информационного блока (Наши работы)'))->set_width(50),
        Field::make('text', 'main-block4-subtitle', __('Подзаголовок для 4го информационного блока (Наши работы)'))->set_width(50),
        Field::make('text', 'main-block5-title', __('Заголовок для 5го информационного блока (Партнеры)')),
        Field::make('rich_text', 'main-block6-text', __('Текст для 6го информационного блока (текст после блока Партнеры)')),
    ))
    ->add_tab('Формы обратной связи', array(
        Field::make('separator', 'crb_separator1', __('Форма 1 (Задать Вопрос)')),
        Field::make('text', 'form1-title', __('Заголовок формы 1'))->set_width(50),
        Field::make('text', 'form1-subtitle', __('Подзаголовок формы 1'))->set_width(50),
        Field::make('text', 'form1-title-success', __('Заголовок успешной отправки формы 1'))->set_width(50),
        Field::make('text', 'form1-subtitle-success', __('Подзаголовок успешной отправки формы 1'))->set_width(50),
        Field::make('text', 'form1-call', __('Текст кнопки показа формы 1'))->set_width(50),
        Field::make('text', 'form1-success', __('Текст кнопки успешной отправки'))->set_width(50),
        Field::make('separator', 'crb_separator2', __('Форма 2 (Заказать звонок)')),
        Field::make('text', 'form2-title', __('Заголовок формы 2'))->set_width(50),
        Field::make('text', 'form2-subtitle', __('Подзаголовок формы 2'))->set_width(50),
        Field::make('text', 'form2-title-success', __('Заголовок успешной отправки формы 2'))->set_width(50),
        Field::make('text', 'form2-subtitle-success', __('Подзаголовок успешной отправки формы 2'))->set_width(50),
        Field::make('text', 'form2-call', __('Текст кнопки показа формы 2'))->set_width(50),
        Field::make('text', 'form2-success', __('Текст кнопки успешной отправки'))->set_width(50),
        Field::make('separator', 'crb_separator3', __('Форма 3 (Подробнее на детальной странице)')),
        Field::make('text', 'form3-title', __('Заголовок формы 3'))->set_width(50),
        Field::make('text', 'form3-subtitle', __('Подзаголовок формы 3'))->set_width(50),
        Field::make('text', 'form3-title-success', __('Заголовок успешной отправки формы 3'))->set_width(50),
        Field::make('text', 'form3-subtitle-success', __('Подзаголовок успешной отправки формы 3'))->set_width(50),
        Field::make('text', 'form3-call', __('Текст кнопки показа формы 3'))->set_width(50),
        Field::make('text', 'form3-success', __('Текст кнопки успешной отправки'))->set_width(50)
    ))
    ->add_tab('Контакты', array(
        Field::make('text', 'carbon_address', __('Адрес'))->set_width(50),
        Field::make('textarea', 'carbon_map', __('html код карты. Не трогайте это поле если не хотите заменить стандартную карту.'))
            ->help_text('Поместите в это поле код карты, созданной на <a target="_blank" href="https://yandex.ru/map-constructor/">https://yandex.ru/map-constructor/</a>')->set_width(50),
        Field::make('text', 'carbon_phone', __('Контактный номер телефона'))->set_width(33),
        Field::make('text', 'carbon_inst', __('Ссылка на телеграм'))->set_width(33),
        Field::make('text', 'carbon_vk', __('Ссылка на vk'))->set_width(33),
        Field::make('complex', 'contacts_features', __('Особенности'))
            ->add_fields(array(
                Field::make('text', 'text', __('Текст')),
            ))
    ));

Container::make('post_meta', 'Дополнительный контент')
    ->show_on_post_type('feedback')
    ->set_priority('high')
    ->add_fields(array(
        Field::make('textarea', 'video', __('Видео')),
    ));

Container::make('post_meta', 'Дополнительный контент')
    ->show_on_post_type('project')
    ->set_priority('high')
    ->add_fields(array(
        Field::make('text', 'date', __('Дата создания проекта'))
            ->set_width(50),
        Field::make('media_gallery', 'slider', __('Изображения для слайдера'))
            ->set_type('image')
    ));

Container::make('post_meta', 'Дополнительный контент')
    ->show_on_post_type('blog')
    ->set_priority('high')
    ->add_fields(array(
        Field::make('text', 'date', __('Дата новости'))
            ->set_width(33),
        Field::make('text', 'author', __('Автор статьи'))
            ->set_width(33),
        Field::make('text', 'author_status', __('Должность автора'))
            ->set_width(33),
        Field::make('media_gallery', 'slider', __('Изображения для галереи'))
            ->set_type('image')
    ));

Container::make('term_meta', __('Category Properties'))
    ->where('term_taxonomy', '=', 'equipment_type')
    ->add_fields(array(
        Field::make('image', 'thumbnail', __('Изображение категории')),
        Field::make('rich_text', 'text', __('Текст категории')),
    ));


Container::make('post_meta', __('Дополнительная информация', 'about_meta'))
    ->show_on_post_type('page')
    ->show_on_template('templates/about-template.php')
    ->add_fields(array(
        Field::make('complex', 'features', __('Особенности'))
            ->add_fields(array(
                Field::make('text', 'text', __('Текст')),
            )),
        Field::make('complex', 'workers', __('Сотрудники'))
            ->add_fields(array(
                Field::make('image', 'image', __('Фото')),
                Field::make('text', 'name', __('Текст')),
                Field::make('text', 'post', __('Должность')),
            )),
        Field::make('complex', 'achievements', __('Достижения'))
            ->add_fields(array(
                Field::make('text', 'year', __('Год')),
                Field::make('text', 'text', __('Текст')),
            )),
        Field::make('complex', 'advantages', __('Преимущества'))
            ->add_fields(array(
                Field::make('image', 'image', __('Иконка')),
                Field::make('text', 'title', __('Заголовок')),
                Field::make('text', 'text', __('Текст')),
            )),
    ));

Container::make('post_meta', __('Дополнительная информация', 'equipment_meta'))
    ->show_on_post_type('equipment')
    ->add_fields(array(
        Field::make('textarea', 'video', __('Видео')),
        Field::make('media_gallery', 'gallery', __('Галерея изображений'))
            ->set_type('image')
    ));


add_action('admin_footer', 'replace_carbon_fields_button_text', 0);

function replace_carbon_fields_button_text()
{
    ?>
    <script>
        window.onload = () => {
            function replaceBtnText() {
                renameImageBtns();
                document.querySelectorAll('.carbon-actions .carbon-button a.button').forEach((btn) => {
                    let parent = btn.parentNode;
                    if (!btn.classList.contains('btn-refactored')) {
                        if (!parent.classList.contains('carbon-button-collapse-all')) {
                            btn.innerHTML = 'Добавить элемент';
                        } else {
                            btn.innerHTML = 'Скрыть поля';
                        }
                        btn.classList.add('btn-refactored');
                        btn.addEventListener('click', btnListener);
                    }
                });
                document.querySelectorAll('.carbon-media-gallery-actions .button.button-secondary').forEach((btn) => {
                    if (!btn.classList.contains('btn-refactored')) {
                        btn.innerHTML = 'Добавить элемент';
                        btn.classList.add('btn-refactored');
                        btn.addEventListener('click', btnListener);
                    }
                });
            }

            function btnListener() {
                setTimeout(() => {
                    document.querySelectorAll('.dashicons-trash.cf-complex__group-action-icon').forEach(
                        btn => {
                            if (!btn.classList.contains('btn-refactored')) {
                                btn.addEventListener('click', btnListener);
                                btn.classList.add('btn-refactored')
                            }
                        }
                    );
                    document.querySelectorAll('.carbon-actions .carbon-button a.button').forEach(btn => {
                        if (!btn.classList.contains('btn-refactored')) {
                            let parent = btn.parentNode;
                            if (!parent.classList.contains('carbon-button-collapse-all')) {
                                btn.innerHTML = 'Добавить элемент';
                            } else {
                                btn.innerHTML = 'Скрыть поля';
                            }
                            btn.classList.add('btn-refactored');
                            btn.addEventListener('click', btnListener)
                        }
                    });
                    document.querySelectorAll('.carbon-media-gallery-actions .button.button-secondary').forEach(btn => {
                        btn.innerHTML = 'Добавить элемент';
                        if (!btn.classList.contains('btn-refactored')) {
                            btn.classList.add('btn-refactored');
                            btn.addEventListener('click', btnListener)
                        }
                    });
                    renameImageBtns()
                }, 100)
            }

            function renameImageBtns() {
                document.querySelectorAll('.button.cf-file__browse').forEach(btn => {
                    btn.innerHTML = 'Выберите<br>изображение';
                });
                document.querySelectorAll('.button.cf-media-gallery__browse').forEach(btn => {
                    btn.innerHTML = 'Добавьте изображения';
                });
            }

            replaceBtnText();
        };

    </script>
    <style>
        .cf-complex__placeholder-label {
            opacity: 0;
        }

        .button.cf-file__browse {
            line-height: 1.25;
        }

        .carbon-media-gallery-list-items {
            height: auto !important;
        }
    </style>
    <?php
}

