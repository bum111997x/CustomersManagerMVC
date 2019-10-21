<form method="post"  action="index.php?page=update&id=">
    <table>
        <tr style="display: none">
            <td><input type="text" name="id" value="<?php echo $_GET['id'] ?>"></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="<?php echo $customer->name ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?php echo $customer->email ?>"></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name="address" value="<?php echo $customer->address ?>"></td>
        </tr>
        <tr>
            <td><button type="submit" value="Add">UPDATE</td>
        </tr>
    </table>
</form>