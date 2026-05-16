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
else if ($menu=='miespacio'){
    include 'views/MiEspacioview.php';
}

else if ($menu=='apartarespacio'){
    include 'views/ApartarEspacioview.php';
}

else if ($menu == 'perfil') {

    include 'views/PerfilView.php';

}

else if ($menu == 'password') {

    include 'views/CambiarContraseñaView.php';

}

else {
    include 'views/Error404View.php';
}
//este es el index 
?>