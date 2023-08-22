<?php include 'layouts/admin-session.php'; ?>
<?php include 'layouts/header.php'; ?>
<!-- C3 charts css -->
<link href="public/plugins/c3/c3.min.css" rel="stylesheet" type="text/css" />

<?php include 'layouts/headerStyle.php'; ?>

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




                        <div class="row">

                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">Sport Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <p id="databaseMessage"></p>
                                        <form method="post" enctype="multipart/form-data" id="sport-form">
                                            <div class="form-group">
                                                <label for="sport_image">Sport Image</label>
                                                <input type="file" class="form-control-file" id="sport-image" name="sport_image">
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="sport_name">Sport Name</label>
                                                        <input type="text" class="form-control" id="sport_name" name="sport_name" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Add Sport</button>
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
        document.getElementById('sport-form').addEventListener('submit', function(event) {
            event.preventDefault(); // prevent the form from being submitted


            var xhr = new XMLHttpRequest(); // Creates a XHR Request

            var formElement = document.getElementById('sport-form');
            var updateData = new FormData(formElement); //Gets the form data
            updateData.append('table', 'sports');
            updateData.append('where', 'sport_name');
            updateData.append('id', 'nothing');
            var profile_image_input = document.getElementById('sport-image');
            updateData.append('sport-image', profile_image_input.files[0]);

            xhr.open('POST', 'crud/update.php', true);
            xhr.send(updateData); // send the request

            // handle the response
            xhr.onload = function() {
                if (this.readyState == 4 && xhr.status == 200) {
                    document.getElementById('update-message').innerText = xhr.response;
                    document.getElementById('sport-form').reset();
                } else {
                    console.log("Error");
                }
            };



        });
    </script>



</body>

</html>