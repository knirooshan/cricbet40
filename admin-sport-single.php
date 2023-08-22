<?php include 'layouts/admin-session.php'; ?>
<?php include 'layouts/header.php'; ?>
<!-- C3 charts css -->
<link href="public/plugins/c3/c3.min.css" rel="stylesheet" type="text/css" />

<?php include 'layouts/headerStyle.php';
$viewing_id = isset($_GET['id']) ? $_GET['id'] : 'No User';
?>

<body class="fixed-left">

    <?php include 'layouts/loader.php'; ?>

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



                        <!-- Add this code inside the container-fluid div -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="container">
                                            <div class="row justify-content-center">
                                                <div class="col-md-8">
                                                    <div class="card">
                                                        <div class="card-body text-center">
                                                            <h2 class="profile-name">John Doe</h2>

                                                            <div class="Feature-image">
                                                                <img src="/images/users/profile-image/user-avatar.png" alt="Profile Picture" class="img-thumbnail" style="width: 40%;">
                                                            </div>
                                                            <div class="mt-3 mb-2">
                                                                <a href="admin-add-match.php?id=<?php echo $viewing_id ?>" class="btn btn-primary btn-sm">Add Match</a>
                                                                <button class="btn btn-danger btn-sm" onclick="deleteSport(<?php echo $viewing_id ?>)">Delete Sport</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="container mt-4">
                                            <div class="row justify-content-center">
                                                <div class="col">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table id="data-table" class="table table-bordered dt-responsive nowrap" style="width: 100%"></table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                        // Update profile picture
                        var Picture = document.querySelector('.Feature-image img');
                        var baseUrl = 'http://localhost/cricbet40';

                        Picture.src = baseUrl + sport.sport_image_path;

                        // Update profile name
                        var profileName = document.querySelector('.profile-name');
                        profileName.textContent = sport.sport_name;


                    }
                }
            }


            var xhr2 = new XMLHttpRequest();
            xhr2.open('POST', 'crud/select.php', true);
            xhr2.send('table=matches&where=sport_id&id=<?php echo $viewing_id ?>');
            xhr2.onreadystatechange = function() {
                if (xhr2.readyState === 4 && xhr2.status === 200) {
                    console.log(xhr2.response)
                    let data2 = JSON.parse(xhr2.response);


                    $('#data-table').DataTable({
                        columns: [{
                                data: 'sport_id',
                                title: 'Sport ID'
                            }, {
                                data: 'match_id',
                                title: 'Match ID'
                            },
                            {
                                data: 'match_name',
                                title: 'Match Name'
                            },
                            {
                                data: 'match_date',
                                title: 'Match Date',
                            },
                            {
                                data: null,
                                title: 'Actions',
                                render: function(data, type, row) {
                                    // Create the delete button using a Font Awesome icon
                                    var deleteButton = '<button class="btn btn-outline-primary btn-sm" onclick="deleteMatch(' + row.match_id + ')"><i class="fa fa-trash"></i></button>';
                                    // Create the view button using a Font Awesome icon
                                    var viewButton = '<button class="btn btn-outline-primary btn-sm" onclick="view(' + row.match_id + ')"><i class="fa fa-eye"></i></button>';
                                    // Return the HTML for the buttons
                                    return viewButton + ' ' + deleteButton;
                                }
                            }
                        ]
                    }).rows.add(data2).draw();
                }


            }

        });


        function deleteSport(id) {
            if (confirm('Are you sure you want to delete this Sport?')) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'crud/delete.php', true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var xhr2 = new XMLHttpRequest();
                        xhr2.open('POST', 'crud/delete.php', true);
                        xhr2.onreadystatechange = function() {
                            if (xhr2.readyState === 4 && xhr2.status === 200) {
                                window.location = "admin-sports.php";
                            }
                        };
                        xhr2.send('table=sports&id=' + id + '&where=sport_id');
                    }
                };
                xhr.send('table=matches&id=' + id + '&where=sport_id');

            }
        }

        function deleteMatch(id) {
            if (confirm('Are you sure you want to delete this Match?')) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'crud/delete.php', true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var xhr2 = new XMLHttpRequest();
                        xhr2.open('POST', 'crud/delete.php', true);
                        xhr2.onreadystatechange = function() {
                            if (xhr2.readyState === 4 && xhr2.status === 200) {
                                location.reload();
                            }
                        };
                        xhr2.send('table=matches&id=' + id + '&where=match_id');
                    }
                };
                xhr.send('table=match_participants&id=' + id + '&where=match_id');

            }
        }
    </script>



</body>

</html>