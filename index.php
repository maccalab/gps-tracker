<html>
<head>
    <title>GPS Tracker</title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Webpixels">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZfY-JkAcnh_Oip-_6-MA6aecRwU_CMsw"></script>
	<script src="assets/libs/jquery/dist/jquery.min.js"></script>
	<script src="js/main.js"></script>
    <style>
        @keyframes hidePreloader {
            0% {
                width: 100%;
                height: 100%;
            }

            100% {
                width: 0;
                height: 0;
            }
        }

        body>div.preloader {
            position: fixed;
            background: white;
            width: 100%;
            height: 100%;
            z-index: 1071;
            opacity: 0;
            transition: opacity .5s ease;
            overflow: hidden;
            pointer-events: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        body:not(.loaded)>div.preloader {
            opacity: 1;
        }

        body:not(.loaded) {
            overflow: hidden;
        }

        body.loaded>div.preloader {
            animation: hidePreloader .5s linear .5s forwards;
        }
    </style>
    <script>
        window.addEventListener("load", function() {
            setTimeout(function() {
                document.querySelector('body').classList.add('loaded');
            }, 300);
        });
    </script>
    <!-- Favicon -->
    <link rel="icon" href="assets/assets/img/brand/favicon.png" type="image/png"><!-- Font Awesome -->
    <link rel="stylesheet" href="assets/libs/@fortawesome/fontawesome-free/css/all.min.css">
    <!-- Quick CSS -->
    <link rel="stylesheet" href="assets/css/quick-website.css" id="stylesheet">
</head>
<body onload="maps()">
    <!-- Preloader -->
    <div class="preloader">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
	<!-- <div id="kotak3" class="kotak3"></div> -->

     <section class="slice slice-lg pt-lg-6 pb-0 pb-lg-6 bg-section-secondary">
        <div class="container">
            <!-- Title -->
            <!-- Section title -->
            <div class="row justify-content-center text-center">
                <div class="col-lg-9">
                    <h2 class="">GPS Tracker</h2>
                </div>
            </div>
            <div class="btn-group mb-1">
                    <button type="button" onclick="calibrate()" class="ml-2 btn-sm btn-success"><span class="fa fa-search"></span> Kalibrasi</button>
                </div>
            <div id="kotak3" class="kotak3 ml-2 col-lg mb-2"></div>
        </div>
    </div>
    </section>
</body>
</html>