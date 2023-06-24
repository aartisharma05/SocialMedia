function myFunction() {
    var fname = document.getElementById('fname').value;
       var lname = document.getElementById('lname').value;
       //var user = document.getElementById('username').value;
      // var password = document.getElementById('password').value;
      // var confrmpassword = document.getElementById('passwordconfrm').value;
       var mobileno = document.getElementById('numbermobile').value;
       var email = document.getElementById('emailid').value;


       if(fname==''&& lname==''&& mobileno==''&& email=='')
       {
           alert("Please Enter the details");
       }
       else
       {
           alert("You Registered Successfully!!");
       }
}

   function validation(){

       var fname = document.getElementById('fname').value;
       var lname = document.getElementById('lname').value;
      // var user = document.getElementById('username').value;
       //var password = document.getElementById('password').value;
       //var confrmpassword = document.getElementById('passwordconfrm').value;
       var mobileno = document.getElementById('numbermobile').value;
       var email = document.getElementById('emailid').value;

       
       if(fname == ""){
           document.getElementById('f_name').innerHTML = "*Please fill the first name"
           return false;
       }else{
       // else {
       // 	//add success class
       // 	setSuccessFor(user);
       // }
       if((fname.length<3) || (fname.length>20)){
           document.getElementById('f_name').innerHTML = "*Please fill the fname between 3 and 20"
           return false;
       }else{
       if(!isNaN(fname)){
           document.getElementById('f_name').innerHTML = "*Please enter the character"
           return false;
       }
       else{
           document.getElementById('f_name').innerHTML = ""
       }
   }
}








       if(lname == ""){
           document.getElementById('l_name').innerHTML = "*Please fill the last name"
           return false;
       }else{
       // else {
       // 	//add success class
       // 	setSuccessFor(user);
       }
       if((lname.length<1) || (lname.length>20)){
           document.getElementById('l_name').innerHTML = "*Please fill the last name between 1 and 20"
           return false;
       }else{
       if(!isNaN(lname)){
           document.getElementById('l_name').innerHTML = "*Please enter the character"
           return false;
       }
       else{
           document.getElementById('l_name').innerHTML = ""
       }
   }









    //    if(user == ""){
    //        document.getElementById('usernameid').innerHTML = "*Please fill the username"
    //        return false;
    //    }else{
    //    // else {
    //    // 	//add success class
    //    // 	setSuccessFor(user);
    //    }
//        if((user.length<3) || (user.length>20)){
//            document.getElementById('usernameid').innerHTML = "*Please fill the username between 3 and 20"
//            return false;
//        }else{
//        if(!isNaN(user)){
//            document.getElementById('usernameid').innerHTML = "*Please enter the character"
//            return false;
//        }
//        else{
//            document.getElementById('usernameid').innerHTML = ""
//        }
//    }

    //    if(password == ""){
    //        document.getElementById('passwords').innerHTML = "*Please fill the password"
    //        return false;
    //    }
    //    if((password.length<5) || (password.length>20)){
    //        document.getElementById('passwords').innerHTML = "*Please fill the password between 5 and 20"
    //        return false;
    //    }
    //    if(password!=confrmpassword) {
    //        document.getElementById('confrmpassword').innerHTML = "*Password are not matching"
    //        return false;
    //    }




    //    if(confrmpassword == ""){
    //        document.getElementById('confrmpassword').innerHTML = "*Please fill the confirm password"
    //        return false;
    //    }



       if(mobileno == ""){
           document.getElementById('mobilenumber').innerHTML = "*Please fill the mobile num"
           return false;
       }
       if(mobileno.length!=10){
           document.getElementById('mobilenumber').innerHTML = "*mobile no should be 10 digit"
           return false;
       }
       if(isNaN(mobileno)){
           document.getElementById('mobilenumber').innerHTML = "**mobile no should contain only digits"
           return false;
       }
       //not an number




       if(email == ""){
           document.getElementById('emailids').innerHTML = "*Please fill the email"
           return false;
       }
       //index will return first number
       //@a.com its wrong
       if(email.indexOf('@')<=0){
           document.getElementById('emailids').innerHTML = "*Please fill the email id in proper format @"
           return false;
       }

       //charAt method returns at specified position
       // ex a@@gmail.com
       // or a@gmail.in
         // or a@gmail.i its an error
         if((email.charAt(email.length-4)!='.')&& (email.charAt(email.length-3)!='.')){
           document.getElementById('emailids').innerHTML = "*Please fill the email id in proper format ."
           return false;
         }

           return true;
       }
   

   // function setSuccessFor(input) {
   // 	const formControl = input.parentElement;
   // 	formControl.className = 'form-control success';
   // }
