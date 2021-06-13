<?php
	session_start();
	if(isset($_SESSION['userid'])){
		$userid = $_SESSION['userid'];
		$username = $_SESSION['username'];
	}
	else $userid = "";
	if(isset($_GET['action'])&&$_GET['action']=="add"){
        $prodid = $_GET['id'];
        $prodcount = $_GET['amount'];
    }
    $conn = mysqli_connect("localhost", "root", "123456", "TermProject") or die ("DB연결실패");
	$sql = "
    INSERT INTO cart
    (userid, productid, productcount, createdate)
    VALUES('{$userid}', '{$prodid}', {$prodcount}, NOW()
    )";
    $result = mysqli_query($conn, $sql);
	if ($result === false) {
    	echo "카트에 물건을 넣는데 실패했습니다.";
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