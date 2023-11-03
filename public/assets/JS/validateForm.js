// Validation functions

// Function to validate input length
function validateLength(input, min, max) {
  const regex = new RegExp(`^.{${min},${max}}$`);
  return regex.test(input.value);
}

// Function to validate if input contains only numbers or is empty
function validateIntegerOrEmpty(input) {
  const regex = /^\d+$/;
  return input.value === "" || regex.test(input.value);
}

//Function to valdate if input format is correct for phone number
function validatePhoneFormat(input) {
  const regex = /^\+?\d{10,20}$/;
  return regex.test(input.value);} 

// Function to validate if input contains only numbers and has exactly 4 digits or is empty
function validateYear(input) {
  const regex = /^\d{4}$/;
  return input.value === "" || regex.test(input.value);
}

// Function to validate email format
function validateEmail(input) {
  const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return regex.test(input.value);
}


//Fuction to validate if input contains only letters and authorized characters
function validateLetters(input) {
  const regex = /^[a-zA-ZÀ-ÿ\s\-']+$/ 
  return regex.test(input.value);
}

// Function to ensure min is less than max for two inputs
function validateMinMax(minInput, maxInput) {
  if (!minInput.value && !maxInput.value) return true; // Both empty is okay
  if (minInput.value && !maxInput.value) return true; // Only min value is okay
  if (!minInput.value && maxInput.value) return true; // Only max value is okay
  return Number(minInput.value) <= Number(maxInput.value);
}

// Update error message
function setErrorMessage(input, message) {
  input.nextElementSibling.innerHTML = message;
}

// Function to validate form fields
function validateFields(input) {
  let isValid = true;
  let fieldName = input.name;

  // Validation for the fields yearMin and yearMax
  if (fieldName === "yearMin" || fieldName === "yearMax") {
    if (!validateYear(input)) {
      setErrorMessage(input, "Année invalide.");
      isValid = false;
    } else if (
      !validateMinMax(
        document.getElementById("yearMin"),
        document.getElementById("yearMax")
      )
    ) {
      setErrorMessage(input, "Min > Max!");
      isValid = false;
    } else {
      isValid = true;
    }
  }

  // Validation for the fields kmMin and kmMax
  if (fieldName === "kmMin" || fieldName === "kmMax") {
    if (!validateIntegerOrEmpty(input)) {
      setErrorMessage(input, "Km invalide.");
      isValid = false;
    } else if (
      !validateMinMax(
        document.getElementById("kmMin"),
        document.getElementById("kmMax")
      )
    ) {
      setErrorMessage(input, "Min > Max!");
      isValid = false;
    } else {
      isValid = true;
    }
  }

  // Validation for the fields priceMin and priceMax
  if (fieldName === "priceMin" || fieldName === "priceMax") {
    if (!validateIntegerOrEmpty(input)) {
      setErrorMessage(input, "Prix invalide.");
      isValid = false;
    } else if (
      !validateMinMax(
        document.getElementById("priceMin"),
        document.getElementById("priceMax")
      )
    ) {
      setErrorMessage(input, "Min > Max!");
      isValid = false;
    } else {
      isValid = true;
    }
  }

  // Validation for the fields contact[lastname] ,contact[firstname], testimony[lastname] and testimony[firstname]
  if (fieldName === "contact[lastname]" || fieldName === "contact[firstname]" || fieldName === "testimony[lastname]" || fieldName === "testimony[firstname]") {
    if (!validateLength(input, 1 , 50)) {
      setErrorMessage(input, "Doit contenir entre 1 et 50 caractères.");
      isValid = false;
    } else if (!validateLetters(input)) {
      setErrorMessage(input, "Utilisez lettres, espaces, tirets (-) et apostrophes (').");
      isValid = false;
    } 
    else {
      isValid = true;
    }
  }

  // Validation for the fields contact[phoneNumber]
  if(fieldName === "contact[phoneNumber]") { 
    if (!validatePhoneFormat(input)) {
      setErrorMessage(input, "Seuls les chiffres et le signe + sont autorisés entre 10 et 20 caractères.");
      isValid = false;
    } 
    else {
      isValid = true;
    }
  }

  // Validation for the fields contact[email]
  if (fieldName === "contact[email]") {
    if (!validateEmail(input)) {
      setErrorMessage(input, "Format invalide.");
      isValid = false;
    } else {
      isValid = true;
    }
  }

  //Validation for the field contact[subject]
  if (fieldName === "contact[subject]") {
    if (!validateLength(input, 1, 200)) {
      setErrorMessage(input, "Doit contenir entre 1 et 200 caractères.");
      isValid = false;
    } else {
      isValid = true;
    }
  }

  //Validation for the field contact[message], testimony[message]
  if (fieldName === "contact[message]" || fieldName === "testimony[message]") {
    if (!validateLength(input, 1, 5000)) {
      setErrorMessage(input, "Doit contenir entre 1 et 5000 caractères.");
      isValid = false;
    } else {
      isValid = true;
    }
  }

  // Apply Bootstrap validation classes
  if (isValid) {
    input.classList.remove("is-invalid");
    input.classList.add("is-valid");
  } else {
    input.classList.remove("is-valid");
    input.classList.add("is-invalid");
  }

  return isValid;
}

// Bootstrap validation
(function () {
  "use strict";

  const forms = document.querySelectorAll(".needs-validation");

  // Function to check if all inputs are empty
  function checkAllEmpty(form) {
    const inputs = form.querySelectorAll("input");
    let allEmpty = true;
    inputs.forEach((input) => {
      if (input.value.trim() !== "") {
        allEmpty = false;
      }
    });
    return allEmpty;
  }

  forms.forEach(function (form) {
    // Get all input elements within the form
    const inputs = form.querySelectorAll("input");

    // Add input event listener to each input
    inputs.forEach((input) => {
      input.addEventListener("input", function() {
        if (checkAllEmpty(form)) {
          document.getElementById("btnSubmit").disabled = true;
        } else {
          document.getElementById("btnSubmit").disabled = false;
        }
      });
    });

    form.addEventListener(
      "submit",
      function (event) {
        let isFormValid = true;

        // Loop through all form elements to validate them
        inputs.forEach((input) => {
          if (!validateFields(input)) {
            isFormValid = false;
          }
        });

        // If form is invalid, prevent submission
        if (!isFormValid) {
          event.preventDefault();
          event.stopPropagation();
        }
      },
      false
    );
  });
})();
