<?php
    $getProfile = "SELECT * FROM users WHERE id='1'";
    $query = mysqli_query($conn, $getProfile);
    $profile = mysqli_fetch_assoc($query);
?>