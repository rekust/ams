const form = document.querySelector("form");

const fields = [
  "username", "father", "mother", "phone",
  "roll", "rank", "adlink", "mlink", "amlink", "bclink", "plink", "rclink"
];

const validateField = (field) => {
  const fieldElement = form.querySelector(`.${field}`);
  const inputElement = fieldElement.querySelector("input");

  if (inputElement.value === "") {
    fieldElement.classList.add("shake", "error");
  }

  inputElement.onkeyup = () => {
    if (inputElement.value === "") {
      fieldElement.classList.add("error");
    } else {
      fieldElement.classList.remove("error");
    }
  };
};

form.onsubmit = (event) => {
  event.preventDefault();

  fields.forEach(validateField);

  if (!fields.some(field => form.querySelector(`.${field}`).classList.contains("error"))) {
    form.submit();
  }
};
