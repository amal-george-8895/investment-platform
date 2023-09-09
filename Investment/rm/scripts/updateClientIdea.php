<?php

session_start();
include '../db_conn.php';

if (isset($_POST['ary'])) {
    // removes backslashes
    $recommend_ideas =[];
    $values = $_POST['ary'];
    $recommend_ideas = array();
    foreach ($values as $a){
        array_push($recommend_ideas, $a);
    }
    $recommend_ideas = implode(',', $recommend_ideas);
    $id = $_SESSION['userId'];
    $query    = "UPDATE `user` SET recommend_ideas='$recommend_ideas' WHERE id='$id'";
    $result   = mysqli_query($con, $query);
    if ($result) {
        $role = $_SESSION['role'];
        echo "<div class='form'>
                  <h3>Idea Updated successfully $role</h3><br/>";
        echo "<p class='link'>Click here to <a href='../clientpage.php'>Client List</a></p>
                  </div>";
    } else {
        echo "<div class='form'>
                  <h3>Required fields are missing</h3><br/>
                  <p class='link'>Click here to <a href='../clientpage.php'>Update</a> again.</p>
                  </div>";
    }
}
?>

