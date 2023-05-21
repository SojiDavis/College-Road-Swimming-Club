<?php

require_once('../../private/initialize.php');

session_start();


if(!isset($_GET['id'])) {
    redirect_to(url_for('/admin/result_view.php'));
}
$id = $_GET['id'];


$delete_result=[];
if(is_post_request()) {
  $result = delete_result($id);
  $_SESSION['message'] = 'Result deleted.';
  redirect_to(url_for('admin/gala_result.php'));
} else {
    $delete_user = find_result_by_Id($id);
}

?>


<?php $page_title = 'Delete Result'; ?>
<?php include(SHARED_PATH . '/login_header.php'); ?>
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Delete Result</p>
                                <?php echo display_errors($errors); ?>
                                <form action="<?php echo url_for("/admin/result_delete.php?id=" .h(u($id))); ?>" method="post">

                                    <p>Are you sure you want to delete this result from Gala:</p>
                                    <p class="item"><?php echo h($_SESSION ['galaName']); ?> and event: <?php echo h($_SESSION ['eventName']); ?> </p>


                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-primary btn-lg">Delete</button>
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




