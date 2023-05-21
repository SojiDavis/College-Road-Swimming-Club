<?php

require_once('../../private/initialize.php');


if(is_post_request()) {
    $user = [];
    $parent = [];

  $user['firstname']        = $_POST['firstname'] ?? '';
  $user['lastname']         = $_POST['lastname'] ?? '';
  $user['email']            = $_POST['email'] ?? '';
  $user['phonenumber']     = validating_phone_number($_POST['phone'] ?? '');
  $user['address']          = $_POST['address'] ?? '';
  $selectOption             = $_POST['gender'] ?? '';
  $user['gender']           = match($selectOption){
      'male' => 'Male',
      'female' => 'Female'
  };
  $user['date_of_birth']    = $_POST['dob'] ?? '';
  $user['username']         = $_POST['username'] ?? '';
  $user['password']         = $_POST['password'] ?? '';
  $user['confirm_password'] = $_POST['confirm_password'] ?? '';
  $user['usertype']         = $_POST['radio'] ??'';


if($user['usertype'] == 'parent') {

    $parent['username'] = $_POST['parent_username']??'';
    $parent['password'] = $_POST['parent_password']??'';
    $parent['confirm_password'] = $_POST['parent_confirm_password']??'';
    $parent['usertype'] = $_POST['parent_radio']??'';

}

  $result = insert_user($user,$parent);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'User profile created.';
    redirect_to(url_for('admin/login.php'));
  } else {
    $errors = $result;
  }


} else {
  // display the blank form
    $user = [];
    $parent =[];

    $user['firstname']       ='';
    $user['lastname']        ='';
    $user['email']           ='';
    $user['phonenumber']     ='';
    $user['address']         ='';
    $user['gender']          ='';
    $user['date_of_birth']   ='';
    $user['username']        ='';
    $user['password']        ='';
    $user['confirm_password']='';
    $user['usertype']        ='';
    $parent['username']        ='';
    $parent['password']        ='';
    $parent['confirm_password']='';
    $parent['usertype']        ='';
}

?>

<?php $page_title = 'Sign Up'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                                <?php echo display_errors($errors); ?>
                                <form action="<?php echo url_for('/user/new.php'); ?>" method="post">

                                    <input class = "radio" type="radio" id="adult" name="radio" value="adult" checked />
                                    <label for="adult">Adult</label><br>
                                    <input class="radio" type="radio" id="parent" name="radio" value="parent" />
                                    <label for="parent">Parent</label><br><br>
                                    <div class="reveal-if-active">
                                        <h4>Childs's Details</h4>
                                    </div>

                                    <dl>
                                        <dt>First Name</dt>
                                        <dd><input type="text" name="firstname" value="<?php echo h($user['firstname']); ?>" /></dd>
                                    </dl>

                                    <dl>
                                        <dt>Last Name</dt>
                                        <dd><input type="text" name="lastname" value="<?php echo h($user['lastname']); ?>" /></dd>
                                    </dl>

                                    <label for="gender">Gender</label>
                                    <select id="gender" name="gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>

                                    <dl>
                                        <dt>Date Of Birth</dt>
                                        <dd><input type="date" name="dob" value="<?php echo h($user['date_of_birth']); ?>" placeholder="YYYY-MM-DD"/></dd>
                                    </dl>


                                        <h4>Contact Details</h4>

                                    <dl>
                                        <dt>Email </dt>
                                        <dd><input type="text" name="email" value="<?php echo h($user['email']); ?>" /><br></dd>
                                    </dl>


                                    <dl>
                                        <dt>Address</dt>
                                        <dd><input type="text" name="address" value="<?php echo h($user['address']); ?>" /></dd>
                                    </dl>

                                    <dl>
                                        <dt>Phone Number</dt>
                                        <dd><input type="phone" name="phone" value="<?php echo h($user['phonenumber']); ?>" /></dd>
                                    </dl>
                                        <br>

                                        <div class="reveal-if-active">
                                            <h4>Child's Login Details</h4>
                                        </div>
                                        <br>
                                        <dl>
                                        <dt>User Name </dt>
                                        <dd><input type="text" name="username" value="<?php echo h($user['username']); ?>" /></dd>
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
                                    <div class="reveal-if-active">
                                        <h4>Parent's Login Details</h4>
                                        <dl>
                                            <dt>User Name </dt>
                                            <dd><input type="text" name="parent_username" value="<?php echo h($parent['username']); ?>" /></dd>
                                        </dl>
                                        <p>
                                            User Name should be atleast 8 character<br>Unable to change "User Name" once profile is created.
                                        </p>
                                        <dl>
                                            <dt>Password</dt>
                                            <dd><input type="password" name="parent_password" value="" /></dd>
                                        </dl>
                                        <p>
                                            Passwords should be at least 12 characters and include at least one uppercase letter, lowercase letter, number, and symbol.
                                        </p>
                                        <dl>
                                            <dt>Confirm Password</dt>
                                            <dd><input type="password" name="parent_confirm_password" value="" /></dd>
                                        </dl>

                                        <input class = "radio" type="radio" id="parent" name="parent_radio" value="parent" checked />
                                        <label for="parent">parent</label><br>

                                    </div>


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

