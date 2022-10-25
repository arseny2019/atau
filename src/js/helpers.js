import $ from 'jquery';

export function setBodyPadding() {
    const scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;
    console.log('body padding', scrollbarWidth);
    if (window.innerWidth !== document.documentElement.clientWidth && isDesktop()) {
        $body.css('padding-right', scrollbarWidth);
    }
}

export const isDesktop = () => window.outerWidth > 1023;

class Body {
    constructor() {
        this.$ = $('body');
    }

    hideOverflow() {
        this.$.css('overflow', 'hidden');
    }

    showOverflow() {
        this.$.css('overflow', 'auto');
    }

    nullifyPadding() {
        this.$.css('padding-right', '0');
    }

    css(...args) {
        return this.$.css(...args);
    }
}

export const $body = new Body();
