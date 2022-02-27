function showSuccessMessage(e) {
  e.target.parentElement.querySelector(".formError").style.visibility =
    "hidden";
  e.target.parentElement.querySelector(".formSuccess").style.visibility =
    "visible";
  e.target.parentElement.querySelector(
    ".smallErrorIndication"
  ).style.visibility = "hidden";
}

function showErrorMessage(e) {
  e.target.parentElement.querySelector(".formSuccess").style.visibility =
    "hidden";
  e.target.parentElement.querySelector(".formError").style.visibility =
    "visible";
  e.target.parentElement.querySelector(
    ".smallErrorIndication"
  ).style.visibility = "visible";
}

function checkInputs(domElement) {
  domElement.addEventListener("blur", (e) => {
    if (domElement.value !== "") {
      showSuccessMessage(e);
    } else {
      showErrorMessage(e);
    }
  });
}

function checkInputsPassword(domElement) {
  let passwordRegex =
    /^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,}$/;
  domElement.addEventListener("blur", (e) => {
    if ((domElement.value !== "") & passwordRegex.test(domElement.value)) {
      showSuccessMessage(e);
    } else {
      showErrorMessage(e);
    }
  });
}

function checkInputsMail(domElement) {
  let mailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  domElement.addEventListener("blur", (e) => {
    if ((domElement.value !== "") & mailRegex.test(domElement.value)) {
      showSuccessMessage(e);
    } else {
      showErrorMessage(e);
    }
  });
}

function compareInputs(domElement, domElementToCheck, e) {
  if (domElement.value == domElementToCheck.value) {
    showSuccessMessage(e);
  } else {
    showErrorMessage(e);
  }
}
///////////////////////////////////////////////////////////////////////
///////////////////////   VALIDATION FORMS   //////////////////////////
///////////////////////////////////////////////////////////////////////
(function check() {
  // VARIABLES
  // Contact form DOM
  let contactInputName = document.getElementById("name");
  let contactInputSubject = document.getElementById("subject");
  let contactInputMail = document.getElementById("email");

  // Contact form DOM
  let registrerInputPseudo = document.getElementById("pseudoRegistrer");
  let registrerInputFirstname = document.getElementById("firstnameRegistrer");
  let registrerInputLastname = document.getElementById("lastnameRegistrer");
  let registrerInputPassword = document.getElementById("passwordRegistrer");
  let registrerInputCheckPassword = document.getElementById(
    "checkPasswordRegistrer"
  );
  let registrerInputMail = document.getElementById("mailRegistrer");

  // Array with txt to check
  let textValue = [
    contactInputName,
    contactInputSubject,
    registrerInputPseudo,
    registrerInputFirstname,
    registrerInputLastname,
  ];
  textValue.forEach((element) => {
    if (element != null) {
      checkInputs(element);
    }
  });

  // Array with password to check
  let passwordImputs = [contactInputMail, registrerInputPassword];
  passwordImputs.forEach((element) => {
    if (element != null) {
      checkInputsPassword(element);
    }
  });

  // Array with mail to check
  let emailImputs = [contactInputMail, registrerInputMail];
  emailImputs.forEach((element) => {
    if (element != null) {
      checkInputsMail(element);
    }
  });

  // compare passwords
  if (registrerInputCheckPassword){
    registrerInputCheckPassword.addEventListener("blur", (e) => {
    if (
      registrerInputPassword.value != null ||
      registrerInputCheckPassword.value != null
    ) {
      compareInputs(registrerInputPassword, registrerInputCheckPassword, e);
    }
  });
  }
})();
