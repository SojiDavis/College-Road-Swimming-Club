<?php

require_once('../../private/initialize.php');
session_start();
//require_login();

$username =$_SESSION['username'];

if(is_post_request()) {
    $coach = [];

    $coach['firstname']        = $_POST['firstname'] ?? '';
    $coach['lastname']         = $_POST['lastname'] ?? '';
    $coach['qualification']    = $_POST['qualification'] ?? '';
    $coach['email']            = $_POST['email'] ?? '';
    $coach['phonenumber']     = validating_phone_number($_POST['phone'] ?? '');
    $selectOption             = $_POST['gender'] ?? '';;
    $coach['gender']           = match($selectOption){
        'male' => 'Male',
        'female' => 'Female'
    };
    $coach['date_of_join']    = $_POST['doj'] ?? '';
    $coach['username']         = $_POST['username'] ?? '';
    $coach['password']         = $_POST['password'] ?? '';
    $coach['confirm_password'] = $_POST['confirm_password'] ?? '';
    $coach['usertype']         = $_POST['radio'] ??'';


  $result = insert_coach($coach);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'Admin profile created.';
    redirect_to(url_for('admin/admin_dashboard.php'));
  } else {
    $errors = $result;
  }


} else {
  // display the blank form
    $coach = [];


    $coach['firstname']        = '';
    $coach['lastname']         = '';
    $coach['qualification']    = '';
    $coach['email']            = '';
    $coach['phonenumber']     = '';
    $selectOption             = '';
    $coach['gender']           = '';
    $coach['date_of_join']    = '';
    $coach['username']         = '';
    $coach['password']         = '';
    $coach['confirm_password'] = '';
    $coach['usertype']         = '';

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

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Create Coach</p>
                                <?php echo display_errors($errors); ?>
                                <form action="<?php echo url_for('/coach/coach_new.php'); ?>" method="post">



                                    <dl>
                                        <dt>First Name</dt>
                                        <dd><input type="text" name="firstname" value="<?php echo h($coach['firstname']); ?>" /></dd>
                                    </dl>

                                    <dl>
                                        <dt>Last Name</dt>
                                        <dd><input type="text" name="lastname" value="<?php echo h($coach['lastname']); ?>" /></dd>
                                    </dl>

                                    <label for="gender">Gender</label>
                                    <select id="gender" name="gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>

                                    <dl>
                                        <dt>Date Of Join</dt>
                                        <dd><input type="date" name="doj" value="<?php echo h($coach['date_of_join']); ?>" /></dd>
                                    </dl>

                                    <dl>
                                        <dt>Email </dt>
                                        <dd><input type="text" name="email" value="<?php echo h($coach['email']); ?>" /><br></dd>
                                    </dl>


                                    <dl>
                                        <dt>Qualification</dt>
                                        <dd><input type="text" name="qualification" value="<?php echo h($coach['qualification']); ?>" /></dd>
                                    </dl>

                                    <dl>
                                        <dt>Phone Number</dt>
                                        <dd><input type="phone" name="phone" value="<?php echo h($coach['phonenumber']); ?>" /></dd>
                                    </dl>

                                    <dl>
                                        <dt>User Name </dt>
                                        <dd><input type="text" name="username" value="<?php echo h($coach['username']); ?>" /></dd>
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
                                    <input class = "radio" type="radio" id="coach" name="radio" value="coach" checked />
                                    <label for="coach">coach</label><br>


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

