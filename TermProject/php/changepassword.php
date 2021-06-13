<?php
    $id = $_GET['id'];
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/TermProject/css/changepassword.css">
    <meta charset="utf-8">
    <title>비밀번호 변경</title>
</head>
<body>
    <form method="post" class="changepassword" id="form" action="changepasswordprocess.php">
    <div class="changehead">
        <h1>비밀번호 변경</h1>
    </div>
    <div class="inputform">
            <input type="hidden" name="id" value="<?=$id?>">
            <div class = "info">
                <span>비밀번호</span>&nbsp; &nbsp; &nbsp; &nbsp;
                <input type="password" name="password" id="password" placeholder="비밀번호를 입력해주세요.">
                <br><br>
                <span>비밀번호 확인</span>
                <input type="password" name="passwordcheck" id="passwordcheck" placeholder ="비밀번호를 다시 입력해주세요.">
            </div>
            <input style="cursor: pointer;" type="button" id="button" value="비밀번호 변경">
    </div>
    </form>
    <script>
        const password = document.getElementById("password");
        const passwordcheck = document.getElementById("passwordcheck");
        const button = document.getElementById("button");
        const form = document.getElementById("form");

        button.addEventListener("click", function(e){
            if(password.value&&password.value===passwordcheck.value){
                form.submit();
            }
            else{
                alert("비밀번호를 확인해주세요.");
            }
        })
    </script>
</body>
</html>