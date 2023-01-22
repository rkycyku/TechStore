function validimiLogin() {
  let uNameLF = document.LoginForm.username;
  let passLF = document.LoginForm.password;

  if (uNameLF.value == "") {
    alert("Please enter your username!");
    emailLF.focus();
    return false;
  }

  if (passLF.value == "") {
    alert("Please enter your password!");
    passLF.focus();
    return false;
  }

  return true;
}

function validimiSignUp() {
  const emriREGEX = /^[A-Za-z]+$/
  const emailREGEX = /^[\w.+-]+@[\w.-]+\.[a-zA-Z]{2,}$/
  const passREGEX = /^[A-Z][A-Za-z0-9@$!%*?&]*[a-z][A-Za-z0-9@$!%*?&]*[0-9][A-Za-z0-9@$!%*?&]*$/
  let emriSUF = document.SignUpForm.name;
  let uNameSUF = document.SignUpForm.uName;
  let emailSUF = document.SignUpForm.email;
  let passSUF = document.SignUpForm.password;

  if (emriSUF.value == "") {
    alert("Please enter your name!");
    emriSUF.focus();
    return false;
  }
  if (!emriREGEX.test(emriSUF.value)) {
    alert("Name must contain letters only!");
    emriSUF.focus();
    return false;
  }

  if (uNameSUF.value == "") {
    alert("Please enter your Username!");
    uNameSUF.focus();
    return false;
  }
  if (uNameSUF.value.length < 6) {
    alert("Username must contain at least 6 characters!");
    uNameSUF.focus();
    return false;
  }
  if (emailSUF.value == "") {
    alert("Email can't be blank!");
    emailSUF.focus();
    return false;
  }
  if (!emailREGEX.test(emailSUF.value)) {
    alert("Please enter a valid email address!");
    emailSUF.focus();
    return false;
  }
  if (passSUF.value == "") {
    alert("Password can't be blank!");
    passSUF.focus();
    return false;
  }
  if (passSUF.value.length < 8) {
    alert("Please enter a Password with at least 8 charachters!");
    passSUF.focus();
    return false;
  }
  if (!passREGEX.test(passSUF.value)) {
    alert("Password must contasin one lowercase letter, one digit and the first letter must be Uppercase!");
    passSUF.focus();
    return false;
  }

  return true;
}

function validimiContactForm() {
  const emriREGEX = /^[A-Za-z]+$/
  const emailREGEX = /^[\w.+-]+@[\w.-]+\.[a-zA-Z]{2,}$/
  let emriCF = document.ContactForm.name;
  let emailCF = document.ContactForm.email;
  let msgFieldCF = document.ContactForm.msgField;

  if (emriCF.value == "") {
    alert("Please enter your name!");
    emriCF.focus();
    return false;
  }
  if (!emriREGEX.test(emriCF.value)) {
    alert("Name must contain letters only!");
    emriCF.focus();
    return false;
  }
  if (emailCF.value == "") {
    alert("Email can't be blank!");
    emailCF.focus();
    return false;
  }
  if (!emailREGEX.test(emailCF.value)) {
    alert("Please enter a valid email address!");
    emailCF.focus();
    return false;
  }
  if (msgFieldCF.value == "") {
    alert("Please enter your message!");
    msgFieldCF.focus();
    return false;
  }

  return true;
}

function validimiShtimiProduktit() {
  const qmimiREGEX = /^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$/
  let qmimi = document.shtoProduktin.cmimiPd;

  if (!qmimiREGEX.test(qmimi.value)) {
    alert("Ju lutem shkruani qmimin ne forme te DOUBLE(123.00)!!!");
    qmimi.focus();
    return false;
  }

  if (qmimi.value.length > 10) {
    alert("Qmimi mund te jete me se shumti '99999999.99'!");
    qmimi.focus();
    return false;
  }

  return true;
}
