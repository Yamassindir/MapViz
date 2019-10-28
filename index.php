<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />		
        <title>Yassir El ayadi</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- css -->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
              integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
              crossorigin=""/>
        <link rel="styleSheet" type="text/css" href="main.css" />
    </head>
    <body>
    <div>

       <div id="menu" class="fs">
            <h3 class="text-center text-uppercase bg-grey">Yassir El ayadi</h3>
            <div class="list-group">
                <a href="#" data-id="1" data-type="quantitatif" class="ajax list-group-item">
                    Population municipale
                    <i class="fa fa-refresh fa-lg fa-spin fa-fw hide"></i>
                </a>
                <a href="#" data-id="2" data-type="qualitatif" class="ajax list-group-item">
                    Densité
                    <i class="fa fa-refresh fa-lg fa-spin fa-fw hide"></i>
                </a>
                <a href="#" data-id="3" data-type="qualitatif" class="ajax list-group-item">
                    Densité Logement 2014
                    <i class="fa fa-refresh fa-lg fa-spin fa-fw hide"></i>
                </a>
                <a href="#" data-id="4" data-type="quantitatif" class="ajax list-group-item">
                    Nombre de logement en 2014
                    <i class="fa fa-refresh fa-lg fa-spin fa-fw hide"></i>
                </a>
                
            </div>
        </div>
        <div id="map" class="fs"></div>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/21eec26ff4.js"></script>
        <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
                integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
        crossorigin=""></script>
        <script src="map.js"></script>
    </body>
</html>