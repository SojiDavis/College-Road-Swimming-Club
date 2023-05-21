<!-- Team-->
<section class="page-section bg-light" id="team">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Our Amazing Swimmers</h2><br><br>
            <!--            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>-->
        </div>
        <div class="row">
            <?php $i=0; while ($rank= mysqli_fetch_assoc($rank_set)){ $i=$i+1; ?>

                <div class="col-lg-4">
                    <div class="team-member">

                        <img class="mx-auto rounded-circle" src="<?php echo url_for("/assets/img/team/$i.jpg")?>" alt="..."/>
                        <h4><?php echo $rank['name']?></h4>

                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="<>"><i
                                    class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label=""><i
                                    class="fab fa-facebook-f"></i></a>

                    </div>
                </div>

            <?php }?>
        </div>

    </div>
</section>

<!-- About Us-->
<section class="page-section" id="About Us">
    <div class="container">

        <div class="text-center">
            <h2 class="section-heading text-uppercase">About Us</h2>
            <!--                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>-->
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-history fa-stack-1x fa-inverse"></i>
                        </span>
                <h4 class="my-3">Staring Point</h4>
                <p class="text-muted">College Road Swimming Club is a registered Charity (Charity No. 3486129) which
                    exists to create opportunities through swimming. We have been teaching to swim since 1979 and have
                    been at the heart of creating swimming opportunities ever since.</p>
            </div>
            <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-chalkboard-teacher fa-stack-1x fa-inverse"></i>
                        </span>
                <h4 class="my-3">Lessons Programme</h4>
                <p class="text-muted">We run a thriving Learn to Swim Programme focused on providing the highest quality
                    swimming lessons possible to ensure that young people develop water confidence, as well as excellent
                    stroke technique.</p>
            </div>
            <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-swimmer fa-stack-1x fa-inverse"></i>
                        </span>
                <h4 class="my-3">Swimming Programme</h4>
                <p class="text-muted">We compete in a range of local and regional competitions including the Premier
                    Division of the National Arena League – the highest tier of competition in the UK. We offer squad
                    swimming for junior swimmers, right through to Masters.</p>
            </div>
        </div>
    </div>
</section>
<!-- activities Grid-->
<section class="page-section bg-light" id="activities">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">activities</h2>
            <!--            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>-->
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-6 mb-4">
                <!-- activities item 1-->
                <div class="activities-item">
                    <a class="activities-link" data-bs-toggle="modal" href="#activitiesModal1">
                        <div class="activities-hover">
                            <div class="activities-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="<?php echo url_for("/assets/img/activities/1.jpg")?>" alt="..."/>
                    </a>
                    <div class="activities-caption">
                        <div class="activities-caption-heading">We Offers..</div>
                        <div class="activities-caption-subheading text-muted">What made us unique</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <!-- activities item 2-->
                <div class="activities-item">
                    <a class="activities-link" data-bs-toggle="modal" href="#activitiesModal2">
                        <div class="activities-hover">
                            <div class="activities-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="<?php echo url_for("/assets/img/activities/2.jpg")?>" alt="..."/>
                    </a>
                    <div class="activities-caption">
                        <div class="activities-caption-heading">Learning Structure</div>
                        <div class="activities-caption-subheading text-muted">Know your current status</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <!-- activities item 3-->
                <div class="activities-item">
                    <a class="activities-link" data-bs-toggle="modal" href="#activitiesModal3">
                        <div class="activities-hover">
                            <div class="activities-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="<?php echo url_for("/assets/img/activities/3.jpg")?>" alt="..."/>
                    </a>
                    <div class="activities-caption">
                        <div class="activities-caption-heading">Term Dates & Fees</div>
                        <div class="activities-caption-subheading text-muted">Affordable to everyone</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                <!-- activities item 4-->
                <div class="activities-item">
                    <a class="activities-link" data-bs-toggle="modal" href="#activitiesModal4">
                        <div class="activities-hover">
                            <div class="activities-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="<?php echo url_for("/assets/img/activities/4.jpg")?>" alt="..."/>
                    </a>
                    <div class="activities-caption">
                        <div class="activities-caption-heading">Timetables</div>
                        <div class="activities-caption-subheading text-muted">Know your timeslots prior</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                <!-- activities item 5-->
                <div class="activities-item">
                    <a class="activities-link" data-bs-toggle="modal" href="#activitiesModal5">
                        <div class="activities-hover">
                            <div class="activities-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="<?php echo url_for("/assets/img/activities/5.jpg")?>" alt="..."/>
                    </a>
                    <div class="activities-caption">
                        <div class="activities-caption-heading">Swimming Competitions</div>
                        <div class="activities-caption-subheading text-muted">Show Up Your Swimming Skills</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <!-- activities item 6-->
                <div class="activities-item">
                    <a class="activities-link" data-bs-toggle="modal" href="#activitiesModal6">
                        <div class="activities-hover">
                            <div class="activities-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="<?php echo url_for("/assets/img/activities/6.jpg")?>" alt="..."/>
                    </a>
                    <div class="activities-caption">
                        <div class="activities-caption-heading">Terms & Conditions</div>
                        <div class="activities-caption-subheading text-muted">Follow the Rules</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--<-->


<!-- LogIn-->
<!--<section class="page-section" id="LogIn">-->
<!--    --><?php
//    include(PUBLIC_PATH . '/admin/new.php'); ?>
<!--</section>-->

