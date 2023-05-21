<?php

require_once('../../private/initialize.php');
session_start();
//require_login();

$username =$_SESSION['username'];
$usertype = $_SESSION['usertype'];
$user = find_user_by_username($username);
$gala_register_list= find_all_registers();
$i=0;
?>
<?php $page_title = 'gala details ';
include(SHARED_PATH . '/login_header.php');
?>


<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                     class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-9 col-lg-6 col-xl-5">
            <div id="content">

                <!--  <a class="back-link" href="--><?php //echo url_for('/index.php'); ?><!--">&laquo; Back to List</a>-->

                <div class="Gala Register show">
                    <?php while($show_event = mysqli_fetch_assoc($gala_register_list)) { $i=$i+1;  ?>

                    <h3>Swimmer  <?php echo $i ?> </h3>

                    <h2><?php echo h($show_event['Swimmer_first_name']); ?>  <?php echo h($show_event['Swimmer_last_name']); ?></h2>

                    <div class="attributes">
                        <dl>
                            <dt>Swimmer UserName</dt>
                            <dd><?php echo h($show_event['Swimmer_Username']); ?></dd>
                        </dl>
                        <dl>
                            <dt>Swimmer Gender</dt>
                            <dd><?php echo h($show_event['Swimmer_Gender']); ?></dd>
                        </dl>
                        <dl>
                            <dt>Swimmer Squad </dt>
                            <dd><?php echo h($show_event['Swimmer_Squad']); ?><br /></dd>
                        </dl>


                        <dl>
                            <dt>Swimmer Stroke</dt>
                            <dd><?php echo h($show_event['Swimmer_Stroke']); ?></dd>
                        </dl>

                        <dl>
                            <dt>Gala Name</dt>
                            <dd><?php echo h($show_event['Gala_name']);?></dd>
                        </dl>
                        <dl>
                            <dt>Event Name</dt>
                            <dd><?php echo h($show_event['Event_Name']); ?></dd>
                        </dl>

                        <dl>
                            <dt>Event Age Group</dt>
                            <dd><?php echo h($show_event['Event_age_group']); ?></dd>
                        </dl>

                        <dl>
                            <dt>Event Gender</dt>
                            <dd><?php echo h($show_event['Event_gender']);?><br /></dd>
                        </dl>

                        <br> <b><a class = "user" href="<?php echo url_for("/admin/gala_register_accept.php?id=" .h(u($show_event['id']))); ?>">Accept</a></b>

                        <br> <br> <b><a class = "user" href="<?php echo url_for("/admin/gala_register_delete.php?id=" .h(u($show_event['id']))); ?>">Reject</a></b>

                        <br><br>
                    </div>
                    <?php } ?>
                </div>
                <div class="Gala Register Show">

                    <h2><a href="<?php echo url_for("/coach/coach_dashboard.php")?>" >Back to Dashboard</a></h2>



                </div>

            </div>

        </div>
        </div>
    </div>
</section>
