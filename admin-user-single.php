<?php include 'layouts/admin-session.php'; ?>
<?php include 'layouts/header.php'; ?>
<!-- C3 charts css -->
<link href="public/plugins/c3/c3.min.css" rel="stylesheet" type="text/css" />

<?php include 'layouts/headerStyle.php';
$viewing_user_id = isset($_GET['id']) ? $_GET['id'] : 'No User';
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
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="profile-picture">
                                                                        <img src="/images/users/profile-image/user-avatar.png" alt="Profile Picture" class="img-thumbnail rounded-circle">
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-8">
                                                                    <h2 class="profile-name">John Doe</h2>
                                                                    <ul class="profile-details">
                                                                        <li><strong>Telephone:</strong> 0764239404</li>
                                                                        <li><strong>Age:</strong> 20</li>
                                                                        <li><strong>Address:</strong> 76/22, Ihalayagoda, Gampaha, Sri Lanka</li>
                                                                        <!-- Add more profile details here -->
                                                                    </ul>
                                                                    <div class="text-right">
                                                                        <button class="btn btn-danger" onclick="deleteUser(<?php echo $viewing_user_id ?>)">Delete</button> <!-- Replace "1" with the actual user ID -->
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
            xhr.send('table=user_details&id=' + <?php echo $viewing_user_id ?> + '&where=user_id');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var responseData = JSON.parse(xhr.response);
                    if (responseData.length > 0) {
                        var user = responseData[0];
                        var fullName = user.first_name + ' ' + user.last_name;
                        // Update profile picture
                        var profilePicture = document.querySelector('.profile-picture img');
                        var baseUrl = 'http://localhost/cricbet40';

                        profilePicture.src = baseUrl + user.profile_picture_path;

                        // Update profile name
                        var profileName = document.querySelector('.profile-name');
                        profileName.textContent = user.first_name + ' ' + user.last_name;

                        var profileDetails = document.querySelector('.profile-details');
                        profileDetails.innerHTML = ''; // Clear existing content

                        // Loop through additional profile details and create list items
                        for (var key in user) {
                            if (user.hasOwnProperty(key) && key !== 'profile_picture_path' && key !== 'first_name' && key !== 'last_name' && key !== 'bio') {
                                var listItem = document.createElement('li');
                                var titleCaseKey = key.replace(/\b\w/g, function(match) {
                                    return match.toUpperCase();
                                });
                                listItem.innerHTML = '<strong>' + titleCaseKey + ':</strong> ' + user[key];
                                profileDetails.appendChild(listItem);
                            }
                        }

                    }
                }
            }

        });


        function deleteUser(id) {
            if (confirm('Are you sure you want to delete this user?')) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'crud/delete.php', true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var xhr2 = new XMLHttpRequest();
                        xhr2.open('POST', 'crud/delete.php', true);
                        xhr2.onreadystatechange = function() {
                            if (xhr2.readyState === 4 && xhr2.status === 200) {
                                window.location.href = 'admin-users.php';
                            }
                        };
                        xhr2.send('table=users&id=' + id + '&where=user_id');
                    }
                };
                xhr.send('table=user_details&id=' + id + '&where=user_id');

            }
        }
    </script>



</body>

</html>