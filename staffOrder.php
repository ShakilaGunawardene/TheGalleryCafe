<?php
include_once "config.php"; 
include_once "include/reserfunction.inc.php"; 

$order = getOrder($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/style.css">
    <?php include 'header.php'; ?>
</head>
<body>

<div class="container">
    <section class="shopping-cart">
        <h1 class="heading">Order</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Items</th>
                    <th>Price</th>
                    <th>Time </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            <?php foreach ($order as $orders): ?>
                    <tr>
                        <td><?php echo $orders['name']; ?></td>
                        <td><?php echo $orders['number']; ?></td>
                        <td><?php echo $orders['total_products']; ?></td>
                        <td>Rs.<?php echo $orders['total_price']; ?></td>
                        <td><?php echo $orders['pin_code']; ?></td>
                        <td>
               <a href="checkout.php?delete=<?php echo $orders['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> Cancel </a>
               <a href="checkout.php?edit=<?php echo $orders['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> Confirm </a>
            </td>
                    </tr>
                <?php endforeach; ?>
                
            </tbody>
        </table>
        
    </section>
</div>

    
</body>
</html>
