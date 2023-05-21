<?php

require_once('../../private/initialize.php');
session_start();
//require_login();

$username =$_SESSION['username'];
$usertype = $_SESSION['usertype'];
$user = find_user_by_username($username);
$columns = array('swimmer','squad','stroke','date','time');
$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';
$performance_set = find_all_performance($column,$sort_order);
$up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order);
$asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
$add_class = ' class="highlight"';

?>
<?php $page_title = 'Performance details ';
include(SHARED_PATH . '/login_header.php');
?>


<section class="vh-100">
    <div class="container-fluid h-custom">
        <br>
        <?php if($usertype == 'admin'){?>
            <h2><a href="<?php echo url_for("/admin/admin_dashboard.php")?>" >Back</a></h2>
        <?php } elseif ($usertype == 'coach') {?>
            <h2><a href="<?php echo url_for("/coach/coach_dashboard.php")?>" >Back</a></h2>
        <?php } else {?>
            <h2><a href="<?php echo url_for("/user/user_dashboard.php")?>" >Back</a></h2>

        <?php } ?>
            <div class="col-md-9 col-lg-6 col-xl-5">
            <div id="content">

                <div class="Performance">

                    <h2>Performance</h2>

                    <form action="view_performance.php" method="post">

                        <label>Search</label>
                        <input type="text" name="search">
                        <input type="submit" name="submit">
                        <br><br>
                        <?php
                        if (isset($_POST["submit"]))  {
                        $result =  find_prformance_by_id(($_POST["search"])); ?>
                        <table >
                        <tr>
                            <th><b>Swimmer</b><</th>
                            <th><b>Squad</b></th>
                            <th><b>Stroke</b></th>
                            <th><b>Date</b></th>
                            <th><b>Time</b></th>

                        </tr>
                        <?php while($individual_result= mysqli_fetch_assoc($result)) {

                            ?>
                            <tr>

                                                                    <td><?php echo h($individual_result['swimmer']); ?></td>
                                                                    <td><?php echo h($individual_result['squad']); ?></td>
                                                                    <td><?php echo h($individual_result['stroke']); ?></td>
                                                                    <td><?php echo h($individual_result['date']); ?></td>
                                                                    <td><?php echo h($individual_result['time']); ?></td>

                            </tr>
                        <?php } }?>
                        </table>

                        <h6>All Swimmer Performance</h6>
                        <table ">
                            <tr>
                                <th><a href="view_performance.php?column=swimmer&order=<?php echo $asc_or_desc; ?>"><b>Swimmer</b><i class="fas fa-sort<?php echo $column == 'swimmer' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                                <th><a href="view_performance.php?column=squad&order=<?php echo $asc_or_desc; ?>"><b>Squad</b><i class="fas fa-sort<?php echo $column == 'squad' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                                <th><a href="view_performance.php?column=stroke&order=<?php echo $asc_or_desc; ?>"><b>Stroke</b><i class="fas fa-sort<?php echo $column == 'stroke' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                                <th><a href="view_performance.php?column=date&order=<?php echo $asc_or_desc; ?>"><b>Date</b><i class="fas fa-sort<?php echo $column == 'date' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                                <th><a href="view_performance.php?column=time&order=<?php echo $asc_or_desc; ?>"><b>Time</b><i class="fas fa-sort<?php echo $column == 'time' ? '-' . $up_or_down : ''; ?>"></i></a></th>

                            </tr>
                            <?php while($performance_result= mysqli_fetch_assoc($performance_set)) {

                                ?>
                                <tr>
                                    <td<?php echo $column == 'swimmer' ? $add_class : ''; ?>><?php echo h($performance_result['swimmer']); ?></td>
                                    <td<?php echo $column == 'squad' ? $add_class : ''; ?>><?php echo h($performance_result['squad']); ?></td>
                                    <td<?php echo $column == 'stroke' ? $add_class : ''; ?>><?php echo h($performance_result['stroke']); ?></td>
                                    <td<?php echo $column == 'date' ? $add_class : ''; ?>><?php echo h($performance_result['date']); ?></td>
                                    <td<?php echo $column == 'time' ? $add_class : ''; ?>><?php echo h($performance_result['time']); ?></td>
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
