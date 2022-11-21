function validateForm() {
    let name = document.forms["myForm"]["name"].value;
    if (name == "") {
      alert("Name must be filled out");
      return false;
    }
    
    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    let email = document.forms["myForm"]["email"].value;
    if (email == "") {
        alert("Write your eamil address!");
        return false;
  }
}
