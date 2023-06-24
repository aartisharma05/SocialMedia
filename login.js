
var istrue=true;
function f1()
{
   var user = document.getElementById('username').value;
   if(user=='')
   {
       istrue=false;
       document.getElementById('usernameid').innerHTML = "*Please fill the username"
   }
   else
   {
       istrue=true;
       document.getElementById('usernameid').innerHTML ="";
   }
}
function f2()
{
   var password = document.getElementById('password').value;
   if(password=='')
   {
       istrue=false;
       document.getElementById('passwords').innerHTML = "*Please fill the username"
   }
   else
   {
       istrue=true;
       document.getElementById('passwords').innerHTML ="";
   }
}
function myFunction1(){

   var user = document.getElementById('username').value;
   var password = document.getElementById('password').value;
   

   if(user==''||password=='')
   {
       alert("Please Enter the details correctly!!");
   }
   else
   {   if(validation()==true)
           alert("You Loggedin Successfully!!");
       else 
           alert("Enter the correct username and password!!");
   }
}
function validation(){


  
   var user = document.getElementById('username').value;
   var password = document.getElementById('password').value;

       // alert("HI");
       run1();
             function run1(){
                   var xhttp = new XMLHttpRequest();
                   xhttp.onreadystatechange = function() {
                       if (this.readyState == 4 && this.status == 200) {
                         if(this.responseText.length!=0){
                           var element=JSON.parse(this.responseText);
                           if(element!='')
                          {
                         document.getElementById("message").innerHTML =element;
                         document.getElementById("message").style.color = "red"; 
                         istrue=false;
                          }
                          else
                          {
                            istrue=true;
                        //   window.location.href = "http://localhost/10febwork2/templates/home2.php";
                          }
                               
                         }
                         else
                         {
                            istrue=true;
                            // window.location.href = "http://localhost/10febwork2/templates/home2.php";
                         }
                       }
                }; 
               //  xhttp.open("GET", "http://localhost/10febwork1/validate.php", true); 
                xhttp.open("POST", "http://localhost/10febwork2/templates/validate.php", false);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send(`username=${user}&password=${password}`);  
               //   xhttp.send(); 
               } 
      return istrue;
}



