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
	<!-- slide container -->
	<div class="slideshow-container">
		<div class="myslide fade">
			<img src="/TermProject/img/slideimg1.jpeg" onclick="location.href='goods_view.php?goodsid=4'" style='width:100%;'>
		</div>
		<div class="myslide fade">
			<img src="/TermProject/img/slideimg2.jpeg" onclick="location.href='goods_view.php?goodsid=5'" style='width:100%;'>
		</div>
		<div class="myslide fade">
			<img src="/TermProject/img/slide4.jpeg" onclick="location.href='company.php'" style='width:100%;'>
		</div>
		<a class="prev" onclick="plusSlides(-2)">&#10094;</a>
		<a class="next" onclick="plusSlides(0)">&#10095;</a>
	</div>
	<br>
	<!-- The dots/circles -->
	<div style="text-align:center">
  		<span class="dot" onclick="currentSlide(1)"></span>
  		<span class="dot" onclick="currentSlide(2)"></span>
  		<span class="dot" onclick="currentSlide(3)"></span>
	</div>
	</div>
	<script type="text/javascript">
		var slideIndex = 1;
		showSlides(slideIndex);
		setInterval(showSlides, 6000); // Change image every 6 seconds

		// Next/previous controls
		function plusSlides(n) {
  			showSlides(slideIndex += n);
		}		

		// Thumbnail image controls
		function currentSlide(n) {
  			showSlides(slideIndex = n);
		}

		function showSlides(n) {
  		var i;
  		var slides = document.getElementsByClassName("myslide");
  		var dots = document.getElementsByClassName("dot");
  		if (n < 1) {slideIndex = slides.length}
  		if (slideIndex > slides.length) {slideIndex = 1}
  		for (i = 0; i < slides.length; i++) {
      		slides[i].style.display = "none";
  		}
  		for (i = 0; i < dots.length; i++) {
      		dots[i].className = dots[i].className.replace(" active", "");
  		}
  		slides[slideIndex-1].style.display = "block";
  		dots[slideIndex-1].className += " active";
  		slideIndex++;
  	}
	</script>
	<div class="center">
		<div class="top-center">
			<div id="bestseller">
				<div id="im">
					<img src="/TermProject/img/center-top-img1.jpeg">
				</div>
				<div id="center_text">
					<div id="center_headtext">
						BEST SELLERS
					</div>
					<br>#많이 팔렸어요<br>
					빅플레인 베스트셀러 모음!<br><br><br><br>
					<button onclick="location.href='goods_list.php'"> VIEW MORE </button>
				</div>
			</div>
			<div id="suncare">
				<div id="center_text">
					<div id="center_headtext">
						SUNCARE
					</div>
					<br>피부와 바다를 모두 생각한<br>
					빅플레인 선스크린을 만나보세요.<br><br><br><br>
					<button onclick="location.href='goods_list.php'"> VIEW MORE </button>
				</div>
				<img src="/TermProject/img/center-top-img2.jpeg">
			</div>
			<div id="greenful">
				<img src="/TermProject/img/center-top-img3.jpeg">
				<div id="center_text">	
					<div id="center_headtext">
						GREENFUL
					</div>
					<br>피부 정화 효과에 도움을 주는 녹두추출물.<br>
					빅플레인 스테디 셀러 녹두 약산성 클렌징폼부터<br>
					신제품 녹두 밸런싱 크림까지! <br>
					더욱 다채로워진 빅플레인 녹두 라인
					<br><br><br><br>
					<button onclick="location.href='goods_list.php'"> VIEW MORE </button>
				</div>
			</div>
		</div>
		<div class="midcenter">
			<div class="product">
				PRODUCT
			</div>
			<div class="productslide-container">
				<a class="prev-product" onclick="prodplusSlides(-1)">&#10094;</a>

				<?php
					$query = mysqli_query($conn, "SELECT MAX(id) FROM product");
					$max = mysqli_fetch_array($query);
					$size = $max[0];
					$sql = "SELECT * FROM product";
					$query2 = mysqli_query($conn, $sql);
					for($i= 0; $i<$max[0]/3; $i++){
						$product = mysqli_fetch_array($query2);
						$goodsid = $product['id'];
						?>
						<div class="myprod fade">
							<div class="pim">
								<img onclick="location.href='goods_view.php?goodsid=<?=$goodsid?>'" src=<?= $product['imgurl']?>>
								<div onclick="location.href='goods_view.php?goodsid=<?=$goodsid?>'" class="ptext">
									<?= $product['name'] ?>
									<br>
									<?= $product['price']?>
									원
								</div>
							</div>
							<?php 
							$product = mysqli_fetch_array($query2);
							$goodsid = $product['id'];
							?>
							<div class="pim">
								<img onclick="location.href='goods_view.php?goodsid=<?=$goodsid?>'" src=<?= $product['imgurl']?>>
								<div onclick="location.href='goods_view.php?goodsid=<?=$goodsid?>'" class="ptext">
									<?= $product['name'] ?>
									<br>
									<?= $product['price']?>
									원
								</div>
							</div>
							<?php 
							$product = mysqli_fetch_array($query2);
							$goodsid = $product['id'];
							?>
							<div class="pim">
								<img onclick="location.href='goods_view.php?goodsid=<?=$goodsid?>'" src=<?= $product['imgurl']?>>
								<div onclick="location.href='goods_view.php?goodsid=<?=$goodsid?>'" class="ptext">
									<?= $product['name'] ?>
									<br>
									<?= $product['price']?>
									원
								</div>
							</div>	
						</div>
						<?php
					}
				?>
				<a class="next-product" onclick="prodplusSlides(1)">&#10095;</a>
			</div>
		</div>
		<script type="text/javascript">
			var productIndex = 1;
			prodshowSlides(productIndex);

			// Next/previous controls
			function prodplusSlides(n) {
  				prodshowSlides(productIndex += n);
			}
			// Thumbnail image controls
			function prodcurrentSlide(n) {
  				prodshowSlides(productIndex = n);
			}
			function prodshowSlides(n) {
  				var j;
  				var productslides = document.getElementsByClassName("myprod");
 				if (n < 1) {productIndex = productslides.length}
 				if (productIndex > productslides.length) {productIndex = 1}
 				for (j = 0; j < productslides.length; j++) {
     				productslides[j].style.display = "none";
  				}
  				productslides[productIndex-1].style.display = "flex";
			}
		</script>
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