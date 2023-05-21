<?php

require_once('../../private/initialize.php');
session_start();

$username = $_SESSION['username'];
echo $username;
$user = find_user_by_username($username);

$id= h($user['id']);


if(is_post_request()) {
    echo "inside post request";
    $edit_user = [];
    $edit_user['id']                = $id;
    $edit_user['firstname']        = $_POST['firstname'] ?? '';
    $edit_user['lastname']         = $_POST['lastname'] ?? '';
    $edit_user['email']             = $_POST['email'] ?? '';
    $edit_user['phonenumber']      = validating_phone_number($_POST['phone'] ?? '');
    $edit_user['address']           = $_POST['address'] ?? '';
    $edit_user['gender']            = $_POST['gender'] ?? '';
    $edit_user['password']          = $_POST['password'] ?? '';
    $edit_user['confirm_password']  = $_POST['confirm_password'] ?? '';

  $result = update_user($edit_user);
  if($result === true) {
    $_SESSION['message'] = 'User updated.';
    redirect_to(url_for('/user/show.php'));
  } else {
    $errors = $result;
  }
}else{
   $edit_user = find_user_by_id($id);
}

?>

<?php $page_title = 'Edit Admin'; ?>
<?php include(SHARED_PATH . '/login_header.php'); ?>
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Edit User</p>
                                <?php echo display_errors($errors); ?>
                                <form action="<?php echo url_for('/user/edit.php'); ?>" method="post">
                                    <dl>
                                        <dt>First name</dt>
                                        <dd><input type="text" name="firstname" value="<?php echo h($edit_user['firstname']); ?>" /></dd>
                                    </dl>

                                    <dl>
                                        <dt>Last name</dt>
                                        <dd><input type="text" name="lastname" value="<?php echo h($edit_user['lastname']); ?>" /></dd>
                                    </dl>

                                    <dl>
                                        <dt>Email</dt>
                                        <dd><input type="text" name="email" value="<?php echo h($edit_user['email']); ?>" /><br /></dd>
                                    </dl>

                                    <dl>
                                        <dt>Phone number</dt>
                                        <dd><input type="text" name="phone" value="<?php echo h($edit_user['phonenumber']); ?>" /></dd>
                                    </dl>

                                    <dl>
                                        <dt>Address</dt>
                                        <dd><input type="text" name="address" value="<?php echo h($edit_user['address']); ?>" /></dd>
                                    </dl>

                                    <dl>
                                        <dt>Gender</dt>
                                        <dd><input type="text" name="gender" value="<?php echo h($edit_user['gender']); ?>" /><br /></dd>
                                    </dl>

                                    <dl>
                                        <dt>Password</dt>
                                        <dd><input type="password" name="password" value="" /></dd>
                                    </dl>

                                    <dl>
                                        <dt>Confirm Password</dt>
                                        <dd><input type="password" name="confirm_password" value="" /></dd>
                                    </dl>
                                    <p>
                                        Passwords should be at least 12 characters and include at least one uppercase letter, lowercase letter, number, and symbol.
                                    </p>
                                    <br />

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-primary btn-lg">Update</button>
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



