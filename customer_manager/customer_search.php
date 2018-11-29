<?php include '../view/header.php'; ?>
<main>
    <h1>Customer Search</h1>
    <form action="index.php" method="post" id="vague">
        <input type="hidden" name="action" value="search_customer"/>
        <label>Last Name:</label>
        <input type="text" name="cust_last" />&nbsp;
        <input type="submit" value="Search" />
    </form>
    <br />
    <?php if ($customer_list != NULL) : ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Email Address</th>
            <th>City</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($customer_list as $customer) : ?>
        <tr>
            <td><?php echo $customer['firstName'] . " " . $customer['lastName']; ?></td>
            <td><?php echo $customer['email']; ?></td>
            <td><?php echo $customer['city']; ?></td>
            <td>
                <?php $_SESSION['customer'.$customer['customerID']] = $customer ?>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="show_customer">
                    <input type="hidden" name="customerID" value="<?php echo $customer['customerID']; ?>">
                    <input type="submit" value="Select">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
<?php include '../view/footer.php'; ?>