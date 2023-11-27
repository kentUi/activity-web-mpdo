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
} elseif (isset($_GET['list'])) {
    include('./pages/list.php');

// ******** Authentication ******** 
} elseif (isset($_GET['login'])) {
    include('./pages/auth/login.php');
} elseif (isset($_GET['register'])) {
    include('./pages/auth/register.php');
} elseif (isset($_GET['forgot'])) {
    include('./pages/auth/forgot.php');
// ******** Authentication ********

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
} elseif (isset($_GET['local'])) {
    include('./pages/v1/localize/view.php');
} elseif (isset($_GET['manage'])) {
    include('./pages/management.php');
} elseif (isset($_GET['logs'])) {
    include('./pages/v1/logs/logs.php');

// ******** Application Menu ******** 
} elseif (isset($_GET['applications'])) {
    include('./pages/v1/applications.php');
} elseif (isset($_GET['menu-zoning'])) {
    include('./pages/v1/zoning/menu.php');
} elseif (isset($_GET['menu-localize'])) {
    include('./pages/v1/localize/menu.php');
// ******** Application Menu ******** 

// ******** List of Applications ******** 
} elseif (isset($_GET['list-localize'])) {
    include('./pages/v1/localize/list.php');
} elseif (isset($_GET['list-zoning'])) {
    include('./pages/v1/zoning/list.php');
// ******** List of Applications ******** 

// ******** Master List ******** 
} elseif (isset($_GET['master-localize'])) {
    include('./pages/v1/localize/master.php');
} elseif (isset($_GET['master-zoning'])) {
    include('./pages/v1/zoning/master.php');
// ******** Master List ******** 

// ******** Master List Details******** 
} elseif (isset($_GET['master-localize-details'])) {
    include('./pages/v1/localize/details.php');
} elseif (isset($_GET['master-zoning-details'])) {
    include('./pages/v1/zoning/details.php');
// ******** Master List Details******** 

// ******** Master List Details******** 
} elseif (isset($_GET['generate-reports-localize'])) {
    include('./pages/v1/localize/generate.php');
} elseif (isset($_GET['generate-reports-zoning'])) {
    include('./pages/v1/zoning/generate.php');
// ******** Master List Details******** 

} else {
    include('./pages/auth/login.php');
}
include('./pages/theme/footer.php');
?>