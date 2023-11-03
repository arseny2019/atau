//Фиксим обёртки у Contact Form 7
const inputs = document.querySelectorAll('input[name="text-200"], input[name="text-201"], input[name="text-202"], input[name="text-203"], ' +
    'input[name="text-204"], input[name="text-205"], ' +
    'input[name="email-744"], textarea[name="textarea-799"], input[name="email-745"], textarea[name="textarea-800"],' +
    ' input[name="text-883"], input[name="email-243"], input[name="text-861"], input[name="tel-606"], input[name="tel-784"], textarea[name="textarea-38"]');
const privacy = document.querySelectorAll('input[name="acceptance-572"], input[name="acceptance-573"], input[name="acceptance-574"], input[name="acceptance-575"]');
const feedbackSubmit = document.querySelector('.js-new-feedback-submit');
const orderCallSubmit = document.querySelector('.js-new-order-call-submit');
const sendRequestSubmit = document.querySelector('.js-new-send-request-submit ');

inputs.forEach(node => {
    node.parentNode.replaceWith(node);
});
for (let i = 0; i < 3; i++) {
    privacy.forEach(node => {
        node.parentNode.replaceWith(node);
    });
}

privacy.forEach(checkbox =>
    checkbox.addEventListener('change', () => checkbox.classList.remove('error')))

//Валидация CF7
document.querySelectorAll('.text-input, .js-feedback-input').forEach(input => {
    input.addEventListener('focus', () => {
        input.classList.remove('error');
    })
});
document.addEventListener('wpcf7invalid', (e) => {
    const fields = e.detail.apiResponse.invalid_fields;
    console.log('fields', fields);
    fields.forEach(invalidField => {
        const field = document.querySelector(`[name="${invalidField.field}"]`);
        field.classList.add('error');
    })
});

//Успешная отправка CF7
document.addEventListener('wpcf7mailsent', e => {
    const form = e.target.parentNode.parentNode.parentNode;
    console.log(form);
    if (form.classList.contains('js-new-feedback-modal') || form.querySelector('.js-new-feedback-modal')) {
        document.dispatchEvent(new CustomEvent('hideFeedbackModal'));
        document.dispatchEvent(new CustomEvent('newSuccessSubmit'));
    } else {
        form.dispatchEvent(new CustomEvent('successSubmit'));
    }
});

document.addEventListener('wpcf7mailfailed', e => {
    const form = e.target.parentNode.parentNode.parentNode;
    if (form.classList.contains('js-new-feedback-modal')) {
        document.dispatchEvent(new CustomEvent('hideFeedbackModal'));
        document.dispatchEvent(new CustomEvent('newFail'));
    } else {
        form.dispatchEvent(new CustomEvent('successSubmit'));
    }
});

if (feedbackSubmit) {
    feedbackSubmit.addEventListener('click', () => {
        setTimeout(() => {
            feedbackSubmit.setAttribute('disabled', '');
            setTimeout(() => feedbackSubmit.removeAttribute('disabled'), 1500);
        })
    })
}

if (orderCallSubmit) {
    orderCallSubmit.addEventListener('click', () => {
        setTimeout(() => {
            orderCallSubmit.setAttribute('disabled', '');
            setTimeout(() => orderCallSubmit.removeAttribute('disabled'), 1500);
        })
    })
}

if (sendRequestSubmit) {
    sendRequestSubmit.addEventListener('click', () => {
        setTimeout(() => {
            sendRequestSubmit.setAttribute('disabled', '');
            setTimeout(() => sendRequestSubmit.removeAttribute('disabled'), 1500);
        })
    })
}

//Успешная отправка CF7
document.addEventListener('wpcf7submit', e => {
    console.log('wpcf7submit')
    const acceptance = document.querySelector('input[name="acceptance-575"]');
    if (!acceptance.checked) {
        acceptance.classList.add('error')
    }
});
