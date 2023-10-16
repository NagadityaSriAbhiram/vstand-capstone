<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>V Stand</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


    <style>
        .navbar-inverse {
            background-color: #003049;
            border-color: #003049;
        }


        .navbar {
            border-radius: 0px;
        }

        .navbar-inverse .navbar-nav>li>a {
            color: #fff;
        }

        .navbar-inverse .navbar-brand {
            color: #fff;
        }

        .navbar-inverse .navbar-nav>.active>a,
        .navbar-inverse .navbar-nav>.active>a:focus,
        .navbar-inverse .navbar-nav>.active>a:hover {
            color: #fff;
            background-color: #d62828;
        }

        .material-icons {
            font-size: 100px;
            border-radius: 50%;
            border-spacing: 3px 10px;
            border: 3px solid #fc9d03;


        }

        body {

            background: rgb(105, 48, 195);
            background: linear-gradient(90deg, #f8ff00 0%, #3ad59f 100%);
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">V Stand</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">


                    <li><a href="user_carpenter.php">Carpenter</a></li>
                    <li><a href="user_plumber.php">Plumber</a></li>
                    <li class="active"><a href="user_electrician.php">Electrician</a></li>
                    <li><a href="user_maid.php">Maid/Cook</a></li>
                    <li><a href="user_profile.php">My Profile</a></li>
               
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <li><a href="index.html"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>




    <div class="container">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">
                    <h4>Electrician Repair</h4>
                </a> </li>
            <li><a data-toggle="tab" href="#menu1">
                    <h4>Electrician Assembly</h4>
                </a></li>

        </ul>
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">


                <div class="row">
                    <div class="col-md-6" style="padding-top:20px;">
                        <form action="user_ele_installation.php" method="POST">
                            <div class="form-group">
                                <label for="elehrs" style="font-weight:bold">Express Book Rs.200 per hour</label>
                                <select name="elehrs" id="elehrs" class="form-control">
                                    <option> 1 hr </option>
                                    <option> 2 hr </option>
                                    <option> 3 hr </option>
                                </select>
                            </div>
                            <div class="form-group">

                                <label class="checkbox-inline" for="fan">
                                    <input type="checkbox" value="Ceiling fan" id="fan" name="fan">Ceiling Fan
                                </label>
                                <label class="checkbox-inline" for="light">
                                    <input type="checkbox" value="light" id="light" name="fan">Light
                                </label>
                                <label class="checkbox-inline" for="geyser">
                                    <input type="checkbox" value="geyser" id="geyser" name="fan">Geyser
                                </label>
                                <label class="checkbox-inline" for="fuse">
                                    <input type="checkbox" value="MCB & fuse" id="fuse" name="fan">MCB & Fuse
                                </label>


                            </div>

                            <div class="form-group">
                                <label for="desc1">Description</label>
                                <textarea type="text" name="desc1" id="desc1" class="form-control" rows="10" cols="10">

                        </textarea>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary form-control"><b>Request
                                </b></button>

                        </form>
                    </div>
                    <div class="col-md-6">

                        <table class="table table-hover">
                            <tr>
                                <th>Id</th>
                                <th>Employeer Name </th>
                                <th>Employeer Phone Number</th>
                                <th>Amount</th>

                            </tr>

                            <?php

                            include 'config.php';
                            $un = $_SESSION["un"];

                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT * FROM `electrician_installation_quote` join electricial_installation on electrician_installation_quote.eid = electricial_installation.id ";
                            $result = $conn->query($sql);

                            if ($result) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo "
                                
                                
                                <tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['emp'] . "</td>
                                <td>" . $row['phone'] . "</td>
                                <td>" . $row['quote'] . "</td>
                               
                                </tr>
                                
                                
                                ";
                                }
                            } else {
                                echo "0 results";
                            }
                            $conn->close();
                            ?>
                        </table>

                    </div>
                </div>


            </div>
         
         
            <div id="menu1" class="tab-pane fade">
                <div class="col-md-6" style="padding-top:20px;">

                    <form action="user_ele_repair.php" method="POST">
                        <div class="form-group">
                            <label for="elehrs2" style="font-weight:bold">Express Book Rs.150 per hour</label>
                            <select name="elehrs2" id="elehrs2" class="form-control">
                                <option> 1 hr </option>
                                <option> 2 hr </option>
                                <option> 3 hr </option>
                            </select>
                        </div>
                        <div class="form-group">

                            <label class="checkbox-inline" for="fan1">
                                <input type="checkbox" value="Ceiling fan" id="fan1" name="light">Ceiling Fan
                            </label>
                            <label class="checkbox-inline" for="light1">
                                <input type="checkbox" value="light" id="light1" name="light">Light
                            </label>
                            <label class="checkbox-inline" for="geyser1">
                                <input type="checkbox" value="geyser" id="geyser1" name="light">Geyser
                            </label>
                            <label class="checkbox-inline" for="fuse1">
                                <input type="checkbox" value="MCB & fuse" id="fuse1" name="light">MCB & Fuse
                            </label>


                        </div>
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea type="text" name="eledesc" id="desc" class="form-control" rows="10" cols="10">

                        </textarea>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary form-control"><b>Request
                            </b></button>

                    </form>

                </div>

                <div class="col-md-6">
                    <table class="table table-hover">
                        <tr>
                            <th>Id</th>
                            <th>Employeer Name </th>
                            <th>Employeer Phone Number</th>
                            <th>Amount</th>

                        </tr>

                        <?php

                        include 'config.php';
                        $un = $_SESSION["un"];

                        $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT * FROM `electrician_repair_quote` join electricial_repair on electrician_repair_quote.eid = electricial_repair.id ";
                        $result = $conn->query($sql);

                        if ($result) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "
                                
                                
                                <tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['emp'] . "</td>
                                <td>" . $row['phone'] . "</td>
                                <td>" . $row['quote'] . "</td>
                               
                                </tr>
                                
                                
                                ";
                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                        ?>
                    </table>
                </div>
            </div>

        </div>
    </div>

</body>

</html>