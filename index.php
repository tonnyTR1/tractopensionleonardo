<?php
$menu=$_GET['menu']??'login';

if ($menu=='login'){
    include 'views/LoginView.php';
}
else if ($menu=='registro'){
    include 'views/RegistroLoginView.php';
}
else if ($menu=='panel'){
    include 'views/PanelView.php';
}
else if ($menu=='micamion'){
    include 'views/MiCamionView.php';
}
else {
    include 'views/Error404View.php';
}
?>