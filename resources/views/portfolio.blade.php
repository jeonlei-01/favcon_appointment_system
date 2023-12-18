<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="Portfolio.css"> -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="{{ asset('css/portfolio.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/Logo.png') }}" type="image/x-icon">
    <title>Portfolio</title>
</head>
<body>

    <!-- ======== Header ======== -->
    <div style="box-shadow: 0 2px 4px 0 rgba(0,0,0,.5);" class="header">
        <div class="logo">
        <a href="portfolio"><img src="{{asset ('images/Logo.png')}}" alt="Logo"></a>
        </div>
        <nav>
            <ul>
                <li><a class="active" href="portfolio">Portfolio</a></li>
                <li><a href="advocacy">Experience</a></li>
                <li><a href="about">About</a></li>
                <li><a href="contact">Contact</a></li> &nbsp;
                <div class="language-selector">
                    <button class="current-language" style="display:none;">
                        <img src="{{ asset('images/US.png') }}" alt="USA Flag">
                        English
                    </button>
                    <ul class="language-list">
                        <li>
                            <a  href="portfolio/">
                                <img src="{{ asset('images/US.png') }}" alt="USA Flag">{{__('messages.English')}}
                            </a>
                        </li>
                        <li>
                            <a  href="portfolio/">
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

    <!-- ======== Header ======== -->

    <div class="main">
        <div class="home" id="home">
            <div class="left text">
                <span>Hello, I'm</span><br>
                <h1>{{ __('messages.Portfolio Landing Header')}}</h1>
                <h1><span class="typing1"></span></h1><br>

                <p>I help businesses grow through the power of digital
                    marketing and creative strategy.</p>
                <p>Learn more about my award-winning tactics and experience!</p>
              
                <div class="buttons">
                    <button class="btn"><a href="contact">{{__('messages.Portfolio Landing Button')}}</a></button>
                </div>
            </div>
            <div class="image">
                <img src="{{ asset('images/faviodp.png') }}" alt="Profile">
            </div>
        </div><br><br>


        <!-- ====== for the project section ======== -->
        <div class="project" id="project">
            <div class="title aboutTxt">
                <span>{{__('messages.Portfolio Landing Project Header')}} </span>
            </div>
        </div>
        <div class="background">

        </div>
        <div class="project">

            <div class="carousel-container">

                <div class="carousel">

                    <div class="card_project">
                        <img src="{{ asset('images/aphelion.png') }}" alt="Aphelion">
                        <div class="card-content">
                            <h2>{{__('messages.Portfolio Landing Project Card Two Header')}}</h2><br><br>
                            <p> {{__('messages.Portfolio Landing Project Card Two Description')}}</p>

                            <button onclick="document.getElementById('id02').style.display='block'" class="btn"
                                style="font-size: 12px;font-weight: bold; margin-bottom: 1rem;"><a href="#">{{__('messages.Read More Button')}}</a>
                            </button>

                            <div id="id01" class="w3-modal">
                                <div class="w3-modal-content">
                                    <div class="w"
                                        style="background-image: url({{ asset('images/aboutb.png') }}); background-repeat: no-repeat; background-size: cover;">
                                        <span onclick="document.getElementById('id01').style.display='none'"
                                            class="w3-button w3-display-topright" style="color: red;">&times;</span>
                                        <h5 style="padding: 3rem; text-align: justify; color: black; margin-top: 7rem;">
                                        <li>{{__('messages.Portfolio Landing Project Card One Description 1')}}</li>
                                        <li>{{__('messages.Portfolio Landing Project Card One Description 2')}}</li>
                                        </h5>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card_project">
                        <img src="{{ asset('images/teamliquid.png') }}" alt="TeamLiquid">
                        <div class="card-content">
                            <h2>{{__('messages.Portfolio Landing Project Card One Header')}}</h2><br>
                            <p>{{__('messages.Portfolio Landing Project Card One Description')}}</p>
                            <button onclick="document.getElementById('id01').style.display='block'" class="btn"
                                style="font-size: 12px;font-weight: bold; margin-bottom: 1rem;"><a href="#">{{__('messages.Read More Button')}}</a>
                            </button>

                            <div id="id02" class="w3-modal">
                                <div class="w3-modal-content">
                                    <div class="w"
                                        style="background-image: url({{ asset('images/aboutb.png') }}); background-repeat: no-repeat; background-size: cover;">
                                        <span onclick="document.getElementById('id02').style.display='none'"
                                            class="w3-button w3-display-topright" style="color: red;">&times;</span>
                                        <h5 style="padding: 3rem; text-align: justify; color:black; margin-top: 7rem;">
                                        <li>{{__('messages.Portfolio Landing Project Card Two Description 1')}}</li>
                                        <li>{{__('messages.Portfolio Landing Project Card Two Description 2')}}</li>
                                        <li>{{__('messages.Portfolio Landing Project Card Two Description 3')}}</li>
                                        <li>{{__('messages.Portfolio Landing Project Card Two Description 4')}}</li>
                                        </h5>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Add more card elements if needed -->
                </div>
                <i id="left" style=" margin-left: 1rem; background-color:#F8AF5B ;" class="fa-solid fa-angle-left"></i>
                <i id="right" style=" background-color:#F8AF5B ;" class="fa-solid fa-angle-right"></i>


            </div>
        </div>
    </div>
    <!-- ====== end of the project section ======== -->


    <!-- ====== for the services section ======== -->
    <div class="services" id="services">
        <div class="servicesTxt title">
            <span>{{__('messages.Portfolio Landing Services Header')}}</span>
        </div><br><br><br>
        <div class="serviceBox">
            <div class="box">
                <div class="card">
                    <div class="icon">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                    <div>
                        <div class="text">{{__('messages.Portfolio Landing Services Card One Header')}}</div><br>
                        <p>{{__('messages.Portfolio Landing Services Card One Description')}}</p><br>
                        <span class="click-span" style="color: #FF7C03; cursor: pointer;font-size: small;">{{__('messages.Read More Button')}}
                        </span>
                        <div class="modal">
                            <div class="modal-content">
                                <span class="close-btn">&times;</span>
                                <h2>{{__('messages.More about')}}</h2>
                                <p>{{__('messages.Portfolio Landing Services Card One Modal Description')}}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="box">
                <div class="card">
                    <div class="icon">
                        <i class="fa-solid fa-chart-pie"></i>
                    </div>
                    <div>
                        <div class="text">{{__('messages.Portfolio Landing Services Card Two Header')}}</div><br>
                        <p>{{__('messages.Portfolio Landing Services Card Two Description')}}</p><br><br><br><br>
                        <span class="click-test"
                            style="color: #FF7C03; cursor: pointer;font-size: small;">{{__('messages.Read More Button')}}</span>
                        <div class="test">
                            <div class="modal-content">
                                <span class="close-test">&times;</span>
                                <h2>{{__('messages.More about')}}</h2>
                                <p>{{__('messages.Portfolio Landing Services Card Two Modal Description')}}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="box">
                <div class="card">
                    <div class="icon">
                        <i class="fa-solid fa-brush"></i>
                    </div>
                    <div>
                        <div class="text">{{__('messages.Portfolio Landing Services Card Three Header')}}</div><br>
                        <p>{{__('messages.Portfolio Landing Services Card Three Description')}}</p><br><br><br>
                        <span class="click-third"
                            style="color: #FF7C03; cursor: pointer;font-size: small;">{{__('messages.Read More Button')}}</span>
                        <div class="third">
                            <div class="modal-content">
                                <span class="close-third">&times;</span>
                                <h2> {{__('messages.More about')}}</h2>
                                <p>{{__('messages.Portfolio Landing Services Card Three Modal Description')}}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="box">
                <div class="card">
                    <div class="icon">
                        <i class="fa-solid fa-pencil"></i>
                    </div>
                    <div>
                        <div class="text">{{__('messages.Portfolio Landing Services Card Four Header')}}</div>
                        <p>{{__('messages.Portfolio Landing Services Card Four Description')}}</p><br><br><br><br>
                        <span class="click-fourt"
                            style="color: #FF7C03; cursor: pointer;font-size: small;">{{__('messages.Read More Button')}}</span>
                        <div class="fourt">
                            <div class="modal-content">
                                <span class="close-fourt">&times;</span>
                                <h2> {{__('messages.More about')}} </h2>
                                <p>{{__('messages.Portfolio Landing Services Card Four Modal Description')}}</p>v
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ====== end of the services section ======== -->


    <!-- ============== for the looking expert section =============== -->
    <div class="looking" id="looking">

        <div class="lets" id="lets">
            <div class="consult">
                <p style="color: #660808; margin-top: -5rem;">{{__('messages.Portfolio Landing Footer Subheader')}}</p><br><br>
                <h1 style="font-size: 3rem;color: white;text-shadow: 2px 2px #7d7c7c; font-weight: bold;">{{__('messages.Portfolio Landing Footer Header')}}
                </h1>
                <div class="buttons">
                    <button style="border: 3px solid #FF7C03;" class="btn"><a href="./contact">{{__('messages.Portfolio Landing Footer Button')}}</i></a></a></button>
                </div>
            </div>
        </div>
        <br><br>

    </div>
    <!-- ============== end of the looking expert section =============== -->


    <div class="f-footer" id="f-footer">

        <ul>
            <li><a href="./portfolio">{{__('messages.Portfolio')}}</a></li>
            <li><a href="./advocacy">Experience</a></li>
            <li><a href="./about">{{__('messages.About')}}</a></li>
            <li><a href="./contact">{{__('messages.Contact')}}</a></li>
        </ul>
        <hr>


        <div class="footer">

            <div class="socialIcons">
                <h6 style="font-size: 10px;">{{__('messages.Portfolio Landing Footer Ending Button')}}</h6>
                <a href="https://instagram.com/faviojasso?igshid=YWYwM2I1ZDdmOQ=="><i class="fa-brands fa-instagram"></i></a>
                <!-- <a><i class="fa-brands fa-facebook"></i></a> -->
                <a href="https://github.com/FavioJasso"><i class="fa-brands fa-github"></i></a>
                <a href="https://twitter.com/FavioJasso"><i class="fa-brands fa-twitter"></i></a>
            </div>
            <div class="copy">
            {{__('messages.Portfolio Landing Footer Credits')}}
            </div>

        </div>

        <div class="topBtn">
            <a href="#"><i class="fa-solid fa-angle-up"></i></a><br><br>
        </div>
        <script src="{{ asset('js/scroll.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
        <script src="{{ asset('js/portfolio.js') }}"></script>

</body>

</html>