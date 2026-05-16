<?php
require_once 'views/includes/SideBarView.php';
require_once 'views/includes/NavBarView.php';

// DATOS DE EJEMPLO
$usuario = [
    'nombre'   => 'Jose Miguel',
    'correo'   => 'jose@gmail.com',
    'telefono' => '2221234567',
    'rol'      => 'Administrador',
    'foto'     => 'public/assets/images/faces/face28.png'
];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Perfil</title>

    <link rel="stylesheet" href="public/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="public/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="public/assets/css/demo_1/style.css">

</head>

<body>

    <div class="container-scroller">

        <?= NavBarView(); ?>

        <div class="container-fluid page-body-wrapper">

            <?= SideBarView(); ?>

            <div class="main-panel">

                <div class="content-wrapper">

                    <!-- Título -->
                    <div class="page-header">

                        <h3 class="page-title">

                            <i class="mdi mdi-account-circle mr-2"></i>
                            Mi Perfil

                        </h3>

                    </div>

                    <!-- Card -->
                    <div class="card shadow-sm border-0">

                        <div class="card-body">

                            <div class="row">

                                <!-- Foto -->
                                <div class="col-md-4 text-center">

                                    <img src="<?= $usuario['foto'] ?>"
                                        class="rounded-circle shadow"
                                        width="180">

                                    <h4 class="mt-3">
                                        <?= $usuario['nombre'] ?>
                                    </h4>

                                    <label class="badge badge-primary p-2">
                                        <?= $usuario['rol'] ?>
                                    </label>

                                </div>

                                <!-- Información -->
                                <div class="col-md-8">

                                    <form method="POST">

                                        <div class="form-group">

                                            <label>
                                                Nombre
                                            </label>

                                            <input type="text"
                                                class="form-control"
                                                value="<?= $usuario['nombre'] ?>">

                                        </div>

                                        <div class="form-group">

                                            <label>
                                                Correo
                                            </label>

                                            <input type="email"
                                                class="form-control"
                                                value="<?= $usuario['correo'] ?>">

                                        </div>

                                        <div class="form-group">

                                            <label>
                                                Teléfono
                                            </label>

                                            <input type="text"
                                                class="form-control"
                                                value="<?= $usuario['telefono'] ?>">

                                        </div>

                                        <div class="form-group">

                                            <label>
                                                Contraseña
                                            </label>

                                            <input type="password"
                                                class="form-control"
                                                placeholder="********">

                                        </div>

                                        <div class="mt-4">

                                            <button class="btn btn-primary mr-2">

                                                <i class="mdi mdi-content-save"></i>
                                                Guardar Cambios

                                            </button>

                                            <button class="btn btn-danger">

                                                <i class="mdi mdi-delete"></i>
                                                Eliminar Perfil

                                            </button>

                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script src="public/assets/vendors/js/vendor.bundle.base.js"></script>

</body>

</html>