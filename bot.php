<html>
<head><meta charset="utf-8">
<title>Bot is running</title>
<link rel="icon" type="image/png" href="https://cryptologos.cc/logos/binance-usd-busd-logo.png"/>
<script src="img/jquery.min.js"></script>
<link rel="stylesheet" href="index.css">
<style>a {
  color: hotpink;
}</style>
</head>
<body style="background-color:black;">
<script>
	if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
localStorage.setItem("symbol", "<?php $symbol = fopen('scratch/symbol','r');echo fgets($symbol);fclose($symbol);?>");
localStorage.setItem("askPrice", "<?php $askPrice = fopen('scratch/askPrice','r');echo fgets($askPrice);fclose($askPrice);?>");
localStorage.setItem("executed", "<?php $executed = fopen('scratch/Executed','r');echo fgets($executed);fclose($executed);?>");
localStorage.setItem("Total", "<?php $Total = fopen('scratch/Total','r');echo fgets($Total);fclose($Total);?>");
</script>
<br>
<br><br><br>
<center>
<form action="" method="POST">
	  <table><tbody ><tr><td>Bid Price : </td><td><center><table>
		<td></td>
	<td height="30"><center>|<br><div id='cryptologo'></div>

		<table>
<tbody>
<tr><div id='info'></tr>
</tbody>
</table>
		</center></td><td></td><tbody ><tr>
</tr></tbody></table></center> 
		<td width="20%"><table style="background-color: #1D1D1D"><td><font size='5.5'><div id="realproF"></div></font> <div id='res12'></div></td></table></td><td></td></tr><tr><td></td>	
		<td><div class="container"><div class="progressbar"></div></div></td><td><font size="1"> <div id="infoPercentage"></div></span></font></td></tr></tbody></table><hr>
 <center>   
 <table ><thead>
	  <tr style="background-color: #5A5050">
		<th><font size="1">คู่เหรียญเทรด</font></th>
		<th><font size="1">Average</font></th>		
		<th><font size="1">Executed</font></th>
		<th><font size="1">Total</font></th>
		<th><font size="2">ตอนนี้มี</font></th>
	  </tr></thead><tbody>
	   <tr style="background-color: #1D1D1D">
		 <td><div id='res001'></div></td>
		 <td><font color="pink"><u><div id='res3' style='user-select: all; cursor: pointer;'></div></u></font></td>		 
		 <td><font color="violet"><u><div id='res2' style='user-select: all; cursor: pointer;'></div></u></font></td>
		 <td><font color="yellow"><u><div id='res' style='user-select: all; cursor: pointer;'></div></u></font></td>
		 <td><font color="white"><u><div id='resnowday' style='user-select: all; cursor: pointer;'></div></u></font></td>
		 </tr></tbody></table></center>
		 <!-- <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
  <script type="text/javascript">
  new TradingView.widget(
  {
  "height": 300,
  "width": 350,
  "symbol": "BINANCE:"+ localStorage.getItem("NameCoin") +"BUSD",
  "interval": "60",
  "timezone": "Etc/UTC",
  "theme": "dark",
  "style": "1",
  "locale": "en",
  "toolbar_bg": "#f1f3f6",
  "enable_publishing": false,
  "hide_top_toolbar": true,
  "hide_legend": true,
  "save_image": false,
  "studies": [
    "MACD@tv-basicstudies",
	"PivotPointsStandard@tv-basicstudies"
  ],
  "container_id": "tradingview_a54ec"
}
  );
  </script>	 -->
		 <center>
.......<br>
[Bot is runing]
<br>
<h2><div id="botsay"></div></h2>
<div id="macdsig"></div>

<center><br><input type="submit" name="sellnow" class="button-sellnow" value="🛑 STOP BOT"/></center>
</form>
<hr>
<table border='1' style="background-color: #393801;">
<tbody><tr><td>
   <?php
		if(array_key_exists('sellnow', $_POST)) {
			button4();
		}
		function button4() {
			exec("node sellmarket.js", $output); 
			echo implode("\n", $output);
			header( "refresh:1;url=index.php");
		}
		exec("node check-balance.js", $output); 
		echo implode("\n", $output);
		?>
			</td></tr></tbody></table><br>
		</center>

<script src="index.js"></script>
</body>
</html>