<!-- activities Modals-->
<!-- activities item 1 modal popup-->
<div class="activities-modal modal fade" id="activitiesModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal"/>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project details-->
                            <h2 class="text-uppercase">We Offers..</h2>
                            <p class="item-intro text-muted">What Made Us Unique</p>
                            <img class="img-fluid d-block mx-auto" src="assets/img/activities/1.jpg" alt="..."/>
                            <div class="row" style="">
                                <div class="col-md-12 center">
                                    <div class="spacer height-40 "></div>
                                </div>
                            </div>
                            <div class="row" style="">
                                <div class="col-md-6" style="padding-right: 1em;">
                                    <div class="row ">
                                        <div class="col-md-3 center " style="margin-right: -2em;">
                                            <p style="line-height: 1; margin-top: 0;text-align: justify;" class=""><i
                                                    class="icon ion-android-checkmark-circle size-64 "></i></p>
                                        </div>
                                        <div class="col-md-9 ">
                                            <h3 class="">We provide lessons to swimmers from as young as 1½ years of
                                                age, up to adults</h3>
                                            <p style="line-height: 1.4;text-align: justify;" class="">We cater for all
                                                ages and abilities. Our programme is broken down into 9 different stages
                                                and provides a pathway which enables the non swimmer to start with us
                                                and progress up to eventually joining either a competitive squad or
                                                social swim programme if they choose to.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" style="padding-left: 1em;">
                                    <div class="row ">
                                        <div class="col-md-3 center " style="margin-right: -2em;">
                                            <p style="line-height: 1; margin-top: 0;text-align: justify;" class=""><i
                                                    class="icon ion-android-checkmark-circle size-64 "></i></p>
                                        </div>
                                        <div class="col-md-9">
                                            <h3 class="">We have low teacher to student ratios</h3>
                                            <p class="" style="line-height: 1.4;text-align: justify;">With a maximum of
                                                5 to a class for our Learn To Swim, the highest ratio we provide is 1:5.
                                                In our Stage 1 and 2 lessons, we also deploy our Aquatic Assistants
                                                under the direction of the class teacher, making the ratio 1:2.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="">
                                <div class="col-md-6">
                                    <div class="row ">
                                        <div class="col-md-3 center " style="margin-right: -2em;">
                                            <p style="line-height: 1; margin-top: 0;text-align: justify;" class=""><i
                                                    class="icon ion-android-checkmark-circle size-64 "></i></p>
                                        </div>
                                        <div class="col-md-9">
                                            <h3 class="">We offer small class sizes</h3>
                                            <p style="line-height: 1.4;text-align: justify;" class="">Our lessons will
                                                be limited to a maximum of five swimmers per class for our Learn To Swim
                                                (Stage 1 to 5), with numbers increasing to a maximum of just six for our
                                                advanced lessons at Stage 6 and above.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-3 center " style="margin-right: -2em;">
                                            <p style="line-height: 1; margin-top: 0;text-align: justify;" class=""><i
                                                    class="icon ion-android-checkmark-circle size-64 "></i></p>
                                        </div>
                                        <div class="col-md-9">
                                            <h3 class="">Our lessons are affordable</h3>
                                            <p class="" style="line-height: 1.4;text-align: justify;">Our 30-minute
                                                lessons are ONLY £12.50 each!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="">
                                <div class="col-md-6">
                                    <div class="row ">
                                        <div class="col-md-3 center " style="margin-right: -2em;">
                                            <p style="line-height: 1; margin-top: 0;text-align: justify;" class=""><i
                                                    class="icon ion-android-checkmark-circle size-64 "></i></p>
                                        </div>
                                        <div class="col-md-9">
                                            <h3 class="">No rolling contract</h3>
                                            <p style="line-height: 1.4;text-align: justify;" class="">You only need to
                                                sign up for one term at a time. We do not run our termly lessons over
                                                the Easter, Summer and Christmas break – so you aren`t tied in to paying
                                                for lesson over the holiday period which you may not be able to attend!
                                                However you are still welcome to sign up to our holiday courses if you
                                                would like to continue to swim.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row ">
                                        <div class="col-md-3 center " style="margin-right: -2em;">
                                            <p style="line-height: 1; margin-top: 0;text-align: justify;" class=""><i
                                                    class="icon ion-android-checkmark-circle size-64 "></i></p>
                                        </div>
                                        <div class="col-md-9">
                                            <h3 class="">We are accredited</h3>
                                            <p class="" style="line-height: 1.4;text-align: justify;">We are the only
                                                swim school in Winchester awarded with Swim England Swim Mark
                                                Accreditation – which recognises excellence in governance,
                                                sustainability and effectiveness. Swim England describes our lessons
                                                programme as delivering the best possible Learn to Swim experience for
                                                all!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="">
                                <div class="col-md-6">
                                    <div class="row ">
                                        <div class="col-md-3 center " style="margin-right: -2em;">
                                            <p style="line-height: 1; margin-top: 0;text-align: justify;" class=""><i
                                                    class="icon ion-android-checkmark-circle size-64 "></i></p>
                                        </div>
                                        <div class="col-md-9">
                                            <h3 class="">Our programme is inclusive</h3>
                                            <p style="line-height: 1.4;text-align: justify;" class="">By employing a
                                                number of teaching assistants to work alongside our lead teachers in the
                                                water, we are able to adapt sessions around the needs of individual
                                                swimmers.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row ">
                                        <div class="col-md-3 center " style="margin-right: -2em;">
                                            <p style="line-height: 1; margin-top: 0;text-align: justify;" class=""><i
                                                    class="icon ion-android-checkmark-circle size-64 "></i></p>
                                        </div>
                                        <div class="col-md-9">
                                            <h3 class="">We have qualified instructors</h3>
                                            <p class="" style="line-height: 1.4;text-align: justify;">Our Lead
                                                Instructors are fully qualified instructors. Lead teachers are often
                                                assisted by trainee teachers. Many of our lessons swimmers progress
                                                through our lessons programme to become swim teachers themselves.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row ">
                                        <div class="col-md-3 center " style="margin-right: -2em;">
                                            <p style="line-height: 1; margin-top: 0;text-align: justify;" class=""><i
                                                    class="icon ion-android-checkmark-circle size-64 "></i></p>
                                        </div>
                                        <div class="col-md-9">
                                            <h3 class="">We offer a personal service</h3>
                                            <p style="line-height: 1.4;text-align: justify;" class="">We have a
                                                supervisor present at every session to assist with any queries you may
                                                have. They oversee each session and ensure swimmers are in the correct
                                                classes for their ability.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row ">
                                        <div class="col-md-3 center " style="margin-right: -2em;">
                                            <p style="line-height: 1; margin-top: 0;text-align: justify;" class=""><i
                                                    class="icon ion-android-checkmark-circle size-64 "></i></p>
                                        </div>
                                        <div class="col-md-9">
                                            <h3 class="">We are a charity</h3>
                                            <p class="" style="line-height: 1.4;text-align: justify;">We are a
                                                registered charity, committed to leading the way in offering accessible
                                                swimming lessons to the members of our local community.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-xl text-uppercase" type="button">
                                <!--                                        <i class="fas fa-xmark me-1"></i>-->
                                Join With Us
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- activities item 2 modal popup-->
<div class="activities-modal modal fade" id="activitiesModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal"/>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project details-->
                            <h2 class="text-uppercase">Learning Structure</h2>
                            <p class="item-intro text-muted">Know your current status</p>
                            <img class="img-fluid d-block mx-auto" src="assets/img/activities/2.jpg" alt="..."/>
                            <p class="" style="line-height: 1.4;text-align: justify;"">Under the guidance of the Coaches
                            we provide a range of pathways for development and performance swimmer. The squad structure
                            has been designed so that we can meet the needs of every member to maximise their potential
                            in the short, medium and long term for swimmers, in a fun, friendly and challenging
                            environment.

                            <br><br>The club are proud to have swimmers competing at County, Regional and National
                            competitions, and offers a range of opportunities for all levels of swimmer to compete. The
                            club also has a large Masters squad and disability provision within the programme.

                            <br><br>Our squad structure can be seen below:</p>
                            <img class="img-fluid d-block mx-auto" src="assets/img/activities/2_1.jpg" alt="structure"/>

                                <?php while($squad= mysqli_fetch_assoc($squad_set)) { ?>
                                    <h1><?php echo h($squad['squad_name']); ?></h1>
                                        <br>
                                    <p>Age Limit: <?php echo h($squad['age_limit']); ?>
                                    <br>Description<br><?php echo h($squad['description']); ?></p>
                                <?php } ?>
                            <button class="btn btn-primary btn-xl text-uppercase" type="button">
                                Join With Us
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- activities item 3 modal popup-->
<div class="activities-modal modal fade" id="activitiesModal3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal"/>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project details-->
                            <h2 class="text-uppercase">Term Dates & Fees</h2>
                            <p class="item-intro text-muted">Affordable to everyone</p>
                            <img class="img-fluid d-block mx-auto" src="assets/img/activities/3.jpg" alt="..."/>
                            <div class="row">

                                <div id="main_content" class="col-sm-12">
                                    <div class="row" style="padding-bottom: 2em;" draggable="false">
                                        <div class="col-md-12">
                                            <div class="display "
                                                 style="line-height: 1.6; border-bottom-style: solid; border-bottom-color: rgba(247, 247, 247, 0.5);">
                                                <p class=""><span
                                                        style="font-size: 21px; font-style: normal;color: #0a98b4;">Spring 2023</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" draggable="false">
                                        <div class="col-md-12" data-noedit="">
                                            <div class="spacer height-20"></div>
                                        </div>
                                    </div>
                                    <div class="row"
                                         style="border-top-style: dotted; border-top-color: rgba(247, 247, 247, 0.5); padding-bottom: 1em; padding-top: 1em;">
                                        <div class="col-md-3"><p style="letter-spacing: 2px;" class=""></p>
                                            <p class=""
                                               style="font-size: 1.07rem; line-height: 1; font-family: &quot;Open Sans&quot;, sans-serif; letter-spacing: 2px;color: #0a98b4;">
                                                CRSC</p>
                                            <h1 class="size-38"
                                                style="font-family: &quot;Open Sans&quot;, sans-serif; font-weight: bold; line-height: 1.4; letter-spacing: normal;color: #0a98b4;">
                                                Term dates</h1>
                                            <h1 class="size-42 " style="font-weight: bold;"></h1></div>
                                        <div class="col-md-9" style="line-height: 1.4;text-align: justify"><p class="">
                                                Spring Term 2023 lessons will run from Wednesday 4th January to Sunday
                                                2nd April.</p>
                                            <p class="">There will be no lessons running on the following dates:<br></p>
                                            <p class=""></p>
                                            <ul class="">
                                                <li class="">Monday 13th - Sunday 19th February (half term)</li>
                                            </ul>
                                            <p></p></div>
                                    </div>
                                    <div class="row"
                                         style="border-top-style: dotted; border-top-color: rgba(247, 247, 247, 0.5); padding-bottom: 1em; padding-top: 1em;">
                                        <div class="col-md-3"><p style="letter-spacing: 2px;" class=""></p>
                                            <p class=""
                                               style="font-size: 1.07rem; line-height: 1; font-family: &quot;Open Sans&quot;, sans-serif; letter-spacing: 2px;color: #0a98b4;">
                                                CRSC</p>
                                            <h1 class="size-38"
                                                style="font-family: &quot;Open Sans&quot;, sans-serif; font-weight: bold; line-height: 1.4; letter-spacing: normal;color: #0a98b4;">
                                                Term fees</h1>
                                            <h1 class="size-42 " style="font-weight: bold;"></h1></div>
                                        <div class="col-md-9" style="line-height: 1.4;text-align: justify"><p class="">
                                                Lessons run at Club pool, seven evenings per week (Monday to
                                                Sunday).<br></p>
                                            <p class=""></p>
                                            <ul>
                                                <li class="">Half-hour group lessons : £125.00 (10 week term)</li>
                                                <li class="">One-hour group lessons : £185.00 (10 week term)</li>
                                            </ul>
                                            <p></p>
                                            <p class="">New swimmers will be charged an additional £20.50 on their
                                                invoice to cover Annual Swim England Membership and admin fees.<br></p>
                                            <p class="">New members who join mid-term will be invoiced for the number of
                                                lessons remaining in term upon their enrolment. A discount on lessons
                                                fees is offered to the third and subsequent children from the same
                                                family. For example, the third family swimming member receives a 34%
                                                discount and 4th family swimming member pays 66% discount. (Discounts
                                                apply to the lowest fee).</p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12" data-noedit="">
                                            <div class="spacer height-40"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div id="main_content" class="col-sm-12">
                                    <div class="row" style="padding-bottom: 2em;" draggable="false">
                                        <div class="col-md-12">
                                            <div class="display "
                                                 style="line-height: 1.6; border-bottom-style: solid; border-bottom-color: rgba(247, 247, 247, 0.5);">
                                                <p class=""><span
                                                        style="font-size: 21px; font-style: normal;color: #0a98b4;">ANNUAL MEMBERSHIP AND SQUAD FEES</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" draggable="false">
                                        <div class="col-md-12" data-noedit="">
                                            <div class="spacer height-20"></div>
                                        </div>
                                    </div>
                                    <div class="row"
                                         style="border-top-style: dotted; border-top-color: rgba(247, 247, 247, 0.5); padding-bottom: 1em; padding-top: 1em;">
                                        <div class="col-md-3"><p style="letter-spacing: 2px;" class=""></p>
                                            <p class=""
                                               style="font-size: 1.07rem; line-height: 1; font-family: &quot;Open Sans&quot;, sans-serif; letter-spacing: 2px;color: #0a98b4;">
                                                CRSC</p>
                                            <h1 class="size-38"
                                                style="font-family: &quot;Open Sans&quot;, sans-serif; font-weight: bold; line-height: 1.4; letter-spacing: normal;color: #0a98b4;">
                                                Annual club membership charges</h1>
                                            <h1 class="size-42 " style="font-weight: bold;"></h1></div>
                                        <div class="col-md-9" style="line-height: 1.4;text-align: justify"><p class="">
                                                The 2023 annual club membership fees are as follows:</p>
                                            <p class=""></p>
                                            <ul class="">
                                                <li class="">1 swimming family member — £58</li>
                                                <li class="">2 swimming family members — £92.80</li>
                                                <li class="">3 swimming family members — £121.80</li>
                                                <li class="">4 swimming family members — £139.20</li>
                                                <li class="">Student member (university/boarding school)* — £20</li>
                                                <li class=""> Non-swimming membership (including Club Support
                                                    registration) — £7.50
                                                </li>
                                            </ul>
                                            <p><br>*Holiday swimming only, where space permits</p></div>
                                    </div>
                                    <div class="row"
                                         style="border-top-style: dotted; border-top-color: rgba(247, 247, 247, 0.5); padding-bottom: 1em; padding-top: 1em;">
                                        <div class="col-md-3"><p style="letter-spacing: 2px;" class=""></p>
                                            <p class=""
                                               style="font-size: 1.07rem; line-height: 1; font-family: &quot;Open Sans&quot;, sans-serif; letter-spacing: 2px;color: #0a98b4;">
                                                CRSC</p>
                                            <h1 class="size-38"
                                                style="font-family: &quot;Open Sans&quot;, sans-serif; font-weight: bold; line-height: 1.4; letter-spacing: normal;color: #0a98b4;">
                                                Monthly training fees</h1>
                                            <h1 class="size-42 " style="font-weight: bold;"></h1></div>
                                        <div class="col-md-9" style="line-height: 1.4;text-align: justify"><p
                                                class=""></p>
                                            <ul>
                                                <li class="">National Squad — £175</li>
                                                <li class="">Youth Squad — £150</li>
                                                <li class="">Age Group — £125</li>
                                                <li class="">Junior Squad — £90</li>
                                                <li class="">Gold Penguins — £80</li>
                                                <li class="">Silver Penguins — £70</li>
                                                <li class="">Bronze Penguins — £65</li>
                                                <li class="">Youth Squad — £150</li>
                                                <li class="">Youth Squad — £150</li>
                                                <li class="">Junior Development — £55</li>
                                                <li class="">Intermediate Development — £55</li>
                                                <li class="">Advanced Development — £65</li>
                                                <li class="">Advanced Development (plus invitational sessions) — £95
                                                </li>
                                                <li class="">Masters - up to 2 sessions per week — £55</li>
                                                <li class="">Masters - up to 3 sessions per week — £70</li>
                                                <li class="">Masters - up to 4 sessions and over per week — £85</li>
                                                <li class="">Students (holidays only) — £10 per session up to the max of
                                                    the relevant monthly squad fee
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12" data-noedit="">
                                            <div class="spacer height-40"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-xl text-uppercase" type="button">
                                <!--                                        <i class="fas fa-xmark me-1"></i>-->
                                Book Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- activities item 4 modal popup-->
<div class="activities-modal modal fade" id="activitiesModal4" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal"/>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project details-->
                            <h2 class="text-uppercase">Timetables</h2>
                            <p class="item-intro text-muted">Know your timeslots prior</p>
                            <img class="img-fluid d-block mx-auto" src="assets/img/activities/4.jpg" alt="..."/>
                            <div class="row">

                                <div id="main_content" class="col-sm-12">
                                    <div class="row" style="padding-bottom: 2em;" draggable="false">
                                        <div class="col-md-12">
                                            <div class="display "
                                                 style="line-height: 1.6; border-bottom-style: solid; border-bottom-color: rgba(247, 247, 247, 0.5);">
                                                <p class=""><span
                                                        style="font-size: 21px; font-style: normal;color: #0a98b4;">LESSONS TIMETABLE</span>
                                                </p>
                                                <p class="" style="text-align: justify">Our Lessons Programme follows
                                                    the Swim England Teaching Programme and award Swim England badges
                                                    and certificates. Testing is carried out for all students towards
                                                    the end of each term. However, students don’t have to wait until the
                                                    end of term to move up.Instructors will recommend to the lesson’s
                                                    supervisor if at any point they feel a student is ready to progress
                                                    to the next level.

                                                    <br><br>A child entering the programme in Stage 1 at 3 years of age
                                                    can be expected to progress between stages on average once every 2-3
                                                    terms.Children that have swim continuously throughout the year will
                                                    generally complete Stage 7 by about age 9.

                                                    <br><br>Once swimmers have completed Stage 7, they have the
                                                    opportunity to enrol in our Swimming Academy (Discovery, Primary and
                                                    Junior Challenge Squads). Those displaying the potential and
                                                    enthusiasm are encourages to consider entering one of our
                                                    competitive squads which involves training several times a week and
                                                    taking part in galas.More detailed information on the testing
                                                    criteria for any of the stages is available on request from
                                                    lessonsadmin@crsc.org.uk
                                                </p>
                                                <table >
                                                    <tr>
                                                        <th><b>Stages</b></th>
                                                        <th><b>stage_1</b></th>
                                                        <th><b>stage_2</b></th>
                                                        <th><b>stage_3</b></th>
                                                        <th><b>stage_4</b></th>
                                                        <th><b>stage_5</b></th>
                                                        <th><b>stage_6</b></th>
                                                        <th><b>stage_7</b></th>
                                                        <th><b>stage_8</b></th>
                                                        <th><b>stage_9</b></th>
                                                    </tr>
                                                    <?php while($stage= mysqli_fetch_assoc($stage_set)) { ?>
                                                        <tr>
                                                            <td><?php echo h($stage['stages']); ?></td>
                                                            <td><?php echo h($stage['stage_1']); ?></td>
                                                            <td><?php echo h($stage['stage_2']); ?></td>
                                                            <td><?php echo h($stage['stage_3']); ?></td>
                                                            <td><?php echo h($stage['stage_4']); ?></td>
                                                            <td><?php echo h($stage['stage_5']); ?></td>
                                                            <td><?php echo h($stage['stage_6']); ?></td>
                                                            <td><?php echo h($stage['stage_7']); ?></td>
                                                            <td><?php echo h($stage['stage_8']); ?></td>
                                                            <td><?php echo h($stage['stage_9']); ?></td>

                                                        </tr>
                                                    <?php } ?>
                                                </table>
                                                <p class=""><span
                                                        style="font-size: 21px; font-style: normal;color: #0a98b4;"><br><br>SQUAD TIMETABLE</span>
                                                </p>
                                                <p class="" style="text-align: justify">Squad selections/movements are based on coaches discretion. The coaching team will consider attendance, work ethic, technical skill level, competition performances and future potential against the squad criteria’s when deciding squad moves.

                                                    <br><br>To find out how your child is getting on, please contact your lead squad coach and arrange a convenient time to discuss their progressions with them.

                                                </p>
                                                <table >
                                                    <!--<caption>Timetable</caption>-->
                                                    <tr>
                                                        <th><b>Stages</b></th>
                                                        <th><b>National Squad</b></th>
                                                        <th><b>Youth Squad</b></th>
                                                        <th><b>Age Group Squad</b></th>
                                                        <th><b>Junior Squad</b></th>
                                                        <th><b>Gold Squad</b></th>
                                                        <th><b>Silver Squad</b></th>
                                                        <th><b>Bronze Squad</b></th>
                                                        <th><b>Advanced Development</b></th>
                                                        <th><b>Intermediate Development</b></th>
                                                        <th><b>Junior Development</b></th>
                                                        <th><b>Young Advanced</b></th>
                                                        <th><b>Disability Squad</b></th>
                                                        <th><b>Masters</b></th>
                                                    </tr>
                                                    <tr><td ><b>Monday</b></td>
                                                        <td >16:30 - 18:30</td>
                                                        <td >17:30 - 19:30</td>
                                                        <td  >17:30 - 19:30</td>
                                                        <td  >19:00 - 21:00</td>
                                                        <td  >18:30 - 20:00</td>
                                                        <td  ></td>
                                                        <td  ></td>
                                                        <td  >19:30 - 20:30</td>
                                                        <td  >19:30 - 20:30</td>
                                                        <td  >20:00 - 21:00</td>
                                                        <td  ></td>
                                                        <td  ></td>
                                                        <td  >20:00 - 21:00</td>
                                                    </tr>
                                                    <tr>
                                                        <td  ><b>Tuesday</b></td>
                                                        <td  >16:30 - 18:30</td>
                                                        <td  >17:30 - 19:30</td>
                                                        <td  >17:30 - 19:30</td>
                                                        <td  >20:00 - 21:00</td>
                                                        <td  ></td>
                                                        <td  ></td>
                                                        <td  ></td>
                                                        <td  >17:30 - 19:30</td>
                                                        <td  >19:30 - 20:30</td>
                                                        <td  ></td>
                                                        <td  ></td>
                                                        <td  ></td>
                                                        <td  >20:00 - 21:00</td>
                                                    </tr>
                                                    <tr>
                                                        <td  ><b>Wednesday</b></td>
                                                        <td  >06:00 - 08:00</td>
                                                        <td  >19:00 - 21:00</td>
                                                        <td  >17:30 - 19:30</td>
                                                        <td  ></td>
                                                        <td  >19:00 - 20:00</td>
                                                        <td  >19:00 - 20:30</td>
                                                        <td  >19:00 - 20:00</td>
                                                        <td  >19:00 - 21:00</td>
                                                        <td  >20:00 - 21:00</td>
                                                        <td  >19:00 - 20:00</td>
                                                        <td  ></td>
                                                        <td  >19:00 - 20:00</td>
                                                        <td  >06:00 - 07:30</td>
                                                    </tr>
                                                    <tr>
                                                        <td  ><b>Thursday</b></td>
                                                        <td  >16:30 -18:30</td>
                                                        <td  >06:00 - 07:30</td>
                                                        <td  >06:00 - 07:30</td>
                                                        <td  >06:00 - 07:30</td>
                                                        <td  >18:30 - 19:30</td>
                                                        <td  ></td>
                                                        <td  ></td>
                                                        <td  ></td>
                                                        <td  ></td>
                                                        <td  ></td>
                                                        <td  ></td>
                                                        <td  ></td>
                                                        <td  >06:00 - 08:00</td>
                                                    </tr>
                                                    <tr>
                                                        <td  ><b>Friday</b></td>
                                                        <td  >17:30 - 19:30</td>
                                                        <td  >19:30 - 21:00</td>
                                                        <td  >19:30 - 21:00</td>
                                                        <td  ></td>
                                                        <td  >18:30 - 19:30</td>
                                                        <td  >18:30 - 19:30</td>
                                                        <td  ></td>
                                                        <td  >06:00 - 07:30</td>
                                                        <td  ></td>
                                                        <td  ></td>
                                                        <td  ></td>
                                                        <td  ></td>
                                                        <td  ></td>
                                                    </tr>
                                                    <tr>
                                                        <td  ><b>Saturday</b></td>
                                                        <td  >07:00 - 08:30</td>
                                                        <td  ></td>
                                                        <td  ></td>
                                                        <td  >07:30 - 09:00</td>
                                                        <td  >07:30 - 09:00</td>
                                                        <td  ></td>
                                                        <td  ></td>
                                                        <td  ></td>
                                                        <td  >17:30 - 18:30</td>
                                                        <td  ></td>
                                                        <td  >18:00 - 19:00</td>
                                                        <td  >18:00 - 20:00</td>
                                                        <td  ></td>
                                                    </tr>
                                                    <tr>
                                                        <td  ><b>Sunday</b></td>
                                                        <td  ></td>
                                                        <td  >08:00 - 10:30</td>
                                                        <td  >08:00 - 10:30</td>
                                                        <td  >08:00 - 10:30</td>
                                                        <td  >13:30 - 17:00</td>
                                                        <td  >17:00 - 18:00</td>
                                                        <td  >16:30 - 18:00</td>
                                                        <td  >17:30 - 18:30</td>
                                                        <td  >16:30 - 18:00</td>
                                                        <td  ></td>
                                                        <td  ></td>
                                                        <td  ></td>
                                                        <td  >07:00 - 08:30</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-xl text-uppercase" type="button">
                                <!--                                <i class="fas fa-xmark me-1"></i>-->
                                Book Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- activities item 5 modal popup-->
<div class="activities-modal modal fade" id="activitiesModal5" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal"/>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project details-->
                            <h2 class="text-uppercase">Swimming Competitions</h2>
                            <p class="item-intro text-muted">Show Up Your Swimming Skills</p>
                            <img class="img-fluid d-block mx-auto" src="assets/img/activities/5.jpg" alt="..."/>
                            <div class="row">


                                <div class="row" draggable="false">
                                    <div class="col-md-12" data-noedit="">
                                        <div class="spacer height-20"></div>
                                    </div>
                                </div>
                                <div class="row"
                                     style="border-top-style: dotted; border-top-color: rgba(247, 247, 247, 0.5); padding-bottom: 1em; padding-top: 1em;">
                                    <div class="col-md-3"><p style="letter-spacing: 2px;" class=""></p>
                                        <p class=""
                                           style="font-size: 1.07rem; line-height: 1; font-family: &quot;Open Sans&quot;, sans-serif; letter-spacing: 2px;color: #0a98b4;"></p>
                                        <h1 class="size-38"
                                            style="font-family: &quot;Open Sans&quot;, sans-serif; font-weight: bold; line-height: 1.4; letter-spacing: normal;color: #0a98b4;">
                                            Open meets</h1>
                                        <h1 class="size-42 " style="font-weight: bold;"></h1></div>
                                    <div class="col-md-9" style="line-height: 1.4;text-align: justify">
                                        <p class="">These are swimming competitions in which individuals enter through
                                            the club’s entry process. These competitions are licensed - which means that
                                            times achieved at these meets will appear on swimmers Rankings on the Swim
                                            England database.

                                            <br><br>There is an entry fee charged per event. This is likely to range
                                            from £6 to £10, although can be more for 800m/1500m events. Different meets
                                            are aimed at different levels of swimmers, and most will have upper and / or
                                            lower limit times to ensure they get the right range of swimmer ability
                                            attending. You can find the list of open meets the club is planning to
                                            attend on the competition calendar, along with guidance as to who should be
                                            going to each meet, by squad. Swimmers should generally discuss with their
                                            lead coach which events to enter, PRIOR to submitting their entry.

                                            <br><br>The best way to do this is to print off the schedule for the meet -
                                            highlight the races/events you have qualified for - and circle the
                                            races/events you would like to enter. The coach can then discuss and advise.
                                            This advice will depend on many factors (time of the season, what your short
                                            and long term goals are, what qualifying competitions are coming up, etc),
                                            therefore this advice and discussion with the swimmer is not only imperative
                                            but also educational for the swimmer.

                                            <br><br>For open meets, ages can either be as of 31st of December of the
                                            year of competition OR Age as of the date the Open meet finishes. The
                                            details of this will be in the conditions and entry forms for each
                                            competition.</p>
                                        <p></p></div>
                                </div>
                                <div class="row"
                                     style="border-top-style: dotted; border-top-color: rgba(247, 247, 247, 0.5); padding-bottom: 1em; padding-top: 1em;">
                                    <div class="col-md-3"><p style="letter-spacing: 2px;" class=""></p>
                                        <p class=""
                                           style="font-size: 1.07rem; line-height: 1; font-family: &quot;Open Sans&quot;, sans-serif; letter-spacing: 2px;color: #0a98b4;"></p>
                                        <h1 class="size-38"
                                            style="font-family: &quot;Open Sans&quot;, sans-serif; font-weight: bold; line-height: 1.4; letter-spacing: normal;color: #0a98b4;">
                                            Championship meets
                                        </h1>
                                        <h1 class="size-42 " style="font-weight: bold;"></h1></div>
                                    <div class="col-md-9" style="line-height: 1.4;text-align: justify">
                                        <p class="">Championship meets are the target competitions for the different
                                            levels of swimmers. These Championships can only be entered if the relevant
                                            qualifying times/criteria have been achieved in a designated time period.
                                            These are the meets that most competitive swimmers will be working towards
                                            qualifying for and, once qualified, competing well in.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" data-noedit="">
                                        <div class="spacer height-40"></div>
                                    </div>
                                </div>
                            </div>
                            <!--                                    </div>-->
                            <div class="row">

                                <div class="row" draggable="false">
                                    <div class="col-md-12" data-noedit="">
                                        <div class="spacer height-20"></div>
                                    </div>
                                </div>
                                <div class="row"
                                     style="border-top-style: dotted; border-top-color: rgba(247, 247, 247, 0.5); padding-bottom: 1em; padding-top: 1em;">
                                    <div class="col-md-3"><p style="letter-spacing: 2px;" class=""></p>
                                        <p class=""
                                           style="font-size: 1.07rem; line-height: 1; font-family: &quot;Open Sans&quot;, sans-serif; letter-spacing: 2px;color: #0a98b4;"></p>
                                        <h1 class="size-38"
                                            style="font-family: &quot;Open Sans&quot;, sans-serif; font-weight: bold; line-height: 1.4; letter-spacing: normal;color: #0a98b4;">
                                            National Championships</h1>
                                        <h1 class="size-42 " style="font-weight: bold;"></h1></div>
                                    <div class="col-md-9" style="line-height: 1.4;text-align: justify">
                                        <p class="">There are several National Championships throughout the season.</p>
                                    </div>
                                </div>
                                <div class="row"
                                     style="border-top-style: dotted; border-top-color: rgba(247, 247, 247, 0.5); padding-bottom: 1em; padding-top: 1em;">
                                    <div class="col-md-3"><p style="letter-spacing: 2px;" class=""></p>
                                        <p class=""
                                           style="font-size: 1.07rem; line-height: 1; font-family: &quot;Open Sans&quot;, sans-serif; letter-spacing: 2px;color: #0a98b4;"></p>
                                        <h1 class="size-38"
                                            style="font-family: &quot;Open Sans&quot;, sans-serif; font-weight: bold; line-height: 1.4; letter-spacing: normal;color: #0a98b4;">
                                            Galas</h1>
                                        <h1 class="size-42 " style="font-weight: bold;"></h1></div>
                                    <div class="col-md-9" style="line-height: 1.4;text-align: justify"><p class="">These
                                            are team competitions. The club will sort the entry, select a team
                                            appropriate to the level of gala, and send out invites to selected swimmers.

                                            <br><br>We currently participate in novice galas and also the National Arena
                                            Leagues.

                                            <br><br>There will be a mix of individual swims and relays at galas – the
                                            coaches will decide who swims in which races. Galas are great fun, a chance
                                            to improve on sprint PB’s, to meet swimmers from other squads, and to do
                                            some exciting relay swimming!</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" data-noedit="">
                                        <div class="spacer height-40"></div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-xl text-uppercase" type="button">
                                <!--                                        <i class="fas fa-xmark me-1"></i>-->
                                Book Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- activities item 6 modal popup-->
<div class="activities-modal modal fade" id="activitiesModal6" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal"/>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">

                            <h2 class="text-uppercase">Terms & Conditions</h2>
                            <p class="item-intro text-muted">Follow the Rules</p>
                            <img class="img-fluid d-block mx-auto" src="assets/img/activities/6.jpg" alt="..."/>
                            <div class="row" style="">
                                <div class="col-md-12 center">
                                    <div class="spacer height-40 "></div>
                                </div>
                            </div>
                            <div class="row" style="">
                                <div class="col-md-6" style="padding-right: 1em;">
                                    <div class="row ">
                                        <div class="col-md-3 center " style="margin-right: -2em;">
                                            <p style="line-height: 1; margin-top: 0;text-align: justify;" class=""><i
                                                    class="icon ion-android-checkmark-circle size-64 "></i></p>
                                        </div>
                                        <div class="col-md-9 ">
                                            <h3 class="">New enrolments</h3>
                                            <p style="line-height: 1.4;text-align: justify;" class="">Temporary
                                                reservations for new members can be made for a limited, agreed period.
                                                Places are only secured when a completed membership form, medical form
                                                and full payment has been received.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" style="padding-left: 1em;">
                                    <div class="row ">
                                        <div class="col-md-3 center " style="margin-right: -2em;">
                                            <p style="line-height: 1; margin-top: 0;text-align: justify;" class=""><i
                                                    class="icon ion-android-checkmark-circle size-64 "></i></p>
                                        </div>
                                        <div class="col-md-9">
                                            <h3 class="">Payments</h3>
                                            <p class="" style="line-height: 1.4;text-align: justify;">We request that
                                                all payments for lessons be made via DD. If for any reason this is not
                                                possible please contact our finance team at finance@crsc.org.uk</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="">
                                <div class="col-md-6">
                                    <div class="row ">
                                        <div class="col-md-3 center " style="margin-right: -2em;">
                                            <p style="line-height: 1; margin-top: 0;text-align: justify;" class=""><i
                                                    class="icon ion-android-checkmark-circle size-64 "></i></p>
                                        </div>
                                        <div class="col-md-9">
                                            <h3 class="">Request for changes</h3>
                                            <p style="line-height: 1.4;text-align: justify;" class="">If you wish to
                                                change either the day or time of a class please email
                                                lessonsadmin@crsc.org.uk for regular lesson bookings, or
                                                events@crsc.org.uk for holiday course/workshop bookings. We make every
                                                effort to accommodate requests for changes, however it is dependent upon
                                                the availability of vacancies and no guarantee can be given. Please note
                                                that memberships and lessons are not transferable to other people/family
                                                members and cannot be converted to other products or services.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-3 center " style="margin-right: -2em;">
                                            <p style="line-height: 1; margin-top: 0;text-align: justify;" class=""><i
                                                    class="icon ion-android-checkmark-circle size-64 "></i></p>
                                        </div>
                                        <div class="col-md-9">
                                            <h3 class="">Re-enrolments</h3>
                                            <p class="" style="line-height: 1.4;text-align: justify;">Existing learn to
                                                swim members are offered a place in a class for the following term two 2
                                                weeks before the end of the current term. An invoice is sent by email.
                                                If payment is not received by the due date the position will be deemed
                                                vacant and offered to another applicant. If you do not wish to re-enrol,
                                                we kindly ask that you notify the lessons team at
                                                lessonsadmin@CRSC.org.uk as soon as possible. Please see cancellation
                                                policy below.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="">
                                <div class="col-md-6">
                                    <div class="row ">
                                        <div class="col-md-3 center " style="margin-right: -2em;">
                                            <p style="line-height: 1; margin-top: 0;text-align: justify;" class=""><i
                                                    class="icon ion-android-checkmark-circle size-64 "></i></p>
                                        </div>
                                        <div class="col-md-9">
                                            <h3 class="">Cancellations</h3>
                                            <p style="line-height: 1.4;text-align: justify;" class=""><b>When you
                                                    cancel:</b> Termly or holiday course bookings can only be cancelled
                                                if written notification is received no later than seven days prior to
                                                the commencement of the course. Cancellations received after seven days
                                                but prior to the commencement of the course will receive a refund less a
                                                £20 administration fee. Once a course has started, requests for a
                                                cancellation will not be eligible to any refund. Any exceptions to the
                                                above terms will be at the sole discretion of the CRSC Management Team.

                                                <br><b>If you wish to request a change to, or cancel, a booking you
                                                    should email written notification to:</b>

                                                <br><b>The Lessons Team at lessonsadmin@crsc.org.uk</b> – if your
                                                cancellation/request is regarding your termly lessons booking.

                                                <br><b>The Events Team at events@crsc.org.uk</b> – if your
                                                cancellation/request is regarding a holiday course or workshop booking.

                                                <br><br><b>When we cancel:</b> In the event of lesson cancellations that
                                                are beyond our control neither refunds or credits will be given. An
                                                example of this is bad weather meaning roads are closed or unsafe, a
                                                problem with the pool water or a fire alarm going off in the pool
                                                building. We will announce pool closures on the club website as soon as
                                                possible.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row ">
                                        <div class="col-md-3 center " style="margin-right: -2em;">
                                            <p style="line-height: 1; margin-top: 0;text-align: justify;" class=""><i
                                                    class="icon ion-android-checkmark-circle size-64 "></i></p>
                                        </div>
                                        <div class="col-md-9">
                                            <h3 class="">Hygiene and safety</h3>
                                            <p class="" style="line-height: 1.4;text-align: justify;">All students who
                                                are not toilet trained must wear tight-fitting waterproof pants and
                                                approved swimming nappies whilst in the pool. All students in stage 2
                                                classes and above should wear a swim cap and goggles. If your child has
                                                been unwell or is suffering from a stomach upset we advise you not to
                                                bring your child along for their lesson. Here is a list of things your
                                                child should do before their lesson:

                                                <br><br>->Go to the toilet
                                                <br><br>->Blow their nose
                                                <br><br>->Tie back long hair
                                                <br><br>->Make sure they have a shower
                                                <br><br>->Bring along any relevant medication, if your child suffers
                                                from asthma.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="">
                                <div class="col-md-6">
                                    <div class="row ">
                                        <div class="col-md-3 center " style="margin-right: -2em;">
                                            <p style="line-height: 1; margin-top: 0;text-align: justify;" class=""><i
                                                    class="icon ion-android-checkmark-circle size-64 "></i></p>
                                        </div>
                                        <div class="col-md-9">
                                            <h3 class="">Parental supervision</h3>
                                            <p style="line-height: 1.4;text-align: justify;" class="">It is the
                                                condition of entry that all children aged 9 years and younger must be
                                                accompanied by a parent or guardian whilst attending their swimming
                                                lessons. Children will not be accepted into lessons if a parent or
                                                guardian is absent. Children must be collected from poolside by the
                                                parent or a guardian over the age of 16 at the conclusion of every
                                                lesson. If, in exceptional circumstances, a parent / guardian is
                                                required to support their child in the water and they are not a club
                                                member, they participate at their own risk.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row ">
                                        <div class="col-md-3 center " style="margin-right: -2em;">
                                            <p style="line-height: 1; margin-top: 0;text-align: justify;" class=""><i
                                                    class="icon ion-android-checkmark-circle size-64 "></i></p>
                                        </div>
                                        <div class="col-md-9">
                                            <h3 class="">Photographic and video images</h3>
                                            <p class="" style="line-height: 1.4;text-align: justify;">Parents or
                                                guardians may not take photographs or video footage of a child or
                                                children whilst they are attending lessons without the consent of the
                                                CRSC lessons supervisor, the facility management and of all other
                                                parents or guardians whose children are in the same class. Any
                                                photographic or video footage taken by CRSC staff will only be used for
                                                in house for training purposes or club promotions and the procedure will
                                                be in line with ASA Photographic Guidance Policy.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row ">
                                        <div class="col-md-3 center " style="margin-right: -2em;">
                                            <p style="line-height: 1; margin-top: 0;text-align: justify;" class=""><i
                                                    class="icon ion-android-checkmark-circle size-64 "></i></p>
                                        </div>
                                        <div class="col-md-9">
                                            <h3 class="">Privacy statement</h3>
                                            <p style="line-height: 1.4;text-align: justify;" class="">The personal
                                                information collected by CRSC is used to provide contact information for
                                                CRSC learn teachers and administration staff. Information such as
                                                medical details is required to assist in accommodating the individual’s
                                                needs and abilities. All personal information is keep in accordance with
                                                the Information Privacy Act</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row ">
                                        <div class="col-md-3 center " style="margin-right: -2em;">
                                            <p style="line-height: 1; margin-top: 0;text-align: justify;" class=""><i
                                                    class="icon ion-android-checkmark-circle size-64 "></i></p>
                                        </div>
                                        <div class="col-md-9">
                                            <h3 class="">Medical Conditions</h3>
                                            <p class="" style="line-height: 1.4;text-align: justify;">Please inform us
                                                of any medical considerations that a child has. If a child has a
                                                disability and requires additional support please let us know so that we
                                                can help.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                <i class="fas fa-xmark me-1"></i>
                                Close Terms & Conditions
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
