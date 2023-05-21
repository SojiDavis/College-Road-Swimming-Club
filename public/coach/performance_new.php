<?php

require_once('../../private/initialize.php');
session_start();
//require_login();

$username =$_SESSION['username'];

$user = find_admin_by_username($username);
$user_set = find_all_user();
$seconds = 0;

if(is_post_request()) {
    $performance = [];


    $performance['name']        = $_POST['username'] ?? '';
    $performance['date']        = $_POST['date'] ?? '';
    $performance['minute']      = $_POST['minute'] ?? '';
    $performance['second']      = $_POST['second'] ?? '';

    $seconds = ($performance['minute'] * 60) + $performance['second'] ;

    $swimmer_data = find_swimmer_by_username($performance['name'] );

  $result = insert_performance($performance,$swimmer_data['id'],$seconds);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'swimmer performance Added.';
    redirect_to(url_for('coach/coach_dashboard.php'));
  } else {
    $errors = $result;
  }
}
else{
    $performance = [];

    $performance['name']        = '';
    $performance['date']        = '';
    $performance['minute']   = '';
    $performance['second']   = '';

}
?>

<?php $page_title = 'Create Swimmer'; ?>
<?php include(SHARED_PATH . '/login_header.php'); ?>
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Add Performance Details</p>
                                <?php echo display_errors($errors); ?>
                                <form action="<?php echo url_for('/coach/performance_new.php'); ?>" method="post">


                                    <h4>Performance Details</h4>
                                <div>
                                    <select name="username">
                                        <option value="">Select</option>

                                        <?php while($optionData= mysqli_fetch_assoc($user_set)) { ?>
                                            <option value="<?php echo h($optionData['username']); ?>"> <?php echo h($optionData['username']); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                    <br>
                                    <br>
                                    <dl>
                                        <dt>Date</dt>
                                        <dd><input type="date" name="date" value="<?php echo h($performance['date']); ?>" /> </dd>
                                    </dl>

                                    <dl>
                                        <dt>Best Time </dt>
                                        <span>Minute in mm format</span>
                                        <dd><input type="int" name="minute" value="<?php echo h($performance['minute']); ?>" /></dd>
                                        <span>Seconds in ss format</span>
                                        <dd><input type="int" name="second" value="<?php echo h($performance['second']); ?>" /></dd>
                                    </dl>
                                    <br>
                                    <br>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg">Create</button>
                                        </div>


                                </form>

                            </div>
                            <h2><a href="<?php echo url_for("/coach/coach_dashboard.php")?>" >Back</a></h2>
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

