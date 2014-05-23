function getNowDate(){	
	var now = new Date();
	var hour = now.getHours();
	var minute = now.getMinutes();
	var second = now.getSeconds();
	if(hour < 10){
		hour = "0"+hour;
	}	
	if(minute < 10){
		minute = "0"+minute;
	}
	if(second < 10){
		second = "0"+second;
	}
	var utcHour=now.getUTCHours();
	var utcMinute=now.getUTCMinutes();
	var utcSecond=now.getUTCSeconds();	
	if(utcHour < 10){
		utcHour = "0"+utcHour;
	}
	if(utcMinute < 10){
		utcMinute = "0"+utcMinute;
	}
	if(utcSecond < 10){
		utcSecond = "0"+utcSecond;
	}	
	$("#refreshTime").html(hour+":"+minute+":"+second);
	$("#refreshTimegmt").html(utcHour+":"+utcMinute+":"+utcSecond);
	setTimeout("getNowDate()",1000);
}
