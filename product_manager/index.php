<?php
require('../model/database.php');
require('../model/product_db.php');


$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_products';
    }
}

switch ($action) {
    case "list_products":
        $products = get_products();
        include('product_listing.php');
        break;
    case "show_add_form":
        include('product_add.php');
        break;
    case "delete_product":
        $delete_code = filter_input(INPUT_POST, 'productCode');
        delete_products($delete_code);
        header("Location: .?action=list_products");
        break;
    case "add_product":
        $new_code = filter_input(INPUT_POST, 'new_code');
        $new_name = filter_input(INPUT_POST, 'new_name');
        $new_version = filter_input(INPUT_POST, 'new_version', FILTER_VALIDATE_FLOAT);
        $string_date = filter_input(INPUT_POST, 'new_release');

        $products = get_products();
        foreach($products as $product_test) :
            if ($new_code == $product_test['productCode']) {
                $error = "Product Code already exists. Please try again.";
                include('../errors/error.php');
                exit();
            }
        endforeach;

        # The US is one of few countries that accept '6-14-2015' as 'mm-dd-yyyy'
        # and not as 'dd-mm-yyyy'. Although we display in 'mm-dd-yyyy',
        # it is not generally accepted as a DateTime format.
        # We could 'take apart' any xx-xx-xxxx submission to rearrange it 'correctly'
        # but that would make this application work in America and nearly no place else.
        # As such, we decided to let the standard stay as it is.
        $release_date = date_create($string_date);
        if ($release_date == false){
            $error = $string_date . " is not a valid date. Please try again.";
            include('../errors/error.php');
            exit();
        } else {
            $new_date = date_format($release_date, "Y/m/d H:i:s");
        }

        if (!$new_version) {
            $error = "Version must be a decimal. Please try again.";
            include('../errors/error.php');
            exit();
        }

        if ($new_code == NULL || $new_name == NULL) {
            $error = "All fields must be entered. Please try again.";
            include('../errors/error.php');
            exit();
        }
        add_products($new_code, $new_name, $new_version, $new_date);
        header("Location: .?action=list_products");
}

?>