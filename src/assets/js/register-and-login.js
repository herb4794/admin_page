///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Register&Login.html
const signInBtn = document.querySelector("#sign-in-btn");
const signUpBtn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".register-and-login .container-fluid");

// Elements that define the Sign-In page
const signInUserInputBtn = document.querySelector(".register-and-login .input-sign-in-username");
const signInUserInputLabel = document.querySelector(".register-and-login .label-sign-in-username");

const signInPasswordInputBtn = document.querySelector(".register-and-login .input-sign-in-password");
const signInPasswordInputLabel = document.querySelector(".register-and-login .label-sign-in-password");

// Elements that define the Sign-Up page
const signUpUserInputBtn = document.querySelector(".register-and-login .input-sign-up-username");
const signUpUserInputLabel = document.querySelector(".register-and-login .label-sign-up-username");

const signUpEmailInputBtn = document.querySelector(".register-and-login .input-sign-up-email");
const signUpEmailInputLabel = document.querySelector(".register-and-login .label-sign-up-email");

const signUpPasswordInputBtn = document.querySelector(".register-and-login .input-sign-up-password");
const signUpPasswordInputLabel = document.querySelector(".register-and-login .label-sign-up-password");

// Elements that define the Sign-In & Sign-Up page icon
const signInUserIcon = document.querySelector(".register-and-login .sign-in-link-user");
const signInPasswordIcon = document.querySelector(".register-and-login .sign-in-link-password-lock");
const signUpUserIcon = document.querySelector(".register-and-login .sign-up-link-user");
const signUpPasswordIcon = document.querySelector(".register-and-login .sign-up-link-password-lock");
const signUpEmailIcon = document.querySelector(".register-and-login .sign-up-link-email");

signUpBtn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
  document.title = "Sign Up — HVAR.mall (Hong Kong)";

  // Remove the filling effect of Sign-in
  signInUserInputLabel.classList.remove("active");
  signInUserInputBtn.classList.remove("active");
  signInUserIcon.classList.remove("active");

  signInPasswordInputLabel.classList.remove("active");
  signInPasswordInputBtn.classList.remove("active");
  signInPasswordIcon.classList.remove("active");

  // Remove the fill-in content of Sign-In
  document.getElementById("sign-in-username").value = "";
  document.getElementById("sign-in-password").value = "";
});

signInBtn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
  document.title = "Sign In — HVAR.mall (Hong Kong)";

  // Remove the filling effect of Sign-Up
  signUpUserInputLabel.classList.remove("active");
  signUpUserInputBtn.classList.remove("active");
  signUpUserIcon.classList.remove("active");

  signUpEmailInputLabel.classList.remove("active");
  signUpEmailInputBtn.classList.remove("active");
  signUpEmailIcon.classList.remove("active");

  signUpPasswordInputLabel.classList.remove("active");
  signUpPasswordInputBtn.classList.remove("active");
  signUpPasswordIcon.classList.remove("active");

  // Remove the fill-in content of Sign-Up
  document.getElementById("sign-up-username").value = "";
  document.getElementById("sign-up-email").value = "";
  document.getElementById("sign-up-password").value = "";
});

// Add the filling effect of Sign-In
signInUserInputBtn.addEventListener("click", () => {
  signInUserInputLabel.classList.add("active");
  signInUserInputBtn.classList.add("active");
  signInUserIcon.classList.add("active");
});

signInPasswordInputBtn.addEventListener("click", () => {
  signInPasswordInputLabel.classList.add("active");
  signInPasswordInputBtn.classList.add("active");
  signInPasswordIcon.classList.add("active");
});

// Add the filling effect of Sign-Up
signUpUserInputBtn.addEventListener("click", () => {
  signUpUserInputLabel.classList.add("active");
  signUpUserInputBtn.classList.add("active");
  signUpUserIcon.classList.add("active");
});

signUpEmailInputBtn.addEventListener("click", () => {
  signUpEmailInputLabel.classList.add("active");
  signUpEmailInputBtn.classList.add("active");
  signUpEmailIcon.classList.add("active");
});

signUpPasswordInputBtn.addEventListener("click", () => {
  signUpPasswordInputLabel.classList.add("active");
  signUpPasswordInputBtn.classList.add("active");
  signUpPasswordIcon.classList.add("active");
});
