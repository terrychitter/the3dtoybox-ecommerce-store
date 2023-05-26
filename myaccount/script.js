function handleResetButtonClick(event) {
  // Get the reset button element
  const resetButton = event.target;

  // Get the parent form element
  const form = resetButton.closest("form");

  // Remove the "edit-active" class from the form
  form.classList.remove("edit-active");
  form.classList.remove("show-input");
}

function addEditActiveClass(formSelector) {
  // Get the form element
  const form = document.querySelector(formSelector);

  if (!form) {
    console.error(`Form not found with selector: ${formSelector}`);
    return;
  }

  // Get all the input fields inside the form
  const inputFields = form.querySelectorAll("input");

  // Store the initial input values
  const initialValues = {};

  // Store the current input values
  const currentValues = {};

  // Add event listeners to input fields
  inputFields.forEach((input) => {
    // Store the initial value of each input field
    initialValues[input.name] = input.value;

    input.addEventListener("input", () => {
      // Update the current value of the input field
      currentValues[input.name] = input.value;

      // Check if the current value is different from the initial value
      const hasChanged =
        currentValues[input.name] !== initialValues[input.name];

      if (hasChanged) {
        form.classList.add("edit-active");
      } else {
        form.classList.remove("edit-active");
      }
    });
  });

  // Get all the reset buttons inside the form
  const resetButtons = form.querySelectorAll("button[type='reset']");

  // Add click event listener to reset buttons
  resetButtons.forEach((resetButton) => {
    resetButton.addEventListener("click", handleResetButtonClick);
  });
}

// Get the elements
const form = document.querySelector(".username-form");
const editButton = form.querySelector(".edit-button");

// Add event listener to the edit button
editButton.addEventListener("click", function (event) {
  event.preventDefault(); // Prevent the default form submission behavior
  form.classList.add("show-input"); // Add the "show-input" class to the form
});

//Allowing for editing
addEditActiveClass(".personal-form");
addEditActiveClass(".address-form");
addEditActiveClass(".username-form");

//Functions used to format phone number input
const phoneInput = document.getElementById("contact-number");

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

//Hiding updated messages after some time (6 seconds)
// Show the divs initially
const updateDivs = document.querySelectorAll(".update");
updateDivs.forEach((div) => {
  div.style.display = "block";
});

// After 6 seconds, hide the divs
setTimeout(() => {
  updateDivs.forEach((div) => {
    div.style.animation = "fadeOut 1s forwards";
    div.addEventListener("animationend", () => {
      div.remove(); // Remove the div from the DOM after animation is complete
    });
  });
}, 6000);

const errorDivs = document.querySelectorAll(".error");
errorDivs.forEach((div) => {
  div.style.display = "block";
});

// After 6 seconds, hide the divs
setTimeout(() => {
  errorDivs.forEach((div) => {
    div.style.animation = "fadeOut 1s forwards";
    div.addEventListener("animationend", () => {
      div.remove(); // Remove the div from the DOM after animation is complete
    });
  });
}, 6000);

// Get the unordered list element
const ulElement = document.querySelector("ul.scroller");

// Check if the list has any list items
if (ulElement.getElementsByTagName("li").length === 0) {
  // Get the div element with the "no-items" class
  const noItemsDiv = document.querySelector(".no-items");

  // Displaying the no-items div
  noItemsDiv.style.display = "flex";
}
