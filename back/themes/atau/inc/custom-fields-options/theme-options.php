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

        Field::make('complex', 'banner', 'Баннер')
            ->add_fields(array(
                Field::make('text', 'title', 'Заголовок')->set_width(25),
                Field::make('image', 'image', 'Изображение')->set_width(25),
                Field::make('text', 'text', 'Текст')->set_width(50),
                Field::make('text', 'link', 'Ссылка куда ведет "Подробнее"')->set_width(25),
                Field::make( 'checkbox', 'inverse', __( 'Инвертировать слайд' ) )->set_width(25),
                Field::make('complex', 'features', 'Особенности')
                    ->add_fields(array(
                            Field::make('text', 'title', 'Название особенности')
                        )
                    )
            )),
        Field::make('separator', 'crb_separator5', __('О нас')),
        Field::make( 'checkbox', 'about-show', __( 'Показывать блок' ) )
            ->set_option_value( 'true' )
            ->set_width(50),
        Field::make('image', 'about-image', 'Изображение')->set_width(50),
        Field::make('text', 'about-title', 'Заголовок')->set_width(25),
        Field::make('text', 'about-link', 'Ссылка куда ведет "Подробнее"')->set_width(25),
        Field::make('textarea', 'about-text', 'Текст')->set_width(50),

        Field::make('separator', 'crb_separator6', __('Наши работы')),
        Field::make('text', 'projects-title', 'Заголовок')->set_width(25),
        Field::make( 'media_gallery', 'projects-images', __( 'Картинки работ' ) )
            ->set_type( array( 'image' ) ),
        Field::make('text', 'projects-link', 'Ссылка куда ведет "Показать еще"')->set_width(25),

        Field::make('separator', 'crb_separator7', __('Почему выбирают нас?')),
        Field::make('text', 'why-we-title', 'Заголовок'),
        Field::make('text', 'why-we-feature-1-title', 'Заголовок 1 особенности'),
        Field::make('text', 'why-we-feature-1-text', 'Текст 1 особенности'),
        Field::make('text', 'why-we-feature-2-title', 'Заголовок 2 особенности'),
        Field::make('text', 'why-we-feature-2-text', 'Текст 2 особенности'),
        Field::make('text', 'why-we-feature-3-title', 'Заголовок 3 особенности'),
        Field::make('text', 'why-we-feature-3-text', 'Текст 3 особенности'),

        Field::make( 'media_gallery', 'why-we-images', __( 'Картинки партнеров' ) )
            ->set_type( array( 'image' ) ),
    ))
    ->add_tab('Формы обратной связи', array(
        Field::make('separator', 'crb_separator1', __('Форма 1 (Оставить заявку на главной)')),
        Field::make('text', 'form1-title', __('Заголовок формы 1'))->set_width(50),
        Field::make('text', 'form1-subtitle', __('Подзаголовок формы 1'))->set_width(50),
        Field::make('text', 'form1-title-success', __('Заголовок успешной отправки формы 1'))->set_width(50),
        Field::make('text', 'form1-subtitle-success', __('Подзаголовок успешной отправки формы 1'))->set_width(50),
        Field::make('text', 'form1-title-fail', __('Заголовок неудачной отправки формы 1'))->set_width(50),
        Field::make('text', 'form1-subtitle-fail', __('Подзаголовок неудачной отправки формы 1'))->set_width(50),
        Field::make('image', 'form1-image', __('Изображение рядом с формой'))->set_width(50),
        Field::make('separator', 'crb_separator2', __('Форма 2 (Обратная связь в шапке)')),
        Field::make('text', 'form2-title', __('Заголовок формы 2'))->set_width(50),
        Field::make('text', 'form2-title-success', __('Заголовок успешной отправки формы 2'))->set_width(50),
        Field::make('text', 'form2-subtitle-success', __('Подзаголовок успешной отправки формы 2'))->set_width(50),
        Field::make('text', 'form2-title-fail', __('Заголовок неудачной отправки формы 2'))->set_width(50),
        Field::make('text', 'form2-subtitle-fail', __('Подзаголовок неудачной отправки формы 2'))->set_width(50),
        Field::make('text', 'form2-call', __('Текст кнопки показа формы 2'))->set_width(50),
        Field::make('separator', 'crb_separator3', __('Форма 3 (Подробнее на детальной странице)')),
        Field::make('text', 'form3-title', __('Заголовок формы 3'))->set_width(50),
        Field::make('text', 'form3-subtitle', __('Подзаголовок формы 3'))->set_width(50),
        Field::make('text', 'form3-title-success', __('Заголовок успешной отправки формы 3'))->set_width(50),
        Field::make('text', 'form3-subtitle-success', __('Подзаголовок успешной отправки формы 3'))->set_width(50),
        Field::make('text', 'form3-call', __('Текст кнопки показа формы 3'))->set_width(50),
        Field::make('text', 'form3-success', __('Текст кнопки успешной отправки'))->set_width(50),
        Field::make('separator', 'crb_separator4', __('Форма 4 (Звонок в футере)')),
        Field::make('text', 'form4-title', __('Заголовок формы 4'))->set_width(50),
        Field::make('text', 'form4-subtitle', __('Подзаголовок формы 4'))->set_width(50),
        Field::make('text', 'form4-title-success', __('Заголовок успешной отправки формы 4'))->set_width(50),
        Field::make('text', 'form4-subtitle-success', __('Подзаголовок успешной отправки формы 4'))->set_width(50),
        Field::make('text', 'form4-title-fail', __('Заголовок неудачной отправки формы 4'))->set_width(50),
        Field::make('text', 'form4-subtitle-fail', __('Подзаголовок неудачной отправки формы 4'))->set_width(50),
        Field::make('rich_text', 'form-footer-text', __('Текст в футере модалки результата отправки'))->set_width(50),
    ))
    ->add_tab('Контакты', array(
        Field::make('text', 'carbon_address', __('Адрес'))->set_width(50),
        Field::make('textarea', 'carbon_map', __('html код карты. Не трогайте это поле если не хотите заменить стандартную карту.'))
            ->help_text('Поместите в это поле код карты, созданной на <a target="_blank" href="https://yandex.ru/map-constructor/">https://yandex.ru/map-constructor/</a>')->set_width(50),
        Field::make('text', 'carbon_phone', __('Контактный номер телефона'))->set_width(25),
        Field::make('text', 'carbon_inst', __('Ссылка на телеграм'))->set_width(25),
        Field::make('text', 'carbon_vk', __('Ссылка на vk'))->set_width(25),
        Field::make('text', 'carbon_rutube', __('Ссылка на RuTube'))->set_width(25),
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

