<?php include('header.php'); ?>
<?php include('dbconn.php'); ?>

<?php
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    

        $query = "select * from `students` where `id`='$id'";
        $result = mysqli_query($connection, $query);
        if(!$result){
            die("query failed".mysqli_error($connection));
        }else{
           $row = mysqli_fetch_assoc($result); 
        }
    }
    
?>
<?php
    if(isset($_POST["update_students"])) {

        if(isset($_GET["id_new"])) {
            $id_new=$_GET['id_new'];
        }
        $fname=$_POST['f_name'];
        $lname=$_POST['l_name'];
        $age=$_POST['age'];
        $query = "update `students` set `first_name`='$fname',`last_name`='$lname',`age`='$age' where `id`='$id_new'";
        $result = mysqli_query($connection, $query);
        if(!$result){
            die("query failed".mysqli_error($connection));
        }else{
            header("location:index.php?update_msg=You have successfully updated data");
        }
    }
?>

<form action="update_page_1.php?id_new=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label for="f_name">First Name</label>
        <input type="text" name="f_name" value="<?php echo $row['first_name'];?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="l_name">Last Name</label>
        <input type="text" name="l_name" value="<?php echo $row['last_name'];?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="text" name="age" class="form-control" value="<?php echo $row['age'];?>">
    </div>
    <input type="submit" name="update_students" value="UPDATE" class="btn btn-success"/>
</form>
<?php include('footer.php'); ?>