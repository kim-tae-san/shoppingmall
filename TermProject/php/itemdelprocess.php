<?php
	session_start();
	if(isset($_SESSION['userid'])){
		$userid = $_SESSION['userid'];
		$username = $_SESSION['username'];
	}
	else $userid = "";
	$cartid = intval($_GET['cartid']);
    $conn = mysqli_connect("localhost", "root", "123456", "TermProject") or die ("DB연결실패");
	$sql = "DELETE FROM cart WHERE id='$cartid'";
    $result = mysqli_query($conn, $sql);
	if ($result === false) {
		echo gettype($cartid);
		echo $cartid;
    	echo "물품 삭제 실패";
    	echo mysqli_error($conn);
	} else {
?>
    <script>
        location.href = "cart.php";
    </script>
<?php
}
mysql_close();
?>
?>