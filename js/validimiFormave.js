function validimiLogin() {
  let uNameLF = document.LoginForm.username;
  let passLF = document.LoginForm.password;

  if (uNameLF.value == "") {
    alert("Please enter your username!");
    uNameLF.focus();
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

function validimiPerditesoTeDhenat(){
  const textREGEX = /^[A-Za-zÇçËëËÇ]+$/
  const telREGEX = /^04[3,4,5,6,8,9]\d{6}$/
  let emriPTD = document.perditesoTeDhenat.emri;
  let mbiemriPTD = document.perditesoTeDhenat.mbiemri;
  let telPTD = document.perditesoTeDhenat.nrKontaktit;
  let qytetiPTD = document.perditesoTeDhenat.qyteti;
  let adresaPTD = document.perditesoTeDhenat.adresa;

  if (emriPTD.value == "") {
    alert("Ju lutem shenoni emrin tuaj!");
    emriPTD.focus();
    return false;
  }
  if (!textREGEX.test(emriPTD.value)) {
    alert("Emri duhet te permbaj vetem shkronja!");
    emriPTD.focus();
    return false;
  }

  if (mbiemriPTD.value == "") {
    alert("Ju lutem shenoni emrin tuaj!");
    emriPTD.focus();
    return false;
  }
  if (!textREGEX.test(mbiemriPTD.value)) {
    alert("Mbimeri duhet te permbaj vetem shkronja!");
    emriPTD.focus();
    return false;
  }
  
  if (telPTD.value == "") {
    alert("Ju lutem te vendosni nje numer kontakti per shkak te kontaktimit nga postieri ne rast porosie!");
    telPTD.focus();
    return false;
  }
  if (!telREGEX.test(telPTD.value)) {
    alert("Numri i telefonit duhte te jet ne formatin 04ONNNNNN ku O eshte identifikimi i numrit te operatorit IPKO ose Vala" +
    " N eshte numer nga 0 deri 9 pra Pjesa tjeter e numrit!");
    telPTD.focus();
    return false;
  }

  if (qytetiPTD.value == "") {
    alert("Ju lutem shenoni qytetin tuaj!");
    qytetiPTD.focus();
    return false;
  }
  if (!textREGEX.test(qytetiPTD.value)) {
    alert("Qyteti duhet te permbaj vetem shkronja!");
    emriPTD.focus();
    return false;
  }

  if (adresaPTD.value == "") {
    alert("Ju lutem shenoni adresen!");
    adresaPTD.focus();
    return false;
  }

  return true;
}

function validimiSHK() {
  let emriKompanisVSHK = document.shtoKompanin.emriKompanis;
  let kompaniaLogoVSHK = document.shtoKompanin.kompaniaLogo;

  if (emriKompanisVSHK.value == "") {
    alert("Ju lutem shenoni emrin e kompanis!");
    emriKompanisVSHK.focus();
    return false;
  }

  if (kompaniaLogoVSHK.value == "") {
    alert("Ju lutem vendosni foton e kompanis!");
    kompaniaLogoVSHK.focus();
    return false;
  }

  return true;
}

function validimiKategoris() {
  let emriKategoris = document.shtoKategorin.emriKat;

  if (emriKategoris.value == "") {
    alert("Ju lutem shenoni emrin e kategoris!");
    emriKategoris.focus();
    return false;
  }

  return true;
}