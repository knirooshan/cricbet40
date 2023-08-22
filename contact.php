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
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="text-center">
                                                    <h5>Have any questions?</h5>
                                                    <p class="text-muted">Don't hesitate to let us know if you have any questions!</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row m-t-40">
                                            <div class="col-md-4">
                                                <div>
                                                    <h6 class="font-14">Email Address</h6>
                                                    <p class="text-muted">support@circbet40.lk</p>
                                                </div>
                                                <div class="pt-3">
                                                    <h6 class="font-14">Telephone number</h6>
                                                    <p class="text-muted">+94 0775454541</p>
                                                </div>
                                                <div class="pt-3">
                                                    <h6 class="font-14">Address</h6>
                                                    <p class="text-muted">Wellampitiya, Sri Lanka</p>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <form class="form-custom">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="sr-only" for="username">Name</label>
                                                                <input type="text" class="form-control" id="username" placeholder="Your Name" required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="sr-only" for="useremail">Email address</label>
                                                                <input type="email" class="form-control" id="useremail" placeholder="Your Email" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="sr-only" for="usersubject">Subject</label>
                                                                <input type="text" class="form-control" id="usersubject" placeholder="Subject" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <textarea class="form-control" rows="5" placeholder="Your Message...."></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 text-center">
                                                            <button type="button" class="btn btn-primary waves-effect waves-light">Send Message</button>
                                                        </div>
                                                    </div>
                                                </form>
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

    <!-- App js -->
    <script src="public/assets/js/app.js"></script>

</body>

</html>