<html>
<head>
    <link rel="stylesheet" type="text/css" href="/TermProject/css/findpassword.css">
    <meta charset="utf-8">
    <title>비밀번호 찾기</title>
</head>
<body>
    <form method="post" class="findpassword" action="findpasswordprocess.php">
    <div class="findhead">
        <h1>비밀번호 찾기</h1>
    </div>
    <div class="inputform">
            <div class = "info">
                <span>아이디</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="text" name="email" placeholder="아이디를 입력해주세요.">
                <br><br>
                <span>비밀번호 힌트</span>
                <input type="text" name="hint" placeholder ="첫 여행지는 어디인가요?">
            </div>
            <input type="submit" id="submit" value="비밀번호 찾기">
        </div>
    </form>
</body>
</html>