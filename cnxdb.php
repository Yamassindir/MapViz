<?php
// Connexion, selection de la base de donnees
$dbconn = pg_connect("host=localhost dbname=master_siglis user=etudiant password=S1gL15-2018!")
    or die('Connexion impossible : ' . pg_last_error());

// Ex�cution de la requ�te SQL
$query = 'SELECT * FROM layer.dpt';
$result = pg_query($query) or die('Echec de la requete : ' . pg_last_error());

// Affichage des r�sultats en HTML
echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Libére le résultat
pg_free_result($result);

// Ferme la connexion
pg_close($dbconn);
?>