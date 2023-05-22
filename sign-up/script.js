// Getting submission button
const form = document.getElementById("create-account-form");
const submitButton = document.getElementById("submission-button");

submitButton.addEventListener("click", function (event) {
  event.preventDefault();

  // Getting all inputs
  const usernameInput = document.getElementById("username");
  const phoneInput = document.getElementById("phone");
  const emailInput = document.getElementById("email");
  const passwordInput = document.getElementById("password");

  var currentPagePath = window.location.pathname;

  if (!isValidEmail(emailInput.value)) {
    showErrorMessage("Email is invalid");
    exit();
  }

  if (!validateUsernameLength(usernameInput.value)) {
    showErrorMessage("Username is too long (Maximum 50 characters)");
    exit();
  }

  if (!validateShortUsernameLength(usernameInput.value)) {
    showErrorMessage("Username is too short (Minimum 5 characters)");
    exit();
  }

  if (!hasSupportedChars(usernameInput.value)) {
    showErrorMessage(
      'Username can only support character A-Z, a-z, 0-9 and special characters "-" and "_"'
    );
    exit();
  }

  if (!validatePhoneNumberFormat(phoneInput.value)) {
    showErrorMessage("Phone number is not in a valid format (123-456-7890)");
    exit();
  }

  if (!strongPassword(passwordInput.value)) {
    showErrorMessage(
      "Password should be between 8-50 characters and at least one of the following: special character (!@$#%^&*), capital letter, small letter, number"
    );
    exit();
  }

  // Submiting the form
  form.submit();
});

function showErrorMessage(errorMessage) {
  setTimeout(function () {
    errorMessage = encodeURIComponent(errorMessage);
    window.location.href = "sign-up.php?error=" + errorMessage;
  }, 100);
}

// Helper function that validates an email address
function isValidEmail(email) {
  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  // Return whether the email is valid or not
  return emailPattern.test(email);
}

function validateUsernameLength(username) {
  if (username.length > 50) {
    return false;
  } else {
    return true;
  }
}

function validateShortUsernameLength(username) {
  if (username.length < 5) {
    return false;
  } else {
    return true;
  }
}

function hasSupportedChars(text) {
  const supportedCharsRegex = /^[A-Za-z0-9\-_]+$/;
  return supportedCharsRegex.test(text);
}

function validatePhoneNumberFormat(text) {
  const phoneNumberPattern = /^\d{3}-\d{3}-\d{4}$/;
  return phoneNumberPattern.test(text);
}

function strongPassword(text) {
  // Check length
  if (text.length < 8 || text.length > 50) {
    return false;
  }

  // Check for at least one special character
  const specialCharsPattern = /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]+/;
  if (!specialCharsPattern.test(text)) {
    return false;
  }

  // Check for at least one capital letter
  const capitalLetterPattern = /[A-Z]+/;
  if (!capitalLetterPattern.test(text)) {
    return false;
  }

  // Check for at least one small letter
  const smallLetterPattern = /[a-z]+/;
  if (!smallLetterPattern.test(text)) {
    return false;
  }

  // Check for at least one number
  const numberPattern = /[0-9]+/;
  if (!numberPattern.test(text)) {
    return false;
  }

  // All criteria met
  return true;
}

//Functions used to format phone number input
const phoneInput = document.getElementById("phone");

phoneInput.addEventListener("input", function () {
  const inputValue = phoneInput.value;
  const formattedValue = formatPhoneNumber(inputValue);
  phoneInput.value = formattedValue;

  // Prevent the user from typing more digits when the phone number is complete
  if (formattedValue.length === 12) {
    phoneInput.setAttribute("maxlength", 12);
  } else {
    phoneInput.removeAttribute("maxlength");
  }
});

function formatPhoneNumber(phoneNumber) {
  const cleanedNumber = phoneNumber.replace(/\D/g, "");

  let formattedNumber = "";
  let chunkSizes = [3, 3, 4];
  let startIndex = 0;

  for (let i = 0; i < chunkSizes.length; i++) {
    const chunkSize = chunkSizes[i];
    const chunk = cleanedNumber.slice(startIndex, startIndex + chunkSize);
    if (chunk) {
      formattedNumber += chunk + "-";
    }
    startIndex += chunkSize;
  }

  formattedNumber = formattedNumber.slice(0, -1);

  return formattedNumber;
}
