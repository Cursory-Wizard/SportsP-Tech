<?php
require('../model/database.php');
require('../model/customer_db.php');
if (session_id() == "") {
    $lifetime = 60 * 60;
    session_set_cookie_params($lifetime);
    session_start();
    include('../model/countries.php');
}


$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'show_search';
    }
}

switch ($action) {
    case "show_search":
        $customer_list = NULL;
        include('customer_search.php');
        break;
    case "search_customer":
        $last_name = filter_input(INPUT_POST, 'cust_last');
        $customer_list = get_customers($last_name);
        include('customer_search.php');
        break;
    case "show_customer":
        $cust_id = filter_input(INPUT_POST, 'customerID');
        $customer = $_SESSION['customer'.$cust_id];
        include('vu_customer.php');
        break;
    case "update_customer":
        $customer['id'] = filter_input(INPUT_POST, 'custID');
        $customer['first'] = filter_input(INPUT_POST, 'new_first');
        $customer['last'] = filter_input(INPUT_POST, 'new_last');
        $customer['addr'] = filter_input(INPUT_POST, 'new_addr');
        $customer['city'] = filter_input(INPUT_POST, 'new_city');
        $customer['state'] = filter_input(INPUT_POST, 'new_state');
        $customer['postal'] = filter_input(INPUT_POST, 'new_postal');
        $customer['country'] = filter_input(INPUT_POST, 'new_country');
        $customer['phone'] = filter_input(INPUT_POST, 'new_phone');
        $customer['email'] = filter_input(INPUT_POST, 'new_email');
        $customer['pass'] = filter_input(INPUT_POST, 'new_pass');

        update_customer($customer);
        header("Location: .?action=search_customer");
        break;

}

?>
