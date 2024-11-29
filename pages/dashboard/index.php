<?php
session_start();
if (!isset($_SESSION['AccNo'])) {
    header('Location: ../login.php?msg=Please login to continue');
    exit;
}

require('../../configs/db.php');
require('../../scripts/get_balance.php'); // $balance
require('../../scripts/get_userinfo.php'); // $name, $fName
require('../../scripts/get_transactions.php'); // $trns
require('../../scripts/get_analytics.php'); // $totalDebit, $totalCredit

//Check if there is an GET message
$error = '';
if (isset($_GET['msg'])) {
    $error = $_GET['msg'];
}

$accNo = $_SESSION['AccNo'];
$sql = "SELECT Balance FROM balance WHERE AccNo = '$accNo'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
$balance = $data['Balance'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../assets/img/logo.png" type="image/x-icon">
    <title>Dashboard - Banco del TEC </title>
    <link rel="stylesheet" href="./css/index/mainMobile.css" />
    <link href="./css/index/table.css" media="(min-width: 600px)" rel="stylesheet">
    <link href="./css/index/desktop.css" media="(min-width: 900px)" rel="stylesheet">
    <link href="./css/profile/mainMobile.css" rel="stylesheet">
    <link href="./css/table/mainMobile.css" rel="stylesheet">
    <link href="./css/table/tablet.css" media="(min-width: 600px)" rel="stylesheet">
    <link href="./css/table/desktop.css" media="(min-width: 900px)" rel="stylesheet">
    <link rel="stylesheet" href="./css/all.min.css" />
    <link rel="stylesheet" href="./css/common.css" />
</head>

<body>
    <div id="wrapper">
        <!-- Navbar Side-->
        <nav class="navbar-side sidebar">
            <div class="nav-container">
                <a class="navbar-brand" href="#">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <img src="../../assets/img/logo.png" height="50px">
                    </div>
                    <div class="sidebar-brand-text"><span>Banco del TEC</span></div>
                </a>
                <hr class="sidebar-divider">
                <ul class="navbar-nav" id="sidebar-ul">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-money-bill-alt"></i>
                            <span>Transferir</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-exchange-alt"></i>
                            <span>Transacciones</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-industry"></i>
                            <span>Analisis</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-user"></i><span>Perfil</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-adjust"></i><span>Configuracion</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../scripts/logout.php">
                            <i class="fas fa-sign-out-alt"></i><span>Salir</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="content-wrapper">
            <!--!Navbar Top-->
            <div class="navbar-top d-flex" id="page-top">
                <div class="container-fluid d-flex"></div>
                <ul class="navbar-nav-ul d-flex">
                    <li class="nav-item">
                        <a class="dropdown-toggle nav-link search-icon-nav" href="#"><i class="fas fa-search"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="dropdown-toggle nav-link" href="#"><i class="fas fa-bell fa-fw"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="dropdown-toggle nav-link" href="#"><i class="fas fa-envelope fa-fw"></i></a>
                    </li>
                    <div class="topbar-divider"></div>
                    <li class="nav-item avatar-n">
                        <p><span class="avatar-text">
                                <?php echo $name ?>
                            </span></p>
                        <div class="avatar-nav"></div>
                    </li>
                </ul>
            </div>

            <!--!Index's Main contents start here-->
            <div class="index-content container-main">
                <div class="dashboard-header  d-flex justify-between">
                    <!--!Dashboard header-->
                    <h3>Bienvenido,
                        <?php echo $fName ?>
                    </h3>
                </div>
                <!--!Indo cards-->
                <div class="income-inf-row row">
                    <!--!Card no1-->
                    <div class="col-income">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-text">
                                    <div class="card-span"><span style="color: rgb(78, 115, 223);">Cantidad</span></div>
                                    <div class="card-price"><span>MXN.
                                            <?php echo $balance ?>
                                        </span></div>
                                </div>
                                <div class="card-icon">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--!Card no2-->
                    <div class="col-income">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-text">
                                    <div class="card-span"><span style="color: rgb(246, 194, 62);">Ratio de Intereses</span>
                                    </div>
                                    <div class="card-price"><span>9.05%</span></div>
                                </div>
                                <div class="card-icon">
                                    <i class="fas fa-percent fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--!Card no3-->
                    <div class="col-income">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-text">
                                    <div class="card-span"><span style="color: rgb(28, 200, 138);">Ingresos</span></div>
                                    <div class="card-price"><span>MXN.
                                            <?php echo $totalCredit ?>
                                        </span></div>
                                </div>
                                <div class="card-icon">
                                    <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--!Card no4-->
                    <div class="col-income">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-text">
                                    <div class="card-span"><span style="color: red;">Transferencias</span></div>
                                    <div class="card-price"><span>MXN.
                                            <?php echo $totalDebit ?>
                                        </span></div>
                                </div>
                                <div class="card-icon">
                                    <i class="fas fa-exchange-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--First Rows-->
                <div class="overview-row row d-flex">
                    <!--Recent Transactions-->
                    <div class="earnings ">
                        <div class="earning-container row2-bgEdit">
                            <!--head of Transactions chart-->
                            <div class="earning-header d-flex justify-between">
                                <h6 class="earning-header-text">Transacciones Recientes</h6>
                                <button class="button-nobg" type="button"><i class="fas fa-ellipsis-v "></i></button>
                            </div>
                            <!--body of Transactions chart-->
                            <div class="earning-body">
                                <div class="table-itself margin-column-form">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Tipo de Transaccion</th>
                                                <th>Descripcion</th>
                                                <th>Cantidad</th>
                                                <th>Observaciones</th>
                                                <th>Fecha de la Transaccion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($trns as $trn) {
                                                $date = $trn['Date'];
                                                $sender = $trn['Sender'];
                                                $receiver = $trn['Receiver'];
                                                $amount = $trn['Amount'];
                                                $remarks = $trn['Remarks'];
                                                if ($trn['Sender'] == $accNo) {
                                                    echo "<tr>
                                                    <td>Debit</td>
                                                    <td>Transfer to $receiver</td>
                                                    <td>Rs. $amount</td>
                                                    <td>$remarks</td>
                                                    <td>$date</td>
                                                </tr>";
                                                } else {
                                                    echo "<tr>
                                                    <td>Credit</td>
                                                    <td>Transfer from $receiver</td>
                                                    <td>Rs. $amount</td>
                                                    <td>$remarks</td>
                                                    <td>$date</td>
                                                </tr>";
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Transfer-->
                    <div class="revenue">
                        <div class="revenue-container row2-bgEdit">
                            <!--head of transfer chart-->
                            <div class="revenue-header d-flex justify-between">
                                <h6 class="revenue-header-text">Modulo de transferencias</h6>
                                <button class="button-nobg" type="button"><i class="fas fa-ellipsis-v "></i></button>
                            </div>
                            <!--body of transfer chart-->
                            <div class="user-setting-body project-body">
                                <form action="../../scripts/bal_transfer.php" method="POST">
                                    <!--Reciever Acccount Number-->
                                    <div class="form-row d-flex justify-between">
                                        <div class="form-row-col d-flex flex-direction-column">
                                            <label class="form-label" for="receiver_accNo"><strong>Numero de cuenta</strong></label>
                                            <input class="form-control-prof" type="text" id="receiver_accNo"
                                                name="receiver_accNo">
                                        </div>
                                    </div>
                                    <!--Amount-->
                                    <div class="form-row d-flex justify-between">
                                        <div class="form-row-col d-flex flex-direction-column">
                                            <label class="form-label" for="amount"><strong>Cantidad</strong></label>
                                            <input class="form-control-prof" type="number" id="amount" name="amount">
                                        </div>
                                    </div>
                                    <!--Remarks-->
                                    <div class="form-row d-flex justify-between">
                                        <div class="form-row-col d-flex flex-direction-column">
                                            <label class="form-label" for="remarks"><strong>Observaciones</strong></label>
                                            <input class="form-control-prof" type="text" id="remarks" name="remarks">
                                        </div>
                                    </div>
                                    <small id="error-code" class="error-font">
                                        <?php echo $error ?>
                                    </small>
                                    <!--row3-->
                                    <div class="form-row">
                                        <div class="form-row-button text-center">
                                            <button class="button-profile" name="submit" id="submit"
                                                type="submit">Transferencia</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>