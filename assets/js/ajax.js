//This file will handle all of the ajax calls in this project 

//This function will get the charities by type 
function getCharitiesByType() {

  //Getting the user input
  let charity_type_id = document.getElementById('charity_type').value;

  //Setting up the XML request
  if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
  } 

  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
          document.getElementById("txtHint").innerHTML = this.responseText;
      }
  };

  xmlhttp.open("GET", "getcharitybytype.php?q="+charity_type_id, true);
  xmlhttp.send();

}