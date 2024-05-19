const form = document.querySelector("form"),
    emailField = form.querySelector(".email"),
    emailInput = emailField.querySelector("input"),
    passwordField = form.querySelector(".password"),
    passwordInput = passwordField.querySelector("input"),
    confirmPasswordField = form.querySelector(".confirm-password"),
    confirmPasswordInput = confirmPasswordField.querySelector("input"),
    securityQuestionField = form.querySelector(".security-question"),
    securityQuestionInput = securityQuestionField.querySelector("select"),
    securityAnswerField = form.querySelector(".security-answer"),
    securityAnswerInput = securityAnswerField.querySelector("input");

form.onsubmit = (event) => {
    event.preventDefault();

    let isValid = true;

    if (emailInput.value === "") {
        emailField.classList.add("shake", "error");
        isValid = false;
    } else {
        checkEmail();
    }

    if (passwordInput.value === "") {
        passwordField.classList.add("shake", "error");
        isValid = false;
    } else if (passwordInput.value.length < 7) {
        let errorTxtPassword = passwordField.querySelector(".error-txt");
        errorTxtPassword.innerText = "Password must be at least 7 characters long!";
        passwordField.classList.add("shake", "error");
        isValid = false;
    } else if (!isPasswordValid(passwordInput.value)) {
        let errorTxtPwd = passwordField.querySelector(".error-txt");
        errorTxtPwd.innerText = "Password must contain at least one uppercase letter, one lowercase letter, and a digit";
        passwordField.classList.add("shake", "error");
        isValid = false;
    }

    if (confirmPasswordInput.value === "") {
        let errorTxtCP = confirmPasswordField.querySelector(".error-txt");
        errorTxtCP.innerText = "Password can't be blank!";
        confirmPasswordField.classList.add("shake", "error");
        isValid = false;
    } else if (passwordInput.value !== confirmPasswordInput.value) {
        let errorTxtCP = confirmPasswordField.querySelector(".error-txt");
        errorTxtCP.innerText = "Passwords don't match!";
        confirmPasswordField.classList.add("shake", "error");
        isValid = false;
    }

    if (securityQuestionInput.value === "") {
        securityQuestionField.classList.add("shake", "error");
        isValid = false;
    }

    if (securityAnswerInput.value === "") {
        securityAnswerField.classList.add("shake", "error");
        isValid = false;
    }

    if (isValid) {
        form.submit();
    }
};

emailInput.addEventListener('keyup', () => {
    checkEmail();
    emailField.classList.remove("error");
});

passwordInput.addEventListener('keyup', () => {
    if (passwordInput.value === "") {
        passwordField.classList.add("error");
    } else {
        passwordField.classList.remove("error");
    }
});

confirmPasswordInput.addEventListener('keyup', () => {
    if (passwordInput.value !== confirmPasswordInput.value) {
        let errorTxtCP = confirmPasswordField.querySelector(".error-txt");
        errorTxtCP.innerText = "Passwords don't Match!";
        confirmPasswordField.classList.add("error");
    } else {
        confirmPasswordField.classList.remove("error");
    }
});

securityAnswerInput.addEventListener('keyup', () => {
    securityAnswerField.classList.remove("error");
});

function checkEmail() {
    let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,4}$/;
    let errorTxtE = emailField.querySelector(".error-txt");
    if (!emailInput.value.match(pattern)) {
        emailInput.value !== ""
            ? (errorTxtE.innerText = "Enter a valid Email!")
            : (errorTxtE.innerText = "Email can't be blank!");
        emailField.classList.add("error");
    } else {
        emailField.classList.remove("error");
    }
}

function isPasswordValid(password) {
    let pattern = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).+$/;
    return pattern.test(password);
}
