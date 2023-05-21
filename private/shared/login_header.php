<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>College Road Swimming Club</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?php echo url_for("assets/favicon.jpg")?>"/>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo url_for("css/styles.css")?>" rel="stylesheet"/>

</head>
<body id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="<?php echo url_for("admin/index.php#page-top")?>"><img src="<?php echo url_for("assets/favicon.jpg")?>"alt="..."/></a>
        <span class="greeting">Hello <?php echo $_SESSION['username'] ?? ''; ?> </span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link" href="<?php echo url_for("admin/index.php#About Us")?>">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo url_for("admin/index.php#activities")?>">Activities</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo url_for("admin/index.php#open meets")?>">Open Meets</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo url_for("admin/index.php#team")?>">Team</a></li>
                <?php  if ($_SESSION['usertype'] == 'parent' || $_SESSION['usertype'] == 'adult' || $_SESSION['usertype'] == 'child'){ ?>
<!--                <li class="nav-item"><a class="nav-link" href="--><?php //echo url_for("/user/show.php")?><!--">Dashboard</a></li>-->
                    <li class="nav-item"><a class="nav-link" href="<?php echo url_for("/user/user_dashboard.php")?>">Dashboard</a></li>
                <?php } elseif ($_SESSION['usertype'] == 'admin'){?>
                <li class="nav-item"><a class="nav-link" href="<?php echo url_for("admin/admin_dashboard.php")?>">Dashboard</a></li>
                <?php } elseif ($_SESSION['usertype'] == 'coach'){?>
                <li class="nav-item"><a class="nav-link" href="<?php echo url_for("coach/coach_dashboard.php")?>">Dashboard</a></li>
                <?php }?>
                <li class="nav-item"><a class="nav-link" href="<?php echo url_for("/admin/logout.php") ?>">LogOut</a></li>
            </ul>
        </div>
    </div>
</nav>

