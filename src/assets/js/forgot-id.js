///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Forgot-ID.html
const forgotIDLastNameInputBtn = document.querySelector(".forgot-id .input-field.lastname");
const forgotIDLastNameInput = document.querySelector(".forgot-id .input-forgot-id-lastname");
const forgotIDLastNameInputLabel = document.querySelector(".forgot-id .label-forgot-id-lastname");

const forgotIDFirstNameInputBtn = document.querySelector(".forgot-id .input-field.firstname");
const forgotIDFirstNameInput = document.querySelector(".forgot-id .input-forgot-id-firstname");
const forgotIDFirstNameInputLabel = document.querySelector(".forgot-id .label-forgot-id-firstname");

const forgotIDEmailNameInputBtn = document.querySelector(".forgot-id .input-field.email");
const forgotIDEmailNameInput = document.querySelector(".forgot-id .input-forgot-id-email");
const forgotIDEmailNameInputLabel = document.querySelector(".forgot-id .label-forgot-id-email");

const forgotIDContinueBtn = document.querySelector(".forgot-id .forgot-id-continue-btn");

let forgotIDClickBtnNum = 0;

forgotIDLastNameInputBtn.addEventListener("click", () => {
    forgotIDLastNameInput.classList.add("active");
    forgotIDLastNameInputLabel.classList.add("active");

    forgotIDClickBtnNum = forgotIDClickBtnNum + 1;

    // Checking if user has full input
    if(forgotIDClickBtnNum >= 3){
        forgotIDContinueBtn.classList.remove("active");
    }
})

forgotIDFirstNameInputBtn.addEventListener("click", () => {
    forgotIDFirstNameInput.classList.add("active");
    forgotIDFirstNameInputLabel.classList.add("active");

    forgotIDClickBtnNum = forgotIDClickBtnNum + 1;

    // Checking if user has full input
    if(forgotIDClickBtnNum >= 3){
        forgotIDContinueBtn.classList.remove("active");
    }
})

forgotIDEmailNameInputBtn.addEventListener("click", () => {
    forgotIDEmailNameInput.classList.add("active");
    forgotIDEmailNameInputLabel.classList.add("active");
    
    forgotIDClickBtnNum = forgotIDClickBtnNum + 1;
    
    // Checking if user has full input
    if(forgotIDClickBtnNum >= 3){
        forgotIDContinueBtn.classList.remove("active");
    }
})
