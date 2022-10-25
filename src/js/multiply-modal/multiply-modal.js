import {Modal} from "./modal";

export class MultiplyModal extends Modal {

    constructor(options, container, openModalButton, callback) {
        super(options);
        if (container.classList.contains(this.options.overlaySelector)) {
            this.modalOverlay = container;
        } else {
            this.modalOverlay = container.querySelector(this.options.overlaySelector);
        }
        this.openModalButton = openModalButton;
        this.modal = container.querySelector(options.modalSelector);
        this.closeModalButton = container.querySelector(options.closeModalButtonSelector);
        this.callback = callback;
    }

    init() {
        super.init();
    }

    submit() {
        this.close();
        this.callback();
    }
}
