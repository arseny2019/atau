//Фиксим обёртки у Contact Form 7
const inputs = document.querySelectorAll('input[name="text-200"], input[name="text-201"], input[name="text-202"], input[name="text-203"], ' +
    'input[name="text-204"], input[name="text-205"], ' +
    'input[name="email-744"], textarea[name="textarea-799"], input[name="email-745"], textarea[name="textarea-800"]');
const privacy = document.querySelectorAll('input[name="acceptance-572"], input[name="acceptance-573"], input[name="acceptance-574"]');

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
document.querySelectorAll('.text-input').forEach(input => {
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
    form.dispatchEvent(new CustomEvent('successSubmit'));
});
