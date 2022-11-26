
function validate(email, password){
  var mailformat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if(email.value.match(mailformat)){
      document.f1.text1.focus();
      return true;
}
else{
  alert("Invalid email address.");
    document.f1.text1.focus();
    return false;
}
}

          
