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

// Redirecting the user to logout
function logout() {
  window.location.href = "../logout.php";
}
