�`�N�ƶ��G

�Ϊ̻ݭn�s�@PHP������-->
1.scroll_headline.html(����������NEWS PAGE)
2.index.html����slider banner�A�Ǩ��u�f�ά����s�D
3.info_1(�̷s���s)
4.info_3.html(��������)
5.latest_news.html, other_news.html(NEWS��)�Alatest_news_temp.html, other_news_teml.html(NEWS���e��)
6.enquiry.html(���W�d��)

-------------------------------------------------------------------------------------------------------

MENU�W�s��

�{�b������MENU�O��JAVASCRIPT����A�W�s�����ݭn�C����

���W�s����k
���}js/nav_link.js�A��^�PHTML������ID
�ҡG
HTML	-->id="course_1"
JS	-->$("#course_1")


�bJS�ɤ��@�H�U���
$("#course_1, #course_1a").click(function(){	<--�p�h�L�@�Ӷ��ػݭn�ۦP���s���A�N�b"#course_1"���[���A�p��(���GHTML�祲�ݭn��course_1a��ID)

	window.location.href = "./course_1.html";	<--�p�b�쥻�����}�ҡA�ХΦ��y�k���J�����s��
			
	window.open('./course_1.html');	    	<--�p�b�s�����}�ҡA�ХΦ��y�k���J�����s��
});

���G�pMENU�n�[���A�̵M���ݭn�C���ק�

-------------------------------------------------------------------------------------------------------
�����ܧ��k

���ϥi�H�ھڬ����ܧ�A�ϥi�HREPLACE meg_webpage\images\bg01.jpg�Υt�s�s�ɡC
�C���ܧ󩳹ϡA���ݧ��meg_webpage\css\style.css ���M�� #wrap-lv1�A���J���������C��M���ɦ�m

�ҡG
background:#323537 url(../images/bg01.jpg) no-repeat top center;

-------------------------------------------------------------------------------------------------------

POPUP_AD

�bindex.html��code���M��<!--popup_ad-->�A����bjavascript���� href: 'images/popup/001.jpg'��^�ݭn�󴫪����ɦ�m�C
�p1�n�W�s���A�Ч�CODE����
$("img.fancybox-image").click(function() {

                  window.open('http://a1driving.com.hk/main-page.html', '_blank');    <--���J���������s��           
});



�p�ݧ�POPUP�����ɶ��A�N�b
setTimeout(function () {
     $.fancybox.close();
}, 4000);

���4000����L�Ʀr�A(�`�G1000=1��)

-------------------------------------------------------------------------------------------------------

FLOAT BANNER�B��BANNER

�bindex.html��code���M��
<!--float_banner-->
<div id="abgne_float_ad" style="opacity: 1;display: block; bottom: 0px; left: 0px;">
		<span class="abgne_close_ad"></span>
		<a href="http://yahoo.com.hk" target="_blank">		<--���W�s��
			<img src="images/float_banner/float_banner_001.jpg">	<--�����ɦ�m
		</a>
</div>

-------------------------------------------------------------------------------------------------------

�̳���NEWS�ק�

�}��scroll_headline.html�b<ul>...</ul>��
���Υ[�W<li>����@���D</li>
�ҡG
<li>01/02/15�@�����D�̦h�i�H�g��Q�G�r</li>

-------------------------------------------------------------------------------------------------------

�X�@���ק�

�}��scroll_headline.html �b�ϫ�A�[�W���qLOGO�K�i
�`�G�]������۰ʽո`����IFRAME�����A�ҥH�p�G�W�[LOGO�ɭP�ݭn�ո`���סA
�ЦbD:\wamp\www\css����style.css(������)��style(mobile).css(�����)���� #cooperation �A���height: '����'
