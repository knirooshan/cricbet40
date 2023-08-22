<?php include 'layouts/session.php'; ?>
<?php include 'layouts/header.php'; ?>

<?php include 'layouts/headerStyle.php'; ?>

<body class="fixed-left">

    <?php include 'layouts/loader.php'; ?>

    <!-- Begin page -->
    <div id="wrapper">

        <?php include 'layouts/navbar.php'; ?>

        <!-- Start right Content here -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">

                <?php include 'layouts/topbar.php'; ?>

                <!-- ==================
                         PAGE CONTENT START
                         ================== -->

                <div class="page-content-wrapper">

                    <div class="container-fluid">



                        <h2>Place Bets</h2>
                        <form>
                            <div class="form-group">
                                <label for="sportSelect">Select Sport:</label>
                                <select class="form-control" id="sportSelect">
                                    <option value="normal">Select a Sport</option>
                                </select>
                            </div>
                        </form>
                        <div class="row" id="matchList">
                            <!-- Matches will be added dynamically here -->
                        </div>




                    </div><!-- container -->

                </div> <!-- Page content Wrapper -->

                <!-- Modal for placing a bet -->
                <div class="modal fade" id="placeBetModal" tabindex="-1" role="dialog" aria-labelledby="placeBetModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="placeBetModalLabel">Place a Bet</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Match:</strong> <span id="matchName"></span></p>
                                <p><strong>Teams:</strong> <span id="team1"></span> vs <span id="team2"></span></p>
                                <form id="placeBetForm">
                                    <div class="form-group">
                                        <label for="betAmount">Bet Amount:</label>
                                        <input type="number" class="form-control" id="betAmount" name="betAmount" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="winnerSelect">Select Winner:</label>
                                        <select class="form-control" id="winnerSelect" name="winnerSelect" required>
                                            <option value="">-- Select Winner --</option>
                                            <option id="team1Option" value="team1">Team 1</option>
                                            <option id="team2Option" value="team2">Team 2</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="placeBetButton">Place Bet</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- content -->

            <?php include 'layouts/footer.php'; ?>

        </div>
        <!-- End Right content here -->

    </div>
    <!-- END wrapper -->

    <?php include 'layouts/footerScript.php'; ?>

    <!-- App js -->
    <script src="public/assets/js/app.js"></script>

    <script>
        // $(document).ready(function() {
        //     // Define the match data for each sport
        //     var matchData = {
        //         football: [{
        //                 name: "Match 1",
        //                 team1: "Team A",
        //                 team2: "Team B"
        //             },
        //             {
        //                 name: "Match 2",
        //                 team1: "Team C",
        //                 team2: "Team D"
        //             },
        //             {
        //                 name: "Match 3",
        //                 team1: "Team E",
        //                 team2: "Team F"
        //             }
        //         ],
        //         cricket: [{
        //                 name: "Match 4",
        //                 team1: "Team G",
        //                 team2: "Team H"
        //             },
        //             {
        //                 name: "Match 5",
        //                 team1: "Team I",
        //                 team2: "Team J"
        //             },
        //             {
        //                 name: "Match 6",
        //                 team1: "Team K",
        //                 team2: "Team L"
        //             }
        //         ],
        //         tennis: [{
        //                 name: "Match 7",
        //                 team1: "Player M",
        //                 team2: "Player N"
        //             },
        //             {
        //                 name: "Match 8",
        //                 team1: "Player O",
        //                 team2: "Player P"
        //             },
        //             {
        //                 name: "Match 9",
        //                 team1: "Player Q",
        //                 team2: "Player R"
        //             }
        //         ]
        //     };

        //     // Function to update the match list based on the selected sport
        //     function updateMatchList() {
        //         var selectedSport = $("#sportSelect").val();
        //         var matches = matchData[selectedSport];

        //         // Clear the existing match list
        //         $("#matchList").empty();

        //         // Add the new matches to the match list
        //         for (var i = 0; i < matches.length; i++) {
        //             var match = matches[i];
        //             var matchRow = $("<div>").addClass("col-md-4 mb-3");
        //             var matchLink = $("<a>").addClass("btn btn-primary btn-block match-btn").attr("href", "#").text(match.name + " (" + match.team1 + " vs " + match.team2 + ")");
        //             matchLink.data("match", match);
        //             matchRow.append(matchLink);
        //             $("#matchList").append(matchRow);
        //         }
        //     }

        //     // Update the match list when the sport select is changed
        //     $("#sportSelect").on("change", function() {
        //         updateMatchList();
        //     });

        //     // Initialize the match list with the default sport
        //     updateMatchList();

        //     // Show the modal when a match button is clicked
        //     $("#matchList").on("click", ".match-btn", function() {
        //         var match = $(this).data("match");
        //         $("#matchName").text(match.name);
        //         $("#team1").text(match.team1);
        //         $("#team2").text(match.team2);
        //         $("#placeBetForm")[0].reset();
        //         $("#placeBetModal").modal("show");
        //     });

        //     // Place the bet when the Place Bet button is clicked
        //     $("#placeBetButton").on("click", function() {
        //         var betAmount = $("#betAmount").val();
        //         var winner = $("#winnerSelect").val();
        //         if (betAmount && winner) {
        //             // You can do something with the bet data here, like submitting it to a server
        //             alert("Bet placed: " + betAmount + " on " + winner);
        //             $("#placeBetModal").modal("hide");
        //         } else {
        //             alert("Please enter a bet amount and select a winner.");
        //         }
        //     });
        // });

        $(document).ready(function() {
    // Function to update the match list based on the selected sport
    function updateMatchList() {
        var selectedSport = $("#sportSelect").val();

        console.log(selectedSport);

        // Make an AJAX request to fetch match data based on the selected sport
        $.ajax({
            url: "sport-details.php", // Replace with the URL of your PHP script
            method: "POST",
            data: { sport: selectedSport }, // Send the selected sport as data
            dataType: "json",
            success: function(matches) {
                // Clear the existing match list
                $("#matchList").empty();

                console.log(matches);

                // Add the new matches to the match list
                for (var i = 0; i < matches.length; i++) {
                    var match = matches[i];
                    var matchRow = $("<div>").addClass("col-md-4 mb-3");
                    var matchLink = $("<a>").addClass("btn btn-primary btn-block match-btn").attr("href", "#").text(match.match_name + " (" + match.team1 + " vs " + match.team2 + ")");
                    matchRow.append(matchLink);
                    $("#matchList").append(matchRow);
                }
            },
            error: function(error) {
                console.error("Error fetching match data:", error);
            }
        });
    }

    // Update the match list when the sport select is changed
    $("#sportSelect").on("change", function() {
        updateMatchList();
    });

    // Initialize the match list with the default sport
    updateMatchList();

    // Show the modal when a match button is clicked
    $("#matchList").on("click", ".match-btn", function() {
        var match = $(this).data("match");
        $("#matchName").text(match.name);
        $("#team1").text(match.team1);
        $("#team2").text(match.team2);
        $("#placeBetForm")[0].reset();
        $("#placeBetModal").modal("show");
    });

    // Place the bet when the Place Bet button is clicked
    $("#placeBetButton").on("click", function() {
        var betAmount = $("#betAmount").val();
        var winner = $("#winnerSelect").val();
        if (betAmount && winner) {
            // You can do something with the bet data here, like submitting it to a server
            alert("Bet placed: " + betAmount + " on " + winner);
            $("#placeBetModal").modal("hide");
        } else {
            alert("Please enter a bet amount and select a winner.");
        }
    });
});


        // Get a reference to the select element
const sportSelect = document.getElementById('sportSelect');

// Make an AJAX request to your PHP script
fetch('bets-db-search.php')
  .then(response => response.json())
  .then(data => {
    // Check if the data is an array
    if (Array.isArray(data)) {
      // Loop through the data and create an option element for each item
      data.forEach(item => {
        const option = document.createElement('option');
        option.value = item.sport_id; // Assuming "id" is the value you want to use
        option.text = item.sport_name; // Assuming "text" is the text to display
        sportSelect.appendChild(option);
      });
    } else {
      // Handle the case where data is not an array (e.g., an error message)
      console.error('Invalid data format:', data);
    }
  })
  .catch(error => {
    // Handle fetch errors
    console.error('Fetch error:', error);
  });


    </script>


</body>

</html>