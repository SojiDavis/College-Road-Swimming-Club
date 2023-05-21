<?php

require_once('../../private/initialize.php');
//session_start();
//require_login();

$username =$_SESSION['username'];
$usertype = $_SESSION['usertype'];
if ($usertype == 'parent'){
    $child = find_user_by_parentId($_SESSION['admin_id']);
    $id = $child['id'];
}else {
    $id = $_SESSION['admin_id'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Road Swimming Club</title>
    <link rel="icon" type="image/x-icon" href="<?php echo url_for("assets/favicon.jpg")?>"/>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!--    <link rel="stylesheet" href="fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" /> <!-- https://fonts.google.com/ -->
    <link rel="stylesheet" href="<?php echo url_for("css/dashboard.css")?>">
</head>
<body>

<div class="tm-container">
    <div class="tm-row">
        <!-- Site Header -->
        <div class="tm-left">
            <?php if ($usertype=='adult' || $usertype == 'parent' || $usertype =='child') { ?>
            <div class = "my_chart" style ='display:inline-flex;background-color: #1a1e21'  >
                <?php $query = chart_query($id);
                foreach ($query as $data)
                {
                    $date[]= $data['Date'];
                    $time[]= $data['Time'];
                }
                ?>
                <div >
                    <canvas id="myChart" style="display: inline-flex;width: 200%"></canvas>
                </div>
            </div><br><br>
            <?php } ?>


            <div class="tm-left-inner">
                <div class="tm-site-header">
                    <!--            <i class="fas fa-coffee fa-3x tm-site-logo"></i>-->
                    <h1 class="tm-site-name">Dashboard</h1>
                </div>
                <nav class="tm-site-nav">
                    <ul class="tm-site-nav-ul">
                        <li class="tm-page-nav-item">
                                <a href="#Profile" class="tm-page-link active">
                                <!--                  <i class="fas fa-mug-hot tm-page-link-icon"></i>-->
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="tm-page-nav-item">
                            <a href="#about" class="tm-page-link">
                                <!--                  <i class="fas fa-users tm-page-link-icon"></i>-->
                                <span>Gala Details</span>
                            </a>
                        </li>
                        <li class="tm-page-nav-item">
                            <a href="#performance" class="tm-page-link">
                                <!--                  <i class="fas fa-glass-martini tm-page-link-icon"></i>-->
                                <span>Performance</span>
                            </a>
                        </li>
                        <li class="tm-page-nav-item">
                            <a href="<?php echo url_for("/admin/index.php#About Us")?>" class="tm-page-link">
                                <!--                                <i class="fas fa-comments tm-page-link-icon"></i>-->
                                <span>Home Page</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>

