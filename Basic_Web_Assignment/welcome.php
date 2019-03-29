<?php include('server.php');
    // update
if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $edit_state = true; 
    $rec = mysqli_query($db, "SELECT * FROM info WHERE id=$id"); 
    $record = mysqli_fetch_array($rec);
    $date = $record['date'];
    $description = $record['description'];
    $category = $record['category'];
    $amount = $record['amount'];
    $id = $record['id'];

}

 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href= "style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
      <?php if (isset($_SESSION['msg'])): ?>
            <div class='msg'>
                <?php
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                ?>
            </div>
        <?php endif ?>


        <table> 
            <thead>
                
                <tr>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Amount</th>
                    <th colspan="2"> Action</th> 
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($results)){ ?>
<tr> 
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['amount']; ?></td>
                    <td>
                        <a class ="edit_btn" href="welcome.php?edit=<?php echo $row['id']; ?>"> Edit</a>
                    </td>
                    <td> 
                        <a class ="del_btn" href="server.php?del=<?php echo $row['id']; ?>"> Delete</a>
                    </td>
                </tr>      
               <?php } ?>
                
            </tbody>       
        </table>
        
        
        <form method="post" action="server.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="input-group">
                <label>Date</label>
                <input type="text" name="date" value="<?php echo $date; ?>"> 
            </div>
             <div class="input-group">
                <label>Description</label>
                <input type="text" name="description" value="<?php echo $description; ?>"> 
            </div>
             <div class="input-group">
                <label>Category</label>
                <input type="text" name="category"  value="<?php echo $category; ?>"> 
            </div>
             <div class="input-group">
                <label>Amount</label>
                <input type="text" name="amount" value="<?php echo $amount; ?>"> 
            </div>
            <div class="input-group"> 
                <?php if ($edit_state == false): ?>
                        <button type="submit" name="save" class="btn">Save</button>
                <?php else: ?>
                        <button type="submit" name="update" class="btn">Update</button>
                <?php endif ?>


               
            
            </div>
        
        
        </form>
        <div><a href="logout.php">Logout </a></div>

    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Expenses Tracker.</h1>
    </div>



    <p>
        <a href="resetpassword.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
</body>
</html>