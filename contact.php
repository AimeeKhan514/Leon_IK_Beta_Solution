<?php require_once('inc/header.php')?>
<?php
$msg = "";
require_once("./inc/function.php");
if(isset($_POST["btn_send"])){
    $name = getSaveValue($con, $_POST["name"]);
    $telephone = getSaveValue($con, $_POST["telephone"]);
    $company = getSaveValue($con, $_POST["company"]);
    $country = getSaveValue($con, $_POST["country"]);
    $pr = getSaveValue($con, $_POST["pr"]);
    $email = getSaveValue($con, $_POST["email"]);
    $hear_about_us = getSaveValue($con, $_POST["hear_about_us"]);
    $ct = getSaveValue($con, $_POST["ct"]);
    $message = getSaveValue($con, $_POST["message"]);
   $res =  mysqli_query($con, "INSERT INTO `users`(`name`, `phone`, `company`, `country`, `pr`, `ct`, `email`, `message`, `hear_about_us`, `status`) VALUES ('$name','$telephone','$company','$country','$pr','$ct','$email','$message','$hear_about_us','1')");
    if($res){
        $msg = '<div class="alert alert-success msg" role="alert">
        <strong>Success!</strong> Message Send.!</div>';
    }else{
        $msg = '<div class="alert alert-warning msg" role="alert">
        <strong>Warning!</strong> Message Not Send.!</div>';
    }


}

if ( isset( $msg ) ) {
    echo $msg;
}


?>


