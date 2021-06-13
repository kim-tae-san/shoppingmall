<?php
$conn = mysqli_connect("localhost", "root", "123456", "TermProject");
$name = $_POST['name'];
$phone = $_POST['phone'];

// DB 정보 가져오기 
$sql = "SELECT * FROM userdata WHERE name ='{$name}' AND phone='{$phone}'";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_array($result)) {
?>
    <script>
        alert("회원님의 아이디는 <?=$row['email']?>입니다.");
        window.close();
    </script>
<?php
} else {
?>
    <script>
        alert("해당하는 계정이 없습니다.");
        location.href = "findid.php";
    </script>
<?php
}
mysql_close();
?>