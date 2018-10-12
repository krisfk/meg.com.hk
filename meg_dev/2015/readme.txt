注意事項：

或者需要製作PHP的網頁-->
1.scroll_headline.html(網頁頂部的NEWS PAGE)
2.index.html內的slider banner，學車優惠及相關新聞
3.info_1(最新推廣)
4.info_3.html(模擬筆試)
5.latest_news.html, other_news.html(NEWS頁)，latest_news_temp.html, other_news_teml.html(NEWS內容頁)
6.enquiry.html(網上查詢)

-------------------------------------------------------------------------------------------------------

MENU超連結

現在的版本MENU是用JAVASCRIPT控制，超連結不需要每頁改

更改超連結方法
打開js/nav_link.js，找回同HTML相應的ID
例：
HTML	-->id="course_1"
JS	-->$("#course_1")


在JS檔內作以下更改
$("#course_1, #course_1a").click(function(){	<--如多過一個項目需要相同的連結，就在"#course_1"內加項，如左(註：HTML亦必需要有course_1a的ID)

	window.location.href = "./course_1.html";	<--如在原本視窗開啟，請用此語法更改入面的連結
			
	window.open('./course_1.html');	    	<--如在新視窗開啟，請用此語法更改入面的連結
});

註：如MENU要加項，依然都需要每頁修改

-------------------------------------------------------------------------------------------------------
底圖變更方法

底圖可以根據活動變更，圖可以REPLACE meg_webpage\images\bg01.jpg或另存新檔。
每次變更底圖，必需更改meg_webpage\css\style.css 內尋找 #wrap-lv1，更改入面的底圖顏色和圖檔位置

例：
background:#323537 url(../images/bg01.jpg) no-repeat top center;

-------------------------------------------------------------------------------------------------------

POPUP_AD

在index.html的code內尋找<!--popup_ad-->，之後在javascript內的 href: 'images/popup/001.jpg'轉回需要更換的圖檔位置。
如1要超連結，請找CODE內的
$("img.fancybox-image").click(function() {

                  window.open('http://a1driving.com.hk/main-page.html', '_blank');    <--更改入面的網頁連結           
});



如需更換POPUP關閉時間，就在
setTimeout(function () {
     $.fancybox.close();
}, 4000);

更改4000做其他數字，(注：1000=1秒)

-------------------------------------------------------------------------------------------------------

FLOAT BANNER浮動BANNER

在index.html的code內尋找
<!--float_banner-->
<div id="abgne_float_ad" style="opacity: 1;display: block; bottom: 0px; left: 0px;">
		<span class="abgne_close_ad"></span>
		<a href="http://yahoo.com.hk" target="_blank">		<--更改超連結
			<img src="images/float_banner/float_banner_001.jpg">	<--更改圖檔位置
		</a>
</div>

-------------------------------------------------------------------------------------------------------

最頂部NEWS修改

開啟scroll_headline.html在<ul>...</ul>內
更改或加上<li>日期　標題</li>
例：
<li>01/02/15　此標題最多可以寫到十二字</li>

-------------------------------------------------------------------------------------------------------

合作伙伴修改

開啟scroll_headline.html 在圖後再加上公司LOGO便可
注：因為不能自動調節網頁IFRAME高頁，所以如果增加LOGO導致需要調節高度，
請在D:\wamp\www\css內的style.css(網頁版)或style(mobile).css(手機版)內找 #cooperation ，更改height: '高度'
