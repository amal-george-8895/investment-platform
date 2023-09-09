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
<div class="container-fluid bgclass">
    <div class="row">
        <div class="col-lg-6">
            <!--                    <img src="image/logo.jpg" alt="image" style="width: 50px;height: 50px;border-radius: 50%;">-->
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
                <h3 class="grid2h3">Edit CLIENT</h3>
            </div>
            <?php
            include 'db_conn.php';
            $userId = $_GET['userId'];
            $sql = "SELECT * FROM `user` WHERE id='$userId'";
            $result = $con->query($sql);
            if($result){
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()){
                        $fname = $row['fname'];
                        echo "<form name=\"addProductForm\" method=\"post\" action=\"scripts/updateClientIdea.php\">
                 <div class=\"d-flex flex-column\">
                    <h4>Recommend Ideas</h4>
                    <select name=\"ary[]\" multiple=\"multiple\">";
                        $allIdeas = "SELECT * FROM `ideas`";
                        $resultIdeas = $con->query($allIdeas);
                        $recommend_ideas = $row['recommend_ideas'];
                        while($row1 = $resultIdeas->fetch_assoc())
                        {
                            if (strpos($recommend_ideas, $row1['id']) !== false){
                                echo "<option selected  value=".$row1['id']." >". $row1['instrument_name']."</option>";
                            }else{
                                echo "<option  value=".$row1['id']." >". $row1['instrument_name']."</option>";
                            }
                        }
                        echo "</select>
                        </div>
                <div class=\" mt-2\">
                    <button type=\"submit\"  class=\"btn btn-primary\">Update</button>
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
