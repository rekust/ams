const form = document.querySelector("form"),
usernameField = form.querySelector(".username"),
usernameInput = usernameField.querySelector("input"),
emailField = form.querySelector(".email"),
emailInput = emailField.querySelector("input"),
passwordField = form.querySelector(".password"),
passwordInput = passwordField.querySelector("input"),
confirmPasswordField = form.querySelector(".confirm-password"),
confirmPasswordInput = confirmPasswordField.querySelector("input");

form.onsubmit = (event) => {
	event.preventDefault();

	if (usernameInput.value == "") {
		usernameField.classList.add("shake", "error");
	}

	if (emailInput.value == "") {
		emailField.classList.add("shake", "error");
	} else {
		checkEmail();
	}

	if (passwordInput.value == "") {
		passwordField.classList.add("shake", "error");
	} else if (passwordInput.value.length < 7) {
		let errorTxtPassword = passwordField.querySelector(".error-txt");
		errorTxtPassword.innerText = "Password must be at least 7 characters long!";
		passwordField.classList.add("shake", "error");
	} else if (!isPasswordValid(passwordInput.value)) {
		let errorTxtPwd = passwordField.querySelector(".error-txt");
		errorTxtPwd.innerText = "Password must contain atleast one uppercase letter, one lowercase letter and a digit";
		passwordField.classList.add("shake", "error");
	}
	

	if (confirmPasswordInput.value == "") {
		let errorTxtCP = confirmPasswordField.querySelector(".error-txt");
		errorTxtCP.innerText = "Password can't be blank!";
		confirmPasswordField.classList.add("shake", "error");
	} else if (passwordInput.value != confirmPasswordInput.value) {
		let errorTxtCP= confirmPasswordField.querySelector(".error-txt");
		errorTxtCP.innerText = "Passwords don't Match!";
		confirmPasswordField.classList.add("shake", "error");
	}

	// setTimeout(() => {
	// 	usernameField.classList.remove("shake", "error");
	// 	emailField.classList.remove("shake", "error");
	// 	passwordField.classList.remove("shake", "error");
	// 	confirmPasswordField.classList.remove("shake", "error");
	// }, 1000);

	usernameInput.onkeyup = () => {
		if (usernameInput.value == "") {
			usernameField.classList.add("error");
		} else {
			usernameField.classList.remove("error");
		}
	};

	emailInput.onkeyup = () => {
		checkEmail();
	};

	function checkEmail() {
		let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,4}$/;
		if (!emailInput.value.match(pattern)) {
			let errorTxtE = emailField.querySelector(".error-txt");
			emailInput.value != ""
			? (errorTxtE.innerText = "Enter a valid Email!")
			: (errorTxtE.innerText = "Email can't be blank!");
			emailField.classList.add("error");
		} else {
			emailField.classList.remove("error");
		}
	}
  
	function isPasswordValid(password) {
		// Minimum one uppercase, one lowercase, and one digit
		let pattern = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).+$/;
		return pattern.test(password);
  	}

	passwordInput.onkeyup = () => {
		if (passwordInput.value == "") {
			passwordField.classList.add("error");
		} else {
			passwordField.classList.remove("error");
		}
	};

	confirmPasswordInput.onkeyup = () => {
		if (passwordInput.value != confirmPasswordInput.value) {
			let errorTxtCP = confirmPasswordField.querySelector(".error-txt");
			errorTxtCP.innerText = "Passwords don't Match!";
			confirmPasswordField.classList.add("error");
		} else {
			let errorTxtCP = confirmPasswordField.querySelector(".error-txt");
			errorTxtCP.innerText = "";
			confirmPasswordField.classList.remove("error");
		}
	};

	if (
		!usernameField.classList.contains("error") &&
		!emailField.classList.contains("error") &&
		!passwordField.classList.contains("error") &&
		!confirmPasswordField.classList.contains("error")
	) {
		form.submit();
	}
};
