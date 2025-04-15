<?php
session_start();
include('connect.php');
$user_id = $_SESSION['user_id']; 
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$company = $_SESSION['company'];


$sql = "SELECT * FROM tower_inspection WHERE user_id = $user_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Draft Form Details</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px;">

    <h2 style="color: #333;">Draft Form Details for <?php echo $name; ?></h2>
    <div class="container">
    <table border="1" cellspacing="0" cellpadding="10" style="border-collapse: collapse; width: 100%; margin-top: 20px;">
        <tr style="background-color: #3498db; color: white;">
            <th>ID</th>
            <th>Inspection date</th>
            <th>Inspector name</th>
            <th>Inspection company</th>
            <th>Client name</th>
            <th>Tower owner</th>
            <th>Tower location</th>
            <th>Tower id name</th>
            <th>Tower type</th>
            <th>Tower Height</th>


            <th>Year of construction</th>
            <th>Photo of tower</th>
            <th>Action</th>



        </tr>

        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['inspection_date']."</td>
                    <td>".$row['inspector_name']."</td>
                    <td>".$row['inspection_company']."</td>
                    <td>".$row['client_name']."</td>
                    <td>".$row['tower_owner']."</td>
                    <td>".$row['tower_location']."</td>
                    <td>".$row['tower_id_name']."</td>
                    <td>".$row['tower_type']."</td>
                    <td>".$row['tower_height']."</td>

                    <td>".$row['year_of_construction']."</td>
                    <td>".$row['photo_of_tower']."</td>
                    <td><button>View</button></td>



                </tr>";
            }
        } else {
            echo "<tr><td colspan='5' style='text-align: center;'>No draft forms found.</td></tr>";
        }
        ?>

    </table>
    </div>

</body>
</html>
