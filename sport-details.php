<?php
require_once "layouts/config.php";

// Check if the 'sport' parameter is set in the POST request
if (isset($_POST['sport'])) {
    // Sanitize and get the selected sport from the POST data
    $selectedSport = mysqli_real_escape_string($link, $_POST['sport']);

    // Query to fetch match data and participants based on the selected sport
    $query = "SELECT matches.match_name, match_participants.participant_name 
              FROM matches 
              INNER JOIN sports ON matches.sport_id = sports.sport_id
              LEFT JOIN match_participants ON matches.match_id = match_participants.match_id
              WHERE sports.sport_id = '$selectedSport'";

    $result = mysqli_query($link, $query);

    if ($result) {
        $matches = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $matchName = $row['match_name'];
            $participantName = $row['participant_name'];

            if (!isset($matches[$matchName])) {
                // Initialize the match data
                $matches[$matchName] = array(
                    'match_name' => $matchName,
                    'team1' => null,
                    'team2' => null,
                );
            }

            // Assign participants to team1 and team2
            if ($matches[$matchName]['team1'] === null) {
                $matches[$matchName]['team1'] = $participantName;
            } elseif ($matches[$matchName]['team2'] === null) {
                $matches[$matchName]['team2'] = $participantName;
            }
        }

        // Convert the associative array to a numerical array for JSON encoding
        $matches = array_values($matches);

        // Return the matches as JSON
        echo json_encode($matches);
    } else {
        // Handle the case where the query fails
        echo json_encode(array('error' => 'Query failed'));
    }
} else {
    // Handle the case where the 'sport' parameter is not set
    echo json_encode(array('error' => 'Sport not specified'));
}
?>
