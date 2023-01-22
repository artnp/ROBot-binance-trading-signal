//คำนวณราคานำเข้าจาก data storage [Node.js]
forBot = localStorage.getItem("NameCoin")

document.getElementById('cryptologo').innerHTML="{" +"<img src='https://cdn.jsdelivr.net/gh/atomiclabs/cryptocurrency-icons@bea1a9722a8c63169dcc06e86182bf2c55a76bbc/128/color/"+ forBot.toLowerCase() + ".png' width='18%'>"+"}"
var AverageCrypto = localStorage.getItem("askPrice");
var ExecutedCrypto = localStorage.getItem("executed");
var TotalCrypto = localStorage.getItem("Total");
var ocoPercent = localStorage.getItem("ocoPercent");

if (AverageCrypto == 'NaN' || ExecutedCrypto == 'NaN' || TotalCrypto  == 'NaN'){
   AverageCrypto = '0'
   ExecutedCrypto = '0'
   TotalCrypto = '0'
}

//คำนวณค่าคณิตศาสตร์
var percent = ocoPercent/100;
var total = Number(TotalCrypto);
var executed = ExecutedCrypto;
var average = parseFloat(AverageCrypto.replace(/,/g, ''));
var fee = 0/100; //0/100ค่าธรรมเนียม
var resFee = (((total*fee)+total)+fee).toFixed(2);
var res4 = ((((resFee)*(percent))/executed+average)).toFixed(5);
var res7 = res4-average;
var res5 = (res7 * executed).toFixed(3) - (total * fee).toFixed(5);
var res6 = (total+res5).toFixed(5);
var res11 = ((res5*100)/total).toFixed(2) + " %";
var limit = Number(average-(((average*1.618)+average)*0.0070243)*1).toFixed(5)
var stop = Number((((limit-average)*executed)-(total*fee))).toFixed(5);

// แสดงผลคำนวณ % ขาดทุน คงเหลือ oco
document.getElementById('res001').innerHTML= forBot + ":" + "USDT";
document.getElementById('res').innerHTML=total.toFixed(1);
document.getElementById('res2').innerHTML=Number(ExecutedCrypto).toFixed(4);
document.getElementById('res3').innerHTML=average.toFixed(5);

///////////ดึง API ราคา Real time
const getzil = async () => {
	fetch("https://api.binance.com/api/v1/ticker/24hr?symbol="+ forBot +"USDT")
   .then(response => response.json())
   .then(data => {
	lastPrice = Number(data.askPrice)

		// แสดงผลราคาคริปโต Real-time
		document.getElementById("info").innerHTML = lastPrice
		resnowday = lastPrice*ExecutedCrypto
		realproF = ((resnowday-total)-((resnowday-total)*fee)).toFixed(2);
		document.getElementById('resnowday').innerHTML= "<b>" + resnowday.toFixed(2); + "</b>"
	    RealTimeProfit = (((lastPrice - average)*executed) - (((lastPrice - average)*executed)*fee)).toFixed(2);

////////////////BOT
const signal = async () => {
	fetch("https://api.binance.com/api/v3/klines?symbol="+ forBot +"USDT&interval=30m&limit=" + 27)
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
  
  if (macd > 0){
  document.getElementById("macdsig").innerHTML = macd
  } else {
  document.getElementById("macdsig").innerHTML = macd
  }
 ////////////////////////////////////////////////////////////Bot Signal
 if (macd > 0 && executed == 0){
 window.location="botbuy.php"
   } else if(macd < 0 && total > 0 && executed > 0){
	 window.location="botsell.php"
   }
 
   if (total > 0 && executed > 0){
	document.getElementById("botsay").innerHTML = 'HOLD'.fontcolor("green")
   }  else {
	document.getElementById("botsay").innerHTML = 'Waiting...'
  }
 })
 }
 signal()
///////////////////////////////////////////////
		if (((RealTimeProfit*100)/total).toFixed(2) >= 0.02) {
		document.title = "✔ ---ชนะแล้วววว  💲💲💲";
} else if ((((((lastPrice - average)*executed) - (((lastPrice - average)*executed)*fee))*100)/total).toFixed(1) < -1) {
}
if (realproF >= 0) {
		document.title = "✔" + realproF + ' $';
}
else if (realproF  < 0) {
	document.title = "❌" + realproF + ' $';
}
	   document.getElementById("realproF").innerHTML = realproF+"$";
	   res5usd = (res5 * lastPrice);
	   ProfitNowThen = (realproF * lastPrice).toFixed(2);
	   document.getElementById("res12").innerHTML =  ((RealTimeProfit*100)/total).toFixed(2) + " %"
	   if ((RealTimeProfit*100)/total >= (fee*2)) {
    document.getElementById("res12").style.color = '#14CA7E';
	}
	else {
    document.getElementById("res12").style.color = 'grey';
	}
       var percentage = ((ProfitNowThen*100)/res5usd);
	   if (percentage > 100){
		percentage = 100
	   }
$(".progressbar").animate({
	  width: percentage + "%"
},100);
	   	   if (realproF * lastPrice > 0) {
    document.getElementById("realproF").style.color = '#1FD715';
			}
			else {
    document.getElementById("realproF").style.color = '#FA2727';
			}
		})
	}
	 getzil()

	 tcount=setInterval(function(){
		tcount++
		if (tcount==20) {getzil(); tcount=0}
	  },2000);