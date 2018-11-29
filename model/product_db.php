<?php
/**
 * Created by PhpStorm.
 * User: Michael Phelan
 * Date: 11/28/2018
 * Time: 7:44 AM
 */
function get_products(){
    global $db;
    $query = 'SELECT * FROM products
              ORDER BY productCode ASC';
    $statement = $db->prepare($query);
    $statement->execute();
    $product_list = $statement->fetchAll();
    $statement->closeCursor();
    return $product_list;
}

function add_products($code, $name, $version, $release) {
    global $db;
    $query = 'INSERT INTO products (productCode, name, version, releaseDate) VALUES (:thisCode, :thisName, :thisVersion, :thisRelease)';
    $statement = $db->prepare($query);
    $statement->bindValue(':thisCode', $code);
    $statement->bindValue(':thisName', $name);
    $statement->bindValue(':thisVersion', $version);
    $statement->bindValue(':thisRelease', $release);
    $statement->execute();
    $statement->closeCursor();
}

function delete_products($product_number) {
    global $db;
    $query = 'DELETE FROM products WHERE productCode = :thisCode';
    $statement = $db->prepare($query);
    $statement->bindValue(':thisCode', $product_number);
    $statement->execute();
    $statement->closeCursor();
}