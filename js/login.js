const form = document.querySelector("form"),
    emailField = form.querySelector(".email"),
    emailInput = emailField.querySelector("input"),
    passwordField = form.querySelector(".password"),
    passwordInput = passwordField.querySelector("input"),
    emailErrorTxt = emailField.querySelector(".error-txt"),
    passwordErrorTxt = passwordField.querySelector(".error-txt");

// Function to get the URL parameter value
function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(window.location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}

// Check for the error parameter in the URL
const errorMessage = getUrlParameter('error');
if (errorMessage) {
    emailErrorTxt.innerText = errorMessage;
    passwordErrorTxt.innerText = errorMessage;
}

form.addEventListener("submit", (event) => {
    event.preventDefault();
    let isValid = true;

    if (emailInput.value.trim() === "") {
        emailErrorTxt.innerText = "Email can't be blank!";
        emailField.classList.add("shake", "error");
        isValid = false;
    } else {
        checkEmail();
    }

    if (passwordInput.value.trim() === "") {
        passwordErrorTxt.innerText = "Password can't be blank!";
        passwordField.classList.add("shake", "error");
        isValid = false;
    }

    if (isValid) {
        form.submit();
    }
});

emailInput.addEventListener("input", () => {
    emailErrorTxt.innerText = "";
    emailField.classList.remove("error");
    checkEmail();
});

passwordInput.addEventListener("input", () => {
    passwordErrorTxt.innerText = "";
    passwordField.classList.remove("error");
});

function checkEmail() {
    let pattern = /^\S+@\S+\.\S+$/;
    if (!emailInput.value.match(pattern)) {
        emailErrorTxt.innerText = "Enter a valid Email!";
        emailField.classList.add("error");
    } else {
        emailField.classList.remove("error");
    }
}