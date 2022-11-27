function validimiSignUp(){
  if(document.LogSinConForm.name.value == ""){
    alert("Please enter your name!");
    document.LogSinConForm.name.focus();
    return false;
  }
  if(document.LogSinConForm.uName.value == ""){
    alert("Please enter your Username!");
    document.LogSinConForm.uName.focus();
    return false;
  }
  if(document.LogSinConForm.email.value == ""){
    alert("Email can't be blank!");
    document.LogSinConForm.email.focus();
    return false;
  }
  if(document.LogSinConForm.password.value == ""){
    alert("Password can't be blank!");
    document.LogSinConForm.password.focus();
    return false;
  }
  if(document.LogSinConForm.password.value.length < 8){
    alert("Please enter a Password with at least 8 charachters!");
    document.LogSinConForm.password.focus();
    return false;
  }
  
  alert("Validation completed successfully!!!");
  return true;
}

          
