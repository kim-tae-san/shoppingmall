<?php
	session_start();
	if(isset($_SESSION['userid'])){
		$userid = $_SESSION['userid'];
		$username = $_SESSION['username'];
	}
	else $userid = "";
	$conn = mysqli_connect("localhost", "root", "123456", "TermProject") or die ("DB연결실패");
	mysqli_query($conn, "set session character_set_connection=utf8;");
    mysqli_query($conn, "set session character_set_results=utf8;");
    mysqli_query($conn, "set session character_set_client=utf8;");
?>
<html>
<head>
	<style type="text/css">
		body{
			margin:0;
			padding: 0;
		}
	</style>
	<meta charset="utf-8">
	<title> 빅플레인 </title>
	<link rel="stylesheet" type="text/css" href="/TermProject/css/index.css">
	<link rel="stylesheet" type="text/css" href="/TermProject/css/login.css">
</head>	
<body>
	<!-- top header -->
	<div class="top_header">
		<div id="leftnavbar">
			<div id="mainlogo">
				<a href="index.php"> Bigplain </a>
			</div>
			<a href="company.php"> 브랜드스토리 </a>
			<a href="goods_list.php"> 쇼핑 </a>
		</div>
		<?php
			if($userid != ""){
				?>
				<div id="rightnavbar">
					<a href="cart.php"> Cart </a>
					<a href="mypage.php"> My page </a>
					<a onclick="logout();"> Logout </a>
				</div>
			<?php
			}
			else{
				?>
				<div id="rightnavbar">
					<a onclick="alert('로그인이 필요한 서비스입니다.');" href="login.php"> Cart </a>
					<a href="join.php"> Join </a>
					<a href="login.php"> Login </a>
				</div>
				<?php
			}
				?>
	</div>
	<form method="POST" class="loginform" action="loginprocess.php">
		회원 로그인
		<br>
		<br>
		<div class="login">
			<div class = "loginfo">
				<input type="text" name="email" class="form-control" id="email" placeholder="아이디">
				<br><br>
				<input type="password" name="password" class="form-control" id="password" placeholder="비밀번호">
			</div>
			<input type="submit" id="submit" value="로그인">
		</div>
		<div class="line3">	</div>
		<div class="loghelp">
				<input type="button" onclick="location.href='join.php'"name="join" id="join" value="회원가입">
				&nbsp;
				<input type="button" onclick="window.open('findid.php','popup','menubar=no,status=no,scrollbars=no,resizable=no ,width=600, height=300, top=100, left=100');" name="findid" id="help" value="아이디 찾기">
				&nbsp;
				<input type="button" onclick="window.open('findpassword.php','popup','menubar=no,status=no,scrollbars=no,resizable=no ,width=650, height=300, top=100, left=100');" name="findpassword" id="help" value="비밀번호 찾기">
		</div>
	</form>
	<div class="bottom-box">
		<div class="bottom-top">
			<div id="info-unit">
				<div id="head">
					Customer center
				</div>
				<br>
				<strong style="font-size:25px;"> 1234-5678 </strong>
				<br>
				<br>
				OPEN TIME(10:00 ~ 17:00)
				<br>
				LUNCH(12:30 ~ 14:00)
				<br>
				OFF (SATURDAY, SUNDAY, HOLIDAY)
			</div>
			<div id="info-unit">
				<div id="head">
					Returns & Exchange
				</div>
				<br>
				<strong>반품 주소</strong>
				<br>
				<br>
				충청남도 천안시 동남구 병천면
				<br>	
				충절로 1600
				<br>
				<u onclick="location.href = 'https://service.epost.go.kr/iservice/usr/trace/usrtrc001k01.jsp'">배송조회></u>
			</div>
			<div id="info-unit">
				<div id="head">
					Bank info
				</div>
				<br>
				신한은행 110-472-291125 (주)빅마킴컴퍼니
				<br>
				<br>
				<select onchange="if(this.value) window.open(this.value);">
					<option selected>인터넷뱅킹 바로가기</option>
					<option value = 'https://spib.wooribank.com'>우리은행 인터넷뱅킹</option>
					<option value = 'https://bank.shinhan.com/index.jsp#010800000000'>신한은행 인터넷뱅킹</option>
					<option value='https://www.kbstar.com/'>국민은행 인터넷뱅킹</option>
					<option value='https://www.ibk.co.kr/' >기업은행 인터넷뱅킹</option>
					<option value='https://www.kebhana.com/'>하나은행 인터넷뱅킹</option>
				</select>
			</div>
			<div id="info-unit">
				<div id="head">
					About
				</div>
				<br>
				<span onclick="location.href='company.php'">회사소개</span>
				<br>
				<span>이용약관</span>
				<br>
				<span>이용안내</span>
				<br>
				<span>개인정보처리방침</span>
			</div>
		</div>
		<div class="bottom-down">
			상호명 : 주식회사 빅마킴컴퍼니 &nbsp;&nbsp;&nbsp;  대표:김태산  &nbsp;&nbsp;&nbsp; 주소:충청남도 천안시 동남구 병천면 충절로 1600   &nbsp;&nbsp;&nbsp;사업자등록번호:842-86-01047[사업자번호조회]<br><br>
			통신판매업신고 : 제2018-서울마포-1985호  &nbsp;&nbsp;&nbsp; 개인정보관리자 : 김태산  &nbsp;&nbsp;&nbsp;  Business : ekdlqld21@koreatech.ac.kr   &nbsp;&nbsp;&nbsp; CS : ekdlqld21@koreatech.ac.kr<br><br><br>
			<div id="copy">
				(c) 2020 bigplain. Hosting by NHN GODO.
				<img src="/TermProject/img/seel.png">
			</div>
		</div>
	</div>
    <script>
        function logout() {
            const data = confirm("로그아웃 하시겠습니까?");
            if (data) {
                location.href = "logoutprocess.php";
            }

        }
    </script>
</body>
</html>