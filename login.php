<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to index page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
}
// Include config file
require_once "layouts/config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT user_id, `name`, `password`, `balance` FROM users WHERE `name` = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $balance);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["balance"] = $balance;

                            // Redirect user to welcome page
                            header("location: index.php");
                        } else {
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>






<?php include 'layouts/header.php'; ?>

<?php include 'layouts/headerStyle.php'; ?>

<body class="fixed-left">

    <?php include 'layouts/loader.php'; ?>

    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="wrapper-page float-left ml-5">

        <div class="card">
            <div class="card-body">

                <h3 class="text-center m-0">
                    <a href="index.php" class="logo logo-admin"><img src="public/assets/images/logo.png" height="50" alt="logo"></a>
                </h3>

                <div class="p-3">
                    <h4 class="font-18 m-b-5 text-center">Welcome Back !</h4>
                    <p class="text-muted text-center">Sign in to continue to Cricbet40.</p>





                    <form class="custom-form mt-4 pt-2" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="mb-3 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label class="form-label" for="username">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" value="">
                            <span class="text-danger"><?php echo $username_err; ?></span>
                        </div>
                        <div class="mb-3 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <label class="form-label" for="password">Password</label>
                                </div>
                            </div>

                            <div class="input-group auth-pass-inputgroup">
                                <input type="password" class="form-control" placeholder="Enter password" name="password" value="" aria-label="Password" aria-describedby="password-addon">
                                <span class="text-danger"><?php echo $password_err; ?></span>
                                <button class="btn btn-light ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-check">
                                    <label class="form-check-label" for="remember-check">
                                        Remember me
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </form>









                    <!-- <form class="form-horizontal m-t-30" action="index.php">

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter username">
                        </div>

                        <div class="form-group">
                            <label for="userpassword">Password</label>
                            <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                        </div>

                        <div class="form-group row m-t-20">
                            <div class="col-sm-6">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                                    <label class="custom-control-label" for="customControlInline">Remember me</label>
                                </div>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>

                        <div class="form-group m-t-10 mb-0 row">
                            <div class="col-12 m-t-20">
                                <a href="recoverpw.php" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                            </div>
                        </div>
                    </form> -->




                </div>

            </div>
        </div>

        <div class="m-t-40 text-center">
            <p class="text-white">Don't have an account ? <a href="register.php" class="font-500 font-14 text-white font-secondary"> Signup Now </a> </p>
            <p class="text-white">© <?php echo date("Y", strtotime("-1 year")); ?> - <?php echo date("Y"); ?> Circbet40. Crafted with <i class="mdi mdi-heart text-danger"></i> by Akee Collections</p>
        </div>

    </div>

    <?php include 'layouts/footerScript.php'; ?>

    <!-- App js -->
    <script src="public/assets/js/app.js"></script>

</body>

</html>