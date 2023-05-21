<?php

require_once('../../private/initialize.php');

session_start();

$id= $_GET['id'];

if(is_post_request()) {
  $result = update_register_by_id($id);
  $_SESSION['message'] = 'Gala Register Accepted and Updated.';
  redirect_to(url_for('admin/gala_register_view.php'));
}

?>


<?php $page_title = 'Delete Gala'; ?>
<?php include(SHARED_PATH . '/login_header.php'); ?>
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Accept Gala Register Request</p>
                                <?php echo display_errors($errors); ?>
                                <form action="<?php echo url_for("/admin/gala_register_accept.php?id=" .h(u($id))); ?>" method="post">

                                    <p>Are you sure , Do you want to accept this Gala request?</p>

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-primary btn-lg">Accept</button>
                                    </div>

                                </form>

                            </div>
                             <h2><a href="<?php echo url_for("/admin/gala_register_view.php")?>" >Back</a></h2>

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




