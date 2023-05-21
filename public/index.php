<?php require_once('../private/initialize.php'); ?>
<?php



$stage_set = find_all_stage();
$squad_set = find_all_squad();
$rank_set = find_top_3_position();

?>

<?php include(SHARED_PATH . '/public_header.php'); ?>
<!-- Masthead-->
<header class="masthead">
    <div class="container">
        <div class="masthead-subheading">College Road Swimming Club</div>
        <div class="masthead-heading text-uppercase">'Feel your way though the water. Don't fight it.'</div>
        <a class="btn btn-primary btn-xl text-uppercase" href="<?php echo url_for("/index.php#About Us")?>">Tell Me More</a>
    </div>
</header>

<?php include(SHARED_PATH . '/static_homepage.php'); ?>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
