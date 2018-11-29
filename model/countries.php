<?php
    global $db;
    $query = 'SELECT * FROM countries
              ORDER BY countryName ASC';
    $statement = $db->prepare($query);
    $statement->execute();
    $country_list = $statement->fetchAll();
    $statement->closeCursor();
    $countryList = array();
    foreach ($country_list as $mark){
        $countryList += array($mark['countryCode'] => $mark['countryName']);
    }
    $_SESSION['countryCodes'] = $countryList;
?>