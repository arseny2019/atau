import Swiper from "swiper";

export class Banner {

    constructor() {
        if (window.innerWidth <= 768) {
            console.log('mobile')
            const slider = new Swiper(".js-banner-mobile", {
                autoHeight: true,
            })
            const pagination = document.querySelector('.js-banner-mobile-pagination');
            if (slider.slides.length > 1) {
                for (let i = 0; i < slider.slides.length; i++) {
                    const bullet = document.createElement('SPAN');
                    bullet.setAttribute('data-index', i + '');
                    if (i === 0) {
                        bullet.classList.add('banner-mobile__pagination-bullet-active')
                    }
                    bullet.classList.add('banner-mobile__pagination-bullet')
                    bullet.addEventListener('click', () => {
                        if (i === slider.activeIndex) return;
                        document.querySelector('.banner-mobile__pagination-bullet-active')
                            .classList.remove('banner-mobile__pagination-bullet-active')
                        console.log('click')
                        bullet.classList.add('banner-mobile__pagination-bullet-active');
                        slider.slideTo(+bullet.getAttribute('data-index'));
                    });
                    pagination.append(bullet);
                }
            }

            slider.on('slideChange', (e) => {
                console.log('slidechange', e.activeIndex)
                document.querySelector('.banner-mobile__pagination-bullet-active')
                    .classList.remove('banner-mobile__pagination-bullet-active')
                document.querySelector(`[data-index="${e.activeIndex}"].banner-mobile__pagination-bullet`)
                    .classList.add('banner-mobile__pagination-bullet-active');
            })
            console.log('slider', slider)
            slider.init();
            return;
        }

        this.container = document.querySelector('.js-banner-container');
        if (!this.container) return;
        this.slides = this.container.children;
        this.slidesLength = this.slides.length;
        this.currentSlide = this.slides[0];
        this.currentIndex = +this.currentSlide.getAttribute('data-index');
        this.nextButton = document.querySelector('.js-banner-next');
        this.prevButton = document.querySelector('.js-banner-prev');
        this.prevButton.classList.add('arrow-disabled')
        this.nextButton.addEventListener('click', this.next.bind(this));
        this.prevButton.addEventListener('click', this.prev.bind(this));
        this.updateBannerHeight();
        console.log('slides', this.slides)
        this.canChangeSlide = true;
    }

    next() {
        if (this.currentIndex + 1 === this.slidesLength || !this.canChangeSlide) return;
        console.log('NEXT')
        this.currentSlide.classList.remove('banner__slide_active');
        this.currentIndex++;
        this.currentSlide = this.slides[this.currentIndex];
        this.canChangeSlide = false;

        if (this.currentIndex + 1 === this.slidesLength) {
            this.nextButton.classList.add('arrow-disabled');
        }

        this.prevButton.classList.remove('arrow-disabled')

        setTimeout(() => {
            this.currentSlide.classList.add('banner__slide_active');
            this.updateBannerHeight()
            setTimeout(() => this.canChangeSlide = true, 500)
        }, 500)
    }

    prev() {
        if (this.currentIndex === 0 || !this.canChangeSlide) return;
        console.log('PREV')
        this.currentSlide.classList.remove('banner__slide_active');
        this.currentIndex--;
        this.currentSlide = this.slides[this.currentIndex];
        this.canChangeSlide = false;
        this.nextButton.classList.remove('arrow-disabled');

        if (this.currentIndex === 0) {
            this.prevButton.classList.add('arrow-disabled')
        }

        setTimeout(() => {
            this.currentSlide.classList.add('banner__slide_active');
            this.updateBannerHeight()
            setTimeout(() => this.canChangeSlide = true, 500)
        }, 500)
    }

    updateBannerHeight() {
        console.log('with style:', this.container.getBoundingClientRect().height);
        this.container.removeAttribute('style');
        const containerHeight = this.container.getBoundingClientRect().height;
        if (containerHeight >= this.currentSlide.getBoundingClientRect().height) return;
        this.container.setAttribute('style', 'height: ' + (this.currentSlide.getBoundingClientRect().height))
    }

}