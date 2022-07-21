<html>
<head>
    <?php
    include ('getData.php');
    ?>
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

     <section class="slice slice-lg pt-lg-4 pb-0 pb-lg-6 bg-section-secondary">
        <div class="container">
                <div class="btn-group mb-1">
                    <button type="button" onclick="calibrate()" class="ml-2 btn-sm btn-success"><span class="fa fa-ruler"></span> Kalibrasi Warna</button>
                </div>
                <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col"><b>No</b></th>
                    <th scope="col"><b>Warna</b></th>
                    <th scope="col"><b>Latitude</b></th>
                    <th scope="col"><b>Longitude</b></th>
                    <th scope="col"><b>Jumlah Satelit</b></th>
                    <th scope="col"><b>Keterangan</b></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td class="text-center">
                        <?php 
                            if($my_array[0]['warna']=='red') : ?>
                                <div class="box red"></div>
                        <?php elseif($my_array[0]['warna'] == 'green') : ?>
                                <div class="box green"></div>
                        <?php elseif($my_array[0]['warna'] == 'blue') : ?>
                                <div class="box blue"></div>
                        <?php endif; ?>
                    </td>
                    <td><?= $my_array[0]['latitude']; ?></td>
                    <td><?= $my_array[0]['longitude']; ?></td>
                    <td><?= $my_array[0]['jumlah_satelite']; ?></td>
                    <td>
                        <?php if($my_array[0]['warna'] == 'red') : ?>
                            Merah
                        <?php elseif($my_array[0]['warna'] == 'green') : ?>
                            Hijau
                        <?php elseif($my_array[0]['warna'] == 'blue') : ?>
                            Biru
                        <?php else : ?>
                            unknown
                        <?php endif; ?>
                    </td>
                    </tr>
                </tbody>
            </table>
            <div id="kotak3" class="kotak3 ml-2 col-lg mb-2"></div>
        </div>
    </section>
</body>
</html>