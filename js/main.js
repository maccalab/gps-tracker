var peta;
var mapsLat;
var mapsLng;

function maps() {
	var options=
	{
		zoom:14,
		center:new google.maps.LatLng(-0.884621, 119.897442)
	};
	peta=new google.maps.Map(document.getElementById("kotak3"), options);

	$.ajax({
		url: "http://localhost/maps-gps-tracker/getMarker.php",
		method: "post",
		dataType: "json",
		success: function (data) {
			mapsLat = data.latitude;
			mapsLng = data.longitude;
		  for (var i = 0; i < data.length; i++) {
			displayLocation(data[i]);
		  }
		},
	  });
}

function displayLocation(location) {
	var geocoder = new google.maps.Geocoder();
	var infowindow = new google.maps.InfoWindow();
	var content = '<div class="infoWindow">Warna : <strong>' + location.warna + "</strong>" + "<br/>" + "Latitude : " + "<strong>" + location.latitude + "</strong>" +"<br/>"+ "Longitude : " + "<strong>" + location.longitude + "</strong>" + "<br>" +"Jumlah Satelite : " + "<strong>" + location.jumlah_satelite + "</strong>" +"</div>";
  
	if (parseInt(location.lat) == 0) {
	  geocoder.geocode({ address: location.address }, function (results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
		  var marker = new google.maps.Marker({
			map: peta,
			icon: icon,
			position: results[0].geometry.location,
			title: location.name,
		  });
  
		  google.maps.event.addListener(marker, "click", function () {
			infowindow.setContent(content);
			infowindow.open(map, marker);
		  });
		}
	  });
	} else {
	  var position = new google.maps.LatLng(parseFloat(location.latitude), parseFloat(location.longitude));
	  var marker = new google.maps.Marker({
		map: peta,
		// icon: icon,
		position: position,
		title: location.name,
	  });
  
	  google.maps.event.addListener(marker, "click", function (event) {
		infowindow.setContent(content);
		infowindow.open(peta, marker);
	  });
	}
}

function calibrate(){
	$.ajax({
		type: "GET",
		url: "http://localhost/maps-gps-tracker/calibrate.php",
		success: function(response) {
			console.log('Calibrating ..');
			alert('Sensor Calibrated');
		},
		error : function(req, err){
			console.log('Error'+err);
		}
	});
}