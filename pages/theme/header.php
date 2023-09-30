<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<?php 
// if(!isset($_SESSION['loginID'])){
//     //header('location: ./?login');
// }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/css/styles.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container px-0">
            <?php
            if (isset($_SESSION['loginID'])) {
                ?>
                <a class="navbar-brand" href="index.html">
                    <img src="./assets/lgu.png" class="img" height="80" alt="">
                    <span style="position: absolute;" class="fw-bolder text-dark pt-3 px-2">
                        <b style="color: #000; letter-spacing: 2px; font-size: 32px">M.P.D.O </b>
                    </span>
                </a>
                <?php
            } else {
                ?>
                <a class="navbar-brand" href="index.html">
                    <img src="./assets/lgu.png" class="img" height="80" alt="">
                    <span style="position: absolute;" class="fw-bolder text-dark pt-2 px-2">
                        <b style="color: #000; letter-spacing: 2px">Municipal Planning and Development Office </b><br>
                        <small class="fw-normal" style="color: #5b0f8d; letter-spacing: 2px">
                            Office of the Municipality of Tagoloan, Misamis Oriental
                        </small>
                    </span>
                </a>
                <?php
            }
            ?>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                    <?php
                    if (isset($_SESSION['loginID'])) {
                        ?>
                        <?php
                        require('./config/database.php');

                        $request = '';
                        $sql = "SELECT count(*) as i FROM t_applications WHERE req_status = ''";

                        $result = $conn->query($sql);

                        if (!$result) {
                            die("Query failed: " . $conn->error);
                        }

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $request = $row['i'];
                        } else {
                            echo "No results found.";
                        }

                        $conn->close();



                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="?dashboard">
                                <button class="btn btn-round btn-default" style="letter-spacing: 1px">
                                    <span class="bi bi-cloud-haze2" style="font-size: 18px"></span>
                                    Dashboard
                                </button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?list">
                                <button class="btn btn-round btn-default" style="letter-spacing: 1px">
                                    <span class="bi bi-folder-symlink" style="font-size: 18px"></span>
                                    Applications <span class="badge bg-danger">
                                        <?= $request ?>
                                    </span>
                                </button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <button class="btn btn-round btn-default" style="letter-spacing: 1px">
                                    <span class="bi bi-people" style="font-size: 18px"></span>
                                    Manage Accounts
                                </button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <button class="btn btn-round btn-default" style="letter-spacing: 1px">
                                    <span class="bi bi-person" style="font-size: 18px"></span>
                                    My Profile
                                </button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="app/auth.php?logout">
                                <button class="btn btn-round btn-default" style="letter-spacing: 1px">
                                    <span class="bi bi-power" style="font-size: 18px"></span>
                                    Logout
                                </button>
                            </a>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <button class="btn btn-round btn-default" style="letter-spacing: 1px">
                                    <span class="bi bi-house-fill" style="font-size: 18px"></span>
                                    Home
                                </button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?">
                                <button class="btn btn-round btn-warning" style="letter-spacing: 1px">
                                    <span class="bi bi-folder-fill" style="font-size: 18px"></span>
                                    Request Cert.
                                </button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?login">
                                <button class="btn btn-round btn-default" style="letter-spacing: 1px">
                                    <span class="bi bi-unlock-fill" style="font-size: 18px"></span>
                                    Sign-in
                                </button>
                            </a>
                        </li>
                        <?php
                    }
                    ?>


                </ul>
            </div>
        </div>
    </nav>