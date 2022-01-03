<?php require_once('inc/header.php') ?>

<body>
    <!-- NAVBAR -->
    <?php require_once('inc/navbar.php') ?>
    <!-- NAVBAR -->

    <!-- NEWS -->
    <div class="text-dark-custom bg-success-custom text-center py-2">
        <p class="fs-4 fw-light">We are "Approved Research Providers" for the NZ R&D Tax Incentive</p>
    </div>
    <!-- NEWS -->

    <!-- HERO SECTION -->
    <div class="col-12 bg-dark-custom2 py-5">
        <div class="col-lg-6 mx-auto px-3 mb-3">
            <img src="./assets/images/betasolutions-banner-desktop+(1)-900w.png" alt="" class="img-fluid">
        </div>
        <div class="col-lg-12 px-3 mb-3 text-center">
            <p class="display-4 text-white">We bring your electronic product ideas to life</p>
            <p class="text-white fs-4 ">Product design consultants in high-tech electronic and electro-mechanical
                engineering</p>
        </div>
    </div>
    <!-- HERO SECTION -->

    <!-- MAIN CONTENT -->

    <!-- ABOUT SECTION -->
    <div class="container-fluid p-lg-5 p-3">

        <div class="col-12 mb-4">
            <p class="text-dark-custom display-6">Beta Solutions is an innovative full-service electronic engineering
                consultancy, from electronic product design and development to production.</p>
        </div>
        <div class="col-12 mb-4">
            <p class="text-secondary fs-4">Turning new product ideas into reality or ageing products into market
                winners, we are passionate about innovation with purpose. Beta Solutions is your electronic product
                design consultancy partner of choice for Electronic Hardware and Embedded Software design;
                Electro-mechanical design; Production and professional Consultancy advice. With clients throughout New
                Zealand and internationally, we are set up to successfully manage, design, and deliver your project
                regardless of the size or scope. Beta Solutions is an Approved Research Provider for the R&D Tax
                Incentive in New Zealand.</p>
        </div>
        <div class="col-12 mb-4">
            <div class="row">
                <div class="col-lg-6 mb-3 pe-md-3">
                    <div class="accordion" id="accordionExample">
                        <?php
                        $getTableData = getTableData($con, 'engineering_consultancy', '');
                        foreach($getTableData as $row){
                        ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading<?php echo $row["id"] ?>">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $row["id"] ?>" aria-expanded="false" aria-controls="collapse<?php echo $row["id"] ?>">
                                            <img src="./assets/media/engineering-consultancy/<?php echo $row["image"] ?>" alt="" class="img-fluid me-3">
                                            <span class="fs-4 text-success-custom "><?php echo $row["title"] ?></span>
                                        </button>
                                    </h2>
                                    <div id="collapse<?php echo $row["id"] ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $row["id"] ?>" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <?php echo $row["description"] ?>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        
                        ?>
                    </div>
                </div>
                <div class="col-lg-6 mb-3 ps-md-3 d-flex justify-content-center align-items-center">
                    <video src="./assets/videos/Electronic Design - Product Development Company - Beta Solutions NZ.mp4" controls loop autoplay muted class="img-fluid"></video>
                </div>
            </div>
        </div>
        <div class="col-12 mb-4 text-center">
            <a href="services" class="btn-lg btn-success-custom text-decoration-none py-3 px-5">Learn More</a>
        </div>

    </div>
    <!-- ABOUT SECTION -->

    <!-- INDUSTRY SECTION -->
    <div class="container-fluid bg-light-custom p-lg-5 p-3">
        <div class="col-12 my-4">
            <p class="text-dark-custom display-6">Industries</p>
        </div>
        <div class="col-12 mb-4">
            <p class="text-dark-custom  fs-4 mb-5">Beta Solutions is a trusted ally to innovative businesses in
                delivering intelligent and technology optimised, electronic product solutions.</p>
            <p class="text-dark-custom fs-4">Our wide-ranging experience and knowledge of leading technologies enable us
                to design electronic products for a wide range of industries. If you don’t see the right category for
                your project in our industries list here, it is very likely that we can still meet your needs.</p>
        </div>
        <div class="col-12 mb-4">
            <div class="accordion row row-cols-lg-4 row-cols-md-3 row-cols-1" id="accordionIndustries">
                <?php
                    $getTableData = getTableData($con, 'industries', '');
                    foreach($getTableData as $row){
                ?>
                        <div class="accordion-item col py-3 rounded-0">
                            <h2 class="accordion-header" id="heading0<?php echo $row["id"] ?>">
                                <div class="col-12 accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse0<?php echo $row["id"] ?>" aria-expanded="false" aria-controls="collapse0<?php echo $row["id"] ?>">
                                    <div class="col-12 text-center">
                                        <img src="./assets/media/industries/<?php echo $row["image"] ?>" alt="">
                                        <h4 class="text-dark-custom fw-bold my-2"><?php echo $row["title"] ?></h4>
                                    </div>
                                </div>
                            </h2>
                            <div id="collapse0<?php echo $row["id"] ?>" class="accordion-collapse collapse" aria-labelledby="heading0<?php echo $row["id"] ?>" data-bs-parent="#accordion0<?php echo $row["id"] ?>">
                                <div class="accordion-body h5 text-secondary">
                                    <p class="mb-3"><?php echo str_replace(". ", ".<br><br>", $row["description"]) ?></p>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                ?>

            </div>
        </div>

        <div class="col-12 mb-4 text-center">
            <a href="services" class="btn-lg btn-success-custom text-decoration-none py-3 px-5">See Our Capabilities</a>
        </div>
    </div>
    <!-- INDUSTRY SECTION -->

    <!-- REACH US SECTION -->
    <div class="container-fluid bg-dark-custom3 p-lg-5 p-3">
        <p class="display-6 text-white mb-3">Have an idea and don't know where to start?</p>
        <p class="h4 text-success-custom mb-5">Regardless of the size or scope of your Project you’ll always receive the
            same outstanding level of service from our experienced, efficient team.Beta Solutions endeavour to make
            getting started on a new R&D project as easy as possible for you, in just 3 steps:
        </p>
        <div class="col-12">

            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="row">
                    <div class="col-lg-4 mb-3">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed px-lg-5 ps-5 pe-3 fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    <img src="./assets/images/Contact-Us-1920w.png" alt="" class="img-fluid me-3">
                                    <span>Contact Us</span>
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <p class="fs-4 mb-3">The start of an innovation partnership.</p>
                                    <p class="fs-6 mb-3">No matter what stage of development you are in, simply contact
                                        us to discuss how we can help. We uphold the confidentiality of our clients’
                                        ideas - and our reputation depends on it. If required, we are happy to sign a
                                        non-disclosure agreement, which we will prepare for you. This will further
                                        protect our mutual interests and enable us to more openly discuss the project
                                        you have in mind.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-10 mt-lg-5 mt-3">
                            <a href="contact" class="btn-success-custom text-decoration-none fs-5 d-block py-1 text-center">Let's
                                Innovate
                                Together</a>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed px-lg-5 ps-5 pe-3 fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"" aria-expanded=" false" aria-controls="flush-collapseTwo"">
                                    <img src=" ./assets/images/Discovery-Meeting-1920w.png" alt="" class="img-fluid me-3">
                                    <span>Discovery Meeting</span>
                                </button>
                            </h2>
                            <div id="flush-collapseTwo"" class=" accordion-collapse collapse" aria-labelledby="flush-headingTwo"" data-bs-parent=" #accordionFlushExample">
                                <div class="accordion-body">
                                    <p class="fs-4 mb-3">A meeting of the minds that gives ideas traction.</p>
                                    <p class="fs-6 mb-3">An initial face-to-face meeting as your free consultation is
                                        beneficial to:</p>
                                    <p class="fs-6 mb-3">
                                    <ol type="1">
                                        <li>Establish a solid working relationship;</li>
                                        <li>Communicate your ideas, requirements, and specifications regarding the
                                            project in detail;</li>
                                        <li>Enable us to share about our previous work experiences, relevant
                                            capabilities, and working practices;</li>
                                        <li>Determine the best course of action to move the project forward to the next
                                            stage.</li>
                                    </ol>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-10 col-lg-8 mt-lg-5 mt-3">
                            <a href="about-us" class="btn-success-custom text-decoration-none fs-5 d-block py-1 text-center">Learn More
                                About Us</a>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed px-lg-5 ps-5 pe-3 fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                    <img src="./assets/images/Engage-+-Deliver-1920w.png" alt="" class="img-fluid me-3">
                                    <span>Engage & Deliver</span>
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <p class="fs-4 mb-3">Our proven development process will provide you with innovative
                                        and robust solutions.</p>
                                    <p class="fs-6 mb-3">Depending on the project, we may mutually agree the need for us
                                        to issue you with a Project Proposal detailing the estimated cost, schedules and
                                        deliverables. Once you are ready to proceed to the next stage, we will prepare
                                        an Engagement Letter, bringing further clarity to our working relationship. At
                                        your acceptance, we can hit the project “go” button!</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-10 col-lg-8 mt-3 mt-lg-5">
                            <a href="faqs" class="btn-success-custom text-decoration-none fs-5 d-block py-1 text-center">FAQ's</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- REACH US SECTION -->

    <!-- PROJECTS SECTION -->
    <div class="container-fluid bg-light-custom p-lg-5 p-3">
        <div class="col-12 my-4">
            <p class="text-dark-custom display-6">Projects</p>
        </div>
        <div class="col-12 mb-4">
            <p class="text-dark-custom fs-4 mb-5">Beta Solutions has partnered with many established companies,
                entrepreneurs and research institutes - working closely together and building strong relationships to
                design electronic products based on the best technological solutions that will transform our clients’
                businesses.</p>
        </div>
        <div class="col-12 mb-5">
            <div class="owl-carousel owl-theme" id="owl-carousel-projects">
                <?php
                $getTableData = getTableData($con, 'projects', '');
                foreach($getTableData as $row){
                ?>
                        <div class="item">
                            <div class="card p-4 border-0 rounded-0" style="min-height: 450px;">
                                <img src="./assets/media/projects/<?php echo $row["image"]; ?>" class="card-img-top" alt="...">
                                <div class="card-body px-0">
                                    <a href="javascript:void(0);" class="text-dark-custom fs-5 mb-5 text-decoration-none"><?php echo $row["title"]; ?></a>
                                    <span class="badge rounded-pill bg-success-custom small"><?php echo $row["tag"]; ?></span>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                
                ?>
            </div>
        </div>

        <div class="col-12 my-4 text-center">
            <a href="projects" class="btn-success-custom text-decoration-none py-3 px-5">See Our Projects</a>
        </div>
    </div>
    <!-- PROJECTS SECTION -->

    <!-- REVIEWS SECTION -->
    <div class="container-fluid p-lg-5 p-3">

        <div class="col-12 mb-5">
            <p class="text-dark-custom display-6">See why our clients chose us</p>
        </div>
        <div class="owl-carousel owl-theme" id="owl-carousel-reviews">
            <?php
                $getTableData = getTableData($con, 'reviews', '');
                foreach($getTableData as $row){
            ?>
                    <div class="item py-5">
                        <div class="card border-0 rounded-0 shadow">
                            <div class="card-body min-h300">
                                <h4 class="card-title fw-bold m-0">
                                    <a href="" class="text-decoration-none text-dark-custom"><?php echo $row["title"]; ?></a>
                                </h4>
                                <?php
                                $star = '<span class="fas fa-star fs-6 text-success-custom"></span>';
                                if ($row["rating"] == 1) {
                                    echo str_repeat($star, 1);
                                } elseif ($row["rating"] == 2) {
                                    echo str_repeat($star, 2);
                                } elseif ($row["rating"] == 3) {
                                    echo str_repeat($star, 3);
                                } elseif ($row["rating"] == 4) {
                                    echo str_repeat($star, 4);
                                } elseif ($row["rating"] == 5) {
                                    echo str_repeat($star, 5);
                                } else {
                                    echo str_repeat($star, 1);
                                }
                                ?>
                                <p class="text-success-custom"><?php echo $row["duration"]; ?></p>
                                <p class="card-text my-3"><?php echo $row["description"]; ?></p>
                            </div>
                        </div>
                    </div>
            <?php
                }
           ?>
        </div>
        <!-- <div class="col-12 my-4 text-center">
            <a href="projects" class="btn-success-custom text-decoration-none py-3 px-5">Read all Reviews</a>
        </div> -->
    </div>
    <!-- REVIEWS SECTION -->

    <!-- CLIENTS SECTION -->
    <div class="container-fluid p-lg-5 p-3">
        <div class="col-12 mb-4">
            <p class="text-dark-custom display-6">Our Clients</p>
        </div>
        <div class="row">
            <?php
               $getTableData = getTableData($con, 'clients', '');
               foreach($getTableData as $row){
            ?>
                    <a href="./assets/media/clients/<?php echo $row["image"];?>" class="col-lg-2 col-md-4 p-3 mb-3" data-toggle="lightbox" data-gallery="example-gallery">
                        <img src="./assets/media/clients/<?php echo $row["image"]; ?>" class="img-fluid" alt="">
                    </a>
            <?php
                }
            ?>
        </div>
    </div>
    <!-- CLIENTS SECTION -->

    <!-- CONTENT -->

    <!-- BOTTOM HERO SECTION -->
    <?php require_once('inc/bottom-hero-section.php'); ?>
    <!-- BOTTOM HERO SECTION -->

    <!-- FOOTER SECTION -->
    <?php require_once('inc/footer.php'); ?>
    <!-- FOOTER SECTION -->

    <!-- SCRIPTS SECTION -->
    <?php require_once('inc/bottom.php'); ?>
    <!-- SCRIPTS SECTION -->