// Validation functions

// Function to validate if input contains only numbers or is empty
function validateInteger(input) {
  const regex = /^\d+$/;
  return input.value === "" || regex.test(input.value);
}

// Function to validate if input contains only numbers and has exactly 4 digits or is empty
function validateYear(input) {
  const regex = /^\d{4}$/;
  return input.value === "" || regex.test(input.value);
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
    if (!validateInteger(input)) {
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
    if (!validateInteger(input)) {
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
