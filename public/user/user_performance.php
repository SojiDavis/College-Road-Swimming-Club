<?php

require_once('../../private/initialize.php');
session_start();
//require_login();

$username =$_SESSION['username'];
$usertype = $_SESSION['usertype'];

$user = find_user_by_username($username);
if ($usertype == 'adult' || $usertype== 'child'){
    $userId = $_SESSION['admin_id'];
}elseif ($usertype == 'parent'){
    $user_set = find_parent_by_username($username);
    $userId = $user_set['parent_id'];
}
$performance_set = find_performance_by_user_id($userId);


?>
<?php $page_title = 'Performance details ';
include(SHARED_PATH . '/login_header.php');
?>


<section class="vh-100">
    <div class="container-fluid h-custom">
        <h2><a href="<?php echo url_for("/user/user_dashboard.php")?>" >Back</a></h2>
            <div class="col-md-9 col-lg-6 col-xl-5">
            <div id="content">

                <div class="Performance">

                    <h2>Performance of <?php echo $username ?></h2>
                    <br>

                    <form action="view_performance.php" method="post">

                        <table ">
                            <tr>
                                <th><b>Swimmer</b></th>
                                <th><b>Squad</b></th>
                                <th><b>Stroke</b></th>
                                <th><b>Date</b></th>
                                <th><b>Time</b></th>

                            </tr>
                            <?php while($performance_result= mysqli_fetch_assoc($performance_set)) {

                                ?>
                                <tr>
                                    <td><?php echo h($performance_result['swimmer']); ?></td>
                                    <td><?php echo h($performance_result['squad']); ?></td>
                                    <td><?php echo h($performance_result['stroke']); ?></td>
                                    <td><?php echo h($performance_result['date']); ?></td>
                                    <td><?php echo h($performance_result['time']); ?></td>

                                </tr>
                            <?php } ?>
                        </table>

                    </form>

                </div>


            </div>

        </div>
<!--        </div>-->
    </div>
</section>


