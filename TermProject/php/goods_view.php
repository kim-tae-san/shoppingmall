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

    $goodsid = $_GET['goodsid'];
    $count = 1;
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
	<link rel="stylesheet" type="text/css" href="/TermProject/css/goods_view.css">
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
	<script>
        var sprice;
        var amount;

        function add() {
        	sprice = document.form.price.value;
            hm = document.form.amount;
            sum = document.form.sum;
            hm.value++;
            sum.value = parseInt(hm.value) * parseInt(sprice);
            <?php $count++; ?> 
        }

        function del() {
        	sprice = document.form.price.value;
            hm = document.form.amount;
            sum = document.form.sum;
            if (hm.value > 1) {
                hm.value--;
                <?php $count--; ?> 
                sum.value = parseInt(hm.value) * parseInt(sprice);
            }
        }

        function change() {
        	sprice = document.form.price.value;
            hm = document.form.amount;
            sum = document.form.sum;
            if (hm.value < 0) {
                hm.value = 0;
            }
            sum.value = parseInt(hm.value) * parseInt(sprice);
        }
    </script>
	<div class="goodscenter">
		<?php
			$sql = "SELECT * FROM product WHERE id={$goodsid}";
			$query = mysqli_query($conn, $sql);
			$item = mysqli_fetch_array($query);
		?>
		<img src=<?=$item['imgurl']?>>
		<div class="goodsinfo">
			<span style="font-size:25px;"><?=$item['name']?></span>
			<br><br><br><br><br><br>
			<span style="font-weight: bold; font-size: 15px;" ><?=$item['price']?> 원</span>
			<br><br><br>
			<span style="font-size: 15px; color: #808080;">배송비 <?php if ($item['price']>=15000){echo "0";} else {echo "2500";} ?>원 / 주문시결제(선결제) <br><br>택배</span>
			<div class="line"></div>
			<form name="form" method="get">
				<input type="hidden" name="action" value="add">
				<input type="hidden" name="price" value="<?=$item['price']?>">
				<input type="hidden" name="id" value="<?=$item['id']?>">
                <p style="margin-left:10px; margin-top:30px;">	
              	<span style="padding-right: 70px;"><?=$item['name']?></span>
                수량 : 
                <input type="text" name="amount" value="1" size="3" onchange="change();" style=" font-size:15px; text-align:right;" readonly>
                <input type="button" value="▲" onclick="add();" style="height:20px; background-color:white; border:1px solid black; cursor:pointer;">
                <input type="button" value="▼" onclick="del();" style="height:20px; background-color:white; border:1px solid black; cursor:pointer;">
                </p>
                <div class="line2"></div>	
                <p style="margin-left:10px;margin-top:15px; font-size:20px;">
                    총 합계금액 : <input style="border:0px; text-align:right; font-size:20px;" type="text" name="sum" size="10" value= <?=$item['price']?> readonly>원
                </p>	
        </div>
    </div>
    <div class="goodsbottom">
        <div class="goodsbutton">
            <?php
               if($userid!=="") {

             ?>
            <input type="button" class="button" onclick="alert('상품이 주문되었습니다.'); location.href='index.php';" value="BUY NOW">
            <button formaction="cartprocess.php" class="button1">ADD TO CART</button>
            <?php
                }
                else if($userid==""){
                  ?>
            <a onclick="alert('로그인이 필요한 서비스입니다.'); location.href='login.php';">
              <button class="button">BUY NOW</button></a>
            <a onclick="alert('로그인이 필요한 서비스입니다.'); location.href='login.php';">
              <button class="button1">ADD TO CART</button></a>
            <?php
                }
                ?>
            </form>
		</div>
	</div>
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