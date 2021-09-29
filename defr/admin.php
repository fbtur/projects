<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrare</title>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="CSS/table.css">
    <link rel="stylesheet" href="CSS/admin.css">

    <link rel="icon" href="IMG/logo_v1.png">

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* The Modal (background) */

        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 65px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */

        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .options_list {
            display: flex;
            justify-content: center;
        }

        .btn {
            padding-top: 1px;
            padding-bottom: 1px;
        }

        .btnAdd {
            position: absolute;
            right: 13px;
        }

        .myForm {
            color: black;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="container" style="position: relative;">
        <h1>Administrare utilizatori</h1>
        <button class="btn btn-dark btnAdd" id="myBtn">Open Modal</button>
        <div class="alert alert-danger" id="errorBoxDB" style="margin-top: 50px; display: none;">
            <p style="margin: 0px" id="showError"></p>
        </div>
        <div class="row" style="margin-top: 60px;">
            <div class="col-md-3">
                <img src="IMG/ranger.png" alt="PADURAR" height="400px" width="auto">
            </div>
            <div class="col-md-9">
                <table class="comicGreen">
                    <thead>
                        <tr>
                            <th>Nume utilizator</th>
                            <th>E-mail</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('PHP/getuser.php');
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- btn home -->
        <button class="btn btn-success" onclick="window.location.href='index.php'">Acasă</button>


        <!-- Modal -->
        <div id="myModal" class="modal">

            <div class="modal-content" id="inregistrare">
                <!-- register forms -->
                <div class="myForm">

                    <h2>Înregistrare</h2>
                    <form>
                        <div class="form-group">
                            <label for="username">Nume și prenume</label>
                            <input type="text" class="form-control" id="username" placeholder="Popescu Ionel">
                        </div>
                        <div class="form-group">
                            <label for="email">Adresă e-mail</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="email@wood.ro">
                            <small id="emailHelp" class="form-text text-muted">Nu vom distribui e-mailul dv către
                                terțe.</small>
                        </div>
                        <div class="form-group">
                            <label for="password">Parolă</label>
                            <input type="password" class="form-control" id="password" placeholder="Parolă">
                        </div>
                        <div class="alert alert-danger" id="errorBox" style="margin-top: 10px; display: none;">
                            <p style="margin: 0px" id="showError"></p>
                        </div>
                        <div class="alert alert-success" id="successBox" style="margin-top: 10px; display: none;">
                            <p style="margin: 0px" id="showSuccess"></p>
                        </div>
                        <div class="row" style="    margin-bottom: -40px;">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-success" style="margin-top: 10px; width: 100%;" onclick="sendData()">Înregistrează-te</button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-warning" style="margin-top: 10px; width: 100%;" onclick="hideModal()">Anulează</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end modal -->
    </div>

    <script>
        function blockUser(id) {
            var data = "id=" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    $("#errorBoxDB").show();
                    document.getElementById("showError").innerHTML = this.responseText;
                    setTimeout(function() {
                        window.location.replace("https://ie.usv.ro/~filipb/Examen/admin.php");
                    }, 2000)

                }
            };
            xmlhttp.open("POST", "PHP/blockuser.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send(data);
        }

        function deleteUser(id) {
            var data = "id=" + id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    $("#errorBoxDB").show();
                    document.getElementById("showError").innerHTML = this.responseText;
                    setTimeout(function() {
                        window.location.replace("https://ie.usv.ro/~filipb/Examen/admin.php");
                    }, 2000)

                }
            };
            xmlhttp.open("POST", "PHP/deleteuser.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send(data);
        }

        var modal = document.getElementById("myModal");
        var btn = document.getElementById("myBtn");

        btn.onclick = function() {
            modal.style.display = "block";
        }

        function hideModal() {
            modal.style.display = "none";
        }

        // pentru a inchide cand dai click in afara (spatiul gri)
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        function sendData() {
            var user = document.getElementById("username").value;
            var pass = document.getElementById("password").value;
            var email = document.getElementById("email").value;

            // document.getElementById("showError").innerHTML = "test";

            var data = "username=" + user + '&password=' + pass + "&email=" + email;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == 'Contul a fost creat!') {
                        $("#successBox").show();
                        document.getElementById("showSuccess").innerHTML = this.responseText;
                        setTimeout(function() {
                            $("#successBox").hide();
                            window.location.replace("https://ie.usv.ro/~filipb/Examen/admin.php");
                        }, 1500);
                    } else {
                        $("#errorBox").show();
                        setTimeout(function() {
                            $("#errorBox").hide();
                        }, 5000);
                        document.getElementById("showError").innerHTML = this.responseText;
                    }
                }
            };
            xmlhttp.open("POST", "PHP/register.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send(data);

        }
    </script>
</body>

</html>
