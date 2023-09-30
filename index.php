<?php
include('./pages/theme/header.php');
if (isset($_GET['s'])) {
    include('./app/request.php');
} elseif (isset($_GET['auth'])) {
    include('./app/auth.php');
} elseif (isset($_GET['dashboard'])) {
    include('./pages/dashboard.php');
} elseif (isset($_GET['list'])) {
    include('./pages/list.php');
} elseif (isset($_GET['login'])) {
    include('./pages/auth/login.php');
} else {
    include('./pages/request-form.php');
}
include('./pages/theme/footer.php');
?>