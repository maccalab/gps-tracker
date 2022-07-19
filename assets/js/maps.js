var peta;
var icon = "img/marker.png";
var gambarpolygon=false;
var gambarmarker=false;
var gambargaris=false;
var ruteterpendek=false;
var hasilruteterpendek=false;
var lokasiAwal;
var lokasiTujuan;

navigator.geolocation.getCurrentPosition(showPosition);

const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);

const lokasi_tujuan = urlParams.get('lokasi_tujuan')
lokasiTujuan = lokasi_tujuan;

function maps() {
	var pilihan=
	{
		zoom:11,
		center:new google.maps.LatLng(-3.051057, 119.944054)
	};
	peta=new google.maps.Map(document.getElementById("kotak3"), pilihan);

	$.ajax({
		// url: "http://localhost/sipenguji/getMarkerLocation.php",
		url: "http://localhost/ahp/getMarkerLocation.php",
		method: "post",
		dataType: "json",
		success: function (data) {
		  for (var i = 0; i < data.length; i++) {
			displayLocation(data[i]);
		  }
		},
	  });

	  ruteTerpendek();
}

function displayLocation(location) {
	var geocoder = new google.maps.Geocoder();
	var infowindow = new google.maps.InfoWindow();
	var content = '<div class="infoWindow"><strong>' + location.nama_objek_wisata + "</strong>" + "<br/>" + location.latitude + "<br/>" + location.longitude + "</div>";
  
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

function showPosition(position) {
	var currentLocation = position.coords.latitude+','+position.coords.longitude;
	lokasiAwal = currentLocation;
}

//rute terpendek
function ruteTerpendek() {
	var request = {
	//   origin: lokasiAwal,
	  origin: '-0.83055556,119.88472222',
	  destination: lokasiTujuan,
	  travelMode: google.maps.TravelMode['DRIVING'],
	};
  
	ruteService = new google.maps.DirectionsService();
  
	ruteService.route(request, function (response, status) {
	  if (status == google.maps.DirectionsStatus.OK) {
		ruteTampil = new google.maps.DirectionsRenderer();
		ruteTampil.setDirections(response);
		ruteTampil.setMap(peta);
		var jarak = response.routes[0].legs[0].distance.text;
		$('#jarak').html('Jarak : '+jarak);
	  } else {
		console.log(response);
		alert("Informasi rute tidak ditemukan!");
	  }
	  no = 1;
	});
}

function gambarpoly(poly) {
	var polygon = new google.maps.Polygon({
		paths: poly,
		strokeColor: '#FF0000',
		strokeOpacity: 0.8,
		strokeWeight: 2,
		fillColor: '#FF0000',
		fillOpacity: 0.35
	});
	polygon.setMap(peta);
}

function buatgaris() {
	jQuery.ajax({
		type:"POST",
		url:"lihatjalangraph.php",
		dataType:"json",
		success: function(result) {
			for (var i = 0; i < result.length; i++) {
				poly=[];
				x=JSON.parse(result[i]);
				for (var j = 0; j < x.length; j++) {
					poly.push(new google.maps.LatLng(x[j][0], x[j][1]));
				};
				polyline(poly);
			};
		},
		error:function () {
			console.log("Error")
		}
	});
}

function polyline() {
	var garis = new google.maps.Polyline({
		path:poly,
		strokeColor: 'gray',
		strokeWeight: 5
	});
	garis.setMap(peta);
}
function buattitik(lokasi, latitudetitikawal, longitudetitikawal) {
	marker = new google.maps.Marker({
		position: lokasi,
		map: peta,
		title: "Lokasi Awal"
	});
	var konten_marker = "<div style="+"text-align: justify;>" + "Lokasi Awal : "+latitudetitikawal+
	" , "+longitudetitikawal+"</div>";
	var infowindow_marker = new google.maps.InfoWindow();

	infowindow_marker.setContent(konten_marker);
	infowindow_marker.open(peta, marker);

	google.maps.event.addListener(marker, 'click', (function(marker, konten_marker, infowindow_marker) {
		return function() {
			infowindow_marker.setContent(konten_marker);
			infowindow_marker.open(peta, marker);
		};
	})(marker, konten_marker, infowindow_marker));
}