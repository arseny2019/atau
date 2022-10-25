import Swiper, {Navigation, Pagination} from 'swiper';
import {maskPhone} from "./phoneMask";
import {Modal} from "./multiply-modal/modal";
import {$body, setBodyPadding} from "./helpers";

Swiper.use([Navigation, Pagination]);

export class App {
    start() {
        this.initSliders();
        this.createInstances();
        this.initListeners();
    }

    createInstances() {
        const questionModal = new Modal({
            openModalButtonSelector: '.js-question-form-button',
            overlaySelector: '.question-modal-overlay',
            closeModalButtonSelector: '.question-modal__cross',
            modalSelector: '.question-modal',
            openCallback: (overlay) => {
                overlay.classList.add('overlay-show');
                $body.hideOverflow();
                setBodyPadding();
            },
            closeCallback: (overlay) => {
                overlay.classList.remove('overlay-show');
                $body.nullifyPadding();
                $body.showOverflow();
            }
        });
        questionModal.init();
        const callModal = new Modal({
            openModalButtonSelector: '.js-call-form-button',
            overlaySelector: '.call-modal-overlay',
            closeModalButtonSelector: '.call-modal__cross',
            modalSelector: '.call-modal',
            openCallback: (overlay) => {
                overlay.classList.add('overlay-show');
                $body.hideOverflow();
                setBodyPadding();
            },
            closeCallback: (overlay) => {
                overlay.classList.remove('overlay-show');
                $body.nullifyPadding();
                $body.showOverflow();
            }
        });
        callModal.init();
        if (document.querySelector('.js-order-form-button')) {
            const orderModal = new Modal({
                openModalButtonSelector: '.js-order-form-button',
                overlaySelector: '.order-modal-overlay',
                closeModalButtonSelector: '.order-modal__cross',
                modalSelector: '.order-modal',
                openCallback: (overlay) => {
                    overlay.classList.add('overlay-show');
                    $body.hideOverflow();
                    setBodyPadding();
                },
                closeCallback: (overlay) => {
                    overlay.classList.remove('overlay-show');
                    $body.nullifyPadding();
                    $body.showOverflow();
                }
            });
            orderModal.init();
            const successModal = new Modal({
                openModalButtonSelector: '.js-success-form-button',
                overlaySelector: '.success-modal-overlay',
                closeModalButtonSelector: '.js-success-modal-close',
                modalSelector: '.success-modal',
                openCallback: (overlay) => {
                    overlay.classList.add('overlay-show');
                    $body.hideOverflow();
                    setBodyPadding();
                },
                closeCallback: (overlay) => {
                    overlay.classList.remove('overlay-show');
                    $body.nullifyPadding();
                    $body.showOverflow();
                }
            });
            document.addEventListener('successEvent', () => successModal.open());
            successModal.init();
        }
        if (document.querySelector('.js-open-modal-slider')) {
            const sliderModal = new Modal({
                openModalButtonSelector: '.js-open-modal-slider',
                overlaySelector: '.slider-modal-overlay',
                closeModalButtonSelector: '.js-slider-modal-close',
                modalSelector: '.slider-modal',
                openCallback: (overlay) => {
                    overlay.classList.add('overlay-show');
                    $body.hideOverflow();
                    setBodyPadding();
                },
                closeCallback: (overlay) => {
                    overlay.classList.remove('overlay-show');
                    $body.nullifyPadding();
                    $body.showOverflow();
                }
            });
            sliderModal.init();
        }
    }

