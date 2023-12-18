<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/contact.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/Logo.png') }}" type="image/x-icon">
    <title>Contact</title>
</head>

<body>
    <!-- ======== Header ======== -->
    <div style="box-shadow: 0 2px 4px 0 rgba(0,0,0,.5);" class="header">
        <div class="logo">
        <a href="portfolio"><img src="{{asset ('images/Logo.png')}}" alt="Logo"></a>
        </div>
        <nav>
            <ul>
                <li><a href="portfolio">Portfolio</a></li>
                <li><a href="advocacy">Experience</a></li>
                <li><a href="about">About</a></li>
                <li><a class="test" href="contact">Contact</a></li>&nbsp;
                <div class="language-selector">
                    <button class="current-language" style="display:none;">
                        <img src="{{ asset('images/US.png') }}" alt="USA Flag">
                        English
                    </button>
                    <ul class="language-list">
                        <li>
                            <a href="/contact/en">
                                <img src="{{ asset('images/US.png') }}" alt="USA Flag">{{__('messages.English')}}
                            </a>
                        </li>
                        <li>
                            <a href="/contact/es">
                                <img src="{{ asset('images/spain.png') }}">{{__('messages.Espanol')}}
                            </a>
                        </li>

                    </ul>
                </div>
            </ul>
            <div class="bar">
                <i class="open fa-solid fa-bars"></i>
                <i class="close fa-solid fa-xmark"></i>
            </div>
        </nav>
    </div>

    <!-- ======== End for Header ======== -->


    <!-- /* ------------- for the firts section ------------------ */ -->

    <br><br><br><br><br><br><br>
    <div class="main">
        <div class="container">
            <h1>
                Let's tell the story <br> about your business.
            </h1><br>
            <p>My goal?</p><br>
            <p class="smd">To tell your business's story in the best and most <br> marketable way
                possible while achieving your <br> marketing, branding, and advertising objectives. <br>
                <a href="">
                    <img src="{{ asset('images/arrow-down.png') }}" alt="ArrowDown">
                </a>
            </p>
        </div>

    </div><br><br>
    <!-- /* ------------- end for the firts section ------------------ */ -->



    <!-- /* ------------- for the second section ------------------ */ -->



    <!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->

    <form action="{{ route('contact.book') }}" method="POST">
        @csrf

        <h2>Select Service</h2>
        <div class="selectOption">
            <p>Set up consulting Today!</p><br>
            <center>
                <div class="custom-select">
                    <select name="service_id" id="service_id">
                        <option>Select Option:</option>
                        @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->type }}</option>
                        @endforeach
                    </select>
                </div>
                <center>
        </div>

    </form>






    <!-- /* ------------- end for the second section ------------------ */ -->


    <br><br><br><br><br><br>

    <!-- ============== for the calendar ============  -->

    <h2>Select Time</h2>
    <div class="container1">

        <div class="calendar">
            <div class="month">
                <i class="fas fa-angle-left prev"></i>
                <div class="date">
                    <h1></h1>
                    <p></p>
                </div>
                <i class="fas fa-angle-right next"></i>
            </div>
            <div class="weekdays">
                <div>SUN</div>
                <div>MON</div>
                <div>TUE</div>
                <div>WED</div>
                <div>THU</div>
                <div>FRI</div>
                <div>SAT</div>
            </div>
            <div class="days"></div>
        </div>


        <div class="schedule">
            <div class="time">

            </div>
            <div class="test"></div>
            <div class="shadow">

            </div>

            <div class="standardTime">
                <small>
                    US Eastern standard time
                </small>
            </div>

        </div>

    </div>





    <br>
    <!-- -------------------- for the details ------------------------------ -->

    <h2>Add your details</h2>

    <div class="contact" id="contact">
        <div class="contactBox">
            <div class="left">

                <form action="submit">
                    <br><br>
                    <div class="genInfo">
                        <input type="text" placeholder="Name" class="name" id="submit-name" required>
                        <input type="email" placeholder="Email" class="email" id="submit-email" required>
                    </div>
                    <div class="subject">
                        <input type="text" placeholder="Address" id="submit-address" required>
                        <input type="text" placeholder="Phone Number" id="submit-phone-no" required>
                    </div><br>
                    <div class="remind" >
                        <h5>
                            <img src="{{ asset('images/qmark.png') }}" alt="QuestionMark">
                            <small>
                                Please share some details about your project.
                            </small>
                        </h5>

                        <!-- <input type="text"  placeholder="Please share some details about your project."> -->
                    </div>
                    <div class="message">
                        <textarea name="message" rows="5" placeholder="Notes" id="submit-note"></textarea>
                    </div>

                </form>
            </div>

        </div>
    </div>

    <div class="booking">
        <div>
            <small>
                By clicking below you agree to these <span onclick="openPrivacyPolicyModal()">Privacy Policies</span>
            </small>
            <div>
                <button class="btnBook" onclick="openConfirmationModal()"> Book Now </button>
                <div class="inline-notification success"><b>Thanks for contacting us! We will get in touch with you
                        shortly.</b></div>
                <div class="inline-notification error"><b>Failed! Please fill in all the required fields.</b></div>
                <div class="inline-notification invalid-email-notification"><b>Invalid email address. Please use a
                        correct Gmail address format.</b></div>
            </div>
        </div>
    </div>
    <hr class="hr"><br>



    <!-- ======== Footer ======== -->
    <div class="f-footer" id="f-footer">
        <ul>
            <li><a href="./portfolio">Portfolio</a></li>
            <li><a href="./advocacy">Experience</a></li>
            <li><a href="./about">About Me</a></li>
            <li><a href="./contact">Contact</a></li>
        </ul>
        <hr>

    </div>

    <div class="footer">

        <div class="socialIcons">
            <h6 style="font-size: 10px;">FOLLOW ME</h6>
            <a href="https://instagram.com/faviojasso?igshid=YWYwM2I1ZDdmOQ=="><i
                    class="fa-brands fa-instagram"></i></a>
            <!-- <a><i class="fa-brands fa-facebook"></i></a> -->
            <a href="https://github.com/FavioJasso"><i class="fa-brands fa-github"></i></a>
            <a href="https://twitter.com/FavioJasso"><i class="fa-brands fa-twitter"></i></a>
        </div>
        <div class="copy">
            © Copyright. All rights reserved.
        </div>

    </div>

    <div class="topBtn">
        <a href="#"><i class="fa-solid fa-angle-up"></i></a><br><br>
    </div>

    <form action="{{ route('get.schedule') }}" method="POST" id="get-service">
        @csrf
        <input type="hidden" name="schedule_id" value="#">
    </form>

    <form action="{{ route('contact.book') }}" method="POST" id="final-request">
        @csrf
        <input type="hidden" name="service_id" id="service">
        <input type="hidden" name="schedule_id" id="schedule">
        <input type="hidden" name="timeslot_id" id="timeslot">
        <input type="hidden" name="name" id="name">
        <input type="hidden" name="email" id="email">
        <input type="hidden" name="address" id="address">
        <input type="hidden" name="phone_no" id="phone_no">
        <input type="hidden" name="notes" id="notes">
    </form>
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <p>Are you sure you want to book this appointment?</p>
            <button id="confirmButton" onclick="confirmBooking()">Yes</button>
            <button id="cancelButton" onclick="cancelBooking()">Cancel</button>
        </div>
    </div>

    <div id="privacyPolicyModal" class="modal2">
        <div class="modal-content2">
            <h4 style="text-align:center">Privacy Policy of FavioJasso.com</h4>

            <p style="text-align:justify">Favio Jasso operates the FavioJasso.com website, which provides Data and
                Marketing Analytics consulting and services.</p>
            <p style="text-align:justify">This page is used to inform website visitors regarding our policies with the
                collection, use, and disclosure of Personal Information if anyone decided to use our Service, the
                FavioJasso.com website.</p>
            <p style="text-align:justify">If you choose to use our Service, then you agree to the collection and use of
                information in relation with this policy. The Personal Information that we collect is used for providing
                and improving the Service. We will not use or share your information with anyone except as described in
                this Privacy Policy.</p>
            <p style="text-align:justify">The terms used in this Privacy Policy have the same meanings as in our Terms and
                Conditions, which is accessible at Website URL, unless otherwise defined in this Privacy Policy.</p>
            <h4 style="text-align:center">Information Collection and Use</h4>
            <p style="text-align:justify">For a better experience while using our Service, we may require you to provide us
                with certain personally identifiable information, including but not limited to your name, phone number,
                and postal address. The information that we collect will be used to contact or identify you.</p>
            <h4 style="text-align:center">Log Data</h4>
            <p style="text-align:justify">We want to inform you that whenever you visit our Service, we collect information
                that your browser sends to us that is called Log Data. This Log Data may include information such as
                your computer's Internet Protocol (“IP”) address, browser version, pages of our Service that you visit,
                the time and date of your visit, the time spent on those pages, and other statistics.</p>
            <h4 style="text-align:center">Cookies</h4>
            <p style="text-align:justify">Cookies are files with a small amount of data that is commonly used as an
                anonymous unique identifier. These are sent to your browser from the website that you visit and are
                stored on your computer's hard drive.</p>
            <p style="text-align:justify">Our website uses these “cookies” to collect information and to improve our
                Service. You have the option to either accept or refuse these cookies, and know when a cookie is being
                sent to your computer. If you choose to refuse our cookies, you may not be able to use some portions of
                our Service.</p>
            <h4 style="text-align:center">Service Providers</h4>
            <p style="text-align:justify">We may employ third-party companies and individuals due to the following reasons:</p>
            <p style="margin-left: 30%">◉ To facilitate our Service;</p>
            <p style="margin-left: 30%">◉ To provide the Service on our behalf;</p>
            <p style="margin-left: 30%">◉ To perform Service-related services; or</p>
            <p style="margin-left: 30%">◉ To assist us in analyzing how our Service is used.</p>
            <p style="text-align:justify">We want to inform our Service users that these third parties have access to your Personal Information. The
            reason is to perform the tasks assigned to them on our behalf. However, they are obligated not to disclose
            or use the information for any other purpose.</p>
            <h4 style="text-align:center">Security</h4>
            <p style="text-align:justify">We value your trust in providing us your Personal Information, thus we are striving to use commercially
            acceptable means of protecting it. But remember that no method of transmission over the internet, or method
            of electronic storage is 100% secure and reliable, and we cannot guarantee its absolute security.</p>
            <h4 style="text-align:center">Links to Other Sites</h4>
            <p style="text-align:justify">Our Service may contain links to other sites. If you click on a third-party link, you will be directed to
            that site. Note that these external sites are not operated by us. Therefore, we strongly advise you to
            review the Privacy Policy of these websites. We have no control over, and assume no responsibility for the
            content, privacy policies, or practices of any third-party sites or services.</p>
            <br>
            <p style="text-align:justify">Children's Privacy</p>
            <p style="text-align:justify">Our Services do not address anyone under the age of 13. We do not knowingly collect personal identifiable
            information from children under 13. In the case we discover that a child under 13 has provided us with
            personal information, we immediately delete this from our servers. If you are a parent or guardian and you
            are aware that your child has provided us with personal information, please contact us so that we will be
            able to do necessary actions.</p>
            <h4 style="text-align:center">Changes to This Privacy Policy</h4>
            <p style="text-align:justify">We may update our Privacy Policy from time to time. Thus, we advise you to review this page periodically for
            any changes. We will notify you of any changes by posting the new Privacy Policy on this page. These changes
            are effective immediately, after they are posted on this page.</p>
            <h4 style="text-align:center">Contact Us</h4>
            <p style="text-align:justify">If you have any questions or suggestions about our Privacy Policy, do not hesitate to contact us.
            973-234-2073 or fjporras04@gmail.com</p>
        </div>
    </div>

    <script src="{{ asset('js/scroll.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="{{ asset('js/contact.js') }}"></script>


</body>


</html>