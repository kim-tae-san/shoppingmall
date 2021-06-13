<?php
$conn = mysqli_connect('localhost', 'root', "123456", 'TermProject') or die ("DB연결실패");
$hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
$email = $_POST['email'];
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$hint = $_POST['hint'];
$checkid = "SELECT * FROM userdata WHERE email='$email'";
$query = mysqli_query($conn, $checkid);
$exist = mysqli_num_rows($query);
if($exist == 0){
    $sql = "
    INSERT INTO userdata
    (email, password, name, address, phone, hint, createDate)
    VALUES('{$email}', '{$hashedPassword}', '{$name}', '{$address}', '{$phone}', '{$hint}', NOW()
    )";
    echo $sql;
    $result = mysqli_query($conn, $sql);
    echo $result;
    if ($result === false) {
        echo "저장에 문제가 생겼습니다. 관리자에게 문의해주세요.";
        echo mysqli_error($conn);
    } else {
        ?>
        <script>
            alert("회원가입이 완료되었습니다");
            location.href = "index.php";
        </script>
<?php
    }
}
else{
    ?>
    <script>
        alert("이미 있는 아이디입니다.");
        location.href = "join.php";
    </script>
    <?php
}
?>