<body>
    <!-- NAVBAR -->
    <?php require_once('inc/navbar.php')?>
    <!-- NAVBAR -->
    <!-- BREADCRUMBS -->
    <?php require_once('inc/breadcrumbs.php')?>
    <!-- BREADCRUMBS -->

    <!-- MAIN CONTENT -->

    <!-- CONTACT DETAILS SECTION -->
    <div class="container-fluid px-lg-5 p-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <div class="col-12 mb-5">
                        <h1 class="">Beta Solutions Ltd</h1>
                    </div>
                    <div class="col-12 mb-5">
                        <p class="text-secondary">Phone: <a href="tel:+64 6 280 2830" class="text-dark">+64 6 280
                                2830</a></p>
                    </div>
                    <div class="col-12 mb-5">
                        <div class="row">
                            <div class="col-lg-6 mb-3 fs-6 text-secondary">
                                <p class="fs-5">Postal Address:</p>
                                <p>DX Box PP80012,</p>
                                <p>Palmerston North 4410,</p>
                                <p>New Zealand</p>
                            </div>
                            <div class="col-lg-6 mb-3 fs-6 text-secondary">
                                <p class="fs-5">Street Address</p>
                                <p>Level 1, 44B King Street </p>
                                <p>Palmerston North </p>
                                <p>Manawatu, 4410</p>
                                <p>New Zealand</p>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-lg-6 mb-3">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6080.945842667966!2d175.611354!3d-40.354037!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xed3a975e54c3e817!2sBeta%20Solutions%20Ltd!5e0!3m2!1sen!2snz!4v1640773335642!5m2!1sen!2snz"
                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTACT DETAILS SECTION -->

    <!-- CONTACT FORM SECTION -->
    <div class="container-fluid px-lg-5 p-3">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3">
                    <h1>Get in touch with us today!</h1>
                </div>
                <div class="col-12 mb-3">
                    <p class="fs-4 text-secondary">If you would like to learn more about what we offer and how we can
                        bring your ideas to life, get in touch no matter where you are located, what stage your project
                        is in, or the size of your project, so we can arrange your free consultation.</p>
                </div>
                <div class="col-12 mb-3">
                    <form class="row needs-validation" method="POST" action="" novalidate>
                        <div class="col-md-6 pe-md-2">
                            <input type="text" name="name" class="form-control mb-4" id="name" placeholder="Name*"
                                value="" required>

                            <input type="text" name="company" class="form-control mb-4" id="company"
                                placeholder="Company*" value="">

                            <input type="text" name="pr" class="form-control mb-4" id="pr" placeholder="Position/Role"
                                value="">

                            <input type="email" name="email" class="form-control mb-4" id="email" placeholder="Email*"
                                value="" required>

                            <select name="hear_about_us" class="form-control mb-4" id="hear_about_us">
                                <option value="Not Selected" selected hidden disabled>How did you hear about us?*
                                </option>
                                <option value="Search Engine (Eg: Google)">Search Engine (Eg: Google)</option>
                                <option value="LinkedIn">LinkedIn</option>
                                <option value="Blog">Blog</option>
                                <option value="Printed brochures">Printed brochures</option>
                                <option value="Word of mouth">Word of mouth</option>
                                <option value="Google Ads">Google Ads</option>
                                <option value="Facebook">Facebook</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="col-md-6 ps-md-2">
                            <input type="text" name="telephone" class="form-control mb-4" id="telephone"
                                placeholder="Telephone Number*" pattern="[+0-9]{10,16}" value="" required>

                            <select id="country" name="country" class="form-control mb-4">
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Åland Islands">Åland Islands</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antarctica">Antarctica</option>
                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bermuda">Bermuda</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Bouvet Island">Bouvet Island</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Christmas Island">Christmas Island</option>
                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo">Congo</option>
                                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of
                                    The</option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cote D'ivoire">Cote D'ivoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="French Southern Territories">French Southern Territories</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Guam">Guam</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guernsey">Guernsey</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guinea-bissau">Guinea-bissau</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands
                                </option>
                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Isle of Man">Isle of Man</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jersey">Jersey</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's
                                    Republic of</option>
                                <option value="Korea, Republic of">Korea, Republic of</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic
                                </option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macao">Macao</option>
                                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former
                                    Yugoslav Republic of</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                <option value="Moldova, Republic of">Moldova, Republic of</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montenegro">Montenegro</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Namibia">Namibia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Niue">Niue</option>
                                <option value="Norfolk Island">Norfolk Island</option>
                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau">Palau</option>
                                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Pitcairn">Pitcairn</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Reunion">Reunion</option>
                                <option value="Romania">Romania</option>
                                <option value="Russian Federation">Russian Federation</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="Saint Helena">Saint Helena</option>
                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                <option value="Saint Lucia">Saint Lucia</option>
                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines
                                </option>
                                <option value="Samoa">Samoa</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Serbia">Serbia</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South
                                    Sandwich Islands</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                <option value="Taiwan">Taiwan</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Timor-leste">Timor-leste</option>
                                <option value="Togo">Togo</option>
                                <option value="Tokelau">Tokelau</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                                <option value="United States Minor Outlying Islands">United States Minor Outlying
                                    Islands</option>
                                <option value="Uruguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Viet Nam">Viet Nam</option>
                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                <option value="Western Sahara">Western Sahara</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>

                            <input type="text" name="ct" class="form-control mb-4" id="ct" placeholder="City/Town"
                                value="">
                            <textarea name="message" placeholder="Message" class="form-control mb-4" id="message"
                                value="" style="min-height: 100px !important;"></textarea>
                        </div>
                        <div class="col-12">
                            <button class="btn-lg btn-success-custom fw-bold fs-5 col-lg-2 col-md-4 col-6 py-3"
                                name="btn_send" type="submit">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTACT FORM SECTION -->

    <div class="container my-5 pt-1 bg-dark-custom3"></div>

    <!-- MORE DETAILS SECTION -->
    <div class="container-fluid px-lg-5 p-3">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3">
                    <h1>Need some help formulating your idea and requirements?</h1>
                </div>
                <div class="col-12 mb-3">
                    <p class="fs-5 text-secondary mb-5">In order for us to better understand your idea, a great first
                        step is to complete our Getting Started Form. Designed to help get your ideas off the ground,
                        this information will quickly communicate to us what you have in mind, and will ensure you can
                        get the most of your free consultation.</p>
                    <p class="fs-5 text-secondary">We respect your privacy and any privileged information you share with
                        us will remain confidential.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- MORE DETAILS SECTION -->

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
    $(".msg").fadeTo(2500, 500).fadeOut(3500);
    /*=========================
BOOTSTRAP FORM VALIDATION
=========================*/
    (function() {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })();
    </script>