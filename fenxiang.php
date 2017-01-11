<?php
require_once "jssdk.php";
$jssdk = new JSSDK("yourAppID", "yourAppSecret");//请在此填写认证公众号的AppID和AppSecret，并在公众号中绑定对应的域名
$signPackage = $jssdk->GetSignPackage();
?>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
wx.config({
    debug: false,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
jsApiList: [    
'checkJsApi',    
'onMenuShareTimeline',    
'onMenuShareAppMessage',    
'onMenuShareQQ',    
]    
});    
wx.ready(function(){

wx.onMenuShareTimeline({// 分享到朋友圈
    title: '分享的标题', // 分享标题
    link: window.location.href, // 分享链接
    imgUrl: 'http://www.xxx.net/images/logo.jpg', // 分享图标
    success: function () { // 分享成功后的事件
	//window.location.href="http://跳转的网址"; 
    },
    cancel: function () { 
    }
});

wx.onMenuShareAppMessage({// 分享给微信好友
    title: '分享的标题', // 分享标题
    desc: '分享的描述', // 分享描述
    link: window.location.href, // 分享链接
    imgUrl: 'http://www.xxx.net/images/logo.jpg', // 分享图标
    type: '', //此项无需填写（分享类型,music、video或link，不填默认为link）
    dataUrl: '', //此项无需填写（如果type是music或video，则要提供数据链接，默认为空）
    success: function () { // 分享成功后的事件
	//window.location.href="http://跳转的网址"; 
    },
    cancel: function () { 
    }
});

wx.onMenuShareQQ({// 分享到QQ
    title: '分享的标题', // 分享标题
    desc: '分享的描述', // 分享描述
    link: window.location.href, // 分享链接
    imgUrl: 'http://www.xxx.net/images/logo.jpg', // 分享图标
    success: function () { // 分享成功后的事件
	//window.location.href="http://跳转的网址"; 
    },
    cancel: function () { 
    }
});

});

</script>