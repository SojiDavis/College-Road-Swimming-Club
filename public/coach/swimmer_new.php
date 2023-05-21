<?php

require_once('../../private/initialize.php');
session_start();
//require_login();

$username =$_SESSION['username'];

$user = find_admin_by_username($username);
$user_set = find_all_user();
$squad_set = find_all_squad();

if(is_post_request()) {
    $swimmer = [];


    $swimmer['name']        = $_POST['username'] ?? '';
    $swimmer['squad']        = $_POST['squad_name'] ?? '';
    $selectOption             = $_POST['stroke'] ?? '';
    $swimmer['stroke']           = match($selectOption){
        'freestyle' => 'Freestyle',
        'breaststroke' => 'Breaststroke',
        'backstroke' => 'Backstroke',
        'butterfly' => 'Butterfly'
    };

    $user_data = find_user_by_username($swimmer['name'] );
    $squad_data = find_squad_by_name($swimmer['squad'] );
  $result = insert_swimmer($swimmer,$user_data['id'],$squad_data['Id']);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'swimmer profile created.';
    redirect_to(url_for('coach/swimmer_view.php'));
  } else {
    $errors = $result;
  }


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

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Add Swimmer Details</p>
                                <?php echo display_errors($errors); ?>
                                <form action="<?php echo url_for('/coach/swimmer_new.php'); ?>" method="post">


<!--                                    <h4>Swimmer Details</h4>-->
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
                                <div>
                                    <select name="squad_name">
                                        <option value="">Select</option>

                                        <?php while($optionData= mysqli_fetch_assoc($squad_set)) { ?>
                                            <option value="<?php echo h($optionData['squad_name']); ?>"> <?php echo h($optionData['squad_name']); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                    <br>
                                    <br>
                                <div>
                                    <label for="stroke">Stroke</label>
                                    <select id="stroke" name="stroke">
                                        <option value="freestyle">Freestyle</option>
                                        <option value="breaststroke">Breaststroke</option>
                                        <option value="backstroke">Backstroke</option>
                                        <option value="butterfly">Butterfly</option>
                                    </select>
                                </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg">Create</button>
                                        </div>


                                </form>

                            </div>
                            <h2><a href="<?php echo url_for("/coach/swimmer_view.php")?>" >Back</a></h2>


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

