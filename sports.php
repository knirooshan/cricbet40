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


                        <div class="container">
                            <div class="row" id="sports-container">

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
            xhr.send('table=sports');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    let data_JSON = JSON.parse(xhr.response);

                    // Get the container element where the sports cards will be appended
                    let container = document.getElementById("sports-container");

                    // Loop through each sport in the data
                    data_JSON.forEach(function(sport) {
                        // Create the necessary HTML elements
                        let colDiv = document.createElement("div");
                        colDiv.className = "col-4 mb-4";

                        let cardDiv = document.createElement("div");
                        cardDiv.className = "card h-100 shadow-sm";

                        var profilePicturePath = sport.sport_image_path;
                        var baseUrl = 'http://localhost/cricbet40';
                        var imagePath = baseUrl + profilePicturePath;

                        let img = document.createElement("img");
                        img.src = imagePath;
                        img.className = "card-img-top";
                        img.alt = sport.sport_name;

                        let cardBodyDiv = document.createElement("div");
                        cardBodyDiv.className = "card-body text-center";

                        let title = document.createElement("h5");
                        title.className = "card-title";
                        title.textContent = sport.sport_name;

                        let link = document.createElement("a");
                        link.href = "sports-single.php?sport-name=" + encodeURIComponent(sport.sport_name);
                        link.className = "btn btn-primary";
                        link.textContent = "See Matches";


                        // Append the elements to their respective parents
                        cardBodyDiv.appendChild(title);
                        cardBodyDiv.appendChild(link);

                        cardDiv.appendChild(img);
                        cardDiv.appendChild(cardBodyDiv);

                        colDiv.appendChild(cardDiv);

                        container.appendChild(colDiv);
                    });
                }
            }




        });
    </script>

</body>

</html>