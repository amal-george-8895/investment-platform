<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RM</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/37af1810bd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles/common.css">
</head>

<body >
<div class="container-fluid bgclass">
    <div class="row">
        <div class="col-lg-6">
          
        </div>
        <div class="col-lg-6" style="display: flex;justify-content: flex-end; align-items: center;">
           
            <a href="#" style="text-decoration: none;color: #ffffff;margin: 12px 30px;font-size: 18px;font-weight: 500;"><span></span></a>
        </div>
    </div>
</div>
<div class="container-fluid my-3">
    <div class="row">
        <div class="col-lg-6 grid1_2">
            <img src="image/add.png" alt="image1" class="img1">
        </div>
        <div class="col-lg-6 grid1_2 my-5">
            <div style="color:#0d6efd;text-align: center;">
                <h3 class="grid2h3">Edit</h3>
            </div>
            <?php
            include 'db_conn.php';
            $userId = $_GET['userId'];//stores user id in the variable


            $sql = "SELECT * FROM `user` WHERE id='$userId'";//  query to select all columns and rows in the user table with the specified id value
            $result = $con->query($sql);
            if($result){
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()){
                        $fname = $row['fname'];
                        $lname = $row['lname'];
                        $phoneno = $row['phoneno'];
                        $emailid = $row['emailid'];
                        $country = $row['country'];
                        $gender = $row['gender'];
                        $dob = $row['dob'];

                        echo "<form name=\"addClientForm\" method=\"post\" action=\"scripts/editClient.php\">
                <div class=\"row\">
                    <div class=\"singlefield\">
                        <input type=\"text\" id=\"fname\" value='$fname' name=\"fname\" class=\"form-control\" placeholder=\"First Name\">
                    </div>
                    <div class=\"singlefield\">
                        <input type=\"text\" id=\"lname\" name=\"lname\" value='$lname' class=\"form-control\" placeholder=\"Last Name\">
                    </div>

                    <div class=\"singlefield\">
                        <input type=\"tel\" id=\"phoneno\" name=\"phoneno\" value='$phoneno' class=\"form-control\" placeholder=\"Phone Number\">
                    </div>
                    <div class=\"singlefield\">
                        <input type=\"email\" id=\"emailid\" name=\"emailid\" value='$emailid' class=\"form-control\" placeholder=\"Email Id\">
                    </div>

                    <div class=\"singlefield\">
                                <select name=\"gender\" id=\"gender\" value='$gender' placeholder=\"Select Gender\">
                                    <option value=\"Male\">Male</option>
                                    <option value=\"Female\" selected=''>Female</option>
                                    <option value=\"Transgender\">Transgender</option>
                                </select>
                            </div>
                            <div class=\"singlefield\">
                                <select name=\"country\" id=\"country\" value='$country' placeholder=\"Select Gender\">
                                    <option value=\"UK\">UK</option>
                                    <option value=\"USA\">USA</option>
                                    <option value=\"INDIA\">INDIA</option>
                                </select>
                            </div>
                            <div class=\"singlefield\">
                                <input type=\"date\" id=\"dob\" value='$dob' name=\"dob\">
                            </div>
                   
                    <div class=\" mt-2\">
                        <button type=\"submit\" class=\"btn btn-primary\">Update</button>
                    </div>
                </div>
            </form>";

                    }
                }
            }else{
                return "ere";
            }
            ?>


        </div>
    </div>
</div>
</body>
</html>
