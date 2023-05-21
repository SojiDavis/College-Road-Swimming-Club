<?php

require_once('../../private/initialize.php');
session_start();
//require_login();

$username =$_SESSION['username'];

$user = find_user_by_username($username);

$user_set = find_all_user();
$coach_set = find_all_coach();
$admin_set = find_all_admins();

$radioValue = '';
if($_POST['username']) {
    $user_details = find_user_by_username($_POST['username']);
    $coach_details = find_coach_by_username($_POST['username']);
    $admin_details = find_admin_by_username($_POST['username']);
}
?>
<?php $page_title = 'profiles ';
include(SHARED_PATH . '/login_header.php');
?>


<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <h2><a href="<?php echo url_for("/admin/admin_dashboard.php")?>" >Back</a></h2>
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                     class="img-fluid" alt="Sample image">
            </div>

            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

                <?php echo display_errors($errors); ?>
                <form action="profile_show.php" method="post">
                    <input class = "radio" type="radio"  name="radio" value="user" >
                    <label for="adult">user</label><br>
                    <input class = "radio" type="radio"  name="radio" value="coach" >
                    <label for="coach">Coach</label><br>
                    <input class="radio" type="radio" name="radio" value="admin">
                    <label for="admin">Admin</label><br>
                    <input type="submit" name="submit" value="Submit"  /><br><br>

                    <?php if (isset($_POST['submit'])) { if(isset($_POST['radio'])) {  if ($_POST['radio'] == 'user'){ $radioValue = 'user'  ?>


                    <select name="username">
                        <option value="">Select</option>

                        <?php while($optionData= mysqli_fetch_assoc($user_set)) { ?>
                        <option value="<?php echo h($optionData['username']); ?>"> <?php echo h($optionData['username']); ?></option>
                       <?php } ?>
                    </select>
                    <?php }elseif($_POST['radio'] == 'coach'){ $radioValue = 'coach'?>

                    <select name="username">
                        <option value="">Select</option>

                        <?php while($optionData= mysqli_fetch_assoc($coach_set)) { ?>
                            <option value="<?php echo h($optionData['username']); ?>"> <?php echo h($optionData['username']); ?></option>
                        <?php } ?>
                    </select>
                    <?php }elseif($_POST['radio'] == 'admin'){ $radioValue = 'admin' ?>

                    <select name="username">
                        <option value="">Select</option>

                        <?php while($optionData= mysqli_fetch_assoc($admin_set)) { ?>
                            <option value="<?php echo h($optionData['username']); ?>"> <?php echo h($optionData['username']); ?></option>
                        <?php } ?>
                    </select>
                    <?php }}} ?>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <input type="submit" name="submit" value="Submit"  />
                    </div>

                <?php

                if(isset($_POST['username']) && isset($_POST['submit'])) {


                    if ($user_details != '' ) {?>
                        <div id="content">

                            <!--  <a class="back-link" href="--><?php //echo url_for('/index.php'); ?><!--">&laquo; Back to List</a>-->

                            <div class="user show">

                                <h1><?php echo h($user_details['firstname']); ?>  <?php echo h($user_details['lastname']); ?></h1>

                                <div class="attributes">
                                    <dl>
                                        <dt>First name</dt>
                                        <dd><?php echo h($user_details['firstname']); ?></dd>
                                    </dl>
                                    <dl>
                                        <dt>Last name</dt>
                                        <dd><?php echo h($user_details['lastname']); ?></dd>
                                    </dl>
                                    <dl>
                                        <dt>Email </dt>
                                        <dd><?php echo h($user_details['email']); ?><br /></dd>
                                    </dl>


                                    <dl>
                                        <dt>Address</dt>
                                        <dd><?php echo h($user_details['address']); ?></dd>
                                    </dl>

                                    <dl>
                                        <dt>Phone Number</dt>
                                        <dd><?php echo h($user_details['phonenumber']);?></dd>
                                    </dl>
                                    <dl>
                                        <dt>Gender</dt>
                                        <dd><?php echo h($user_details['gender']); ?></dd>
                                    </dl>

                                    <dl>
                                        <dt>Date Of Birth</dt>
                                        <dd><?php echo h($user_details['date_of_birth']); ?></dd>
                                    </dl>

                                    <dl>
                                        <dt>User Name </dt>
                                        <dd><?php echo h($user_details['username']);?><br /></dd>
                                    </dl>

                                </div>

                            </div>

<!--                            <br><b><a class = "user" href="--><?php //echo url_for("/user/edit.php")?><!--" >Edit Profile</a></b>-->

                            <br><br>
                        </div>
                   <?php }

                    elseif ($coach_details != '' ) {?>
                    <div id="content">

                        <!--  <a class="back-link" href="--><?php //echo url_for('/index.php'); ?><!--">&laquo; Back to List</a>-->

                        <div class="coach show">

                            <h1><?php echo h($coach_details['firstname']); ?>  <?php echo h($coach_details['lastname']); ?></h1>

                            <div class="attributes">
                                <dl>
                                    <dt>First name</dt>
                                    <dd><?php echo h($coach_details['firstname']); ?></dd>
                                </dl>
                                <dl>
                                    <dt>Last name</dt>
                                    <dd><?php echo h($coach_details['lastname']); ?></dd>
                                </dl>
                                <dl>
                                    <dt>Email </dt>
                                    <dd><?php echo h($coach_details['email']); ?><br /></dd>
                                </dl>


                                <dl>
                                    <dt>Qualification</dt>
                                    <dd><?php echo h($coach_details['qualification']); ?></dd>
                                </dl>

                                <dl>
                                    <dt>Phone Number</dt>
                                    <dd><?php echo h($coach_details['phone_number']);?></dd>
                                </dl>
                                <dl>
                                    <dt>Gender</dt>
                                    <dd><?php echo h($coach_details['gender']); ?></dd>
                                </dl>

                                <dl>
                                    <dt>Date Of Join</dt>
                                    <dd><?php echo h($coach_details['date_of_join']); ?></dd>
                                </dl>

                                <dl>
                                    <dt>User Name </dt>
                                    <dd><?php echo h($coach_details['username']);?><br /></dd>
                                </dl>

                            </div>

                        </div>

                    </div>
                    <?php } elseif ($admin_details != '' ) {?>
                    <div id="content">

                        <!--  <a class="back-link" href="--><?php //echo url_for('/index.php'); ?><!--">&laquo; Back to List</a>-->

                        <div class="admin show">
                                <dl>
                                    <dt>User Name </dt>
                                    <dd><?php echo h($admin_details['username']);?><br /></dd>
                                </dl>

                            </div>

                        </div>

                    </div>
                    <?php }
                }
                     ?>

                </form>

        </div>
</section>
