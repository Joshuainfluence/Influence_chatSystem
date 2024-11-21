<?php
require_once __DIR__ . "/../config/session.php";
$user_id = $_SESSION['user_id'];
// if ($_SERVER['REQUEST_METHOD'] == "POST") {
$searchTerm = $_POST['searchTerm'];

require_once __DIR__ . "/../config/dbh.php";
require_once __DIR__ . "/../public/search.classes.php";
require_once __DIR__ . "/../public/search.contr.php";

$search = new SearchContr($user_id, $searchTerm);

$results = $search->userSearch();

if (!empty($results)) {
    foreach ($results as $row) {
        echo '<div class="row1">';
        echo ' <div class="col1">
                            <img src="include/profileUploads/' . $row['profileImage'] . '" alt="">
                        </div>';
        echo '<div class="col2">';
        echo '<div class="row2">
                                    <h3>' . ucfirst($row['fname']) . " " . ucfirst($row['lname']);
        if ($row['account'] == "verified") {
            echo '<img src="assets/img/verify3.png" alt="">';
        }
        echo '</h3>
                                    <p>Yesterday</p>
                                </div>';
        echo '<div class="row3">
                                    <p>Yes</p>
                                </div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<div class="row3">
                                <p style="font-size: 0.8rem; padding: 1rem 0 0 2rem;">Search not found</p>
                            </div>';
}


// header("Location: ../home.php?user_id=$user_id");
    

    

// }