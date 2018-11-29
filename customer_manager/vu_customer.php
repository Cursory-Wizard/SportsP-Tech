<?php include '../view/header.php'; ?>
<main>
    <h1>View/Update Customer</h1>
    <form action="index.php" method="post" id="aligned">
        <input type="hidden" name="action" value="update_customer"/>
        <input type="hidden" name="custID" value="<?php echo $customer['customerID']; ?>" />
        <label>First Name:</label>
        <input type="text" name="new_first" value="<?php echo $customer['firstName']; ?>"/>
        <br>
        <label>Last Name:</label>
        <input type="text" name="new_last" value="<?php echo $customer['lastName']; ?>"/>
        <br>
        <label>Address:</label>
        <input type="text" name="new_addr" value="<?php echo $customer['address']; ?>"/>
        <br>
        <label>City:</label>
        <input type="text" name="new_city" value="<?php echo $customer['city']; ?>"/>
        <br>
        <label>State:</label>
        <input type="text" name="new_state" value="<?php echo $customer['state']; ?>"/>
        <br>
        <label>Postal Code:</label>
        <input type="text" name="new_postal" value="<?php echo $customer['postalCode']; ?>"/>
        <br>
        <label>Country Code:</label>
        <select name = "new_country">
            <?php foreach ($_SESSION['countryCodes'] as $code=>$country) :
                if ($customer['countryCode'] == $code) {
                    echo '<option selected value="'.$code.'">'.$country.'</option>';
                } else {
                echo '<option value="'.$code.'">'.$country.'</option>'; }
            endforeach; ?>
        </select>
        <br>
        <label>Phone:</label>
        <input type="text" name="new_phone" value="<?php echo $customer['phone']; ?>"/>
        <br>
        <label>Email:</label>
        <input type="text" name="new_email" value="<?php echo $customer['email']; ?>"/>
        <br>
        <label>Password:</label>
        <input type="text" name="new_pass" value="<?php echo $customer['password']; ?>"/>
        <br>
        <label>&nbsp;</label>
        <input type="submit" value="Update Customer" />
    </form>
    <br />
    <p class="last_paragraph">
        <a href="index.php?action=show_search">Search Customers</a>
    </p>
</main>
<?php include '../view/footer.php'; ?>