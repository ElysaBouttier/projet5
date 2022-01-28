let form = document.getElementById("contactForm");
let nameInput = document.getElementById("name");
let emailInput = document.getElementById("email");
let subjectInput = document.getElementById("subject");

nameInput.addEventListener("blur", (e) => {
  if (nameInput.value !== "") {
    document.getElementById("errorName").style.visibility = "hidden";
    document.getElementById("successName").style.visibility = "visible";
  } else {
    document.getElementById("errorName").style.visibility = "visible";
    document.getElementById("successName").style.visibility = "hidden";
  }
});

emailInput.addEventListener("blur", (e) => {
  let mailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (emailInput.value !== "" & mailRegex.test(emailInput.value)) {
      document.getElementById("errorMail").style.visibility = "hidden";
      document.getElementById("successMail").style.visibility = "visible";
    } else {
      document.getElementById("errorMail").style.visibility = "visible";
      document.getElementById("successMail").style.visibility = "hidden";
    }
});

subjectInput.addEventListener("blur", (e) => {
  if (subjectInput.value !== "") {
    document.getElementById("errorSubject").style.visibility = "hidden";
    document.getElementById("successSubject").style.visibility = "visible";
  } else {
    document.getElementById("errorSubject").style.visibility = "visible";
    document.getElementById("successSubject").style.visibility = "hidden";
  }
});

function checkInputs() {
  if (nameValue === "") {
  } else {
    document.getElementById("error").classList.remove("error");
  }
}
