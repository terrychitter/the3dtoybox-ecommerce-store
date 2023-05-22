// Toggling the password visbility
function togglePasswordVisibility() {
  const passwordEye = document.getElementById("password-eye");
  const passwordInput = document.getElementById("password");

  //Toggling password
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    passwordEye.classList.add("fa-eye");
    passwordEye.classList.remove("fa-eye-slash");
  } else {
    passwordInput.type = "password";
    passwordEye.classList.add("fa-eye-slash");
    passwordEye.classList.remove("fa-eye");
  }
}
