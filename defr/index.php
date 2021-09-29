<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>



    <link rel="stylesheet" href="CSS/index.css">
    <link rel="icon" href="IMG/logo_v1.png">
    <style>
        .navbar-toggler-icon {
            background-image: url(IMG/menu_icon.png) !important;
        }

        a {
            cursor: pointer;
        }
    </style>

    <script>
        function importRegister() {
            $('#autenticate').load('register.html');
        }

        function importLogin() {
            $('#autenticate').load('login.html');
        }
    </script>
    <title>Pagina principala</title>
</head>

<body style="background-color: transparent;">
    <div class="container">
        <nav class="navbar transparent  navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="IMG/logo_v1.png" alt="SC LEMNUL SRL" height="100px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-left: auto; margin-right: auto;">
                        <?php
                        if (!isset($_SESSION['loggedin'])) {
                            echo '
                            <li class="nav-item">
                                <a class="nav-link tab_nav" aria-current="page" onclick="importLogin()">Loghează-te</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link tab_nav" onclick="importRegister()">Înregistrează-te</a>
                            </li>
                            ';
                        }

                        if (isset($_SESSION['loggedin'])) {
                            echo '<li class="nav-item">
                            <a class="nav-link tab_nav" onclick="window.location.href=`PHP/logout.php`" >Deloghează-te</a>
                        </li>';
                        }


                        if (isset($_SESSION['loggedin'])) {
                            if ($_SESSION['rol'] === 1) {
                                echo '<li class="nav-item">
                                        <a class="nav-link tab_nav" href="admin.php">Administrare</a>
                                    </li>';
                            }
                        }
                        ?>

                        <li class="nav-item">
                            <a class="nav-link tab_nav" href="about.html">Informații</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="autenticate">
            <!-- Aici sunt afisate formularele pentru inregistrare si logare -->
        </div>
    </div>
</body>

</html>