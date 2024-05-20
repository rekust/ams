const form = document.querySelector("form"),
    emailField = form.querySelector(".email"),
    emailInput = emailField.querySelector("input"),
    securityQuestionField = form.querySelector(".security-question"),
    securityQuestionSelect = securityQuestionField.querySelector("select"),
    securityAnswerField = form.querySelector(".security-answer"),
    securityAnswerInput = securityAnswerField.querySelector("input"),
    newPasswordField = form.querySelector(".new-password"),
    newPasswordInput = newPasswordField.querySelector("input");

// Function to get the URL parameter value
function getUrlParameter(name) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(name);
}

// Check for the error parameter in the URL
const errorMessage = getUrlParameter('error');
if (errorMessage) {
    const errorElement = document.createElement('div');
    errorElement.textContent = errorMessage;
    errorElement.classList.add('error-message');
    form.insertAdjacentElement('beforebegin', errorElement);
}

form.onsubmit = (event) => {
    event.preventDefault();
    let isValid = true;

    if (emailInput.value === "") {
        emailField.classList.add("shake", "error");
        isValid = false;
    } else {
        checkEmail();
    }

    if (securityQuestionSelect.value === "") {
        securityQuestionField.classList.add("shake", "error");
        isValid = false;
    }

    if (securityAnswerInput.value === "") {
        securityAnswerField.classList.add("shake", "error");
        isValid = false;
    }

    if (newPasswordInput.value === "") {
        newPasswordField.classList.add("shake", "error");
        isValid = false;
    } else if (newPasswordInput.value.length < 7) {
        let errorTxtPassword = newPasswordField.querySelector(".error-txt");
        errorTxtPassword.innerText = "Password must be at least 7 characters long!";
        newPasswordField.classList.add("shake", "error");
        isValid = false;
    } else if (!isPasswordValid(newPasswordInput.value)) {
        let errorTxtPwd = newPasswordField.querySelector(".error-txt");
        errorTxtPwd.innerText = "Password must contain at least one uppercase letter, one lowercase letter, and a digit";
        newPasswordField.classList.add("shake", "error");
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

securityQuestionSelect.addEventListener('change', () => {
    securityQuestionField.classList.remove("error");
});

securityAnswerInput.addEventListener('keyup', () => {
    securityAnswerField.classList.remove("error");
});

newPasswordInput.addEventListener('keyup', () => {
    if (newPasswordInput.value === "") {
        newPasswordField.classList.add("error");
    } else {
        newPasswordField.classList.remove("error");
    }
});

function checkEmail() {
    let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,4}$/;
    let errorTxtE = emailField.querySelector(".error-txt");

    if (!emailInput.value.match(pattern)) {
        emailInput.value !== "" ? (errorTxtE.innerText = "Enter a valid Email!") : (errorTxtE.innerText = "Email can't be blank!");
        emailField.classList.add("error");
    } else {
        emailField.classList.remove("error");
    }
}

function isPasswordValid(password) {
    let pattern = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).+$/;
    return pattern.test(password);
}