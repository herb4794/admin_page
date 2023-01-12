// Login & Register functions
const mRegistrationForm = document.getElementById("sign-up-form");

// Register Form button Listener
mRegistrationForm.addEventListener("submit", async (e) => {
  e.preventDefault();
  const formData = new FormData(mRegistrationForm);
  formData.append("addUser",1);

  await fetch("../admin_control/code.php", {
    method: "POST",
    body: formData,
  })
  location.reload(true)
});
