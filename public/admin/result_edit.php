<?php

require_once('../../private/initialize.php');
session_start();
//require_login();
$username =$_SESSION['username'];
$user = find_admin_by_username($username);
if(!isset($_GET['id'])) {
    redirect_to(url_for('/admin/result_view.php'));
}
$id = $_GET['id'];

if(is_post_request()) {
    $edit_result = [];

    $edit_result['id']          =$id;
    $edit_result['finished_time']        = $_POST['time'] ?? '';
    $edit_result['position']    = $_POST['position'] ?? '';





  $result = update_result($edit_result);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'Event Updated.';
    redirect_to(url_for('admin/result_view.php'));
  } else {
    $errors = $result;
  }


}else{
    $edit_event = find_result_by_Id($id);
    $edit_result['id']                  =$edit_event['id'];
    $edit_result['finished_time']       = $edit_event['finished_time'] ;
    $edit_result['position']            =$edit_event['position'] ;

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
                                <form action="<?php echo url_for("/admin/result_edit.php?id=" .h(u($id))); ?>" method="post">

                                <h4>Gala : <?php echo $_SESSION ['galaName'] ?> </h4>
                                    <h5>Event : <?php echo $_SESSION ['eventName'] ?> </h5>
                                    <dl>
                                        <dt>Finished Time</dt>
                                        <span>Time in mm:ss format</span>
                                        <dd><input type="text" name="time" value="<?php echo h($edit_result['finished_time']); ?>" /></dd>
                                    </dl>

                                    <dl>
                                        <dt>position</dt>
                                        <dd><input type="int" name="position" value="<?php echo h($edit_result['position']); ?>" /></dd>
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

