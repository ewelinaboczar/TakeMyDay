const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="email"]');
const confirmedPasswordInput = form.querySelector('input[name="confirm_password"]');

function submit() {
    document.getElementById("submit").submit();
}

function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

function arePasswordsSame(password, confirmedPassword) {
    return password === confirmedPassword;
}

function markValidation(elem, condition) {
    !condition ? elem.classList.add('no-valid') : elem.classList.remove('no-valid');
}

function emailValidation() {
    setTimeout(function () {
            console.log("emailValidate");
            markValidation(emailInput, isEmail(emailInput.value));
        },
        1000
    );
}

function passwordValidation() {
    setTimeout(function () {
            const condition = arePasswordsSame(
                confirmedPasswordInput.previousElementSibling.value,
                confirmedPasswordInput.value
            );
            markValidation(confirmedPasswordInput, condition);
        },
        1000
    );
}

emailInput.addEventListener('keyup', emailValidation);
confirmedPasswordInput.addEventListener('keyup', passwordValidation);