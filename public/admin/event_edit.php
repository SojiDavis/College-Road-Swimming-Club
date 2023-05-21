<?php

require_once('../../private/initialize.php');
session_start();
//require_login();
$username =$_SESSION['username'];
$user = find_admin_by_username($username);
if(!isset($_GET['id'])) {
    redirect_to(url_for('/admin/gala_view.php'));
}
$id = $_GET['id'];

if(is_post_request()) {
    $edit_event = [];

    $edit_event['id']          =$id;
    $edit_event['name']        = $_POST['name'] ?? '';
    $edit_event['location']    = $_POST['location'] ?? '';
    $edit_event['time']        = $_POST['time'] ?? '';
    $edit_event['age_group']   = $_POST['age_group'] ?? '';
    $edit_event['distance']    = $_POST['distance'] ?? '';
    $edit_event['stroke']      = $_POST['stroke'] ?? '';
    $edit_event['gender']      = $_POST['gender'] ?? '';




  $result = update_event($edit_event);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'Event Updated.';
    redirect_to(url_for('admin/gala_view.php'));
  } else {
    $errors = $result;
  }


} else {
  // display the blank form
    $edit_event = find_event_by_Id($id);

}

?>

<?php $page_title = 'Edit Event'; ?>
<?php include(SHARED_PATH . '/login_header.php'); ?>
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Update Event</p>
                                <?php echo display_errors($errors); ?>
                                <form action="<?php echo url_for("/admin/event_edit.php?id=" .h(u($id))); ?>" method="post">

                                <h4>Gala : <?php echo $_SESSION ['galaName'] ?> </h4>
                                    <dl>
                                        <dt>Name</dt>
                                        <dd><input type="text" name="name" value="<?php echo h($edit_event['name']); ?>" /></dd>
                                    </dl>

                                    <dl>
                                        <dt>Location</dt>
                                        <dd><input type="text" name="location" value="<?php echo h($edit_event['location']); ?>" /></dd>
                                    </dl>

                                    <dl>
                                        <dt>Time </dt>
                                        <dd><input type="time" name="time" value="<?php echo h($edit_event['time']); ?>" /></dd>
                                    </dl>
                                    <dl>
                                        <dt>Age Group</dt>
                                        <dd><input type="text" name="age_group" value="<?php echo h($edit_event['age_group']); ?>" /></dd>
                                    </dl>

                                    <dl>
                                        <dt>Distance</dt>
                                        <dd><input type="text" name="distance" value="<?php echo h($edit_event['distance']); ?>" /></dd>
                                    </dl>

                                    <dl>
                                        <dt>Stroke </dt>
                                        <dd><input type="text" name="stroke" value="<?php echo h($edit_event['stroke']); ?>" /></dd>
                                    </dl>

                                    <dl>
                                        <dt>Gender </dt>
                                        <dd><input type="text" name="gender" value="<?php echo h($edit_event['gender']); ?>" /></dd>
                                    </dl>
                                    <br><br>
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



<?php //include(SHARED_PATH . '/public_footer.php'); ?>

