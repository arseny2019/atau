export class Modal {
    constructor(options) {
        this.options = options;
        this.modalOverlay = document.querySelector(this.options.overlaySelector);
        this.modal = document.querySelector(options.modalSelector);
        this.openModalButton = document.querySelectorAll(options.openModalButtonSelector);
        this.closeModalButton = document.querySelectorAll(options.closeModalButtonSelector);
    }

    init() {
        this.modal.addEventListener('click', e => {
            e.stopPropagation();
        });

        if (this.openModalButton.length > 1) {
            this.openModalButton.forEach(button => {
                button.addEventListener('click', () => {
                    this.open();
                });
            });
        } else {
            if (this.openModalButton[0]) {
                this.openModalButton[0].addEventListener('click', () => {
                    this.open();
                });
            }
        }

        if (this.closeModalButton.length > 1) {
            this.closeModalButton.forEach(button => {
                button.addEventListener('click', (e) => {
                    e.stopPropagation();
                    this.close();
                });
            });
        } else {
            if (this.closeModalButton[0]) {
                this.closeModalButton[0].addEventListener('click', (e) => {
                    e.stopPropagation();
                    this.close();
                });
            }
        }

        this.modalOverlay.addEventListener('click', e => {
            e.stopPropagation();
            this.close();
        });
    }

    open() {
        console.log('open')
        if (this.options.openCallback) {
            this.options.openCallback(this.modalOverlay, this.modal);
        }
    }

    close() {
        console.log('close')
        if (this.options.closeCallback) {
            this.options.closeCallback(this.modalOverlay, this.modal);
        }
    }
}
