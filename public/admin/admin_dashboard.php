<?php require_once('../../private/initialize.php');
session_start();
//require_login();

$username =$_SESSION['username'];

$user = find_admin_by_username($username);


?>
<?php include(SHARED_PATH . '/dashboard_header.php'); ?>

        <div class="tm-right">
            <main class="tm-main" >
                <div id="Profile" class="tm-page-content">
                    <!-- Profile Page -->
                    <div id="content">

                        <!--  <a class="back-link" href="--><?php //echo url_for('/index.php'); ?><!--">&laquo; Back to List</a>-->

                        <div class="show">

                            <h1><?php echo h($user['username']); ?></h1>

                            <div class="tm-black-bg tm-mb-20 tm-profile-box-1">
                                <h2 class="tm-text-primary tm-profile-header" ><a href="<?php echo url_for("admin/admin_new.php")?>">Create Admin</a></h2>
                            </div>
                            <div class="tm-black-bg tm-mb-20 tm-profile-box-1">
                                <h2 class="tm-text-primary tm-profile-header"><a href="<?php echo url_for("coach/coach_new.php")?>">Create Coach</a></h2>
                            </div>
                            <div class="tm-black-bg tm-mb-20 tm-profile-box-1">
                                <h2 class="tm-text-primary tm-profile-header" ><a href="<?php echo url_for("admin/profile_show.php")?>">View profiles</a></h2>
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
</body>
</html>