<?php

require_once('../../private/initialize.php');
session_start();
//require_login();

$username =$_SESSION['username'];
$usertype = $_SESSION['usertype'];
$user = find_user_by_username($username);

$swimmer_set = find_all_swimmer_details();


?>
<?php $page_title = 'Performance details ';
include(SHARED_PATH . '/login_header.php');
?>


<section class="vh-100">
    <div class="container-fluid h-custom">
        <br>
        <h2><a href="<?php echo url_for("/coach/coach_dashboard.php")?>" >Back</a></h2>
        <br>
        <h2><a href="<?php echo url_for("/coach/swimmer_new.php")?>" >Add</a></h2>
        <br>
        <h2><a href="<?php echo url_for("/coach/swimmer_edit.php")?>" >Edit </a></h2>
        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

            <div class="col-md-9 col-lg-6 col-xl-5">
            <div id="content">

                <div class="Performance">

                    <h2>Performance</h2>

                    <form action="swimmer_view.php" method="post">


                        <table >
                        <tr>
                            <th><b>Swimmer</b><</th>
                            <th><b>Squad</b></th>
                            <th><b>Stroke</b></th>


                        </tr>
                        <?php while($swimmer_result= mysqli_fetch_assoc($swimmer_set)) {

                            ?>
                            <tr>

                                                                    <td><?php echo h($swimmer_result['swimmer']); ?></td>
                                                                    <td><?php echo h($swimmer_result['squad']); ?></td>
                                                                    <td><?php echo h($swimmer_result['stroke']); ?></td>


                            </tr>
                        <?php } ?>
                        </table>
                        </table>

                    </form>

                </div>


            </div>

        </div>
<!--        </div>-->
    </div>
</section>
