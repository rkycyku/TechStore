function validimiLogin(){
  let emailLF = document.LoginForm.email;
  let passLF = document.LoginForm.password;

  if(emailLF.value == ""){
    alert("Email can't be blank!");
    emailLF.focus();
    return false;
  }

  if(passLF.value == ""){
    alert("Password can't be blank!");
    passLF.focus();
    return false;
  }

  alert('Welcome back!!!')
  return true;
}

function validimiSignUp(){
  let emriSUF = document.SignUpForm.name;
  let uNameSUF = document.SignUpForm.uName;
  let emailSUF = document.SignUpForm.email;
  let passSUF = document.SignUpForm.password;

  if(emriSUF.value == ""){
    alert("Please enter your name!");
    emriSUF.focus();
    return false;
  }
  if(uNameSUF.value == ""){
    alert("Please enter your Username!");
    uNameSUF.focus();
    return false;
  }
  if(emailSUF.value == ""){
    alert("Email can't be blank!");
    emailSUF.focus();
    return false;
  }
  if(passSUF.value == ""){
    alert("Password can't be blank!");
    passSUF.focus();
    return false;
  }
  if(passSUF.value.length < 8){
    alert("Please enter a Password with at least 8 charachters!");
    passSUF.focus();
    return false;
  }
  
  alert("Validation completed successfully!!!");
  return true;
}

function validimiContactForm(){
  let emriCF = document.ContactForm.name;
  let emailCF = document.ContactForm.email;
  let msgFieldCF = document.ContactForm.msgField;

  if(emriCF.value == ""){
    alert("Please enter your name!");
    emriCF.focus();
    return false;
  }
  if(emailCF.value == ""){
    alert("Email can't be blank!");
    emailCF.focus();
    return false;
  }
  if(msgFieldCF.value == ""){
    alert("Please enter your message!");
    msgFieldCF.focus();
    return false;
  }
  
  alert("Thank you. We'll reach at you as soon as possible!")
  return true;
}
