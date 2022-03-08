<?php
    require "header.php";

    /*if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $msg=$_POST['query'];
        $sql="INSERT INTO contact (name, email, mobile, query) VALUES ('$name','$email','$mobile','$msg')";
        $query=mysqli_query($conn,$sql);
        echo "Massage Sent";
    }else{
        echo "Massage Not Sent";
    }*/
    if(isset($_POST['submit'])){
		$name=$_POST['name'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $msg=$_POST['query'];
			
		
		$sql_add="INSERT INTO contact (name,email,mobile,query) VALUES ('$name','$email','$mobile','$msg')";
		$add_query=mysqli_query($conn,$sql_add);
		
	    $msgs="Massage Sent";
	
	}else{
        $msgs="No Massage Sent";
    }

?>


        <!-- Start Bradcaump area -->
            <!--Page Header Image start-->
            <div style="background-image: url('images/banner/4.jpg'); background-size: cover; height: 150px;"> 
                             <div style="text-align: center;  height: 150px; padding-top: 60px;">   <a class="breadcrumb-item" href="index.html">Home</a>
                                <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                <span class="breadcrumb-item active">Contact</span></div>
            </div>
        
             <!--Page Header Image End-->
        <!-- End Bradcaump area -->
        
        <!-- Start Contact Area -->
        <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                        <div class="map-contacts--2">
                            <div id="googleMap"></div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                        <h2 class="title__line--6">CONTACT US</h2>
                        <div class="address">
                            <div class="address__icon">
                                <i class="icon-location-pin icons"></i>
                            </div>
                            <div class="address__details">
                                <h2 class="ct__title">our address</h2>
                                <p>666 5th Ave New York, NY, United </p>
                            </div>
                        </div>
                        <div class="address">
                            <div class="address__icon">
                                <i class="icon-envelope icons"></i>
                            </div>
                            <div class="address__details">
                                <h2 class="ct__title">openning hour</h2>
                                <p>666 5th Ave New York, NY, United </p>
                            </div>
                        </div>

                        <div class="address">
                            <div class="address__icon">
                                <i class="icon-phone icons"></i>
                            </div>
                            <div class="address__details">
                                <h2 class="ct__title">Phone Number</h2>
                                <p>123-6586-587456</p>
                            </div>
                        </div>
                    </div>      
                </div>
                <div class="row">
                    <div class="contact-form-wrap mt--60">
                        <div class="col-xs-12">
                            <div class="contact-title">
                                <h2 class="title__line--6">SEND A MAIL</h2>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <style>
                                form{
                                    width: 60%;
                                }

                                input[type=text], input[type=email]{
                                width: 100%;
                                margin-bottom: 10px;
                                border: 1px solid #c43b68;
                                border-radius: 5px;
                                }

                                textarea {
                                resize: none;
                                background: #ffffff;
                                border: 1px solid #c43b68;
                                padding: 10px;
                                width: 100%;
                                font-size: 14px;
                                border-radius: 5px;
                                }

                                input[placeholder=Name],input[placeholder=Email],input[placeholder=Mobile],input[placeholder=Massage] {
                                padding-left: 10px;
                                color: #c43b68;
                                }

                                button, html input[type="button"], input[type="reset"], input[type="submit"] {
                                -webkit-appearance: button;
                                cursor: pointer;
                                width: 20%;
                                height: 40px;
                                margin-left: 23px;
                                border-radius: 6px;
                                border: 1px solid #c43b68;
                                background-color: #c43b68;
                                color: white;
                                font-size: large;
                                font-weight: 600;
                                }
                            </style>
                            <form action="" method="post">
                                
                                <div>
                                    <input type="text" id="name" name="name" placeholder="Name" required="Name Required">
                                    <input type="email" id="email" name="email" placeholder="Email" required="Email Required">
                                    <input type="text" id="mobile" name="mobile" placeholder="Mobile" required="Mobile Required">
                                </div>
                                
                                    <div>
                                        <textarea name="query" id="query" placeholder="Massage" required="Massage Required"></textarea>
                                    </div>
                                </div>
                                <div>
                                    <input type="submit" name="submit" value="Submit">
                                </div>
                            </form>
                            <div><?php echo $msgs; ?></div>
                            
                        </div>
                    </div> 
                </div>
            </div>
        </section>
        <!-- End Contact Area -->


    <!-- Google Map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmGmeot5jcjdaJTvfCmQPfzeoG_pABeWo "></script>
    <script src="js/contact-map.js"></script>
    <script>
        // When the window has finished loading create our google map below
        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 12,

                scrollwheel: false,

                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(23.7286, 90.3854), // New York

                // How you would like to style the map. 
                // This is where you would paste any style found on Snazzy Maps.
                 styles: 
        [ {
                "featureType": "all",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "saturation": 36
                    },
                    {
                        "color": "#000000"
                    },
                    {
                        "lightness": 40
                    }
                ]
            },
            {
                "featureType": "all",
                "elementType": "labels.text.stroke",
                "stylers": [
                    {
                        "visibility": "on"
                    },
                    {
                        "color": "#000000"
                    },
                    {
                        "lightness": 16
                    }
                ]
            },
            {
                "featureType": "all",
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "administrative",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#000000"
                    },
                    {
                        "lightness": 20
                    }
                ]
            },
            {
                "featureType": "administrative",
                "elementType": "geometry.stroke",
                "stylers": [
                    {
                        "color": "#000000"
                    },
                    {
                        "lightness": 17
                    },
                    {
                        "weight": 1.2
                    }
                ]
            },
            {
                "featureType": "landscape",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#000000"
                    },
                    {
                        "lightness": 20
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#000000"
                    },
                    {
                        "lightness": 21
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#000000"
                    },
                    {
                        "lightness": 17
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [
                    {
                        "color": "#000000"
                    },
                    {
                        "lightness": 29
                    },
                    {
                        "weight": 0.2
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#000000"
                    },
                    {
                        "lightness": 18
                    }
                ]
            },
            {
                "featureType": "road.local",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#000000"
                    },
                    {
                        "lightness": 16
                    }
                ]
            },
            {
                "featureType": "transit",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#000000"
                    },
                    {
                        "lightness": 19
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#141516"
                    },
                    {
                        "lightness": 17
                    }
                ]
            }
        ]
            };

            // Get the HTML DOM element that will contain your map 
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('googleMap');

            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);

            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(23.7286, 90.3854),
                map: map,
                title: 'Ramble!',
                icon: 'images/icons/map-2.png',
                animation:google.maps.Animation.BOUNCE

            });
        }
    </script>


 <?php
    require "footer.php";
 ?>