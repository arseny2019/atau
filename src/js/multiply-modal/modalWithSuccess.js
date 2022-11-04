import {Modal} from "./modal";

export class ModalWithSuccess extends Modal {

    constructor(options) {
        super(options);
        if (this.modalOverlay) {
            this.successContent = this.modalOverlay.querySelector(options.successContentSelector);
            this.modalBody = this.modalOverlay.querySelector(options.modalBodySelector);
        }
    }

    init() {
        super.init();
        this.hideSuccess();
        if (this.modal) {
            this.modal.addEventListener('successSubmit', () => this.showSuccess());
        }
    }

    hideSuccess() {
        if (this.modalBody) {
            this.successContent.style.display = 'none';
            this.modalBody.style.display = 'block';
        }
    }

    showSuccess() {
        if (this.modalBody) {
            this.successContent.style.display = 'block';
            this.modalBody.style.display = 'none';
        }
    }

    close() {
        super.close();
        this.hideSuccess();
    }
}
