<?php

require_once('../../private/initialize.php');
session_start();
//require_login();

$username =$_SESSION['username'];

if(is_post_request()) {
    $admin = [];

    $admin['username']         = $_POST['username'] ?? '';
    $admin['password']         = $_POST['password'] ?? '';
    $admin['confirm_password'] = $_POST['confirm_password'] ?? '';


  $result = insert_admin($admin);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'Admin profile created.';
    redirect_to(url_for('admin/admin_dashboard.php'));
  } else {
    $errors = $result;
  }


} else {
  // display the blank form
    $admin = [];


    $admin['username']        ='';
    $admin['password']        ='';
    $admin['confirm_password']='';

}

?>

<?php $page_title = 'create admin'; ?>
<?php include(SHARED_PATH . '/login_header.php'); ?>
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">

            <div class="col-lg-12 col-xl-11">

                <div class="card text-black" style="border-radius: 25px;">
                    <br>
                    <h2><a href="<?php echo url_for("/admin/admin_dashboard.php")?>" >Back</a></h2>
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Create Admin</p>
                                <?php echo display_errors($errors); ?>
                                <form action="<?php echo url_for('/admin/admin_new.php'); ?>" method="post">

                                        <dl>
                                        <dt>User Name </dt>
                                        <dd><input type="text" name="username" value="<?php echo h($admin['username']); ?>" /></dd>
                                    </dl>
                                    <p>
                                        User Name should be atleast 8 character<br>Unable to change "User Name" once profile is created.
                                    </p>
                                    <dl>
                                        <dt>Password</dt>
                                        <dd><input type="password" name="password" value="" /></dd>
                                    </dl>
                                    <p>
                                        Passwords should be at least 12 characters and include at least one uppercase letter, lowercase letter, number, and symbol.
                                    </p>
                                    <dl>
                                        <dt>Confirm Password</dt>
                                        <dd><input type="password" name="confirm_password" value="" /></dd>
                                    </dl>

                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                                        <label class="form-check-label" for="form2Example3">
                                            I agree all statements in <a href="<?php echo url_for("/index.php#activities")?>">Terms of service</a>
                                        </label>
                                    </div>
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-primary btn-lg">Register</button>
                                    </div>
                                </form>

                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                     class="img-fluid" alt="Sample image">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php //include(SHARED_PATH . '/public_footer.php'); ?>

