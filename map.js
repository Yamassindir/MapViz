var map = L.map('map').setView([46.7597, 2.4522], 6);
var shape = null;

var legend = null;

L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> &copy; <a href="http://cartodb.com/attributions">CartoDB</a>',
    maxZoom: 19
}).addTo(map);

legend = L.control({ position: 'bottomright' });

$(".ajax").click(function(){
    var spin = $(this).find(".fa");
    var id_indic = $(this).data('id');
    var type = $(this).data('type');

    spin.removeClass("hide");

    $.ajax({
        url: './layer.php',
        data: {
            id_indic: id_indic
        },
        dataType: 'json',
        success: function(geojson){
            
            if(map.hasLayer(shape)){
            map.removeLayer(shape);
    }
            spin.addClass("hide");

            if(type === 'quantitatif'){
                    
            if (map != undefined && legend != undefined) {
            map.removeControl(legend);
	}
                makeCircles(geojson);
            }
            else{
                makeAplat(geojson);
            }
        }
    });
});

function makeCircles(geojson){
    shape = L.geoJSON(geojson, {
        pointToLayer: function(feature, latlng){
            return L.circleMarker(latlng, {
                radius: feature.properties.radius
            });
        }
    }).addTo(map);
}
function deceCircles(geojson){
    shape = L.geoJSON(geojson, {
        pointToLayer: function(feature, latlng){
            return L.circleMarker(latlng, {
                radius: feature.properties.radius
            });
        }
    }).addTo(map);
}

function makeAplat(geojson){
    
    if (map != undefined && legend != undefined) {
    map.removeControl(legend);
    }
    
    
    shape = L.geoJSON(geojson, {
        style: function(feature){
            return {
                fillColor: getColor(feature.properties.data),
                weight: 2,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: 0.7
            };
        },
        onEachFeature: function(feature, layer){
            layer.bindPopup(`<div class="card">
                <div class="card-header" style="color : #fff; background-color : ` + getColor(feature.properties.data) + `">${feature.properties.nom_dpt}</div>
                <div class="card-body">
                    ${feature.properties.data}habitants/Km<SUP>2</SUP>
                </div>
            </div>`);
        }
    }).addTo(map);
    legend.onAdd = function (map) {

		var div = L.DomUtil.create('div', 'info legend'),
			grades = [10, 50, 150, 500, 625, 750, 875],
			labels = [];

		for (var i = 0; i < grades.length; i++) {
			div.innerHTML +=
				'<div><i style="background:' + getColor(grades[i] + 1) + '"></i> ' +
				grades[i] + (grades[i + 1] ? '&ndash;' + grades[i + 1] + '</div><br>' : '+');
		}

		return div;
	};

	legend.addTo(map);
}
    function Denspop(geojson){
    
        if (map != undefined && legend != undefined) {
        map.removeControl(legend);
        }
        
        
        shape = L.geoJSON(geojson, {
            style: function(feature){
                return {
                    fillColor: getColor(feature.properties.data),
                    weight: 2,
                    opacity: 1,
                    color: 'white',
                    dashArray: '3',
                    fillOpacity: 0.7
                };
            },
            onEachFeature: function(feature, layer){
                layer.bindPopup(`<div class="card">
                    <div class="card-header" style="color : #fff; background-color : ` + getColor(feature.properties.data) + `">${feature.properties.nom_dpt}</div>
                    <div class="card-body">
                        ${feature.properties.data} logements/Km<SUP>2</SUP>
                    </div>
                </div>`);
            }
        }).addTo(map); 
    
    
    legend.onAdd = function (map) {

		var div = L.DomUtil.create('div', 'info legend'),
			grades = [10, 20, 40, 80, 160, 320, 640],
			labels = [];

		for (var i = 0; i < grades.length; i++) {
			div.innerHTML +=
				'<div><i style="background:' + getColor(grades[i] + 1) + '"></i> ' +
				grades[i] + (grades[i + 1] ? '&ndash;' + grades[i + 1] + '</div><br>' : '+');
		}

		return div;
	};

	legend.addTo(map);
    
}

function getColor(d){
    return d > 875 ? '#99000d':
            d > 750 ? '#cb181d':
            d > 625 ? '#ef3b2c':
            d > 500 ? '#fb6a4a':
            d > 150 ? '#fc9272':
            d > 50 ? '#fcbba1':
            d > 10 ? '#fee0d2':
            '#fff5f0';
}








