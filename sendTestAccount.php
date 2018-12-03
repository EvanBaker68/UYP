 <?php
 session_start(); 
 $connect = mysqli_connect("localhost", "root", "", "DB3335"); 
 $name = $_POST['Username'];
 $password= $_POST['password'];

 echo "<p>heythere</p>";

 $stmt = $connect->prepare("INSERT INTO TEST(username, password) VALUES(?, ?)");
 $stmt->bind_param("ss",$name, $password);
 $stmt->execute();

 $connect = null;
 header('Location: createaccount.php');
 ?>