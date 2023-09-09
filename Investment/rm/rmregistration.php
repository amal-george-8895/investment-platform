<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>RM</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
            <script src="https://kit.fontawesome.com/37af1810bd.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./styles/common.css">
    </head>
    <body >
        <!-- ==topbar== -->
        <!--<div class="container-fluid bg-primary">
                           <div class="text-end" style="display: flex;justify-content: flex-end; align-items: center;">
                    <h4 style="color:white;margin: 12px 30px;font-size: 18px;font-weight: 500">rm@gmail.com</h4>
                    <a href="#" style="text-decoration: none;color: #ffffff;margin: 12px 30px;font-size: 18px;font-weight:500;"><span></span></a>
                </div>
            </div>
        </div>  !-->
        <!--==topbar ends==-->
        <!--==grid body== -->
        <div class="container pt-5 mb-0 pb-0">
                <div class="row">
                    <div class="col-md-6 mt-0  mb-0 pb-0" style="height:500px;">
                        <img src="image/create_acc.avif" alt="image1" class="img1" style="height:120%;">
                    </div>
                    <div class="col-md-6 mt-0  mb-0 pb-0" style="height:500px;" >
                        <div style="color: #0d6efd;text-align: center;">
                            <h3 class="grid2h3">RM Registration Form</h3>
                        </div>
                        <form style="margin-left:15%" name="registerForm" onsubmit = "return validation()" action="scripts/rmregister.php" method="POST">
                            <div class="singlefield">
                                <input type="text" id="fname" name="fname" class="form-control" placeholder="First Name">
                            </div>
                            <div class="singlefield">
                                <input type="text" id="lname" name="lname" class="form-control" placeholder="Last Name">
                            </div>

                            <div class="singlefield">
                                <input type="tel" id="phoneno" name="phoneno" class="form-control" placeholder="Phone Number">
                            </div>
                            <div class="singlefield">
                                <input type="email" id="emailid" name="emailid" class="form-control" placeholder="Email Id">
                            </div>
                            <div class="singlefield">
                                <select name="gender" id="gender" placeholder="Select Gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Transgender">Transgender</option>
                                </select>
                            </div>
                            <div class="singlefield">
                                <select name="country" id="country" placeholder="Select Gender">
                                    <option value="UK">UK</option>
                                    <option value="USA">USA</option>
                                    <option value="INDIA">INDIA</option>
                                </select>
                            </div>
                            <div class="singlefield">
                                <input type="date" id="dob" name="dob">
                            </div>
                            <div class="singlefield">
                                <input type="password" id="npassword" name="npassword" class="form-control" placeholder="New Password">
                            </div>
                            <div class="singlefield">
                                <input type="password" id="cpassword" name="cpassword" class="form-control" placeholder="Confirm Password">
                            </div>
                            <div class="singlefield mt-2">
                                <button type="button" onclick="window.location.href = 'index.php';" class="btn btn-danger" style="margin-left:15%">BACK TO LOGIN</button>
                                <button type="submit"  class="btn btn-primary" style="margin-left:15%">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>    
    </body>
    <script>
        function validation()
        {
            if(document.registerForm.fname.value == ''){
                alert("Invalid Firstname");
                return false;
            }else if(document.registerForm.lname.value == ''){
                alert("Invalid last name");
                return false;
            }else if(document.registerForm.phoneno.value == ''){
                alert("Invalid Phone");
                return false;
            }else if(document.registerForm.emailid.value == ''){
                alert("Invalid email");
                return false;
            }else if(document.registerForm.gender.value == ''){
                alert("Invalid gender");
                return false;
            }else if(document.registerForm.country.value == ''){
                alert("Invalid country");
                return false;
            }else if(document.registerForm.dob.value == ''){
                alert("Invalid dob");
                return false;
            }
            var id=document.registerForm.npassword.value;
            var ps=document.registerForm.cpassword.value;
            if(id.length=="" && ps.length=="") {
                alert("User Name and Password fields are empty");
                return false;
            }
            else
            {
                if(id !== ps) {
                    alert("Password & Confirm Password should be same");
                    return false;
                }

            }
        }
    </script>
</html>
