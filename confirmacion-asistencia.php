<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Fundacion Markoptic- Save the date</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700,800&display=swap" rel="stylesheet">
    <style>
        html {
            font-size: 14px;
            line-height: 1.5;
        }
        body {
            background-color: #e9e9e9;
            font-family: 'Montserrat', sans-serif;
        }
        .print {
            border: dotted 1px purple;
        }
        .text-dark-purple {
            color: #42276E !important;
        }
        .text-light-purple {
            color: #6C4E9B !important;
        }
        .bg-dark-purple {
            background-color: #42276E !important;
        }
        .bg-light-purple {
            background-color: #6C4E9B !important;
        }
        .btn-purple, .btn-purple:hover {
            background-color: #6C4E9B;
        }
        .btn-purple:active {
            background-color: #42276E !important;
        }
        .btn-purple:disabled {
            background-color: rgb(136, 125, 155) !important;
        }
        #head-section {
            min-height: 450px;
            display: block;
            background-size: cover;
            background-position: top center;  
            background-repeat: no-repeat;
            background-image: url(img/foto-evento-aniv.jpg);
        }
        #banner-hover {
            margin:  0 auto;
            width: 80%;
            /* box-shadow: 0px 1px 1px 1px rgba(0,0,0,0.2); */
        }
        .left-border-purple {
            border-left: solid 4px #42276E;
        }
        .left-border-purple-sm {
            border-left: solid 2px #42276E;
        }
        .bottom-border-purple {
            border-bottom: solid 8px #6C4E9B;
        }
        #title-head {
            font-size: 4rem;
            font-weight: 600;
            line-height: 1;
        }
        #subtitle-head {
            font-size: 2rem;
            font-weight: 300;
        }
        .text-mid-bold {
            font-weight: 600;
            font-size: 1.2rem;
        }
        .footer {
            font-size: 1.2rem;
        }

        @media (max-width: 768px) {
            .left-border-purple {
                border-left: initial;
                border-top: solid 4px #42276E;
            }
            .left-border-purple-sm {
                border-left:initial;
            }

        }

        @media (max-width: 576px) {
            #head-section {
                min-height: 320px;
            }
            #title-head {
                font-size: 2.5rem;
                font-weight: 600;
                line-height: 1;
            }
            #subtitle-head {
                font-size: 1.5rem;
                font-weight: 300;
            }
        }

        @media (max-width: 320px) {
            #head-section {
                min-height: 230px;

            }
            #title-head {
                font-size: 2.5rem;
                font-weight: 600;
                line-height: 1;
            }
            #subtitle-head {
                font-size: 1.2rem;
                font-weight: 300;
            }
        }

    </style>
</head>
<body>
<div class="container-fluid p-0 p-md-5">
    <section class="col-lg-9 p-0 card mx-auto shadow bottom-border-purple rounded-0">
        <div id="head-section" class="w-100"></div>
        <div id="banner-hover" class="bg-white row">
            <div class="col-lg-5 py-md-4 px-4 pt-4 pb-0 text-center d-flex justify-content-center">
                <img src="img/logo_donacion_evnt.png" class="img-fluid align-self-center" style="max-height: 180px;" alt="">
            </div>
            <div class="col-lg-7 p-4">
                <div class="left-border-purple pl-3">
                    <h1 class="text-dark-purple" >
                        <span class="text-light-purple" id='subtitle-head'>5TO ANIVERSARIO</span><br>
                        <span id="title-head">SAVE THE DATE</span>
                    </h1>
                    <p class="text-dark-purple text-mid-bold mb-0">
                        CLUB DE EMPRESARIOS BOSQUES, CDMX.
                    </p>
                    <p class="mb-0 text-light-purple text-mid-bold">
                        MIÉRCOLES 27 DE NOVIEMBRE<br>
                        19:00 - 22:00 HRS.
                    </p>

                </div>
            </div>
        </div>
        <div class="w-75 row mx-auto my-4">
            <div class="col-md-5 mx-auto p-3">
                <h3 class="text-dark-purple font-weight-bolder text-center">Confirma tu asistencia</h3>
                <form id='formConfirmarAsistencia'>
                    <input type="hidden" id='evento' name="evento" value="evento de donacion de protesis y colchon - 5to aniversario">
                    <div class="form-row">
                        <div class="col-12 mb-2">
                            <label for="nombre" class="text-dark-purple">Nombre</label>
                            <input type="text" id="nombre" name='nombre' class="form-control rounded-0" placeholder="Nombre completo" required>
                        </div>
                        <div class="col-12 mb-2">
                            <label for="email" class="text-dark-purple">Correo</label>
                        <input type="email" id='email' name='email' class="form-control rounded-0" placeholder="Correo electrónico" required>
                        </div>
                        <div class="col-12 text-center">
                            <input type="submit" class="btn btn-primary btn-block btn-purple rounded-0 border-0" value="CONFIRMAR">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-7 p-3">
                <h3 class="text-light-purple font-weight-bolder text-center">Agrega el evento a tu calendario</h3>
                <ul class="list-inline text-center">
                    <li class="list-inline-item" style="vertical-align: bottom;">
                        <a href="https://calendar.google.com/event?action=TEMPLATE&tmeid=NGo2ZnRoOWZoN3EwdWFyNGxlbGxidDlua2IgMHI2b3FqNzVuaDAxdmNhdGpsazFiNWc2bmtAZw&tmsrc=0r6oqj75nh01vcatjlk1b5g6nk%40group.calendar.google.com" target="_blank" class="text-dark-purple">
                            <img src="img/google-calendar-icon-png-7.png" alt="" class="img-fluid" style=" width:75px;"><br>
                            <span>Google calendar</span>
                        </a>
                    </li>
                    <li class="list-inline-item text-center">
                        <a href="https://www.fundacionmarkoptic.org.mx/files/evento-con-causa.ics" target="_blank" class="text-dark-purple">
                            <img src="img/calendar-512.png" alt="" class="img-fluid" style=" width:75px;"><br>
                            <span>Agenda digital</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer text-right text-dark-purple mx-auto mr-md-5">
            <ul class="list-inline text-center">
                <li class="list-inline-item mr-2">
                    <a href="http://www.markoptic.mx" target="_blank" class="text-dark-purple">markoptic.mx</a>
                </li>
                <li class="list-inline-item">
                    <a href="https://www.facebook.com/markopticmx/" target="_blank" class="text-dark-purple"><i class="fab fa-facebook fa-lg fa-fw"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="https://twitter.com/markopticmx" target="_blank" class="text-dark-purple"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="https://www.linkedin.com/company/markopticmx/" target="_blank" class="text-dark-purple"><i class="fab fa-linkedin-in fa-lg fa-fw"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="https://www.youtube.com/channel/UCIh2HeU_uwMwDYnEw_IMvLQ" target="_blank" class="text-dark-purple"><i class="fab fa-youtube fa-lg fa-fw"></i></a>
                </li>
                <li class="list-inline-item ml-2 left-border-purple-sm pl-2">
                    MarkopticMx
                </li>
            </ul>
        </div>
    </section>

</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/6eec26e15a.js" crossorigin="anonymous"></script>
<script src="js/confirmarAsistencia.js"></script>
</body>
</html>