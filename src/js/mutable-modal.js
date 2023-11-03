import {$body, setBodyPadding} from "./helpers";

// export const modalContent = {
//     request: {
//         success: {
//             title: 'Заявка отправлена',
//             text: 'Наши операторы свяжутся с Вами в течение пяти минут и проконсультируют Вас по всем интересующим вопросам'
//         },
//         fail: {
//             title: 'Заявка не отправлена',
//             text: 'Наши операторы свяжутся с Вами в течение пяти минут и исправят ситуацию'
//         },
//     },
//     call: {
//         success: {
//             title: 'Мы получили ваш запрос на звонок',
//             text: 'Наши операторы свяжутся с Вами в течение пяти минут и проконсультируют Вас по всем интересующим вопросам'
//         },
//         fail: {
//             title: 'Мы не смогли получить ваш запрос на звонок',
//             text: 'Наши операторы свяжутся с Вами в течение пяти минут и исправят ситуацию'
//         },
//     },
//     feedback: {
//         success: {
//             title: 'Сообщение доставлено',
//             text: 'Мы получили ваше сообщение, в ближайшее время с вами свяжется наш менеджер'
//         },
//         fail: {
//             title: 'Сообщение не доставлено',
//             text: 'К сожалению, мы не получили ваше сообщение, в ближайшее время с вами свяжется наш менеджер'
//         },
//     },
// }

export class MutableModal {

    constructor() {
        this.state = '';
        this.modalContent = JSON.parse(document.querySelector('input[id="modal-info"]').value);
        document.querySelector('input[id="modal-info"]').remove();
        console.log(this.modalContent)
        this.successModalOverlay = document.querySelector('.js-success-modal-overlay');
        this.successModal = document.querySelector('.js-success-modal');
        this.successTitle = document.querySelector('.js-success-title');
        this.successText = document.querySelector('.js-success-text');
        this.successClose = document.querySelectorAll('.js-success-close');
        this.feedbackClose = document.querySelectorAll('.js-feedback-close')
        this.feedbackModalOverlay = document.querySelector('.js-new-feedback-modal-overlay');
        this.feedbackModal = document.querySelector('.js-new-feedback-modal-2');
        if (!this.successTitle) return;
        this.init();
    }

    init() {
        const hideSuccessModal = () => {
            this.successModalOverlay.classList.remove('new-modal-show');
            this.successModal.classList.remove('new-modal-show');
            this.successTitle.classList.remove('success-title-fail');
            $body.nullifyPadding();
            $body.showOverflow();
        }
        const showSuccessModal = () => {
            this.successModalOverlay.classList.add('new-modal-show');
            this.successModal.classList.add('new-modal-show');
        }
        document.querySelectorAll('.js-set-state-feedback').forEach(button => {
            button.addEventListener('click', () => {
                this.state = 'feedback';
                this.successTitle.innerHTML = this.modalContent.feedback.success.title;
                this.successText.innerHTML = this.modalContent.feedback.success.text;
                this.feedbackModal.classList.add('new-modal-show');
                this.feedbackModalOverlay.classList.add('new-modal-show');
                $body.hideOverflow();
                setBodyPadding();
            })
        });
        document.querySelectorAll('.js-set-state-request').forEach(button => {
            button.addEventListener('click', () => {
                this.state = 'request';
                this.successTitle.innerHTML = this.modalContent.request.success.title;
                this.successText.innerHTML = this.modalContent.request.success.text;
            })
        });
        document.querySelectorAll('.js-set-state-call').forEach(button => {
            button.addEventListener('click', () => {
                this.state = 'call';
                this.successTitle.innerHTML = this.modalContent.call.success.title;
                this.successText.innerHTML = this.modalContent.call.success.text;
            })
        });

        this.successClose.forEach(button => button.addEventListener('click', () => hideSuccessModal()));

        const fbClose = () => {
            this.feedbackModal.classList.remove('new-modal-show');
            this.feedbackModalOverlay.classList.remove('new-modal-show');
            $body.nullifyPadding();
            $body.showOverflow();
        }

        this.feedbackClose.forEach(button => button.addEventListener('click', () => fbClose()));

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                hideSuccessModal();
                fbClose();
            }
        });

        this.successModalOverlay.addEventListener('click', () => hideSuccessModal());

        this.feedbackModalOverlay.addEventListener('click', () => fbClose());

        document.addEventListener('hideFeedbackModal', () => fbClose())

        document.addEventListener('newFail', () => {
            this.successTitle.classList.add('success-title-fail');
            showSuccessModal()
            this.successTitle.innerHTML = this.modalContent[this.state].fail.title;
            this.successText.innerHTML = this.modalContent[this.state].fail.text;
        })

        document.addEventListener('newSuccessSubmit', () => {
            showSuccessModal()
            $body.hideOverflow();
            setBodyPadding();
        })
    }
}