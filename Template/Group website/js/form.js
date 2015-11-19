/*******************************************************************************
Title: 			 Travel Experts Web App - Form.JS
Author: 		 Royal Bissell
Date: 			 2015-11-02
Description: JavaScript for the Registration Form. Handles onfocus tooltips,
             data validation, and a Regex for Postal Code entry.

**Revision:  2015-11-18
             Updated for use in OOSD Group Project.
*******************************************************************************/

function formLoad(sender) {
  var myTips = document.getElementsByClassName("inputTip")
  for (i = 0; i < myTips.length; i++) {
    myTips[i].style.display = "none";
  }
}

function showTip(sender) {
  var myTip = sender.parentElement.lastElementChild;
  myTip.style.display = "block";
  myTip.innerHTML = sender.title
}

function hideTip(sender) {
  var myTip = sender.parentElement.lastElementChild;
  myTip.style.display = "none";
}

/*
This function is called when the user clicks submit or reset.
Returns: false to interrupt the actions or completes.
*/
function formConfirm(sender) {
  var type = sender.type;
  if (sender.type == "submit") {
    return formValidate(sender);
  }
}

/*
This function is called by formConfirm after the user confirms a submit, will
check all form fields for data and style invalid fields/valid fields
*/
function formValidate(sender) {
  var inputs = sender.form.getElementsByTagName("INPUT");
  var selects = sender.form.getElementsByTagName("SELECT");
  var txtareas = sender.form.getElementsByTagName("TEXTAREA");
  var fields = objConcat(inputs,selects,txtareas);
  var noerror = 1;
  var errors = "";
  for (i = 0; i < fields.length; i++) {
    if ( (fields[i].hasAttribute("required")) ) {
      if(!(fields[i].value)) {
        noerror = 0;
        errors += "<li>" + fields[i].title + "</li>";
        fields[i].style.borderColor = "#ff0000";
        fields[i].style.backgroundColor = "rgba(255, 0, 0, 0.25)";
      } else {
        fields[i].style.borderColor = "gray";
        fields[i].style.backgroundColor = "rgb(246, 246, 246);";
      }
    }
  }
  if (noerror == 0) {
    document.getElementById("errors").innerHTML = '<div class="alert alert-danger" role="alert">'+ errors+ '</div>';
    return false;
  }
}

/*
Function to create an array from on object that looks like an array (numbered)
If only one objectarray is added as a parameter it will just create an array out
of this object.
Input: (Object1[element1,element2,etc] , Object2[element1,element2,etc]*optional,
       etc[etc]*optional)
Returns: the new array
*/
function objConcat() {
  var output = [];
  for (n = 0; n < arguments.length; n++) {
    for (i = 0; i < arguments[n].length; i++) {
      output[output.length] = arguments[n][i];
    }
  }
  return output;
}
