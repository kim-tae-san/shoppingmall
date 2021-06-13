<?php
$conn = mysqli_connect("localhost", "root", "123456", "TermProject");
$email = $_POST['email'];
$password = $_POST['password'];

// DB 정보 가져오기 
$sql = "SELECT * FROM userdata WHERE email ='{$email}'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);
$hashedPassword = $row['password'];
$passwordResult = password_verify($password, $hashedPassword);
if ($passwordResult === true) {
    // 로그인 성공
    // 세션에 id 저장
    session_start();
    $_SESSION['userid'] = $row['email'];
    
?>
    <script>
        alert("로그인에 성공하였습니다.")
        location.href = "index.php";
    </script>
<?php
} else {
    // 로그인 실패 
?>
    <script>
        alert("로그인에 실패하였습니다");
        location.href = "login.php";
    </script>
<?php
}
mysql_close();
?>