<?php
	function getDataFromAPI($nameCity){
		$urlApi = "http://api.openweathermap.org/data/2.5/forecast?q={$nameCity}&appid=073f342f34bacc8898356a523fa5b4f8&units=metric&lang=vi";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $urlApi);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		$res = curl_exec($ch);
		curl_close($ch);
		$data = ($res !== null || $res !== '') ? json_decode($res, true) : [];
		return $data;
	}
	$nameCity = $_POST['txtCity'] ?? '';
	$nameCity = strip_tags($nameCity);
	$data = getDataFromAPI($nameCity);
	$listWeather = isset($data['list']) ? $data['list'] : [];
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	
</body>
</html>
<body>
	<div class="container">
		<header id="header" class="header">
			<div class="logo">
				<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQKNUMFySF_tElQStm6rLKqhZF1assxcBefYA&usqp=CAU" alt="weather">
			</div>
			<nav>
				<form action="" method="post">
				<div class="form-group">

					<input type="text" name="txtCity" id="txtCity" class="form-control" placeholder="Nhập tên thành phố">
					<input type="submit" value="Tìm kiếm" name="submit" />
				</div>
				</form>
			</nav>
<!-- 			<div id="loading">
				<img src="https://media3.giphy.com/media/3oEjI6SIIHBdRxXI40/200.gif" alt="loading">
			</div> -->
			<section id="mainResult">
				<?php require 'weather.php'; ?>
			</section>
		</header>
	</div>

</body>