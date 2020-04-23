function showProfileName(){
    if( (document.getElementById("profileNameNav").innerHTML = '') || (document.getElementById("profileNameNav").innerHTML == null) ){
        document.getElementById("profileNameNav").innerHTML = sessionFirstName;
    }
    document.getElementById("profileNameNav").innerHTML = sessionFirstName;
}
showProfileName();

function makeAjaxCall(str)
{
   if (str.length == 0 || str==null)
   {
      document.getElementById("profileNameNav").innerHTML = sessionFirstName;
      return;
   }

   profile_switch = true;

   // 2. Create an instance of an XMLHttpRequest object
   xhr = GetXmlHttpObject();
   if (xhr == null)
   {
      alert ("Your browser does not support XMLHTTP!");
      return;
   }


   // 3. specify a backend handler (URL to the backend)
    var backend_url = "http://localhost/CS4640-ztm4qv-kk6ev-project/templates/profile-name-nav.php";

   // 4. Assume we are going to send a GET request,
   //    use url rewriting to pass information the backend needs to process the request
   backend_url += "?NameSoFar=" + str;




   // 5. Configure the XMLHttpRequest instance.
   //    Register the callback function.
   //    Assume the callback function is named showHint(),
   //    don't forget to write code for the callback function at the bottom
   xhr.onreadystatechange = function(){
       if(xhr.readyState === 4){ // check value and type --> 4 means complete
          if(xhr.status === 200){ // ok
              var res = xhr.responseText;
              // what we want to do
              showName(res);
          }
          else{ // else how to handle error -- resend request?
              console.log("xhr failed");
          }
       }
       else{ // else not done yet
           console.log("xhr still in progress");
       }
   }

   // 8. Once the response is back the from the backend,
   //    the callback function is called to update the screen
   //    (this will be handled by the configuration above)



   // 6. Make an asynchronous request
   xhr.open('GET', backend_url, true);

   // 7. The request is sent to the server
   xhr.send(null);

}

// 1. Add event listener to the input boxes.
//    Call makeAjaxCall() when the event happens
document.getElementById("first_name").addEventListener("keyup", function(){
    var str_sofar = document.getElementById("first_name").value;
    //call the function to send asynch request
    makeAjaxCall(str_sofar);
});


// The callback function processes the response from the server
function showName(str)
{

   // what do to with the response
    if(str.length == 0 || str==null){
        document.getElementById('profileNameNav').innerHTML = '';
        return;
    }
    document.getElementById('profileNameNav').innerHTML = str;
}

function GetXmlHttpObject()
{
   // Create an XMLHttpRequest object
	
   if (window.XMLHttpRequest)
   {  // code for IE7+, Firefox, Chrome, Opera, Safari
      return new XMLHttpRequest();
   }
   if (window.ActiveXObject)
   { // code for IE6, IE5
     return new ActiveXObject ("Microsoft.XMLHTTP");
   }
   return null;
}