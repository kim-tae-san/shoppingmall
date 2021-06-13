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
    $sql = "SELECT * FROM userdata WHERE email='$userid'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($query);
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
	<link rel="stylesheet" type="text/css" href="/TermProject/css/mypage.css">
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
	<div class="mypagehead">
		<h1> 마이페이지 </h1>
	</div>
	<form action='editprocess.php' method="POST" id="editform">
		<div class= "mypage">
			<table>
				<tr>
					<th>이름</th>
					<td><input type="text" name="name" class="form-control" id="name" value=<?=$data['name']?>></td>
				</tr>
				<tr>
					<th>아이디</th>
					<td><input type="text" name="email" class="form-control" id="email" value=<?=$data['email']?> disabled></td>
				</tr>
				<tr>
					<th>주소</th>
					<td><input type="text" name="address" class="form-control" id="address" value=<?=$data['address']?>></td>
				</tr>
				<tr>
					<th>전화번호</th>
					<td><input type="text" name="phone" class="form-control" id="phone" value=<?=$data['phone']?>></td>
				</tr>
				<tr>
					<th>비밀번호 힌트</th>
					<td><input type="text" name="hint" class="form-control" id="hint" value=<?=$data['hint']?>></td>
				</tr>
			</table>
			<div class="submit">
				<input type="button" id="editbutton" class="form-control-button" value="수정">
			</div>
		</div>
	</form>
	<script>
		const editform = document.getElementById("editform");
		const joinbutton = document.getElementById("editbutton");
		const name = document.getElementById("name");
		const address = document.getElementById("address");
		const phone = document.getElementById("phone");
		const hint = document.getElementById("hint");

		editbutton.addEventListener("click", function(e){
			// 비밀번호가 입력됬고, 비밀번호와 비밀번호확인이s일치한 경우
			if(name.value.length == 0){
				alert("이름을 입력해주세요.");
			}
			else if(address.value.length==0){
				alert("주소를 입력해주세요.");
			}
			else if(phone.value.length==0){
				alert("전화번호를 입력해주세요.");
			}
			else if(hint.value.length==0){
				alert("비밀번호 힌트를 입력해주세요.");
			}
			else{
				editform.submit();
			}
		});
	</script>
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