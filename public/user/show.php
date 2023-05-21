<?php

require_once('../../private/initialize.php');
session_start();
//require_login();

$username =$_SESSION['username'];

$user = find_user_by_username($username);

?>

<?php $page_title = 'Show user'; ?>
<?php include(SHARED_PATH . '/login_header.php'); ?>
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

                    <div class="User Profile">

                        <h2>User Profile</h2>

                        <div class="user show">

                            <h1><?php echo h($user['firstname']); ?>  <?php echo h($user['lastname']); ?></h1>

                            <div class="attributes">
                                <dl>
                                    <dt>First name</dt>
                                    <dd><?php echo h($user['firstname']); ?></dd>
                                </dl>
                                <dl>
                                    <dt>Last name</dt>
                                    <dd><?php echo h($user['lastname']); ?></dd>
                                </dl>
                                <dl>
                                    <dt>Email </dt>
                                    <dd><?php echo h($user['email']); ?><br /></dd>
                                </dl>


                                <dl>
                                    <dt>Address</dt>
                                    <dd><?php echo h($user['address']); ?></dd>
                                </dl>

                                <dl>
                                    <dt>Phone Number</dt>
                                    <dd><?php echo h($user['phonenumber']);?></dd>
                                </dl>
                                <dl>
                                    <dt>Gender</dt>
                                    <dd><?php echo h($user['gender']); ?></dd>
                                </dl>

                                <dl>
                                    <dt>Date Of Birth</dt>
                                    <dd><?php echo h($user['date_of_birth']); ?></dd>
                                </dl>

                                <dl>
                                    <dt>User Name </dt>
                                    <dd><?php echo h($user['username']);?><br /></dd>
                                </dl>
                                <!--        <div id="operations">-->
                                <!--            <br><input type="submit" value="edit" href="--><?php //echo url_for("/user/new.php")?><!--" />-->
                                <!--        </div>-->
                                <br> <a class = "user" href="<?php echo url_for("/user/edit.php")?>" >Edit Profile</a>

<!--                                <br> <br> <a class = "user" href="--><?php //echo url_for("/user/delete.php")?><!--" >Delete Profile</a>-->

                                <br><br>
                            </div>

                        </div>


                </div>

            </div>
        </div>
    </div>
</section>

