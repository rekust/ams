const form = document.querySelector("form"),
emailField = form.querySelector(".email"),
emailInput = emailField.querySelector("input"),
passwordField = form.querySelector(".password"),
passwordInput = passwordField.querySelector("input");

form.onsubmit = (event) => {
	event.preventDefault();

	if (emailInput.value == "") {
		emailField.classList.add("shake", "error");
	} else {
		checkEmail();
	}

	if (passwordInput.value == "") {
		passwordField.classList.add("shake", "error");
	}

	emailInput.onkeyup = () => {
		if (emailInput.value != "") {
			emailField.classList.remove("error");
		}
	};

	passwordInput.onkeyup = () => {
		if (passwordInput.value != "") {
			passwordField.classList.remove("error");
		}
	};

	// setTimeout(() => {
	// 	emailField.classList.remove("shake", "error");
	// 	passwordField.classList.remove("shake", "error");
	// }, 1000);

	emailInput.onkeyup = () => {
		checkEmail();
	};

	function checkEmail() {
		let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,4}$/;
		if (!emailInput.value.match(pattern)) {
			let errorTxt = emailField.querySelector(".error-txt");
			emailInput.value != ""
					? (errorTxt.innerText = "Enter a valid Email!")
					: (errorTxt.innerText = "Email can't be blank!");
			emailField.classList.add("error");
		} else {
			emailField.classList.remove("error");
		}
	}

	passwordInput.onkeyup = () => {
		if (passwordInput.value == "") {
			passwordField.classList.add("error");
		} else {
			passwordField.classList.remove("error");
		}
	};

	if (!emailField.classList.contains("error") && !passwordField.classList.contains("error")) {
		form.submit();
	}
};
