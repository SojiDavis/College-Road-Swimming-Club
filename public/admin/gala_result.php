<?php

require_once('../../private/initialize.php');
session_start();
//require_login();

$username =$_SESSION['username'];
$usertype = $_SESSION['usertype'];
$user = find_user_by_username($username);
$gala_set = find_all_galas();

if($_POST['galaname']) {
    $result_set = find_all_result($_POST['galaname']);
$gala_details = find_gala_by_name($_POST['galaname']);
        $_SESSION ['galaId'] = $gala_details['id'];
    $_SESSION ['galaName'] = $gala_details['name'];

}

$i=0;
?>
<?php $page_title = 'gala details ';
include(SHARED_PATH . '/login_header.php');
?>


<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <?php if($usertype == 'admin'){?>
                <h2><a href="<?php echo url_for("/admin/admin_dashboard.php")?>" >Back</a></h2>
            <?php } elseif ($usertype == 'coach') {?>
                <h2><a href="<?php echo url_for("/coach/coach_dashboard.php")?>" >Back</a></h2>
            <?php } elseif($usertype == ' ') {?>
                <h2><a href="<?php echo url_for("/index.php")?>" >Back</a></h2>

            <?php }else {?>
            <h2><a href="<?php echo url_for("/user/user_dashboard.php")?>" >Back</a></h2>

            <?php }?>
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                     class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-9 col-lg-6 col-xl-5">
            <div id="content">

                <div class="Gala result">

                    <h2>Gala Result</h2>

                    <form action="gala_result.php" method="post">
                        <select name="galaname">
                            <option value="">Select</option>

                            <?php while($optionData= mysqli_fetch_assoc($gala_set)) { ?>
                                <option value="<?php echo h($optionData['name']); ?>"> <?php echo h($optionData['name']); ?></option>
                            <?php } ?>
                        </select>
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <button type="submit" class="btn btn-primary btn-lg" name="submit">submit</button>
                        </div>
                    <br>
                    <?php

                    if(isset($_POST['galaname']) && isset($_POST['submit'])) { ?>
                    <div class="attributes">
                        <h4><?php echo ($_POST['galaname']);?></h4>
                        <table >
                            <tr>
                                <th><b>Swimmer</b></th>
                                <th><b>Event Name</b></th>
                                <th><b>Finished Time</b></th>
                                <th><b>Position</b></th>

                            </tr>
                            <?php while($gala_result= mysqli_fetch_assoc($result_set)) {
                                $_SESSION['eventName']= $gala_result['event'];
                                ?>
                                <tr>
                                    <td><?php echo h($gala_result['swimmer']); ?></td>
                                    <td><?php echo h($gala_result['event']); ?></td>
                                    <td><?php echo h($gala_result['finished_time']); ?></td>
                                    <td><?php echo h($gala_result['position']); ?></td>
                                    <?php if ($usertype == 'admin') { ?>
                                    <td><a class = "action" href="<?php echo url_for("/admin/result_edit.php?id=" .h(u($gala_result['id'])))?>" >Edit</td>
                                    <td><a class = "action" href="<?php echo url_for("/admin/result_delete.php?id=" .h(u($gala_result['id'])))?>">Delete</td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </table>

                    </div>
                        <div class="Gala show">
                            <?php if ($usertype == 'admin') { ?>
                                <br><br><h4><a href="<?php echo url_for("/admin/result_new.php")?>" >Add Result</a></h4>
                            <?php } ?>

                        </div>
                    </form>
                <?php }?>
                </div>


            </div>

        </div>
        </div>
    </div>
</section>
