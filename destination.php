<?php
include("assets/connection.php");
session_start();
if (!isset($_REQUEST['id']) && !isset($_REQUEST['mych'])) {
	header('location: http://localhost/tt');
}
if (isset($_REQUEST['mych']))
	$mych = $_REQUEST['mych'];
if (isset($_REQUEST['id']))
	$sid = $_REQUEST['id'];
if (!isset($_REQUEST['mych']))
	$decryptedId = decryptId($sid);
if (!isset($_REQUEST['mych']))
	if (isset($_SESSION['user_id']) && $decryptedId == null && $mych == null) {
		header('location:http://localhost/tt');
	}
if (!isset($_REQUEST['mych']))
	if ($decryptedId == null && $mych == null) {
		header('location: http://localhost/tt');
	}
function encryptId($id)
{
	$key = "your_secret_key";  // Replace with a strong secret key
	$cipher = "aes-256-cbc";   // AES encryption with a 256-bit key in CBC mode

	$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
	$encryptedId = openssl_encrypt($id, $cipher, $key, 0, $iv);

	// Encode the encrypted data and IV for URL safety
	$encryptedId = base64_encode($iv . $encryptedId);

	return $encryptedId;
}
function decryptId($encryptedId)
{
	$key = "your_secret_key";  // Replace with the same secret key used for encryption
	$cipher = "aes-256-cbc";   // AES encryption with a 256-bit key in CBC mode

	// Decode the encrypted data and IV
	$data = base64_decode($encryptedId);
	$iv = substr($data, 0, openssl_cipher_iv_length($cipher));
	$encryptedId = substr($data, openssl_cipher_iv_length($cipher));

	// Decrypt the id
	$decryptedId = openssl_decrypt($encryptedId, $cipher, $key, 0, $iv);

	return $decryptedId;
}
if ($_SERVER['HTTP_REFERER'] == null) {
	header("Location: http://localhost/tt");
	exit();
}
// Store the current page URL in the session
if (isset($_REQUEST['mych'])) {
	$t = "select * from destinations where link='$mych'";
	$table = mysqli_query($con, $t);
	$row2 = mysqli_fetch_assoc($table);
} else {
	$t = "select * from destinations where destination_id=$decryptedId";
	$table = mysqli_query($con, $t);
	$row2 = mysqli_fetch_assoc($table);
	$link = $row2['link'];
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
	<!-- META DATA -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<script>
		function destination() {
			window.location.href = "./index.php#gallery";
		}

		function soffers() {
			window.location.href = "./index.php#spo";
		}

		function cars() {
			window.location.href = "./trick.php?mych=6";
		}

		function hotels() {
			window.location.href = "./trick.php?mych=7";
		}

		function profile() {
			window.location.href = "./trick.php?mych=2";
		}

		function logout() {
			window.location.href = "./trick.php?mych=1";
		}

		function userlogin() {
			window.location.href = "./trick.php?mych=3";
		}
	</script>

</head>

<body>
	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
			your browser</a> to improve your experience and security.</p>
		<![endif]-->
	<?php
	include("assets/cssjs.php");
	?>

	<!-- main-menu Start -->
	<header class="top-area">
		<div class="header-area">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="logo">
							<a href="http://localhost/tt">
								<span>Take A Trip</span>
							</a>
						</div><!-- /.logo-->
					</div><!-- /.col-->
					<div class="col-sm-10">
						<div class="main-menu">

							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
									<i class="fa fa-bars"></i>
								</button><!-- / button-->
							</div><!-- /.navbar-header-->
							<div class="collapse navbar-collapse">
								<ul class="nav navbar-nav navbar-right">
									<li class="smooth-menu"><a href="#home">home</a></li>
									<li class="smooth-menu" onclick="destination();"><a href="">Destination</a></li>
									<li class="smooth-menu"><a href="#pack">Packages </a></li>
									<li class="smooth-menu" onclick="soffers();"><a href="">Special Offer</a></li>
									<li class="smooth-menu" onclick="cars();"><a href="">Cars</a></li>
									<li class="smooth-menu" onclick="hotels();"><a href="">Hotels</a></li>
									<li>
										<!-- Changed by Anand -->
										<form action="booknow.php" method="post">
											<input type="submit" class="book-btn" action="booknow.php" value="book now ">
										</form>
										<!-- <button class="book-btn" action> book now  </button> -->
									</li><!--/.project-btn-->
									<?php
									// Check if the user is logged in
									if (isset($_SESSION['user_id'])) { ?>
										<li class="smooth-menu" onclick="profile();"><a href="">Profile</a></li>
										<li class="smooth-menu" onclick="logout();"><a href="">Logout</a></li>
									<?php
									} else { ?>
										<li class="smooth-menu" onclick="userlogin();"><a href="">Login</a></li>
									<?php } ?>
								</ul>
							</div><!-- /.navbar-collapse -->
						</div><!-- /.main-menu-->
					</div><!-- /.col-->
				</div><!-- /.row -->
				<div class="home-border"></div><!-- /.home-border-->
			</div><!-- /.container-->
		</div><!-- /.header-area -->

	</header><!-- /.top-area-->
	<!-- main-menu End -->


	<!--about-us start -->
	<section id="home" class="centind">
		<div class="container">
			<div class="about-us-content">
				<div class="row">
					<div class="col-sm-12">
						<div class="single-about-us">
							<div class="about-us-txt">
								<h1 style="font-size: 100px; color: white;">
									<?php echo $row2['region'] ?>
								</h1>
							</div><!--/.about-us-txt-->
						</div><!--/.single-about-us-->
					</div><!--/.col-->
				</div><!--/.row-->
			</div><!--/.about-us-content-->
		</div><!--/.container-->
	</section><!--/.about-us-->
	<!--about-us end -->

	<!--packages start-->
	<section id="pack" class="packages">
		<div class="container">
			<div class="gallary-header text-center">
				<h1>
					<?php echo strtoupper($row2['region']) ?>
				</h1>
				<h4>Let Explore our India from Center Side</h4>
			</div><!--/.gallery-header-->
			<div class="packages-content">
				<div class="row">
					<?php
					include("assets/connection.php");
					if (isset($_REQUEST['mych'])) {
						$mych = $_REQUEST['mych'];
						$sql = "SELECT * FROM $mych ORDER BY id";
					} else
						$sql = "SELECT * FROM $link ORDER BY id";
					$result = mysqli_query($con, $sql);
					while ($row = mysqli_fetch_assoc($result)) {
						$imageURL = 'assets/images/packages/' . $row["image"];
						include("assets/connection.php");
						if ($row['availability'] == 1) {
					?>
							<div class="col-md-4 col-sm-6">
								<div class="single-package-item">
									<img id="mp" src="<?php echo $imageURL; ?>" alt="package-place" />
									<div class="single-package-item-txt">
										<h3><?php echo $row["name"]; ?>
											<span class="pull-right">
												<?php echo '₹' . $row["price"] . '/Day'; ?>
											</span>
										</h3>
										<div class="packages-para">
											<p>
												<span><i class="fa fa-angle-right"></i><?php echo $row["duration"]; ?></span>
												<i class="fa fa-angle-right"></i><?php echo $row["accommodation"]; ?> <!-- Additional car details can be added here -->
											</p>
											<p>
												<span>
													<i class="fa fa-angle-right"></i> <?php echo $row["transportation"]; ?></span>
												<i class="fa fa-angle-right"></i><?php echo $row["food_facilities"]; ?>
											</p>
										</div>
										<!--/.packages-para-->
										<div class="packages-review">
											<p>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<span><?php echo $row["reviews_count"]; ?> reviews</span>
											</p>
										</div>
										<!--/.packages-review-->
										<div class="about-btn">
											<?php
											if (isset($_SESSION['user_id'])) {
												$encryptedId = encryptId($row['id']); ?>
												<a href="booking.php?id=<?php echo urlencode($encryptedId); ?>&mych=<?php echo $row2['link'] ?>"><button type="submit" class="about-view packages-btn">book now</button></a>
											<?php
											} else { ?>
												<button type="submit" class="about-view packages-btn" onclick="userlogin();">book now</button>
												<!--/.about-btn-->
											<?php }	?>
										</div>
										<!--/.about-btn-->
									</div>
									<!--/.single-package-item-txt-->
								</div>
								<!--/.single-package-item-->
							</div>
							<!--/.col-->
					<?php
						}
					}
					?>
				</div>
				<!--/.row-->
			</div>
			<!--/.packages-content-->
		</div>
		<!--/.container-->
	</section><!--/.packages-->
	<!--packages end-->

	<?php
	include("assets/footer.php");
	?>
</body>

</html>