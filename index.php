<?php include 'layouts/session.php'; ?>
<?php include 'layouts/header.php'; ?>
<!-- C3 charts css -->
<link href="public/plugins/c3/c3.min.css" rel="stylesheet" type="text/css" />

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
                            <div class="col-md-6 col-xl-3">
                                <div class="mini-stat clearfix bg-white">
                                    <span class="mini-stat-icon bg-purple mr-0 float-right"><i class="mdi mdi-basket"></i></span>
                                    <div class="mini-stat-info">
                                        <span class="counter text-purple">25140</span>
                                        Total Income
                                    </div>
                                    <div class="clearfix"></div>
                                    <p class=" mb-0 m-t-20 text-muted">Total income <span class="pull-right"><i class="fa fa-caret-up m-r-5"></i>10.25%</span></p>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="mini-stat clearfix bg-white">
                                    <span class="mini-stat-icon bg-blue-grey mr-0 float-right"><i class="mdi mdi-black-mesa"></i></span>
                                    <div class="mini-stat-info">
                                        <span class="counter text-blue-grey">14</span>
                                        New Bets
                                    </div>
                                    <div class="clearfix"></div>
                                    <p class="text-muted mb-0 m-t-20">New Bets<span class="pull-right"><i class="fa fa-caret-up m-r-5"></i>10.25%</span></p>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="mini-stat clearfix bg-white">
                                    <span class="mini-stat-icon bg-brown mr-0 float-right"><i class="mdi mdi-buffer"></i></span>
                                    <div class="mini-stat-info">
                                        <span class="counter text-brown">50</span>
                                        New Matches
                                    </div>
                                    <div class="clearfix"></div>
                                    <p class="text-muted mb-0 m-t-20">New Matches <span class="pull-right"><i class="fa fa-caret-up m-r-5"></i>10.25%</span></p>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="mini-stat clearfix bg-white">
                                    <span class="mini-stat-icon bg-teal mr-0 float-right"><i class="mdi mdi-coffee"></i></span>
                                    <div class="mini-stat-info">
                                        <span class="counter text-teal">2500</span>
                                        Total Users
                                    </div>
                                    <div class="clearfix"></div>
                                    <p class="text-muted mb-0 m-t-20">Total Users<span class="pull-right"><i class="fa fa-caret-up m-r-5"></i>10.25%</span></p>
                                </div>
                            </div>
                        </div>


                        <div class="row">

                            <div class="col-xl-9">

                                <div class="row">
                                    <div class="col-md-9 pr-md-0">
                                        <div class="card m-b-20" style="height: 486px;">
                                            <div class="card-body">
                                                <h4 class="mt-0 header-title">Monthly Earnings</h4>

                                                <div class="text-center">
                                                    <div class="btn-group m-t-20" role="group" aria-label="Basic example">
                                                        <button type="button" class="btn btn-secondary">Day</button>
                                                        <button type="button" class="btn btn-secondary">Month</button>
                                                        <button type="button" class="btn btn-secondary">Year</button>
                                                    </div>
                                                </div>

                                                <div id="combine-chart" class="m-t-20"></div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 pl-md-0">
                                        <div class=" card m-b-20" style="height: 486px;">
                                            <div class="card-body">
                                                <div class="m-b-20">
                                                    <p>Weekly Earnings</p>
                                                    <h5>$1,542</h5>
                                                    <span class="peity-line" data-width="100%" data-peity='{ "fill": ["rgba(103,168,228,0.3)"],"stroke": ["rgba(103,168,228,0.8)"]}' data-height="60">6,2,8,4,3,8,1,3,6,5,9,2,8,1,4,8,9,8,2,1</span>
                                                </div>
                                                <div class="m-b-20">
                                                    <p>Monthly Earnings</p>
                                                    <h5>$6,451</h5>
                                                    <span class="peity-line" data-width="100%" data-peity='{ "fill": ["rgba(74,193,142,0.3)"],"stroke": ["rgba(74,193,142,0.8)"]}' data-height="60">6,2,8,4,-3,8,1,-3,6,-5,9,2,-8,1,4,8,9,8,2,1</span>
                                                </div>
                                                <div class="m-b-20">
                                                    <p>Yearly Earnings</p>
                                                    <h5>$84,574</h5>
                                                    <span class="peity-line" data-width="100%" data-peity='{ "fill": ["rgba(232, 65, 38,0.3)"],"stroke": ["rgba(232, 65, 38,0.8)"]}' data-height="60">6,2,8,4,3,8,1,3,6,5,9,2,8,1,4,8,9,8,2,1</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-xl-3">
                                <div class="card m-b-20">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">Bet Analytics</h4>

                                        <ul class="list-inline widget-chart m-t-20 m-b-15 text-center">
                                            <li class="list-inline-item">
                                                <h5 class="mb-0">23410</h5>
                                                <p class="text-muted font-14">Won</p>
                                            </li>
                                            <li class="list-inline-item">
                                                <h5 class="mb-0">7400</h5>
                                                <p class="text-muted font-14">Lost</p>
                                            </li>
                                        </ul>

                                        <div id="donut-chart"></div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card m-b-20">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title m-b-30">Recent Bets</h4>

                                        <div class="text-center">
                                            <input class="knob" data-width="120" data-height="120" data-linecap=round data-fgColor="#ffbb44" value="80" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".1" />

                                            <div class="clearfix"></div>
                                            <ul class="list-inline row m-t-30 clearfix">
                                                <li class="col-6">
                                                    <p class="m-b-5 font-18 font-600">7,541</p>
                                                    <p class="mb-0">Cricket bets</p>
                                                </li>
                                                <li class="col-6">
                                                    <p class="m-b-5 font-18 font-600">125</p>
                                                    <p class="mb-0">Rugby Bets</p>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="card m-b-20">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title m-b-30">Bet History</h4>

                                        <div class="text-center">
                                            <input class="knob" data-width="120" data-height="120" data-linecap=round data-fgColor="#4ac18e" value="68" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".1" />

                                            <div class="clearfix"></div>
                                            <ul class="list-inline row m-t-30 clearfix">
                                                <li class="col-6">
                                                    <p class="m-b-5 font-18 font-600">2,541</p>
                                                    <p class="mb-0">Won</p>
                                                </li>
                                                <li class="col-6">
                                                    <p class="m-b-5 font-18 font-600">874</p>
                                                    <p class="mb-0">Lost</p>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card m-b-20">
                                    <div class="card-body">
                                        <h4 class="mt-0 m-b-30 header-title">Latest Bets</h4>

                                        <div class="table-responsive">
                                            <table class="table table-vertical mb-0">

                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            IPL : SL Vs. Ind
                                                        </td>
                                                        <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirm</td>
                                                        <td>
                                                            $14,584
                                                            <p class="m-0 text-muted font-14">Amount</p>
                                                        </td>
                                                        <td>
                                                            05/04/2023
                                                            <p class="m-0 text-muted font-14">Date</p>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-secondary btn-sm waves-effect">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            IPL : SL Vs. Ind
                                                        </td>
                                                        <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirm</td>
                                                        <td>
                                                            $14,584
                                                            <p class="m-0 text-muted font-14">Amount</p>
                                                        </td>
                                                        <td>
                                                            05/04/2023
                                                            <p class="m-0 text-muted font-14">Date</p>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-secondary btn-sm waves-effect">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            IPL : SL Vs. Ind
                                                        </td>
                                                        <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirm</td>
                                                        <td>
                                                            $14,584
                                                            <p class="m-0 text-muted font-14">Amount</p>
                                                        </td>
                                                        <td>
                                                            05/04/2023
                                                            <p class="m-0 text-muted font-14">Date</p>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-secondary btn-sm waves-effect">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            IPL : SL Vs. Ind
                                                        </td>
                                                        <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirm</td>
                                                        <td>
                                                            $14,584
                                                            <p class="m-0 text-muted font-14">Amount</p>
                                                        </td>
                                                        <td>
                                                            05/04/2023
                                                            <p class="m-0 text-muted font-14">Date</p>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-secondary btn-sm waves-effect">View</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            IPL : SL Vs. Ind
                                                        </td>
                                                        <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirm</td>
                                                        <td>
                                                            $14,584
                                                            <p class="m-0 text-muted font-14">Amount</p>
                                                        </td>
                                                        <td>
                                                            05/04/2023
                                                            <p class="m-0 text-muted font-14">Date</p>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-secondary btn-sm waves-effect">View</button>
                                                        </td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-6">
                                <div class="card m-b-20">
                                    <div class="card-body">
                                        <h4 class="mt-0 m-b-30 header-title">Recent Matches</h4>

                                        <div class="table-responsive">
                                            <table class="table table-vertical mb-0">

                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            IPL : SL Vs. Ind
                                                        </td>
                                                        <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> On Going</td>
                                                        <td>
                                                            $14,584
                                                            <p class="m-0 text-muted font-14">Amount</p>
                                                        </td>
                                                        <td>
                                                            05/04/2023
                                                            <p class="m-0 text-muted font-14">Date</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            IPL : SL Vs. Ind
                                                        </td>
                                                        <td><i class="mdi mdi-checkbox-blank-circle text-warning"></i> Confirmed</td>
                                                        <td>
                                                            $14,584
                                                            <p class="m-0 text-muted font-14">Amount</p>
                                                        </td>
                                                        <td>
                                                            05/04/2023
                                                            <p class="m-0 text-muted font-14">Date</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            IPL : SL Vs. Ind
                                                        </td>
                                                        <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> On-Going</td>
                                                        <td>
                                                            $14,584
                                                            <p class="m-0 text-muted font-14">Amount</p>
                                                        </td>
                                                        <td>
                                                            05/04/2023
                                                            <p class="m-0 text-muted font-14">Date</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            IPL : SL Vs. Ind
                                                        </td>
                                                        <td><i class="mdi mdi-checkbox-blank-circle text-danger"></i> Finished</td>
                                                        <td>
                                                            $14,584
                                                            <p class="m-0 text-muted font-14">Amount</p>
                                                        </td>
                                                        <td>
                                                            05/04/2023
                                                            <p class="m-0 text-muted font-14">Date</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            IPL : SL Vs. Ind
                                                        </td>
                                                        <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> On Going</td>
                                                        <td>
                                                            $14,584
                                                            <p class="m-0 text-muted font-14">Amount</p>
                                                        </td>
                                                        <td>
                                                            05/04/2023
                                                            <p class="m-0 text-muted font-14">Date</p>
                                                        </td>
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
</body>

</html>