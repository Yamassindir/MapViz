<?php

function query($SQL){
    $db = pg_connect("host=localhost port=5432 dbname=master_siglis user=etudiant password=S1gL15-2018!");

    $result = pg_query($db, $SQL);

    if(!$result){
        echo "ERREUR.\n";
        exit;
    }

    return pg_fetch_all($result);
}

if($_GET['id_indic'] == 1){ // CERCLES Population
    $data = query("
        SELECT json_build_object(
            'type', 'FeatureCollection', 
            'features', json_agg(
                json_build_object(
                    'type', 'Feature', 
                    'properties', json_build_object(
                        'nom_dpt', nom,
                        'code_dpt', a.code_dpt,
                        'data', data,
                        'radius', data*0.00003,
                        'unite', 'habitants'
                    ),
                    'geometry', ST_AsGeoJSON(ST_Centroid(geom),5)::json
                )
            )
        ) as geojson 
        FROM layer.dpt a
        LEFT JOIN (
            SELECT code_dpt, p14_pop as data
            FROM data.insee
        ) b ON a.code_dpt = b.code_dpt
    ");
}
else if($_GET['id_indic'] == 2){ // APLATS Population 
   $data = query("
        SELECT json_build_object(
            'type', 'FeatureCollection', 
            'features', json_agg(
                json_build_object(
                    'type', 'Feature', 
                    'properties', json_build_object(
                        'nom_dpt', nom,
                        'code_dpt', a.code_dpt,
                        'data', data,
                        'unite', 'hab/kmÂ²'
                    ),
                    'geometry', ST_AsGeoJSON(geom,5)::json
                )
            )
        ) as geojson 
        FROM layer.dpt a
        LEFT JOIN (
            SELECT code_dpt, round(p14_pop/superf,3) as data
            FROM data.insee
        ) b ON a.code_dpt = b.code_dpt
    "); 
}
else if($_GET['id_indic'] == 3){ // densiteLogement2014
    $data = query("
        SELECT json_build_object(
            'type','FeatureCollection',
            'features',json_agg(
            json_build_object(
            'type', 'Feature',
            'geometry', ST_AsGeoJSON(geom)::json,
            'properties',json_build_object(
                                        'nom_dpt',lay.nom,
                                        'code_dpt', lay.code_dpt,
                                        'data',data,
                                        'unite', 'log/kmÂ²'	
                                )
                        )
                )
            ) as geojson
            FROM layer.dpt lay
            LEFT JOIN (SELECT code_dpt, round(p14_log/superf,3)   as data 
            FROM data.insee) lay2
            ON lay.code_dpt=lay2.code_dpt
    ");
}

else if($_GET['id_indic'] == 4){ // CERCLES Logement 2014
    $data = query("
        SELECT json_build_object(
            'type', 'FeatureCollection', 
            'features', json_agg(
                json_build_object(
                    'type', 'Feature', 
                    'properties', json_build_object(
                        'nom_dpt', nom,
                        'code_dpt', a.code_dpt,
                        'data', data,
                        'radius', data*0.00003,
                        'unite', 'logements'
                    ),
                    'geometry', ST_AsGeoJSON(ST_Centroid(geom),5)::json
                )
            )
        ) as geojson 
        FROM layer.dpt a
        LEFT JOIN (
            SELECT code_dpt, p14_log as data
            FROM data.insee
        ) b ON a.code_dpt = b.code_dpt
    ");
}

echo $data[0]["geojson"];