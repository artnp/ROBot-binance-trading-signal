if (typeof localStorage === "undefined" || localStorage === null) {
    var LocalStorage = require('node-localstorage').LocalStorage;
    localStorage = new LocalStorage('./scratch');
  }    

  localStorage['akey'] = '';
  localStorage['skey'] = '';
  var fee = 0.001; //0.075 มีปัญหาแก้ตรงนี้เป็น 0.001
  
  var keys = {
    "akey" : localStorage['akey'],
    "skey" : localStorage['skey']}
    const crypto = require('crypto');
    var XMLHttpRequest = require("xmlhttprequest").XMLHttpRequest;
    var burl = "https://api.binance.com";
 

    localStorage['askPrice'] = 0;
    localStorage['Executed'] = 0;
    localStorage['Total'] = 0;
    
    	//หน่วงเวลา
  async function delay(delayInms) {
    return new Promise(resolve  => {
      setTimeout(() => {
        resolve(2);
      }, delayInms);
    });
  }
  async function slowdown() {
    ///////// เช็คยอดเงินในกระเป๋า+หักค่าธรรมเนียม
    var endPoint = '/api/v3/account';
    var dataQueryString = 'timestamp=' + Date.now();
    var signature = crypto.createHmac('sha256',keys['skey']).update(dataQueryString).digest('hex');
    var url = burl + endPoint + '?' + dataQueryString + '&signature=' + signature;
    var ourRequest = new XMLHttpRequest();
    ourRequest.open('GET',  url , true);
    ourRequest.setRequestHeader('X-MBX-APIKEY', keys['akey']);
    ourRequest.onload = function(){
    ourData = JSON.parse(ourRequest.responseText);
    localStorage['busdwallet'] = Number((ourData.balances[188].free - ((ourData.balances[188].free * fee)/100)).toFixed(3));
    }
    ourRequest.send();


              //ราคา askPrice สำหรับใส่ askPrice
    var endPoint5 = "/api/v3/ticker/bookTicker?symbol=" + localStorage['symbol'] + "BUSD";
    var url5 = burl + endPoint5;
    var ourRequest5 = new XMLHttpRequest();
    ourRequest5.open('GET', url5 ,true);
    ourRequest5.setRequestHeader('X-MBX-APIKEY', keys['akey']);
    ourRequest5.onload = function(){
    ourData5 = JSON.parse(ourRequest5.responseText);
    localStorage['askPrice'] = parseFloat(ourData5.askPrice);    
    }
    ourRequest5.send();

    ///////////// ซื้อเหรียญคริปโตราคาตลาด
    var endPoint2 = "/api/v3/order";
    var dataQueryString2 = "symbol=" + localStorage['symbol'] + "BUSD&side=BUY&type=MARKET&quoteOrderQty="+ localStorage['busdwallet'] +"&newOrderRespType=FULL&recvWindow=20000&timestamp=" + Date.now();
    var signature2 = crypto.createHmac('sha256',keys['skey']).update(dataQueryString2).digest('hex');
    var url2 = burl + endPoint2 + '?' + dataQueryString2 + '&signature=' + signature2;
    var ourRequest2 = new XMLHttpRequest();
    ourRequest2.open('POST',url2,true);
    ourRequest2.setRequestHeader('X-MBX-APIKEY', keys['akey']);
    ourRequest2.onload = function(){
    ourData2 = JSON.parse(ourRequest2.responseText); 
    localStorage['Executed'] = parseFloat(ourData2.executedQty);
    localStorage['Total'] = parseFloat(ourData2.cummulativeQuoteQty);
    console.log(ourData2)
    }
    ourRequest2.send();



      }
      slowdown();