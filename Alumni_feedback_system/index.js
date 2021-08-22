/*To open login form*/
function openForm() {
  document.getElementById("form_popup").style.display = "block";
   //document.getElementById("backdrop").style.opacity = "0.2";
}
/* To close login form*/
function closeForm() {
  document.getElementById("form_popup").style.display = "none";
}

/*  validation for login data */

function printError(elemId, hintMsg)
{
    document.getElementById(elemId).innerHTML = hintMsg;
}

function validateForm() 
{
  var message1 = message2 = true;
  var x=document.getElementById("uid").value;
  var y=document.getElementById("pwd").value;
  if(x == "") 
  {
        printError("message1", "*Please enter your name");
  } 
  else 
  {
        /*var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(x) === false)
         {
            printError("message1", "Please enter a valid name");
        }
         else
          {*/
            printError("message1", "");
            message1 = false;
        /*}*/
    }
   if(y == "") 
   {
        printError("message2", "*Please enter password");
   } 
   else 
   {/*
        var regey ="1234";               
        if(regey.test(y) === false)
         {
            printError("message2", "Please enter a valid password");
        }
         else
          {*/
            printError("message2", "");
            message2 = false;
        /*}*/
    }

    if((message1 || message2) == true) {
       return false;
  }
}