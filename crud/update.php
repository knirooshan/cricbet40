<?php

include "../layouts/config.php";

$table = $_POST['table'];
$condition = $_POST['id'];
$where = $_POST['where'];

if ($table == "user_details") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $phone = $_POST['telephone'];
    $age = $_POST['age'];

    // Check if a new file has been uploaded
    if ($_FILES['profile_picture']['name']) {
        // Set the upload directory paths
        $profile_dir = '../images/users/profile-image/';
        $profile_ext = pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION);
        $profile_image_name = $first_name . '_image.' . $profile_ext;
        $profile_image_path = $profile_dir . $profile_image_name;
        move_uploaded_file($_FILES['profile_picture']['tmp_name'], $profile_image_path);

        $profile_image_update = ",`profile_picture_path`='$profile_image_path'";
    } else {
        $profile_image_update = '';
    }

    if (empty($first_name) || empty($last_name) || empty($phone)) {
        echo 'First Name, Last Name, and Telephone are required fields';
    } else {
        $query = "UPDATE user_details SET first_name='$first_name', last_name='$last_name', telephone='$phone', age='$age', `address`='$address' $profile_image_update where $where=$condition";
    }


    $result = mysqli_query($link, $query);

    if (mysqli_affected_rows($link) == 0 && $table == "user_details") {
        $query = "INSERT INTO user_details (first_name, last_name, telephone, age, `address`, profile_picture_path, $where) VALUES ('$first_name', '$last_name', '$phone', '$age', '$address', '$profile_image_path', '$condition')";
        $result = mysqli_query($link, $query);
    }
}

if ($table == "sports") {
    $sport_name = $_POST['sport_name'];


    // Check if a new file has been uploaded
    if ($_FILES['sport-image']['name']) {
        // Set the upload directory paths
        $image_dir = '../images/sports/sport-image/';
        $image_ext = pathinfo($_FILES['sport-image']['name'], PATHINFO_EXTENSION);
        $image_name = $sport_name . '_image.' . $image_ext;
        $image_path = $image_dir . $image_name;
        move_uploaded_file($_FILES['sport-image']['tmp_name'], $image_path);

        $image_update = ",`sport_image_path`='$image_path'";
    } else {
        $image_update = '';
    }

    if (empty($sport_name)) {
        echo 'Sport Name is required';
    } else {

        $query = "INSERT INTO sports (sport_name, sport_image_path) VALUES ('$sport_name', '$image_path')";
    }


    $result = mysqli_query($link, $query);
}

if ($table == "matches") {
    $sport_name = $_POST['sport_name'];

    if (empty($sport_name)) {
        echo 'Sport Name is required';
    } else {
        // Retrieve other form data
        $match_name = $_POST['match_name'];
        $match_date = $_POST['match_date'];
        $participants = $_POST['participants'];

        // Perform necessary validations on the data
        // ...

        // Retrieve the sport_id based on the sport_name
        $sport_id_query = "SELECT sport_id FROM sports WHERE sport_name = '$sport_name'";
        $sport_id_result = mysqli_query($link, $sport_id_query);

        if (mysqli_num_rows($sport_id_result) > 0) {
            $row = mysqli_fetch_assoc($sport_id_result);
            $sport_id = $row['sport_id'];

            // Insert match details into the matches table
            $query = "INSERT INTO matches (sport_id, match_name, match_date) VALUES ('$sport_id', '$match_name', '$match_date')";
            $result = mysqli_query($link, $query);

            if ($result) {
                $match_id = mysqli_insert_id($link); // Get the newly inserted match ID

                // Insert match participants into the match_participants table
                foreach ($participants as $participant) {
                    // Perform necessary validations on each participant
                    // ...

                    $participant_name = mysqli_real_escape_string($link, $participant);
                    $query = "INSERT INTO match_participants (match_id, participant_name) VALUES ('$match_id', '$participant_name')";
                    mysqli_query($link, $query);
                }

                echo 'Match added successfully! ';
            } else {
                echo 'Error: Failed to add match.';
            }
        } else {
            echo 'Error: Invalid sport name.';
        }
    }
}




if ($result) {
    echo "Update Successful";
} else {
    echo 'Update Failed';
}

mysqli_close($link);
