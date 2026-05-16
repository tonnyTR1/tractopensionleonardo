<?php
// Cargar configuración global primero
require_once 'functions.php';

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
    // Cargar el modelo y controlador
    require_once 'config/database.php';
    require_once 'models/ApartarEspacio.php';
    require_once 'controllers/ApartarEspacio.php';
    
    include 'views/ApartarEspacioview.php';
}

//<<<<<<< HEADgit 
else if ($menu=='pagos'){
    include 'views/PagosView.php';
}

else if ($menu=='historial'){
    include 'views/Historialview.php';
}

else if ($menu=='accesos'){
    include 'views/Accesosview.php';
}
//git =======
else if ($menu == 'perfil') {

    include 'views/PerfilView.php';

}

//>>>>>>> 907c9067963b0ad41f0d7600c47c2db9a0c0c541
else {
    include 'views/Error404View.php';
}


//este es el index 
?>