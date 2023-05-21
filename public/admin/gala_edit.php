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
    $edit_gala = [];

    $edit_gala['id']           =$id;
    $edit_gala['name']        = $_POST['gala_name'] ?? '';
    $edit_gala['location']    = $_POST['gala_location'] ?? '';
    $edit_gala['date']        = $_POST['gala_date'] ?? '';
    $edit_gala['time']        = $_POST['gala_time'] ?? '';




  $result = update_gala($edit_gala);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'Gala Updated.';
    redirect_to(url_for('admin/gala_view.php'));
  } else {
    $errors = $result;
  }


} else {
  // display the blank form
    $edit_gala = find_gala_by_Id($id);

}

?>

<?php $page_title = 'Edit Gala'; ?>
<?php include(SHARED_PATH . '/login_header.php'); ?>
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Update Gala</p>
                                <?php echo display_errors($errors); ?>
                                <form action="<?php echo url_for("/admin/gala_edit.php?id=" .h(u($id))); ?>" method="post">


                                    <dl>
                                        <dt>Name</dt>
                                        <dd><input type="text" name="gala_name" value="<?php echo h($edit_gala['name']); ?>" /></dd>
                                    </dl>

                                    <dl>
                                        <dt>Location</dt>
                                        <dd><input type="text" name="gala_location" value="<?php echo h($edit_gala['location']); ?>" /></dd>
                                    </dl>

                                    <dl>
                                        <dt>Date</dt>
                                        <dd><input type="date" name="gala_date" value="<?php echo h($edit_gala['date']); ?>" /> </dd>
                                    </dl>

                                    <dl>
                                        <dt>Time </dt>
                                        <dd><input type="time" name="gala_time" value="<?php echo h($edit_gala['time']); ?>" /></dd>
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

