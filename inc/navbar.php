<nav class="navbar navbar-expand-lg navbar-light" id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand py-0 px-3" href="#">
                <img src="./assets/images/Beta-Solutions-Logo.svg" alt="" class="img-fluid"
                    id="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse  bg-dark-custom" id="navbarNav">
                <ul class="navbar-nav pt_bold text-uppercase">
                    <li class="nav-item <?php if($page_name == 'index'){echo 'active-li';}else{echo"";}?>">
                        <a class="nav-link <?php if($page_name == 'index'){echo 'active-menu';}else{echo"";}?>" href="index">Home</a>
                    </li>
                    <li class="nav-item <?php if($page_name == 'about-us'){echo 'active-li';}else{echo"";}?>">
                        <a class="nav-link <?php if($page_name == 'about-us'){echo 'active-menu';}else{echo"";}?>" href="about-us">About us</a>
                    </li>
                    <li class="nav-item <?php if($page_name == 'services'){echo 'active-li';}else{echo"";}?>">
                        <a class="nav-link <?php if($page_name == 'services'){echo 'active-menu';}else{echo"";}?>" href="services">Services</a>
                    </li>
                    <li class="nav-item <?php if($page_name == 'projects'){echo 'active-li';}else{echo"";}?>">
                        <a class="nav-link <?php if($page_name == 'projects'){echo 'active-menu';}else{echo"";}?>" href="projects">Projects</a>
                    </li>
                    <li class="nav-item <?php if($page_name == 'faqs'){echo 'active-li';}else{echo"";}?>">
                        <a class="nav-link <?php if($page_name == 'faqs'){echo 'active-menu';}else{echo"";}?>" href="faqs">FAQ</a>
                    </li>
                    <li class="nav-item <?php if($page_name == 'contact'){echo 'active-li';}else{echo"";}?>">
                        <a class="nav-link <?php if($page_name == 'contact'){echo 'active-menu';}else{echo"";}?>" href="contact">Contact</a>
                    </li>
                    <li class="nav-item active-li">
                        <a class="nav-link active-menu" href="javascript:void(0);">Phone +00 0 000 0000</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>