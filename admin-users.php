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



                        <!-- Add this code inside the container-fluid div -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Users List</h4>
                                        <table id="data-table" class="table table-bordered dt-responsive nowrap">

                                        </table>
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
            xhr.send('table=users');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    let data = JSON.parse(xhr.response);


                    $('#data-table').DataTable({
                        columns: [{
                                data: 'user_id',
                                title: 'User ID'
                            },
                            {
                                data: 'name',
                                title: 'User Name'
                            },
                            {
                                data: 'email',
                                title: 'Email'
                            },
                            {
                                data: 'balance',
                                title: 'Balance'
                            },
                            {
                                data: null,
                                title: 'Actions',
                                render: function(data, type, row) {
                                    // Create the delete button using a Font Awesome icon
                                    var deleteButton = '<button class="btn btn-outline-primary btn-sm" onclick="deleteUser(' + row.user_id + ')"><i class="fa fa-trash"></i></button>';
                                    // Create the view button using a Font Awesome icon
                                    var viewButton = '<button class="btn btn-outline-primary btn-sm" onclick="viewUser(' + row.user_id + ')"><i class="fa fa-eye"></i></button>';
                                    // Return the HTML for the buttons
                                    return viewButton + ' ' + deleteButton;
                                }
                            }
                        ]
                    }).rows.add(data).draw();
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
                                location.reload();
                            }
                        };
                        xhr2.send('table=users&id=' + id + '&where=user_id');
                    }
                };
                xhr.send('table=user_details&id=' + id + '&where=user_id');

            }
        }


        function viewUser(id) {
            window.location.href = 'admin-user-single.php?id=' + id;
        }
    </script>



</body>

</html>