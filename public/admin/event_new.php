<?php

require_once('../../private/initialize.php');
session_start();
//require_login();

$username =$_SESSION['username'];

$user = find_admin_by_username($username);


if(is_post_request()) {

    $event = [];

    $event['name']          = $_POST['event_name']??'';
    $event['location']      = $_POST['event_location']??'';
    $event['time']          = $_POST['event_time']??'';
    $event['age_group']     =$_POST['event_age_group']??'';
    $event['distance']      = $_POST['event_distance']??'';
    $event['stroke']        =$_POST['event_stroke']??'';
    $selectOption             = $_POST['gender'] ?? '';
    $event['gender']        =match($selectOption){
        'male' => 'Male',
        'female' => 'Female'
    };


  $result = insert_event($event,$_SESSION ['galaId'] );
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'Gala profile created.';
    redirect_to(url_for('admin/gala_view.php'));
  } else {
    $errors = $result;
  }


} else {
  // display the blank form

    $event = [];


    $event['name']   = '';
    $event['location']   = '';
    $event['time']       = '';
    $event['age_group']  = '';
    $event['distance']   = '';
    $event['stroke']      = '';
    $event['gender']      = '';
}

?>

<?php $page_title = 'Create Event'; ?>
<?php include(SHARED_PATH . '/login_header.php'); ?>
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Create Gala</p>
                                <?php echo display_errors($errors); ?>
                                <form action="<?php echo url_for('/admin/event_new.php'); ?>" method="post">


                                    <h4>Event Details</h4>
                                    <br><br>
                                    <dl>
                                        <dt>Name</dt>
                                        <dd><input type="text" name="event_name" value="<?php echo h($event['name']); ?>" /></dd>
                                    </dl>

                                    <dl>
                                        <dt>Location</dt>
                                        <dd><input type="text" name="event_location" value="<?php echo h($event['location']); ?>" /></dd>
                                    </dl>
                                        <dl>
                                        <dt>Time </dt>
                                        <dd><input type="time" name="event_time" value="<?php echo h($event['time']); ?>" /></dd>
                                    </dl>
                                    <dl>
                                        <dt>Age Group</dt>
                                        <dd><input type="text" name="event_age_group" value="<?php echo h($event['age_group']); ?>" /></dd>
                                    </dl>
                                    <dl>
                                        <dt>Distance </dt>
                                        <dd><input type="text" name="event_distance" value="<?php echo h($event['distance']); ?>" /></dd>
                                    </dl>
                                    <dl>
                                        <dt>Stroke </dt>
                                        <dd><input type="text" name="event_stroke" value="<?php echo h($event['stroke']); ?>" /></dd>
                                    </dl>
                                    <label for="gender">Gender</label>
                                    <select id="gender" name="gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>


                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-primary btn-lg">Create</button>
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

