// JavaScript Document

	function Btn_1() {
		//window.location.href = "index_2.html";
		window.location.href = "index.html";
	}
	
	function Btn_2() {
		window.location.href = "index_3.html";
	}
	
/*	function Btn_3() {
		window.location.href = "index.html";
	}
*/	
/*	
	function pollNow() {
		showVideo = document.getElementById('mainTable');
		//if (showVideo.style.display === 'none') {
		//	showVideo.style.display = 'block';
		//} else {
			showVideo.style.display = 'none';
		//}
		document.getElementById("mainPoll").innerHTML = "<div class=\"btn btn-1 btn-1e\" onclick=\"backSpace()\">瀏覽更多參賽作品</div><br/><img src=\"img/poll_top.png\" width=\"640px\" align=\"center\" /><br/><br/><iframe src=\"poll_2.html\" style=\"width:640px;height:430px;border:0;\">Loading poll...</iframe>";
		document.getElementById("randVideo").innerHTML = "";
	}
	

	
	function backSpace() {
		window.location.replace('poll.html');
	}
	
	function initiate (){
		randVideo();
		// 首次載入時顯示當前影片按鈕高亮
		document.getElementById("videoBtn_"+ RandNum).src = "images/poll/videoBtn_" + RandNum + "_s.png";
		onClick();
	}

	function randVideo(){
		// 註解：在 JavaScript 定義區內，每一行寫在雙斜線／／後面的都會變註解文字，不會產生任何實質作用。
		// 說明：利用 randon() 取得 0~1 間的隨機數值後，乘以圖片數，取整數值出來，再把取得的值套入要輸出的變數中，這樣跟變數所用的值一樣編號的圖就會跑出來。
		// 授權：能開網頁原始碼看到這些源碼，也能理解內容的人，都可以自由使用這些程式碼部分，至於註解請視情況自行處理。
		// 第一步：先宣告代表圖片連結的變數名稱(可更改)為 CloPoiImg ，並建立存放圖片的矩陣。
		RanLink = new Array(21); //←數字請填寫圖片張數減去一的值
		// 第二步：在變數 CloPoiImg 的矩陣中，在由 0~(n-1) 排列的手動指定值中，填入需要代入的字串(這裡因為是要放圖所以是填圖片所在超連結)。
		RanLink[0] = "LZo8hvsxNqA" ; // 言身寸木木金昌
		RanLink[1] = "cjvWRkzQ-aM" ; // 鶴丸派
		RanLink[2] = "6h80qurzFCI" ; // 樂刻
		RanLink[3] = "LDJ5OoAJ2hs" ; // 雌雄同體沒有他
		RanLink[4] = "iebE4o9nUEA" ; // 柒月拾玖
		RanLink[5] = "Cur8uJZ2560" ; // 拍板
		RanLink[6] = "TF5i7lcLDXk" ; // 牛肉加膠花
		RanLink[7] = "A25uvVQ9dXw" ; // 一本元華隊
		RanLink[8] = "gq_-S6sBDxA" ; // Trigger
		RanLink[9] = "6-AOCQcBu28" ; // PTAF
		RanLink[10] = "D7cocY9kNrc" ; // MM
		RanLink[11] = "DcjJf_0cnEo" ; // Mist Studio
		RanLink[12] = "Z5w-pSE8lW8" ; // Making‧覓境
		RanLink[13] = "8-ykkl6ZQaI" ; // Error404
		RanLink[14] = "E9eYkUM0PhY" ; // Chamber
		RanLink[15] = "zk4UXl0w3Pw" ; // Artillery Production
		RanLink[16] = "vojuwz62PY4" ; // AC1 Cheese Cake
		RanLink[17] = "b4MnIVN6Jco" ; // 1212
		RanLink[18] = "5yWRDcLVp_Y" ; // 二創方程
		RanLink[19] = "Tb2U41ri7Ac" ; // Space Bar
		RanLink[20] = "Xa7Afko62OI" ; // 日青
		RanLink[21] = "inHEzoAO37U" ; // 港大太空
		// 第三步：利用數學式取得隨機整數
		RandNum = Math.floor(Math.random()*22); //←數字請填寫圖片張數的值
		// 隨機到的影片視作最後一次CLICK的第一個記錄
		laClick = RandNum;
		// 第四步：輸出取得的變數值，並套用到希望輸出的格式中。另外在這裡會看到反斜線＼，這叫做跳脫字元，是加在某些特殊字元前面，讓程式知道要把這裡的特殊字元當字串看，而不是當成指令來執行用的。
		document.getElementById("randVideo").innerHTML = "<iframe name=\"ytp\" id=\"ytp\" width=\"640\" height=\"360\" src=\"https://www.youtube.com/embed/" + RanLink[RandNum] + "?controls=0&amp;showinfo=1&amp;autoplay=1\" frameborder=\"0\" allowfullscreen></iframe>";
	}

	function onClick(){
		// 把被點擊的按鈕ID儲存
		var buttons = document.getElementsByTagName("input");
		var buttonsCount = buttons.length;
		for (var i = 0; i <= buttonsCount; i += 1) {
			buttons[i].onclick = function(e) {
				clickedBtn = (this.id);
				whenClick();
			};
		}
	}

	function whenClick(){
		// 計算被點擊的按鈕編號
	/*	if (clickedBtn.length = 10) {
			clickedNum = clickedBtn.substring(9);
		} else {
			clickedNum = clickedBtn.substring(10);
		}
	*/
/*		// 抽取 clickedBtn 參數中第9位數，並儲存在 clickedNum 參數中
		clickedNum = clickedBtn.substring(9);
		// 把點擊過的圖片轉換 *只有當上一次點擊的按鈕與新點擊的按鈕編號不同時才執行
		if (clickedNum != laClick) {
			document.getElementById("videoBtn_" + clickedNum).src = "images/poll/videoBtn_" + clickedNum + "_s.png";
			// 把最後一次CLICK的按鈕換成一般狀態
			document.getElementById("videoBtn_" + laClick).src = "images/poll/videoBtn_" + laClick + "_n.png";
			// 按照點擊的按鈕編號載入影片
			document.getElementById("randVideo").innerHTML = "<iframe name=\"ytp\" id=\"ytp\" width=\"640\" height=\"360\" src=\"https://www.youtube.com/embed/" + RanLink[clickedNum] + "?controls=0&amp;showinfo=1&amp;autoplay=1\" frameborder=\"0\" allowfullscreen></iframe>";
			// 更新最後一次CLICK的記錄
			laClick = clickedNum;
			}
	}
	
	window.addEventListener("load", initiate, false);
	window.addEventListener("click", onClick, false);
*/