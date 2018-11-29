<?php include '../view/header.php'; ?>
    <main>
        <h1>Add Product</h1>
        <form action="index.php" method="post" id="aligned">
            <input type="hidden" name="action" value="add_product"/>
            <label>Code:</label>
            <input type="text" name="new_code" />
            <br>

            <label>Name:</label>
            <input type="text" name="new_name" />
            <br />

            <label>Version:</label>
            <input type="text" name="new_version" />
            <br />

            <label>Release Date:</label>
            <input type="text" name="new_release" />
            &nbsp;Use any valid date format
            <br />

            <label>&nbsp;</label>
            <input type="submit" value="Add Product" />
            <br />
        </form>
        <p class="last_paragraph">
            <a href="index.php?action=list_products">View Product List</a>
        </p>

    </main>
<?php include '../view/footer.php'; ?>