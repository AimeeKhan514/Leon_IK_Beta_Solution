<?php require_once('inc/header.php')?>


<body>
    <!-- NAVBAR -->
    <?php require_once('inc/navbar.php')?>
    <!-- NAVBAR -->

    <!-- HERO SECTION -->
    <div class="col-12 py-5 full-bg-img" style="background-image: url('./assets/images/bg/89-2880w.jpg');">
        <div class="py-lg-5 my-lg-5 py-3 my-3"></div>
        <div class="py-lg-5 my-lg-5 py-3 my-3"></div>
        <div class="py-2"></div>
        <div class="col-12 p-lg-5 p-3 mb-5 bg-success-custom-transparent">
            <div class="container">
                <p class="display-3 text-white">Custom Electronic Design Services</p>
            </div>
        </div>
    </div>
    <!-- HERO SECTION -->

    <!-- BREADCRUMBS -->
    <?php require_once('inc/breadcrumbs.php')?>
    <!-- BREADCRUMBS -->

    <!-- MAIN CONTENT -->

    <!-- HOW WE WORK SECTION -->
    <div class="container-fluid p-lg-5 p-3">
        <div class="container">
            <div class="col-12 mb-4">
                <p class="text-dark-custom display-6">As leading electronic engineering consultants, Beta Solutions has
                    the skills, expertise and resources to meet your unique project requirements.</p>
            </div>
            <div class="col-12 mb-4">
                <p class="text-secondary fs-4 mb-5">Beta Solutions is your electronic projects partner of choice for
                    bringing ideas to life or transforming ageing products into market winners. We are passionate about
                    innovation with purpose. Beta Solutions is a full-service electronic design company and engineering
                    consultancy providing Electronic Hardware and Software design; Electro-mechanical design; Production
                    and professional Consultancy advice. Download our full list of <a
                        href="./assets/media/files/20170621 BSL Capabilities.pdf" target="_blank">Electronic Product
                        Design Capabilities</a>
                </p>
                <p class="text-secondary fs-4 mb-5">We offer the following services to our clients:</p>
            </div>
        </div>
        <div class="container pt-1 bg-success-custom"></div>
    </div>
    <!-- HOW WE WORK SECTION -->

    <!-- DETAILS SECTION -->
    <div class="container-fluid p-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 px-lg-5">
                    <div class="col-11 mb-4">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <img src="./assets/images/Product-R&D-Consulting-60w.jpeg" alt="...">
                            </div>
                            <div class="flex-grow-1 ms-4">
                                <a href="javascript:void(0);" class="text-dark-custom fs-3">Product R&D Consulting</a>
                                <p class="text-secondary mt-3">Our experienced team of engineers can provide you with a
                                    range of specialist consulting services for your unique project requirements. We
                                    offer sound technical advice, complete ground-up designs, and everything in between
                                    - <br>including:</p>
                                <ul class="ul text-secondary fs-6">
                                    <li>Reliability analysis</li>
                                    <li>Design reviews</li>
                                    <li>Architecture development</li>
                                    <li>Cost reduction</li>
                                    <li>Production consulting</li>
                                    <li>Diagnostics and testing</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- DETAILS SECTION -->

    <!-- INFO SECTION -->
    <div class="container-fluid bg-dark-custom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 py-lg-5 p-3">
                    <div class="col-lg-10 mb-4">
                        <p class="text-white display-6">The success of our business is built on 5 core values</p>
                    </div>

                    <div class="col-lg-10 mb-4">
                        <p class="text-secondary fs-3">
                            <span>Integrity</span>
                            <span><span class="fas fa-circle" style="font-size: 2px;"></span> Relationships</span>
                            <span><span class="fas fa-circle" style="font-size: 2px;"></span> Excellence</span>
                            <span><span class="fas fa-circle" style="font-size: 2px;"></span> Innovation</span>
                            <span><span class="fas fa-circle" style="font-size: 2px;"></span> Enjoyment</span>
                    </div>
                    <div class="col-12 pt-5 mb-4">
                        <a href="contact" class="btn-lg btn-success-custom text-decoration-none py-3 px-5">Learn About
                            Our
                            Values</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="./assets/images/93-698w.jpeg" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 px-lg-5 order-lg-1 order-2">
                    <img src="./assets/images/93-698w.jpeg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 p-lg-5 p-3 order-lg-2 order-1">
                    <div class="col-lg-10 mb-4">
                        <p class="text-dark-custom display-6">An inspiring space that mixes hi-tech engineering with a
                            friendly, café-style feel.</p>
                    </div>
                    <div class="col-12 py-5">
                        <a href="contact" class="btn-lg btn-success-custom text-decoration-none py-3 px-5">Tour Our
                            Facilities</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- INFO SECTION -->

    <!-- CONTENT -->



    <!-- BOTTOM HERO SECTION -->
    <?php require_once('inc/bottom-hero-section.php')?>
    <!-- BOTTOM HERO SECTION -->

    <!-- FOOTER SECTION -->
    <?php require_once('inc/footer.php')?>
    <!-- FOOTER SECTION -->

    <!-- SCRIPTS SECTION -->
    <?php require_once('inc/bottom.php')?>
    <!-- SCRIPTS SECTION -->
    <script>
    $(document).ready(function() {
        autoPlayYouTubeModal();
    });
    // Get and autoplay Video from data
    function autoPlayYouTubeModal() {
        var triggerOpen = $("body").find('[data-tagVideo]');
        triggerOpen.click(function() {
            var theModal = $(this).data("bs-target"),
                videoSRC = $(this).attr("data-tagVideo"),
                videoSRCauto = videoSRC + "?autoplay=1";
            $(theModal + ' iframe').attr('src', videoSRCauto);
            $(theModal + ' button.btn-close').click(function() {
                $(theModal + ' iframe').attr('src', videoSRC);
            });
        });
    }
    </script>