<?php
include_once "config.php"; 
include_once "include/reserfunction.inc.php"; 

$reservations = getReservation($conn);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/style.css">
    <?php include 'header4.php'; ?>
</head>
<body>




<div class="container">
    <section class="shopping-cart">
        <h1 class="heading">Table Reservation</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Location</th>
                    <th>People count</th>
                    <th>Date/Time </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            <?php foreach ($reservations as $reservation): ?>
                    <tr>
                        <td><?php echo $reservation['name']; ?></td>
                        <td><?php echo $reservation['number']; ?></td>
                        <td><?php echo $reservation['email']; ?></td>
                        <td><?php echo $reservation['method']; ?></td>
                        <td><?php echo $reservation['table1']; ?></td>
                        <td><?php echo $reservation['datetime']; ?></td>
                        <td>
               <a href="staff.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> Cancle </a>
               <a href="staff.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> Confirm </a>
            </td>


                    </tr>
                <?php endforeach; ?>
                
            </tbody>
        </table>
        
    </section>
</div>

    
</body>
</html>