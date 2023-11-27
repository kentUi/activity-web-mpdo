<?php

include('./pages/theme/header.php');
if (isset($_GET['s'])) {
    include('./app/request.php');
} elseif (isset($_GET['auth'])) {
    include('./app/auth.php');
} elseif (isset($_GET['dashboard'])) {
    include('./pages/admin/dashboard.php');
} elseif (isset($_GET['member'])) {
    include('./pages/client/dashboard.php');
}  elseif (isset($_GET['list'])) {
    include('./pages/list.php');
} elseif (isset($_GET['login'])) {
    include('./pages/auth/login.php');
} elseif (isset($_GET['register'])) {
    include('./pages/auth/register.php');
} elseif (isset($_GET['zone'])) {
    include('./pages/client/zone-form.php');
} elseif (isset($_GET['localize'])) {
    include('./pages/client/localize-form.php');
} elseif (isset($_GET['print-zoning'])) {
    include('./pages/print/print-zoning.php');
} elseif (isset($_GET['manage-account'])) {
    include('./pages/auth/accounts.php');
} elseif (isset($_GET['my-profile'])) {
    include('./pages/profile.php');
} elseif (isset($_GET['generate-report'])) {
    include('./pages/generate.php');
} elseif (isset($_GET['zoning'])) {
    include('./pages/v1/zoning/view.php');
} elseif (isset($_GET['applications'])) {
    include('./pages/applications.php');
} elseif (isset($_GET['manage'])) {
    include('./pages/management.php');
} elseif (isset($_GET['logs'])) {
    include('./pages/v1/logs/logs.php');
} else {
    include('./pages/auth/login.php');
}
include('./pages/theme/footer.php');
?>