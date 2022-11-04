import Swiper from "swiper";

export class Fetcher {

    constructor() {
        this.initEquipmentFetch();
        this.initProjectsFetch();
        this.initBlogFetch();
    }

    initEquipmentFetch() {
        const moreButton = document.querySelector('.category__more.js-more-button');

        if (moreButton) {
            const taxonomy = moreButton.getAttribute('data-taxonomy');
            const term = moreButton.getAttribute('data-term');
            moreButton.addEventListener('click', () => {
                const offset = moreButton.getAttribute('data-offset');
                console.log('offset', offset);
                this.request('load_equipment', {
                    offset,
                    taxonomy,
                    term
                }).then(response => {
                    console.log('response', response);
                    const grid = document.querySelector('.category__grid');
                    moreButton.setAttribute('data-offset', response.newOffset);
                    if (!response.hasMore) {
                        moreButton.parentNode.removeChild(moreButton);
                    }
                    let html = '';
                    response.posts.forEach(post => {
                        html += `<div class="category__item">
                           <img class="category__item-image" src="${post.post_thumbnail}"/>
                           <div class="category__item-title">${post.post_title}</div>
                           <div class="category__item-text">${post.post_content}</div>
                           <a class="category__item-link" href="${post.guid}">Подробнее</a>
                        </div>`
                    });
                    grid.innerHTML += html;
                });
            });
        }
    }

    initProjectsFetch() {
        const moreButton = document.querySelector('.projects__more.js-more-button');

        if (moreButton) {
            moreButton.addEventListener('click', () => {
                const offset = moreButton.getAttribute('data-offset');
                console.log('offset', offset);
                this.request('load_projects', {
                    offset
                }).then(response => {
                    console.log('response', response);
                    const grid = document.querySelector('.projects__grid');
                    moreButton.setAttribute('data-offset', response.newOffset);
                    if (!response.hasMore) {
                        moreButton.parentNode.removeChild(moreButton);
                    }
                    response.posts.forEach(post => {
                        const itemContent = `<div class="projects-slider-container">
                                <div class="swiper projects-slider">
                                    <div class="swiper-wrapper">
                                        ${post.slides.map(imageUrl => {
                                            return '<div class="swiper-slide projects-slider__slide"><img class="projects-slider__image" src="' +
                                                imageUrl + '"/></div>';}).join('')}
                                    </div>
                                </div>
                                <div class="projects-slider-arrows">
                                    <div class="projects-slider-arrow projects-slider-arrow_prev">
                                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="30" cy="30" r="30" transform="rotate(-180 30 30)"
                                                    fill="currentColor"></circle>
                                            <path d="M40 30L24 44L34 30L24 16L40 30Z" fill="white"></path>
                                        </svg>
                                    </div>
                                    <div class="projects-slider-arrow projects-slider-arrow_next">
                                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="30" cy="30" r="30" transform="rotate(-180 30 30)"
                                                    fill="currentColor"></circle>
                                            <path d="M40 30L24 44L34 30L24 16L40 30Z" fill="white"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="projects__item-content">
                                <div><p class="projects__item-title">${post.post_title}</p>
                                    <div class="projects__item-text">${post.post_content}</div>
                                </div>
                                <p class="projects__item-date">${post.date}</p>
                            </div>`;
                        const item = document.createElement('DIV');
                        item.classList.add('projects__item');
                        item.innerHTML = itemContent;
                        const slider = item.querySelector('.projects-slider');
                        const projectSlider = new Swiper(slider, {
                            spaceBetween: 20,
                            navigation: {
                                prevEl: slider.parentNode.querySelector('.projects-slider-arrow_prev'),
                                nextEl: slider.parentNode.querySelector('.projects-slider-arrow_next')
                            }
                        });
                        grid.append(item);
                    })
                });
            });
        }
    }

    initBlogFetch() {
        const moreButton = document.querySelector('.blog__more.js-more-button');

        if (moreButton) {
            moreButton.addEventListener('click', () => {
                const offset = moreButton.getAttribute('data-offset');
                console.log('offset', offset);
                this.request('load_blog', {
                    offset
                }).then(response => {
                    console.log('response', response);
                    const grid = document.querySelector('.blog__grid');
                    moreButton.setAttribute('data-offset', response.newOffset);
                    if (!response.hasMore) {
                        moreButton.parentNode.removeChild(moreButton);
                    }
                    response.posts.forEach(post => {
                        grid.innerHTML += ` <div class="blog__item">
                            <img class="blog__item-image"
                                 src="${post.post_thumbnail}"/>
                            <div class="blog__item-title">${post.post_title}</div>
                            <div class="blog__item-text">
                                ${post.post_content}
                            </div>
                            <a class="blog__item-link"
                               href="${post.guid}"><span>Читать полностью</span><span>Подробнее</span></a>
                        </div>`
                    })
                });
            });
        }
    }

    request(action, body) {
        let formData = new FormData();
        formData.append('action', action);
        formData.append('offset', body.offset);

        switch (action) {
            case 'load_equipment':
                formData.append('taxonomy', body.taxonomy);
                formData.append('term', body.term);
        }
        formData.append('nonce', additionajax.nonce);

        return fetch(additionajax.url, {
            method: 'POST',
            body: formData
        })
            .then(r => r.json())
            .catch(err => {
                console.log(err)
            })
    }
}
