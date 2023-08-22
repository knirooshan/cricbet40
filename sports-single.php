<?php include 'layouts/session.php'; ?>
<?php include 'layouts/session.php'; ?>

<?php
include 'layouts/header.php';
include 'layouts/headerStyle.php';

// Get the sport name from the URL
$sport_name = isset($_GET['sport-name']) ? $_GET['sport-name'] : 'Unknown Sport';
?>

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
                        <h1 class="page-title">Matches : <?php echo ucfirst($sport_name); ?></h1>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                        <th>Teams</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="matches-table-body">
                                                    <tr>
                                                        <td>2023-05-10</td>
                                                        <td>15:30</td>
                                                        <td>Team A vs. Team B</td>
                                                        <td><button class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></button> <button class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
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
    <!-- App js -->
    <script src="public/assets/js/app.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": false,
                "lengthChange": false,
                "language": {
                    "search": "Search: ",
                    "paginate": {
                        "previous": "<i class='fa fa-chevron-left'></i>",
                        "next": "<i class='fa fa-chevron-right'></i>"
                    }
                }
            });


            $(document).ready(function() {
                var sportName = '<?php echo $sport_name; ?>';
                var sportId;

                // Get the sport ID based on the sport name
                var xhrSport = new XMLHttpRequest();
                xhrSport.open('POST', 'crud/select.php', true);
                xhrSport.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhrSport.onreadystatechange = function() {
                    if (xhrSport.readyState === 4 && xhrSport.status === 200) {
                        var data_JSON = JSON.parse(xhrSport.responseText);
                        if (data_JSON.length > 0) {
                            console.log(data_JSON)
                            sportId = data_JSON[0].sport_id;
                            console.log(sportId);
                            fetchMatches(sportId);
                        } else {
                            console.log('Sport ID not found');
                        }
                    }
                };
                xhrSport.send('table=sports&where=sport_name&id=' + sportName);

                // Fetch match details based on the sport ID
                function fetchMatches(sportId) {
                    var xhrMatches = new XMLHttpRequest();
                    xhrMatches.open('POST', 'crud/select.php', true);
                    xhrMatches.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhrMatches.onreadystatechange = function() {
                        if (xhrMatches.readyState === 4 && xhrMatches.status === 200) {
                            var data_JSON = JSON.parse(xhrMatches.responseText);
                            console.log(xhrMatches.response);
                            populateTable(data_JSON);
                        }
                    };
                    xhrMatches.send('table=matches&where=sport_id&id=' + sportId);
                }

                // Populate the table with match details

                function populateTable(matches) {
                    console.log(matches)
                    var tableBody = document.getElementById('matches-table-body');
                    tableBody.innerHTML = '';


                    if (matches.length === 0) {
                        var row = document.createElement('tr');
                        var noMatchesCell = document.createElement('td');
                        noMatchesCell.setAttribute('colspan', '4');
                        noMatchesCell.textContent = 'No Matches Found. Please Check Back Later';

                        row.appendChild(noMatchesCell);
                        tableBody.appendChild(row);
                    } else {

                        matches.forEach(function(match) {
                            var row = document.createElement('tr');
                            var nameCell = document.createElement('td');
                            var dateCell = document.createElement('td');
                            var participantsCell = document.createElement('td');
                            var actionsCell = document.createElement('td');

                            nameCell.textContent = match.match_name;
                            dateCell.textContent = match.match_date.split(' ')[0]; // Extract date only

                            // Fetch participant details for the match
                            var participantsXHR = new XMLHttpRequest();
                            participantsXHR.open('POST', 'crud/select.php', true);
                            participantsXHR.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            participantsXHR.onreadystatechange = function() {
                                if (participantsXHR.readyState === 4 && participantsXHR.status === 200) {
                                    var participants_JSON = JSON.parse(participantsXHR.responseText);
                                    var participants = participants_JSON.map(function(participant) {
                                        return participant.participant_name;
                                    });
                                    participantsCell.textContent = participants.join(', ');
                                }
                            };
                            participantsXHR.send('table=match_participants&where=match_id&id=' + match.match_id);


                            row.appendChild(nameCell);
                            row.appendChild(dateCell);
                            row.appendChild(participantsCell);
                            row.appendChild(actionsCell);
                            tableBody.appendChild(row);
                        });
                    }



                }

            });


        });
    </script>
</body>

</html>