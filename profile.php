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




                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <div class="profile-picture-container">
                                            <img class="profile-picture rounded-circle" src="images/users/profile-image/user-avatar.png" alt="Profile Picture">
                                        </div>
                                        <?php 
                                        
                                            if ($_SESSION["loggedin"] == true) {
                                                echo '<h4 class="card-title mb-0 mt-3">' . $_SESSION["username"] . '</h4>
                                                    <p class="card-text">Account Balance: LKR ' . $_SESSION["balance"] . '</p>';
                                            }else{
                                                echo '<p class="card-text">Log In to see details.</p>';
                                            }

                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">Profile Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <p id="profileMessage"></p>
                                        <form method="post" enctype="multipart/form-data" id="profile-form">
                                            <div class="form-group">
                                                <label for="profile_picture">Profile Picture</label>
                                                <input type="file" class="form-control-file" id="profile_picture" name="profile_picture">
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="first_name">First Name</label>
                                                        <input type="text" class="form-control" id="first_name" name="first_name" value="">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="last_name">Last Name</label>
                                                        <input type="text" class="form-control" id="last_name" name="last_name" value="">
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="form-group">
                                                <label for="telephone">Telephone</label>
                                                <input type="text" class="form-control" id="telephone" name="telephone" value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="age">Age</label>
                                                <input type="number" class="form-control" id="age" name="age" value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control" id="address" name="address" value="">
                                            </div>

                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
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
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'crud/select.php', true);
            xhr.send('table=user_details&id=<?php echo $_SESSION["id"] ?>&where=user_id');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    let data_JSON = JSON.parse(xhr.response);



                    if (data_JSON.length == 0) {
                        $('#profileMessage').text("We couldn't find your profile information. Please fill the following to finalize your account");

                    } else if (data_JSON.length == 1) {
                        let data = data_JSON[0];
                        $('#profileMessage').text("We found the following account details for your profile. Please keep these details updated.");
                        $('#profile-form [name="first_name"]').val(data.first_name);
                        $('#profile-form [name="last_name"]').val(data.last_name);
                        $('#profile-form [name="telephone"]').val(data.telephone);
                        $('#profile-form [name="age"]').val(data.age);
                        $('#profile-form [name="address"]').val(data.address);
                        // Assuming the data object is stored in the variable 'profileData'
                        var profilePicturePath = data.profile_picture_path;
                        var baseUrl = 'http://localhost/cricbet40';
                        var imagePath = baseUrl + profilePicturePath;
                        $('.profile-picture').attr('src', imagePath);


                    }

                }
            }


        });


        document.getElementById('profile-form').addEventListener('submit', function(event) {
            event.preventDefault(); // prevent the form from being submitted


            var xhr = new XMLHttpRequest(); // Creates a XHR Request

            var formElement = document.getElementById('profile-form');
            var updateData = new FormData(formElement); //Gets the form data
            updateData.append('table', 'user_details');
            updateData.append('where', 'user_id');
            updateData.append('id', '<?php echo $_SESSION["id"] ?>');
            var profile_image_input = document.getElementById('profile_picture');
            updateData.append('profile_picture', profile_image_input.files[0]);

            xhr.open('POST', 'crud/update.php', true);
            xhr.send(updateData); // send the request

            // handle the response
            xhr.onload = function() {
                if (this.readyState == 4 && xhr.status == 200) {
                    console.log(xhr.response);
                    location.reload();
                } else {
                    console.log("Error");
                }
            };



        });
    </script>




</body>

</html>