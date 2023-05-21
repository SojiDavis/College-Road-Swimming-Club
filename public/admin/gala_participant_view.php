<?php

require_once('../../private/initialize.php');
session_start();
//require_login();

$username =$_SESSION['username'];
$usertype = $_SESSION['usertype'];
$user = find_user_by_username($username);
$gala_participant_list= find_all_participant();
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

                <div class="Gala Participant show">
                    <?php while($show_event = mysqli_fetch_assoc($gala_participant_list)) { $i=$i+1;  ?>

                    <h3>Swimmer  <?php echo $i ?> </h3>

                    <h2><?php echo h($show_event['Gala_name']); ?>  </h2>

                    <div class="attributes">
                        <dl>
                            <dt>Swimmer UserName</dt>
                            <dd><?php echo h($show_event['Swimmer_Username']); ?></dd>
                        </dl>

                            <dt>Event Name</dt>
                            <dd><?php echo h($show_event['Event_Name']); ?></dd>
                        </dl>


                    </div>
                    <?php } ?>
                </div>






            </div>

        </div>
        </div>
    </div>
</section>
