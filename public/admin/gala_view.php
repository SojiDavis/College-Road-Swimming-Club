<?php

require_once('../../private/initialize.php');
session_start();
//require_login();

$username =$_SESSION['username'];
$usertype = $_SESSION['usertype'];
$user = find_user_by_username($username);
$gala_set = find_all_galas();

if($_POST['galaname']) {
$gala_details = find_gala_by_name($_POST['galaname']);
$event_details = find_event_by_galaId($gala_details['id']);
    $_SESSION ['galaId'] = $gala_details['id'];
    $_SESSION ['galaName'] = $gala_details['name'];
}

$i=0;
?>
<?php $page_title = 'gala details ';
include(SHARED_PATH . '/login_header.php');
?>


<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <br>
            <?php if($usertype == 'admin'){?>
            <h2><a href="<?php echo url_for("/admin/admin_dashboard.php")?>" >Back</a></h2>
            <?php } elseif ($usertype == 'coach') {?>
            <h2><a href="<?php echo url_for("/coach/coach_dashboard.php")?>" >Back</a></h2>
            <?php } else {?>
            <h2><a href="<?php echo url_for("/user/user_dashboard.php")?>" >Back</a></h2>

            <?php } ?>
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                     class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-9 col-lg-6 col-xl-5">
            <div id="content">


                <!--  <a class="back-link" href="--><?php //echo url_for('/index.php'); ?><!--">&laquo; Back to List</a>-->

                <div class="Gala show">

                    <h2>Gala Details</h2>

                    <form action="gala_view.php" method="post">
                        <select name="galaname">
                            <option value="">Select</option>

                            <?php while($optionData= mysqli_fetch_assoc($gala_set)) { ?>
                                <option value="<?php echo h($optionData['name']); ?>"> <?php echo h($optionData['name']); ?></option>
                            <?php } ?>
                        </select>
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <input type="submit" name="submit" value="Submit"  />
                        </div>

                    <?php

                    if(isset($_POST['galaname']) && isset($_POST['submit'])) { ?>
                    <div class="attributes">

                        <dl>
                            <dt>name</dt>
                            <dd><?php echo h($gala_details['name']); ?></dd>
                        </dl>
                        <dl>
                            <dt>Location</dt>
                            <dd><?php echo h($gala_details['location']); ?></dd>
                        </dl>
                        <dl>
                            <dt>Date </dt>
                            <dd><?php echo h($gala_details['date']); ?><br /></dd>
                        </dl>
                        <dl>
                            <dt>Time</dt>
                            <dd><?php echo h($gala_details['time']); ?></dd>
                        </dl>
                        <?php if ($usertype == 'admin') { ?>
                        <h4><a href="<?php echo url_for("/admin/event_new.php")?>" >Add Event</a> </h4> <br>
                        <h4><a class = "action" href="<?php echo url_for("/admin/gala_edit.php?id=" .h(u($gala_details['id'])))?>" >Edit Gala</a> </h4> <br>
                        <h4> <a href="<?php echo url_for("/admin/gala_delete.php")?>" >Delete Gala</a></h4> <br>
                        <?php } ?>
                        <h2>Event Details</h2>
                        <?php while($show_event = mysqli_fetch_assoc($event_details)) { $i=$i+1 ?>
                        <?php $page_count = count_event_by_gala_id($show_event['gala_id']); ?>
                        <h3>Event : <?php echo $i;?> </h3>
                        <dl>
                            <dt>Name</dt>
                            <dd><?php echo h($show_event['name']);?></dd>
                        </dl>
                        <dl>
                            <dt>Location</dt>
                            <dd><?php echo h($show_event['location']); ?></dd>
                        </dl>

                        <dl>
                            <dt>Time</dt>
                            <dd><?php echo h($show_event['time']); ?></dd>
                        </dl>

                        <dl>
                            <dt>Age Group</dt>
                            <dd><?php echo h($show_event['age_group']);?><br /></dd>
                        </dl>

                        <dl>
                            <dt>Distance</dt>
                            <dd><?php echo h($show_event['distance']);?><br /></dd>
                        </dl>

                        <dl>
                            <dt>Stroke</dt>
                            <dd><?php echo h($show_event['stroke']);?><br /></dd>
                        </dl>

                        <dl>
                            <dt>gender</dt>
                            <dd><?php echo h($show_event['gender']);?><br /></dd>
                        </dl>
                        <?php if ($usertype == 'admin') { ?>
                            <h4><a class = "action" href="<?php echo url_for("/admin/event_edit.php?id=" .h(u($show_event['id'])))?>" >Edit Event</a> </h4> <br>
                            <h4> <a class = "action" href="<?php echo url_for("/admin/event_delete.php?id=" .h(u($show_event['id'])))?>" >Delete Event</a></h4> <br>
                            <?php } ?>
                            <?php if ($usertype == 'adult' || $usertype == 'parent') { ?>
                                <h4><a class = "action" href="<?php echo url_for("/admin/gala_register.php?id=" .h(u($show_event['id'])))?>" >Register Event</a> </h4> <br>

                            <?php } ?>
                        <?php }?>

                        <br>

                    </div>
                    </form>
                <?php }?>
                </div>
                <div class="Gala show">
                    <?php if ($usertype == 'admin') { ?>
                    <h3><a href="<?php echo url_for("/admin/gala_new.php")?>" >Create Gala</a></h3>
                    <?php } ?>
                    <?php if ($usertype == 'coach') { ?>
                        <h3><a href="<?php echo url_for("/admin/gala_register_view.php")?>" >Gala Register Details</a></h3>
                    <?php } ?>
                    <h3><a href="<?php echo url_for("/admin/gala_participant_view.php")?>" >Gala Participant Details</a></h3>
                </div>

            </div>

        </div>
        </div>
    </div>
</section>
