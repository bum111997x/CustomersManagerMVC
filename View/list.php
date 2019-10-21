<form>
    <a href="index.php?page=add">Add</a>
</form>
<table>
    <tr>
        <td>STT</td>
        <td>Ten khach hang</td>
        <td>Email</td>
        <td>Dia chi</td>
    </tr>
    <?php foreach ($customers as $key => $customer): ?>
    <tr>
        <td><?php echo ++$key ?></td>
        <td><?php echo $customer->getName() ?></td>
        <td><?php echo $customer->getEmail() ?></td>
        <td><?php echo $customer->getAddress() ?></td>
        <td><a href="index.php?page=delete&id=<?php echo $customer->getId() ?>">Delete</td>
        <td><a href="index.php?page=formEdit&id=<?php echo $customer->getId() ?>">Edit</td>
    </tr>
    <?php endforeach; ?>
</table>
