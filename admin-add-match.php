<?php include 'layouts/admin-session.php'; ?>
<?php include 'layouts/header.php'; ?>
<!-- C3 charts css -->
<link href="public/plugins/c3/c3.min.css" rel="stylesheet" type="text/css" />

<?php include 'layouts/headerStyle.php'; ?>

<body class="fixed-left">

    <?php include 'layouts/loader.php';
    $viewing_id = isset($_GET['id']) ? $_GET['id'] : 'No User';
    ?>

    <!-- Begin page -->
    <div id="wrapper">

        <?php include 'layouts/admin-navbar.php'; ?>

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




                        <div class="row">

                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">Match Information - <span class="sport-name"></span> </h4>

                                    </div>
                                    <div class="card-body">
                                        <p id="databaseMessage"></p>
                                        <form method="post" id="match-form">
                                            <div class="form-group">
                                                <label for="match_name">Match Name</label>
                                                <input type="text" class="form-control" id="match_name" name="match_name" value="">
                                            </div>

                                            <div class="form-group">
                                                <label for="match_date">Match Date</label>
                                                <input type="date" class="form-control" id="match_date" name="match_date" value="">
                                            </div>

                                            <div class="form-group">

                                                <div class="form-group d-flex align-items-center">
                                                    <label for="participants" class="mr-2">Participants</label>
                                                    <button type="button" class="btn btn-primary btn-sm add-participant"><i class="fa fa-plus"></i></button>
                                                </div>

                                                <div id="participants-container">
                                                    <div class="participant-row">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control participant" name="participants[]" placeholder="Participant">
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-danger btn-sm remove-participant">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <button type="submit" class="btn btn-primary">Add Match</button>
                                        </form>


                                        <p id="update-message"></p>
                                    </div>
                                </div>
                            </div>
                        </div>







                    </div><!-- container -->

                </div> <!-- Page content Wrapper -->

            </div> <!-- content -->

            <?php include 'layouts/footer.php'; ?>

        </div>
        <!-- End Right content here -->

    </div>
    <!-- END wrapper -->


    <?php include 'layouts/footerScript.php'; ?>

    <!-- Peity chart JS -->
    <script src="public/plugins/peity-chart/jquery.peity.min.js"></script>

    <!--C3 Chart-->
    <script src="public/plugins/d3/d3.min.js"></script>
    <script src="public/plugins/c3/c3.min.js"></script>

    <!-- KNOB JS -->
    <script src="public/plugins/jquery-knob/excanvas.js"></script>
    <script src="public/plugins/jquery-knob/jquery.knob.js"></script>

    <!-- Page specific js -->
    <script src="public/assets/pages/dashboard.js"></script>

    <!-- App js -->
    <script src="public/assets/js/app.js"></script>


    <script>
        $(document).ready(function() {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'crud/select.php', true);
            xhr.send('table=sports&id=' + <?php echo $viewing_id ?> + '&where=sport_id');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var responseData = JSON.parse(xhr.response);
                    if (responseData.length > 0) {
                        var sport = responseData[0];


                        // Update profile name
                        var sportName = document.querySelector('.sport-name');
                        sportName.textContent = sport.sport_name;


                    }
                }
            }


            $(document).ready(function() {
                var participantIndex = 1;

                // Add Participant button click event
                $('.add-participant').click(function() {
                    var participantRow = `
                            <div class="participant-row mt-2">
                                <div class="input-group">
                                    <input type="text" class="form-control participant" name="participants[]" placeholder="Participant">
                                    <div class="input-group-append">
                                    <button type="button" class="btn btn-danger btn-sm remove-participant">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    </div>
                                </div>
                            </div>
                    `;
                    $('#participants-container').append(participantRow);
                });

                // Remove Participant button click event
                $(document).on('click', '.remove-participant', function() {
                    $(this).closest('.participant-row').remove();
                });
            });

        });


        document.getElementById('match-form').addEventListener('submit', function(event) {
            event.preventDefault(); // prevent the form from being submitted

            var xhr = new XMLHttpRequest(); // Create a XHR Request

            var formElement = document.getElementById('match-form');
            var formData = new FormData(formElement); // Get the form data

            // Additional data for the request
            formData.append('table', 'matches');
            formData.append('participants_table', 'match_participants');
            formData.append('where', 'no-where');
            formData.append('id', 'no-id');

            var sportName = document.querySelector('.sport-name');
            formData.append('sport_name', sportName.textContent);

            xhr.open('POST', 'crud/update.php', true);
            xhr.send(formData); // send the request

            // Handle the response
            xhr.onload = function() {
                if (this.readyState === 4 && xhr.status === 200) {
                    document.getElementById('update-message').innerText = xhr.response;
                    document.getElementById('match-form').reset();
                    // Reset the participant rows
                    var participantsContainer = document.getElementById('participants-container');
                    participantsContainer.innerHTML = ""; // Clear all participant rows
                    addParticipantRow(); // Add an initial participant row
                } else {
                    console.log('Error');
                }
            };
        });
    </script>



</body>

</html>