function validateEmail(email){
   if (email == ''){
    return false;
   }
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  
   return emailReg.test(email);
}

function validatePassword(pass){
  if (pass == ''){
    return false;
  }
  //Match 6 to 15 character string with at least one upper case letter, one lower case letter, and one digit (useful for passwords).
 // var passwordStrengthRegex = /((?=.*d)(?=.*[a-z])(?=.*[A-Z]).{6,15})/gm;
  
 //  return passwordStrengthRegex.test(pass);
  if (pass.length < 6){
     return false;
  } 
  return true;

}

function validateLogin(email, pass){
   
   if (!validateEmail(email)){
      return false;
   }
   
   if (!validatePassword(pass)){
      return false;
   }
   
   return true;
  
}