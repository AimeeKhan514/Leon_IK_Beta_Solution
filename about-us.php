<?php require_once('inc/header.php')?>


<body>
    <!-- NAVBAR -->
    <?php require_once('inc/navbar.php')?>
    <!-- NAVBAR -->

    <!-- HERO SECTION -->
    <div class="col-12 py-5 full-bg-img" style="background-image: url('./assets/images/bg/77-2880w.jpg');">
        <div class="py-lg-5 my-lg-5 py-3 my-3"></div>
        <div class="py-lg-5 my-lg-5 py-3 my-3"></div>
        <div class="py-2"></div>
        <div class="col-12 p-lg-5 p-3 mb-5 bg-success-custom-transparent">
            <div class="container">
                <p class="display-3 text-white">Your partner in electronic product innovation</p>
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
                <p class="text-dark-custom display-6">Beta Solutions is a full-service electronic product development
                    consultancy based in Palmerston North, New Zealand.</p>
            </div>
            <div class="col-12 mb-4">
                <p class="text-secondary fs-4 mb-5">Since 2008, we have been privileged to partner with many national
                    (from
                    Auckland to Christchurch) and international businesses and entrepreneurs. In the process, we have
                    undertaken hundreds of technical projects and brought dozens of leading electronic products to
                    market.
                </p>
                <p class="text-secondary fs-4 mb-5">Specialising in the high-tech electronic and electro-mechanical
                    sector,
                    we believe in empowering our clients with innovative solutions and technology to help make a
                    positive
                    impact in their business and life.</p>
                <p class="text-secondary fs-4 mb-5">Beta Solutions is an Approved Research Provider for the R&D Tax
                    Incentive in New Zealand in seven different areas of research expertise. Contact us today to find
                    out
                    more.</p>
            </div>
            <div class="col-12 mb-4">
                <a href="how-we-work" data-bs-toggle="modal" data-bs-target="#videoModal"
                    data-tagVideo="https://www.youtube.com/embed/fI8yhMWhHAE"
                    class="btn-lg btn-success-custom text-decoration-none py-3 px-5">How We Work</a>
            </div>
        </div>
    </div>
    <!-- HOW WE WORK SECTION -->

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
                    <img src="./assets/images/107-698w.jpeg" class="img-fluid" alt="">
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

    <!-- TEAM SECTION -->
    <div class="container-fluid p-3">
        <div class="col-12 py-3 text-center">
            <p class="text-dark-custom display-6">Meet Beta Solutions' problem solvers</p>
        </div>

        <div class="container mb-5">
            <div class="owl-carousel owl-theme" id="owl-carousel-teams">
            <?php
               $getTableData = getTableData($con, 'teams', '');
               foreach($getTableData as $row){
            ?>
                <div class="item">
                    <div class="card p-4 border-0 rounded-0">
                        <img src="./assets/media/teams/<?php echo $row["image"];?>" class="card-img-top" alt="...">
                    </div>
                </div>
                <?php
                }
            
            ?>
            </div>
        </div>

        <div class="col-12 my-4 text-center">
            <a href="Contact" class="btn-success-custom text-decoration-none py-3 px-5">Get to Know Us</a>
        </div>
    </div>
    <!-- TEAM SECTION -->


    <!-- CONTENT -->

<!-- MODAL VIDEO -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-body">
          <p class="text-end">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></p>
      <iframe width="100%" height="600" src=""></iframe>
      </div>
    </div>
  </div>
</div>
<!-- MODAL VIDEO -->

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