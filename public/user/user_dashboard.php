<?php require_once('../../private/initialize.php');
session_start();
//require_login();

$username =$_SESSION['username'];
$usertype =$_SESSION['usertype'];
$Id =$_SESSION['admin_id'];
if ($usertype == 'parent'){
    $user = find_user_by_parentId($Id);
} else {
    $user = find_user_by_username($username);
}

?>
<?php include(SHARED_PATH . '/dashboard_header.php'); ?>

        <div class="tm-right">
            <main class="tm-main">
                <div id="Profile" class="tm-page-content">
                    <!-- Profile Page -->
                    <div id="content">

                        <!--  <a class="back-link" href="--><?php //echo url_for('/index.php'); ?><!--">&laquo; Back to List</a>-->

                        <div class="user show">

                            <h1><?php echo h($user['firstname']); ?>  <?php echo h($user['lastname']); ?></h1>

                            <div class="attributes">
                                <dl>
                                    <dt>First name</dt>
                                    <dd><?php echo h($user['firstname']); ?></dd>
                                </dl>
                                <dl>
                                    <dt>Last name</dt>
                                    <dd><?php echo h($user['lastname']); ?></dd>
                                </dl>
                                <dl>
                                    <dt>Email </dt>
                                    <dd><?php echo h($user['email']); ?><br /></dd>
                                </dl>


                                <dl>
                                    <dt>Address</dt>
                                    <dd><?php echo h($user['address']); ?></dd>
                                </dl>

                                <dl>
                                    <dt>Phone Number</dt>
                                    <dd><?php echo h($user['phonenumber']);?></dd>
                                </dl>
                                <dl>
                                    <dt>Gender</dt>
                                    <dd><?php echo h($user['gender']); ?></dd>
                                </dl>

                                <dl>
                                    <dt>Date Of Birth</dt>
                                    <dd><?php echo h($user['date_of_birth']); ?></dd>
                                </dl>

                                <dl>
                                    <dt>User Name </dt>
                                    <dd><?php echo h($user['username']);?><br /></dd>
                                </dl>

                                <?php if ($_SESSION['usertype'] == 'parent'){?>
                                    <dl>
                                        <dt>Parent's User Name </dt>
                                        <dd><?php echo $username;?><br /></dd>
                                    </dl>
                                <?php }?>
                                <?php if ($_SESSION['usertype'] != 'child'){?>
                                <br> <a class = "user" href="<?php echo url_for("/user/edit.php")?>" >Edit Profile</a>


                                <?php }?>
                                <br><br>
                            </div>

                        </div>

                    </div>
                    <!-- end Drink Menu Page -->
                </div>

                <!-- About Us Page -->
                <div id="about" class="tm-page-content">
                    <div class="tm-black-bg tm-mb-20 tm-about-box-1">
                        <h2 class="tm-text-primary tm-about-header"><a href="<?php echo url_for("admin/gala_view.php")?>">Gala Details</a></h2>
                    </div>
                    <div class="tm-black-bg tm-mb-20 tm-about-box-1">
                        <h2 class="tm-text-primary tm-about-header"><a href="<?php echo url_for("admin/gala_result.php")?>">Gala Results</a></h2>
                    </div>
                </div>
                <!-- end About Us Page -->

                <!-- Special Items Page -->
                <div id="performance" class="tm-page-content">
                    <div class="tm-black-bg tm-mb-20 tm-about-box-1">
                        <h2 class="tm-text-primary tm-about-header"><a href="<?php echo url_for("user/view_performance.php")?>">Performance</a></h2>
                    </div>
                    <div class="tm-black-bg tm-mb-20 tm-about-box-1">
                        <h2 class="tm-text-primary tm-about-header"><a href="<?php echo url_for("user/user_performance.php")?>">Evaluate your performance</a></h2>
                    </div>
                </div>
                <!-- end Special Items Page -->


            </main>
        </div>
    </div>

</div>



<script src="js/jquery-3.4.1.min.js"></script>
<script>



    function initPage() {
        let pageId = location.hash;

        if(pageId) {
            highlightMenu($(`.tm-page-link[href^="${pageId}"]`));
            showPage($(pageId));
        }
        else {
            pageId = $('.tm-page-link.active').attr('href');
            showPage($(pageId));
        }
    }

    function highlightMenu(menuItem) {
        $('.tm-page-link').removeClass('active');
        menuItem.addClass('active');
    }

    function showPage(page) {
        $('.tm-page-content').hide();
        page.show();
    }

    $(document).ready(function(){

        /***************** Pages *****************/

        initPage();

        $('.tm-page-link').click(function(event) {

            if(window.innerWidth > 991) {
                event.preventDefault();
            }

            highlightMenu($(event.currentTarget));
            showPage($(event.currentTarget.hash));
        });



</script>
<script>


    const labels = <?php echo json_encode($date) ?>;
    const data = {
        labels: labels,
        datasets: [{
            label: 'My Performance',
            data: <?php echo json_encode($time) ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
    };



    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };
    var myChart = new Chart(
        document.getElementById('myChart'),
        config
    );

</script>
</body>
</html>