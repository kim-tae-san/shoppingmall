<?php
session_start();
if(isset($_SESSION['userid'])){
        $userid = $_SESSION['userid'];
        $username = $_SESSION['username'];
}
else $userid = "";
$conn = mysqli_connect('localhost', 'root', "123456", 'TermProject') or die ("DB연결실패");
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$hint = $_POST['hint'];
$sql = "UPDATE userdata SET name='$name', address='$address', phone='$phone', hint='$hint' WHERE email='$userid'";
$result = mysqli_query($conn, $sql);
if($result){
?>
<script type="text/javascript">
    alert("수정에 성공하였습니다.");
    location.href='mypage.php';
</script>
<?php
}
else{
?>
<script type="text/javascript">
    alert("수정에 실패하였습니다.");
    location.href='mypage.php';
</script>
<?php
}
mysql_close();
?>