<?php require('views/header.php'); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="invernadero.php">Administrador</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Catalogos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="carrera.php">Carrera</a>
                    <a class="dropdown-item" href="dia.php">Dia</a>
                    <a class="dropdown-item" href="espacio.php">Espacio</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Usuarios
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#.php">Usuarios</a>
                    <a class="dropdown-item" href="alumno.php">Alumnos</a>
                    <a class="dropdown-item" href="rol.php">Roles</a>
                    <a class="dropdown-item" href="permiso.php">Permisos</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php?accion=logout">Log Out</a>
            </li>
        </ul>
    </div>
</nav>