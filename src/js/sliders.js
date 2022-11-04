import Swiper from "swiper";

export class Sliders {
    constructor() {
        this.initMainPageSliders();
        this.initModalSliders();
        this.initAboutSlider();
        this.initProjectSliders();
    }

    initMainPageSliders() {

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
                containerElem.querySelectorAll('.feedback-slider iframe').forEach(iframe => {
                    // const video_tag = iframe.contentWindow.document.querySelector('video');
                    // console.log('videoStop', video_tag);
                    // setTimeout(() => {
                    //     video_tag.pause();
                    //     video_tag.currentTime = 0;
                    // });
                    console.log('src', iframe.src);
                    iframe.src = iframe.src;
                });
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

    }

    initAboutSlider() {
        // Слайдер на "О компании"
        if (document.querySelector('.employers-slider')) {
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

    }

    initModalSliders() {
        if (document.querySelector('.slider-modal')) {
            const modalSlider = new Swiper('.modal-slider', {
                navigation: {
                    prevEl: '.slider-modal-arrow_prev',
                    nextEl: '.slider-modal-arrow_next'
                },
                spaceBetween: 20
            });
        }
    }

    initProjectSliders() {

        const projectSliders = document.querySelectorAll('.projects-slider');
        if (projectSliders.length > 0) {
            projectSliders.forEach(slider => {
                const projectSlider = new Swiper(slider, {
                    spaceBetween: 20,
                    navigation: {
                        prevEl: slider.parentNode.querySelector('.projects-slider-arrow_prev'),
                        nextEl: slider.parentNode.querySelector('.projects-slider-arrow_next')
                    }
                })
            })
        }
    }
}
