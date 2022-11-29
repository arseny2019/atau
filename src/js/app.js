import Swiper, {Navigation, Pagination} from 'swiper';
import {maskPhone} from "./phoneMask";
import {Modal} from "./multiply-modal/modal";
import {$body, setBodyPadding} from "./helpers";
import {ModalWithSuccess} from "./multiply-modal/modalWithSuccess";
import {Fetcher} from "./fetcher";
import {Sliders} from "./sliders";

Swiper.use([Navigation, Pagination]);

export class App {
    start() {
        this.initSliders();
        this.createInstances();
        this.initListeners();
    }

    createInstances() {
        const fetcher = new Fetcher();
        const questionModal = new ModalWithSuccess({
            openModalButtonSelector: '.js-question-form-button',
            overlaySelector: '.question-modal-overlay',
            closeModalButtonSelector: '.question-modal-close',
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
            },
            modalBodySelector: '.modal-body',
            successContentSelector: '.modal-success'
        });
        questionModal.init();
        const callModal = new ModalWithSuccess({
            openModalButtonSelector: '.js-call-form-button',
            overlaySelector: '.call-modal-overlay',
            closeModalButtonSelector: '.call-modal-close',
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
            },
            modalBodySelector: '.modal-body',
            successContentSelector: '.modal-success'
        });
        callModal.init();
        if (document.querySelector('.js-order-form-button')) {
            const orderModal = new ModalWithSuccess({
                openModalButtonSelector: '.js-order-form-button',
                overlaySelector: '.order-modal-overlay',
                closeModalButtonSelector: '.order-modal-close',
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
                },
                modalBodySelector: '.modal-body',
                successContentSelector: '.modal-success'
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
            document.addEventListener('showSuccessModal', () => successModal.open());
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
        const sliders = new Sliders();
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
            if (window.document.body.clientWidth < 1080) {
                achievsItems.forEach(item => {
                    item.addEventListener('touchend', () => {
                        mobileText.textContent = item.querySelector('.achievs__item-text').textContent;
                        document.querySelectorAll('.achievs__item_active')
                            .forEach(activeItem => activeItem.classList.remove('achievs__item_active'));
                        if (!item.classList.contains('achievs__item_active')) {
                            item.classList.add('achievs__item_active');
                        }
                    });
                });
            }

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
            document.body.classList.remove('sidebar-show');
            $body.nullifyPadding();
        });
        document.querySelector('.header__burger').addEventListener('click', () => {
            sidebar.classList.remove('sidebar_hidden');
            document.body.classList.add('sidebar-show');
            setBodyPadding();
        });

        maskPhone('.phone-mask')
    }
}
