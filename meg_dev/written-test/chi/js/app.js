
var cGreen = "#A3F994";
var cWhite = "white";
var cGrey = "#CCCCCC";
var cOrange = "#FF6600";
var cLawngreen = "#7CFC00"

function clickThis(obj) {
  obj.style.backgroundColor = cGreen;
  if (Answer != obj.id) {
	 Answer = obj.id;
	 if (obj.id != "A") document.all["A"].style.backgroundColor = cWhite;
	 if (obj.id != "B") document.all["B"].style.backgroundColor = cWhite;
	 if (obj.id != "C") document.all["C"].style.backgroundColor = cWhite;
	 if (obj.id != "D") document.all["D"].style.backgroundColor = cWhite;
  }
  selectAnswer(obj);
}

function mOverControl(obj) {
  obj.style.backgroundColor = cOrange;      
  document.body.style.cursor = "hand";
}

function mOutControl(obj) {
  obj.style.backgroundColor = cLawngreen;
  document.body.style.cursor = "default";
}

function translateAnswer(value){
	var result;
	switch(value){
		case "1":
			result = "A";
			break;
		case "2":
			result = "B";
			break;
		case "3":
			result = "C";
			break;
		case "4":
			result = "D";
			break;
	}
	return result;
}

function selectAnswer(obj) {
  document.all.Answer.innerHTML = translateAnswer(obj.value);;
  document.frmTest.txtAnswer.value = obj.value;
  document.all["AnswerLabel"].style.color = "red";
}

function jumpQuestion(iDir) {
  //document.frmTest.qseq.value = parseFloat(document.frmTest.qseq.value) + iDir;
  //document.frmTest.submit();
  var code = document.frmTest.code.value;
  window.location = "question.php?code=" + code;
}

   
function anotherSet() {
	if (location.href)
		location.href = 'index.php';
	else
		location.replace('index.php');   
}
   
function exitTest() {
  window.close();
}
   
function checkAnswer() {
  if (document.frmTest.txtAnswer.value == "") {
	  alert("請選擇答案!");
	  return;
	}
  document.frmTest.submit();
}   

function bookmark(obj) {
  document.frmTest.txtBookmark.value = document.frmTest.txtBookmark.value == "Y" ? "N" : "Y";
  obj.innerHTML = document.frmTest.txtBookmark.value == "Y" ? "刪除覆覽標示" : "覆覽標示";
  if (document.frmTest.txtAnswer.value != "")
	 document.all["Q" + document.frmTest.txtQuestionID.value].background = document.frmTest.txtBookmark.value == "Y" ? "images/test/legend_marked_answered.gif" : "images/test/legend_answered.gif";
  else
	 document.all["Q" + document.frmTest.txtQuestionID.value].background = document.frmTest.txtBookmark.value == "Y" ? "images/test/legend_marked.gif" : "images/test/legend_unanswered.gif";
}

function finishExam() {
  var code = document.frmTest.code.value;
  window.location = "result.php?code=" + code;
}

function jump2Question(QuestionID) {
  var code = document.frmTest.code.value;
  window.location = "question.php?code=" + code;
}

function gotoPart(part) {
  window.location = "index.php?part=" + part;
}

function disableAll(Mode) {
  document.frmTest.btnAnswer1.disabled = Mode;
  document.frmTest.btnAnswer2.disabled = Mode;
  document.frmTest.btnAnswer3.disabled = Mode;
  document.frmTest.btnPrevious.disabled = Mode;
  document.frmTest.btnNext.disabled = Mode;
  document.frmTest.btnBookmark.disabled = Mode;
  document.frmTest.btnFinish.disabled = Mode;
}

var Answer = "";

function mOver(obj) {
  if ((obj.style.backgroundColor).toUpperCase() != cGreen)
	 obj.style.backgroundColor = cGrey;
  document.body.style.cursor = "hand";
}

function mOut(obj) {
  if ((obj.style.backgroundColor).toUpperCase() != cGreen)
	 obj.style.backgroundColor = cWhite;
  document.body.style.cursor = "default";
}


var ExamReminder = 300000;
var iTimerID = setInterval("countDown()", 1000);
var red = false;
var now = $('#now').val() * 1000;
var create_time = $('#create_time').val();
var expired_time = $('#expired_time').val();
function countDown() {
	now += 1000;
	var remainTime = expired_time - now;
	var passTime = now - create_time;
	$('#ExamTimer').html(formatTime(remainTime));
	if (remainTime <= ExamReminder) {
		
		if(red){
			$('#ExamTimer').css('color', 'black');
			$('#ExamTimer').css('textDecoration', 'none');
		} else {
			$('#ExamTimer').css('color', 'red');
			$('#ExamTimer').css('textDecoration', 'underline');
		}
		red = !red;
	}

	if (remainTime <= 0) {
		clearInterval(iTimerID);
	//	var code = document.frmTest.code.value;
		window.location = "result.php?code=" + $('#code').val();
	}
}

function formatTime(time){
	var d = new Date(time);
	var min = d.getMinutes();
	var sec = d.getSeconds();
	var result = (min < 10 ? "0" + min : min) + " 分鐘 " + (sec < 10 ? "0" + sec : sec) + " 秒";
	return result;

}


