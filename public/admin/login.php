<?php
require_once ('../../private/initialize.php');

$errors = [];
$username = '';
$password = '';
$usertype = '';

if(is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';
  $usertype = $_POST['radio'] ?? '';

  // Validations
  if(is_blank($username)) {
    $errors[] = "Username cannot be blank.";
  }
  if(is_blank($password)) {
    $errors[] = "Password cannot be blank.";
  }

  // if there were no errors, try to login
  if(empty($errors)) {
    // Using one variable ensures that msg is the same
    $login_failure_msg = "Log in was unsuccessful.";
    $user = [];
    if ($usertype == 'admin') {
        $user = find_admin_by_username($username);

    }elseif ($usertype == 'child' || $usertype == 'adult') {
        $user = find_user_by_username($username);
    }
    elseif ($usertype == 'parent') {
        $user = find_parent_by_username($username);
    }
    elseif ($usertype == 'coach'){

        $user = find_coach_by_username($username);
    }
    if($user) {


      if(password_verify($password, $user['password'])) {
        // password matches

        log_in_admin($user);
        redirect_to(url_for('admin/index.php'));
      } else {

        // username found, but password does not match
        $errors[] = $login_failure_msg;
      }

    } else {
      // no username found

      $errors[] = $login_failure_msg;
    }

  }

}

?>

<?php $page_title = 'Log in';
include(SHARED_PATH . '/public_header.php');
?>


<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                     class="img-fluid" alt="Sample image">
            </div>

            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <span class="message"> <?php echo $_SESSION['message']?? ''; ?> </span>
                <?php echo display_errors($errors); ?>
                <form action="login.php" method="post">
                    <input class = "radio" type="radio" id="adult" name="radio" value="adult" checked>
                    <label for="adult">Adult</label><br>
                    <input class="radio" type="radio" id="parent" name="radio" value="parent">
                    <label for="parent">Parent</label><br>
                    <input class="radio" type="radio" id="child" name="radio" value="child">
                    <label for="child">Child</label><br>
                    <input class = "radio" type="radio" id="coach" name="radio" value="coach" >
                    <label for="coach">Coach</label><br>
                    <input class="radio" type="radio" id="admin" name="radio" value="admin">
                    <label for="admin">Admin</label><br>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="form3Example3" class="form-control form-control-lg" name="username"
                               placeholder="Enter a valid user name" value="<?php echo h($username); ?>"/>
                        <label class="form-label" for="form3Example3">User Name</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input type="password" id="form3Example4" class="form-control form-control-lg"
                               placeholder="Enter password" name="password" value=""/>
                        <label class="form-label" for="form3Example4">Password</label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">

<!--                        <a href="#!" class="text-body">Forgot password?</a>-->
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <input type="submit" name="submit" value="Submit"  />
<!--                        <button type="button" class="btn btn-primary btn-lg"-->
<!--                                style="padding-left: 2.5rem; padding-right: 2.5rem;" value="Submit">Login</button>-->
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="<?php echo url_for("/user/new.php")?>"
                                                                                          class="link-danger">Register</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>

</section>



