<html>
<head><meta charset="utf-8"><title>ROBot</title>
<link rel="icon" type="image/png" href="https://cryptologos.cc/logos/binance-usd-busd-logo.png"/>
<script src="img/jquery.min.js"></script>
<link rel="stylesheet" href="index.css">
<style>a {
  color: hotpink;
}</style>
</head>
<body style="background-color:black;">
<script>
	if (window.history.replaceState) {
        window.history.replaceState( null, null, window.location.href );
    }
localStorage.setItem("executed", "<?php $executed = fopen('scratch/Executed','r');echo fgets($executed);fclose($executed);?>");
</script>
<br>
<br>
<center>
<table>
<tbody>
<tr>
<td>  <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
  <script type="text/javascript">
  new TradingView.widget(
  {
  "height": 450,
  "width": 1500,
  "symbol": "BINANCE:"+ localStorage.getItem("NameCoin") +"BUSD",
  "interval": "60",
  "timezone": "Etc/UTC",
  "theme": "dark",
  "style": "1",
  "locale": "en",
  "toolbar_bg": "#f1f3f6",
  "enable_publishing": false,
  "hide_top_toolbar": true,
  "hide_legend": false,
  "save_image": false,
  "studies": [
    "MACD@tv-basicstudies"
  ],
  "container_id": "tradingview_a54ec"
}
  );
  </script></td>
</tr>
</tbody>
</table>
<td>
<form method="post">  
<div id="checkif"></div>
<input type="text" name="NameCoin" onFocus="this.select()" id="NameCoin" style="font-size:28pt;height:30px;width:120px;">
<br><button type="submit" class="save" style="font-size:13pt;height:24px;" onClick="window.location.reload();">Enter coin</button></form> 
</td>
  <?php
              if(isset($_POST['NameCoin']))
              {
              $data=$_POST['NameCoin'];
              $fp = fopen('scratch/symbol', 'w');
              fwrite($fp, strtoupper($data));
              fclose($fp);
              }
              ?>

<div id="macdsig"></div>
<div id="button">
  <hr>
<form action="" method="POST">
<input type="submit" name="buy" class="button-buy" value="Let's Run Bot 🚀"/>
</form>
</div>
<table><td><?php
    if(array_key_exists('buy', $_POST)) {
    button1();
    }
    function button1() {
    exec("node buy.js", $output); 
    echo implode("\n", $output);
    }
		exec("node check-balance.js", $output); 
		echo implode("\n", $output);
		?></td></table>
    <br><br>
    <td>
    <button type="button"  style="font-size:12pt;" onclick="window.open('https://www.binance.com/en/my/wallet/account/main/withdrawal/crypto/BUSD','popup','width=1600,height=900')">Transfer ➜ Bitkub</button></td>
		</center>
     
    <script>
      if(localStorage) {
	$(document).ready(function() {
		$(".save").click(function() {
			var NameCoin = $("#NameCoin").val();
    		localStorage.setItem("NameCoin", NameCoin.toUpperCase())
		});
	});
} 

const signal = async () => {
	fetch("https://api.binance.com/api/v3/klines?symbol="+ localStorage.getItem("NameCoin") +"BUSD&interval=30m&limit=" + 27)
	.then(response => response.json())
	.then(result => {
  close1 = Number(result[0][4])
  close2 = Number(result[1][4])
  close3 = Number(result[2][4])
  close4 = Number(result[3][4])
  close5 = Number(result[4][4])
  close6 = Number(result[5][4])
  close7 = Number(result[6][4])
  close8 = Number(result[7][4])
  close9 = Number(result[8][4])
  close10 = Number(result[9][4])
  close11 = Number(result[10][4])
  close12 = Number(result[11][4])
  close13 = Number(result[12][4])
  close14 = Number(result[13][4])
  close15 = Number(result[14][4])
  close16 = Number(result[15][4])
  close17 = Number(result[16][4])
  close18 = Number(result[17][4])
  close19 = Number(result[18][4])
  close20 = Number(result[19][4])
  close21 = Number(result[20][4])
  close22 = Number(result[21][4])
  close23 = Number(result[22][4])
  close24 = Number(result[23][4])
  close25 = Number(result[24][4])
  close26 = Number(result[25][4])

  sma12 = (close26+close25+close24+close23+close22+close21+close20+close19+close18+close17+close16+close15)/12
  sma26 = (close26+close25+close24+close23+close22+close21+close20+close19+close18+close17+close16+close15+close14+close13+close12+close11+close10+close9+close8+close7+close6+close5+close4+close3+close2+close1)/26
  ema12 = (Number(result[26][4])*0.3333)+(sma12*(1-0.3333))
  ema26 = (Number(result[26][4])*0.3333)+(sma26*(1-0.3333))
 macd = ema12-ema26

  if (localStorage.getItem("executed") > 0){
  document.getElementById("macdsig").innerHTML = macd.toFixed(6).fontcolor("green")
  document.getElementById("button").innerHTML = "<h2>Bot is running right now!</h2>"
  window.location.href = "bot.php";
 } else if (macd > 0){
  document.getElementById("macdsig").innerHTML = macd.toFixed(6).fontcolor("green")
 } 
 else {
  document.getElementById("macdsig").innerHTML = macd.toFixed(6).fontcolor("red")
  document.getElementById("button").innerHTML = "<h2>MACD is Low! Can't buy right</h2>".fontcolor("red")
 }
 })
 fetch("https://api.binance.com/api/v1/ticker/24hr?symbol="+localStorage.getItem("NameCoin")+"BUSD" )
    .then(response => response.json())
    .then(data => {
      if (isNaN(data) == true){
      document.getElementById("checkif").innerHTML = '<u>'+localStorage.getItem("NameCoin")+'BUSD</u>'+'[✓]'.fontcolor('green')
      } else {
        document.getElementById("checkif").innerHTML = '<u>'+localStorage.getItem("NameCoin")+'BUSD</u>'+'X'.fontcolor('red')
      }
     })
     

 }
 signal()

</script>
</body>
</html>
