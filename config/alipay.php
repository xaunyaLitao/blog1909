<?php
return array (	
		//应用ID,您的APPID。
		'app_id' => "2016101900720833",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIIEogIBAAKCAQEAuCIipp9Va4D4ZUbDwkXKrKot5pzX+7DYp5P/4+qzK3rMNL44jcaN3J3RvEOrL+GHKKxMCSHBblblo7WKIRhiaaiG6XLS9vxPfWtA3BuOfWJcBSoN3Lxl1xoleYki8YKGCAL4MV4h1Hal9Oq+h2sQdwN2+dTiFl98E1iBud/A4RfIA07+PEOriSRhPsVenwtZ9NXoQdKuuTWfgB0LymqHV41kxMSt1jLIbtvHna5MWoHzYVltPN7CUzIRkFsvwkxS4YIMutqDZFmxDGOnqhguBxhK8celahNcRwNc2cYLmH8fKvFwzZIdJfxckNpcplPDCVt83A63xcmPn/LamuFjuQIDAQABAoIBAE2+o/DEP5XHe5mPWmIxg5SJuh2vxYXQsnl3BMkftIy8KXJvioNZ/VXUENUzoRjzWVT0ApqsdPZ4nDcWFH9Kw2qnLGdvAuIjwBBNc7I7tFr+Z6oKipXTuhArSv1YyLc+DAdf8ZkujIwfmIyjfNTCgM4vWVG878TQhhvI9+UaM18WKwlyUpoGkBJ4sciOP1AJpEcFjXRUF74B74w/GRAjL5k3ODTO5oI6yxFFkkjBM4QgLgCkOzz2Wvkdyi7qk4EJtWd/7Ril2pnZIpF97uG22I0V4suCDSAI7x2jSfgX7tRTibbvlrBzU/ItHdR5pWZM2+x+gj/DBO+fcmu9bg8Jme0CgYEA3leA0dFNfxr0xtyJQ7qLwc1y32si/5C+76oC7o2Qd8izYV0vvDHEJTuFKBu8HETyrABSPRuoXtZnoy45hmV+GZdh0RlV4WEMe+W/0gJlXZ49SWqLRtvowjb6ZG938x2W/ncP3fqxvh55lkALRNxyyu9fcxae2iwxjU8yIy8/eO8CgYEA1AHswjwCJ0bn7cjFAsokIWdmZc8FWmA1D3V0Ru6sfXHB02hBlZtHkxyJXzvl4Xh9TUYfU5IYM4z+D7b9MoCDvp8D489N9owUQqljPvgIRw+/6MR2zj1J6F8wCxmRTLil9c7bHDMoRUvLybb6k5DUzR/t5Rh1QLl6+iweNJScXdcCfyjR59SdmJy9VjMsSgclOINcNLrP8Jz69hMKI3+ofd1/+27krN7gRCKRyuCSNvb5sZPieza83SyMMHrFAcqq13vbTxoUjK/UIXadt5nW1sVZR+cyqF9aAGGntlC6Jkt8IzyUn1UhsYA2GBx9pZP+5RRc3ilC/ecQNgi7gXj0M7MCgYEAl3ZslHPUwgTJS7sk7RJHb8n0gQW++EtFfS7XjJmVh+WOqR+Rw3V1VCeOCQi8+jFfq6ZOWSFFwwaWt9lu2PaxqKzoVYfUVjDLhLiJXAJNv58D5yL9Eej9dVMT+sogYWSFxLAtH994hNFa3VipemV9crK9/e9UTZJ1xmdgiQYnFG8CgYEAocSE1hFMU8IE7+8CSkN2Mh8WntZR7SqYUxFuVbq4zlZEc7fd1QftcMhdvkldW5Ed0GjD6D3oXYAZj5GqAGzynDc4kjEtQ8ACfpOQu0cOFA2i8j7XJ+zUyto4IfJOUHnIrtSm6XaIlysmG3Q0rklYcSJa5s1/EgVWP7/D/rZeBd8=",
		
		//异步通知地址
		'notify_url' => "http://工程公网访问地址/alipay.trade.wap.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://www.1909.com/return_url",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAtXSWo5q49WFjLRNbJ/K5htZXNVOeT1O7YHGppRrN2ngkDVNgNeGgMMgNxnJNPq0RKjZWk2TZeGiUC87zwYwberocVUP5PtlxIAjvABHLUUpEHTKRcsQCNrhHFmg66TEXwdgVeb2LzmPLcwhoHFCmRHnhMSuVS/m+lQiuDTtdExm2sBWCP5/YS8o8Cj17rvS8pG9fF0XCBO641id3TY8NciEl2+xt5c7UYNdnMAzf+AmwrZ4D5uGRcGl7V6gY2Mt5SentthXUzWhuJde9eNqd21757GtzgEVYndQknOEIT4UaxByjfBGgJB6BvfIqSTnFIqXNjOLSV3/QkcmUzJPLbQIDAQAB",
		
	
);