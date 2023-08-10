<?php
session_start();
include('connect.php');

if (isset($_POST['rating_value'])) {
    $user_id = $_SESSION['user_id'];
    $pid = $_SESSION['p_id'];
    $rating_value = $_POST['rating_value'];
    $user_email = $_POST['user_email'];
    $user_message = $_POST['user_message'];
    $now = time();

    $userQuery = "SELECT * FROM users WHERE id='$user_id'";
    $res = mysqli_query($con, $userQuery);
    $userData = mysqli_fetch_array($res);
    $email = $userData['email'];

    if ($user_email == $email) {
        $query = "INSERT INTO rating (product_id,name, rating, message, datetime) 
        VALUES ('$pid','$user_email','$rating_value',\"$user_message\",'$now')";
        $result = mysqli_query($con,$query);
    } else {
        echo "Noo";
    }

    // $stmt = mysqli_stmt_init($link);
    // mysqli_stmt_prepare($stmt, "SELECT f_name,l_name FROM users WHERE id='$user_id'");
    // mysqli_stmt_execute($stmt);


}

if(isset($_POST['action'])){

    $pid = $_SESSION['p_id'];
    $avgRatings = 0;
    $avgUserRatings = 0;
    $totalReviews = 0;
    $totalRatings5 = 0;
    $totalRatings4 = 0;
    $totalRatings3 = 0;
    $totalRatings2 = 0;
    $totalRatings1 = 0;
    $ratingsList = array();
    $totalRatings_avg = 0;


    $query = "SELECT * FROM rating WHERE product_id='$pid' ORDER BY review_id DESC";
    $res = mysqli_query($con,$query);
    while($row = mysqli_fetch_assoc($res)) {
        $ratingsList[] = array(
          'review_id' => $row['review_id'],
          'name' => $row['name'],
          'rating' => $row['rating'],
          'message' => $row['message'],
          'datetime' => date('l jS \of F Y h:i:s A',$row['datetime']) 
        );
        if($row['rating'] == '5'){
          $totalRatings5++;
        }
        if($row['rating'] == '4'){
          $totalRatings4++;
        }
        if($row['rating'] == '3'){
          $totalRatings3++;
        }
        if($row['rating'] == '2'){
          $totalRatings2++;
        }
        if($row['rating'] == '1'){
          $totalRatings1++;
        }
        $totalReviews++;
        $totalRatings_avg = $totalRatings_avg + intval($row['rating']);  
      }
      $avgUserRatings = $totalRatings_avg / $totalReviews;
    
      $output = array( 
        'avgUserRatings' => number_format($avgUserRatings, 1),
        'totalReviews' => $totalReviews,
        'totalRatings5' => $totalRatings5,
        'totalRatings4' => $totalRatings4,
        'totalRatings3' => $totalRatings3,
        'totalRatings2' => $totalRatings2,
        'totalRatings1' => $totalRatings1,
        'ratingsList' => $ratingsList
      );
    
      echo json_encode($output);

}
?>