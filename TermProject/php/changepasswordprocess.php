<?php
$conn = mysqli_connect("localhost", "root", "123456", "TermProject");
$password = $_POST['password'];
$hashedpassword = password_hash($password, PASSWORD_DEFAULT);
$id = $_POST['id'];
// DB 정보 가져오기 
$sql = "UPDATE userdata SET password='$hashedpassword' WHERE id='$id'";
$result = mysqli_query($conn, $sql);
if($result){
?>
    <script>
        alert('비밀번호를 변경하였습니다.')
        window.close();
    </script>
<?php
}
else{
    ?>
    <script>
        alert('비밀번호 변경에 실패하였습니다.');
        location.href='findpassword.php';
    </script>
    <?php
}
mysql_close();
?>