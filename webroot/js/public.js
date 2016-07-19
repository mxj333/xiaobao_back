//判断当前浏览器是否为微信内置的浏览器
function is_weixin(){
	var ua = navigator.userAgent.toLowerCase();
	if(ua.match(/MicroMessenger/i)=="micromessenger") {
		return true;
 	} else {
 		alert('不是微信浏览器');
		return false;
	}
}