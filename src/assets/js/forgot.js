///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Forgot.html
const forgotUserInputBtn = document.querySelector(".forgot .forgot-container .forgot-container-form .input-field");
const forgotUserInput = document.querySelector(".forgot .forgot-container .forgot-container-form .input-field .input-forgot-username");
const forgotUserInputLabel = document.querySelector(".forgot .label-forgot-username");
const forgotContinueBtn = document.querySelector(".forgot .forgot-continue-btn");

forgotUserInputBtn.addEventListener("click", () => {
    forgotUserInput.classList.add("active");
    forgotUserInputLabel.classList.add("active");
    forgotContinueBtn.classList.remove("active");
    
})
