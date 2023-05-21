<?php

require_once('../../private/initialize.php');

session_start();


$username = $_SESSION['username'];
$usertype = $_SESSION['usertype'];
$parentID= $_SESSION['admin_id'];
$gala_id= h($_SESSION ['galaId']);
$id = $_GET['id'] ;
$register_gala=[];

if(is_post_request()) {

    if ($usertype == 'adult') {
        $result = register_event($username, $gala_id, $id);
    }elseif ($usertype == 'parent'){
        $child_set = find_user_by_parentId($parentID);
        $result = register_event($child_set['username'], $gala_id, $id);
    }
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'Event Registered Successfully .';
    redirect_to(url_for('admin/gala_view.php'));
  } else {
    $errors = $result;
  }}

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

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Register Gala</p>
                                <?php echo display_errors($errors); ?>

                                <form action="<?php echo url_for("/admin/gala_register.php?id=" .h(u($id))); ?>" method="post">

                                    <p>Are you sure you want to Register in this Gala?</p>
                                    <b><h4 class="item"><?php echo h($_SESSION ['galaName']); ?></h4> </b>


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