    initSliders() {

        const initSlider = (sliderSelector, prevBtnSelector, nextBtnSelector, inactiveArrowClass, paginationSelector) => {
            const slider = new Swiper(sliderSelector, {
                pagination: {
                    el: paginationSelector
                },
                spaceBetween: 24
            });
            const nextButton = document.querySelector(nextBtnSelector);
            nextButton.addEventListener('click', () => slider.slideNext());
            const prevButton = document.querySelector(prevBtnSelector);
            prevButton.addEventListener('click', () => slider.slidePrev());

            const toggleArrowsState = (e) => {
                e.isEnd ? nextButton.classList.add(inactiveArrowClass) : nextButton.classList.remove(inactiveArrowClass);
                e.isBeginning ? prevButton.classList.add(inactiveArrowClass) : prevButton.classList.remove(inactiveArrowClass);
            }

            slider.on('slideChange', (e) => toggleArrowsState(e));

            if (slider.slides.length <= 1) {
                nextButton.style.display = 'none';
                prevButton.style.display = 'none';
            }

            toggleArrowsState(slider);

            const bullets = document.querySelector(paginationSelector).querySelectorAll('.swiper-pagination-bullet');
            for (let i = 0; i < bullets.length; i++) {
                bullets[i].addEventListener('click', () => slider.slideTo(i));
            }

            return slider;
        }

        // Первый слайдер на главной
        if (document.querySelector('.main-slider')) {
            const mainSlider = initSlider('.main-slider', '.slider-arrow_prev',
                '.slider-arrow_next', 'slider-arrow_inactive', '.main-slider-pagination');
        }

        // Слайдер с отзывами
        if (document.querySelector('.feedback-slider')) {
            const feedbackSlider = initSlider('.feedback-slider', '.feedback-slider-arrow_prev',
                '.feedback-slider-arrow_next', 'feedback-slider-arrow_inactive', '.feedback-slider-pagination');

            // Меняем инфу об авторе отзыва и тексте
            const authorImgElement = document.querySelector('#feedbackAvatar');
            const authorNameElement = document.querySelector('#feedbackName');
            const authorTextElement = document.querySelector('#feedbackText');
            const videoStopper = (containerElem) => {
                if (!containerElem) return;
                let iframe_tag = containerElem.querySelector('iframe');
                if (iframe_tag) {
                    let iframeSrc = iframe_tag.src;
                    iframe_tag.src = iframeSrc;
                }
            }
            const updateDataOnSlideChange = (swiper) => {
                const dataFields = swiper.slides[swiper.activeIndex].querySelector('input[type="hidden"]');
                const author = JSON.parse(dataFields.value);
                authorImgElement.setAttribute('src', author.image);
                authorNameElement.textContent = author.name;
                authorTextElement.textContent = author.text;
                videoStopper(swiper.slides[swiper.previousIndex]);
            }
            feedbackSlider.on('slideChange', updateDataOnSlideChange);
            // Установим дефолтное значение от первого слайда
            updateDataOnSlideChange(feedbackSlider);
        }

        // Слайдер на "О компании"
        if (document.querySelector('.employers-slider')) {
            // const employersSlider = initSlider('employers-slider',
            //     '.employers-slider-arrow_prev', '.employers-slider-arrow_next',
            //     'employers-slider-arrow_inactive')
            console.log('init slider');
            const employersSlider = new Swiper('.employers-slider', {
                slidesPerView: 4,
                spaceBetween: 20,
                navigation: {
                    prevEl: '.employers-slider-arrow_prev',
                    nextEl: '.employers-slider-arrow_next'
                },
                breakpoints: {
                    320: {
                        slidesPerView: 2,
                        spaceBetween: 12
                    },
                    1080: {
                        slidesPerView: 3
                    },
                    1440: {
                        slidesPerView: 4
                    }
                }
            })
        }

        if (document.querySelector('.slider-modal')) {
            const modalSlider = new Swiper('.modal-slider', {
                navigation: {
                    prevEl: '.slider-modal-arrow_prev',
                    nextEl: '.slider-modal-arrow_next'
                },
                spaceBetween: 20
            });
        }

        const projectSliders = document.querySelectorAll('.projects-slider');
        if (projectSliders.length > 0) {
            projectSliders.forEach(slider => {
                console.log('slider', slider.nextSibling.querySelector('.projects-slider-arrow_prev'));
                const projectSlider = new Swiper(slider, {
                    spaceBetween: 20,
                    navigation: {
                        prevEl: slider.nextSibling.querySelector('.projects-slider-arrow_prev'),
                        nextEl: slider.nextSibling.querySelector('.projects-slider-arrow_next')
                    }
                })
            })
        }
    }


    initListeners() {
        // More button на главной
        const textSectionMoreBtn = document.querySelector('.text-section__more');
        const textSectionContent = document.querySelector('.text-section__content');
        if (textSectionMoreBtn) {
            textSectionMoreBtn.addEventListener('click', () => {
                if (textSectionContent.classList.contains('text-section__content_hidden')) {
                    textSectionContent.classList.remove('text-section__content_hidden');
                    textSectionMoreBtn.textContent = 'Скрыть';
                } else {
                    textSectionContent.classList.add('text-section__content_hidden');
                    textSectionMoreBtn.textContent = 'Показать еще';
                }
            });
        }

        // More button на О компании
        const aboutMoreBtn = document.querySelector('.about__more span');
        const aboutContent = document.querySelector('.about__text');
        if (aboutMoreBtn) {
            aboutMoreBtn.addEventListener('click', () => {
                if (aboutContent.classList.contains('about__text_full')) {
                    aboutContent.classList.remove('about__text_full');
                    aboutMoreBtn.textContent = 'Показать еще';
                } else {
                    aboutContent.classList.add('about__text_full');
                    aboutMoreBtn.textContent = 'Скрыть';
                }
            });
        }

        // Достижения
        const achievsItems = document.querySelectorAll('.js-achievs-item');
        const mobileText = document.querySelector('.achievs__mobile-text');
        if (mobileText) {
            achievsItems.forEach(item => {
                item.addEventListener('mouseenter', () => {
                    mobileText.textContent = item.querySelector('.achievs__item-text').textContent;
                    document.querySelectorAll('.achievs__item_active')
                        .forEach(activeItem => activeItem.classList.remove('achievs__item_active'));
                    if (!item.classList.contains('achievs__item_active')) {
                        item.classList.add('achievs__item_active');
                    }
                });
            });
            mobileText.textContent = document.querySelector('.achievs__item_active .achievs__item-text').textContent;
        }

        // More button на странице категорий
        const categoryMoreButton = document.querySelector('.category__text-more');
        if (categoryMoreButton) {
            const categoryText = document.querySelector('.category__text');
            categoryMoreButton.addEventListener('click', () => {
                if (categoryText.classList.contains('category__text_full')) {
                    categoryText.classList.remove('category__text_full');
                    categoryMoreButton.textContent = 'Еще'
                } else {
                    categoryText.classList.add('category__text_full');
                    categoryMoreButton.textContent = 'Скрыть'
                }
            })
        }

        // Мобильное меню
        const sidebar = document.querySelector('.sidebar');
        document.querySelector('.sidebar__cross').addEventListener('click', () => {
            sidebar.classList.add('sidebar_hidden');
        });
        document.querySelector('.header__burger').addEventListener('click', () => {
            sidebar.classList.remove('sidebar_hidden');
        });

        maskPhone('.phone-mask')
    }
}
