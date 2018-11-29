<?php

function get_customers($lastName){
    global $db;
    $query = 'SELECT * FROM customers
              WHERE lastName = :thisLast
              ORDER BY customerID ASC';
    $statement = $db->prepare($query);
    $statement->bindValue(':thisLast', $lastName);
    $statement->execute();
    $customer_list = $statement->fetchAll();
    $statement->closeCursor();
    return $customer_list;
}

function update_customer($customer) {
    global $db;
    $query = 'UPDATE customers
             SET firstName = :thisFirst,
             lastName = :thisLast,
             address = :thisAddr,
             city = :thisCity,
             state = :thisState,
             postalCode = :thisPostal,
             countryCode = :thisCountry,
             phone = :thisPhone,
             email = :thisEmail,
             password = :thisPW
             WHERE customerID = :thisID';
    $statement = $db->prepare($query);
    $statement->bindValue(':thisFirst', $customer['first']);
    $statement->bindValue(':thisLast', $customer['last']);
    $statement->bindValue(':thisAddr', $customer['addr']);
    $statement->bindValue(':thisCity', $customer['city']);
    $statement->bindValue(':thisState', $customer['state']);
    $statement->bindValue(':thisPostal', $customer['postal']);
    $statement->bindValue(':thisCountry', $customer['country']);
    $statement->bindValue(':thisPhone', $customer['phone']);
    $statement->bindValue(':thisEmail', $customer['email']);
    $statement->bindValue(':thisPW', $customer['pass']);
    $statement->bindValue(':thisID', $customer['id']);
    $statement->execute();
    $statement->closeCursor();
}