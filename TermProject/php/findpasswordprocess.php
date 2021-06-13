<?php
$conn = mysqli_connect("localhost", "root", "123456", "TermProject");
$email = $_POST['email'];
$hint = $_POST['hint'];

// DB 정보 가져오기 
$sql = "SELECT * FROM userdata WHERE email ='{$email}' AND hint='{$hint}'";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_array($result)) {
?>
    <script>
        location.href='changepassword.php?id=<?=$row['id']?>';
    </script>
<?php
} else {
?>
    <script>
        alert("해당하는 계정이 없습니다.");
        location.href = "findpassword.php";
    </script>
<?php
}
mysql_close();
?>