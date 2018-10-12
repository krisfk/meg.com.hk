<?php

	echo 'Start';

	require("../../PHPMailer_5.2.2/class.phpmailer.php");

 	// !!! 2014-09-19 Matthew Email notification for registered user Start

		$mail2 = new PHPMailer();

		$mail2->IsSMTP();  // telling the class to use SMTP
        $mail2->Host = "210.245.164.81"; // SMTP servers
        $mail2->SMTPAuth = true; // turn on SMTP authentication
        $mail2->Username = "formmail@mail.meg.hk"; // SMTP username
        $mail2->Password = "134679as"; // SMTP password
		$mail2->Port = "366";
		$mail2->IsHTML(true);
		$mail2->CharSet = 'UTF-8';

		$mail2->SetFrom("info@meg.hk", 'info');

		$mail2->AddAddress("info@meg.hk", 'info');

		$mail2->Subject = "登記私人駕駛教師執照課程"; // !!! Matthew 2014-01-23 Email subject

		$mail2->Body = ''
. '你好:<br/>'
. '<br/>'
. '我們已經收到你經網頁遞交之資料。<br/>'
. '<br/>'
. '請到以下網址查詢私人駕駛教師執照申請人須知及下載申請表格。<br/>'
. 'http://www.td.gov.hk/tc/public_services/application_for_private_driving_instructors_test/index.html<br/>'
. '<br/>'
. '填妥申請表格後，請於9月24日或以前交往以下地點之收集箱。<br/>'
. '銅鑼灣: 銅鑼灣軒尼詩道 502 號黃金廣場 15 樓 1503 室<br/>'
. '旺角: 旺角彌敦道 610 號荷李活商業中心 10 樓 1023 室<br/>'
. '荃灣: 荃灣青山公路 263 - 267 號力生廣場地下 G8-10 號舖<br/>'
. '元朗: 元朗廣場2樓 266 號舖<br/>'
. '屯門: 屯門港鐵站TUM42號舖<br/>'
. '以上地點之辦公時間為星期一至日11:30 ~ 20:30<br/>'
. '<br/>'
. '深水埗: 深水埗福榮街153號冠奇大廈地下4A舖<br/>'
. '以上地點之辦公時間為星期一至日10:00 ~ 18:30<br/>'
. '<br/>'
. '我們將於運輸署公佈抽籤結果後再個別聯絡申請者。<br/>'
. '<br/>'
. 'MEG Limited<br/>';

		$mail2->AddBCC("marcus@meg.hk", "marcus");

		$mail2->AddBCC('rickylee688@gmail.com', 'LEE WAN FAT');
		$mail2->AddBCC('Jacklen88@gmail.com', 'Chan Wai Tak');
		$mail2->AddBCC('fungcat@live.hk', 'LAM FUNG 林峰');
		$mail2->AddBCC('dennislai2813@hotmail.com', 'Lai Chor Ming');
		$mail2->AddBCC('CCL227@gmail.com', ' LOO CHUEN CHUN');
		$mail2->AddBCC('ling200206@yahoo.com.hk', 'lau hok ling');
		$mail2->AddBCC('mic901@gmail.com', 'Li Hon Leung');
		$mail2->AddBCC('garywan1020@yahoo.com.hk', 'wan chi wa');
		$mail2->AddBCC('tabo8866@yahoo.com.hk', 'HO KWOK WING');
		$mail2->AddBCC('ming94929010@gmail.com', '張偉明');
		$mail2->AddBCC('rickyng661@gmail.com', '吳奕源');
		$mail2->AddBCC('mankam8888@gmail.com', 'leung kam man');
		$mail2->AddBCC('yeling2001@hotmail.com', 'LAI CHI HUNG');
		$mail2->AddBCC('andysandy@gmail.com', 'Ho Sung Kei');
		$mail2->AddBCC('kentlok@hotmail.com', '駱佳景');
		$mail2->AddBCC('billylui302@gmail.com', 'billy lui');
		$mail2->AddBCC('Kit_marco@yahoo.com.hk', 'Chan man kit');
		$mail2->AddBCC('kiu0412@hotmail.com', 'Siu Chung Kiu');
		$mail2->AddBCC('g29s52@yahoo.com.hk', '楊文禮');
		$mail2->AddBCC('Bboyleung444@gmail.com', '梁德銘');
		$mail2->AddBCC('bass18@gmail.com', 'Wong Ming Leung');
		$mail2->AddBCC('black_h8@yahoo.com.hk', 'Fung Kwok Keung');
		$mail2->AddBCC('tam813513@163.com', 'TAM KIN KEUNG');
		$mail2->AddBCC('hellohellofai@gmail.com', '郭炳輝');
		$mail2->AddBCC('ellis4370@yahoo.com.hk', '黎尚廣');
		$mail2->AddBCC('kaven888@hotmail.com', 'Lam Siu Wah');
		$mail2->AddBCC('ae328@hotmail.com', 'Wong Sin Yee');
		$mail2->AddBCC('vandaleung@gmail.com', 'leung sze man vanda');
		$mail2->AddBCC('yu.yiu.kit@gmail.com', 'Yu Yiu Kit');
		$mail2->AddBCC('motoralan@yahoo.com.hk', 'CHAN PT Chung Kuen');
		$mail2->AddBCC('ssfth2003@yahoo.com.hk', '陳兆祺');
		$mail2->AddBCC('kwok.0706@gmail.com', '陳興國');
		$mail2->AddBCC('male', 'choi kar chuen');
		$mail2->AddBCC('davidlhwong@yahoo.com.hk', 'Wong Lap Hang');
		$mail2->AddBCC('pearlky@sinagirl.com', 'chan kwan yuk');
		$mail2->AddBCC('laikei_cheung2003@yahoo.com.hk', 'cheung lai kei');
		$mail2->AddBCC('345917325@qq.com', 'lam hon ting');
		$mail2->AddBCC('mclee919@gmail.com', 'Lee Wing Kwong');
		$mail2->AddBCC('wawa.hui188@hotmail.com', '何明輝');
		$mail2->AddBCC('tommichoi273hk@yahoo.com.hk', 'CHOI Wang Kwok');
		$mail2->AddBCC('kennyliu@ymail.com', '廖仲賢');
		$mail2->AddBCC('jcgolfr@icloud.com', 'Chau Yip Fung');
		$mail2->AddBCC('jk5162_2000@yahoo.com.hk', 'Kwan Joseph');
		$mail2->AddBCC('roymclo@hotmail.com', 'Lo Man Chun');
		$mail2->AddBCC('horaym0824@netvigator.com', 'Ho Chi Man');
		$mail2->AddBCC('raymondwhsin@yahoo.com.hk', 'SIN WING HANG RAYMOND');
		$mail2->AddBCC('hochiwah8@gmail.com', 'Ho Chi wah');
		$mail2->AddBCC('chi1686@gmail.com', 'fong chi wai alan');
		$mail2->AddBCC('cc3alan@gmail.com', 'siu pui-leung');
		$mail2->AddBCC('victorliss@gmail.com', 'LI SIU SHING');
		$mail2->AddBCC('leslie_cosmo@hotmail.com', '丘國榮');
		$mail2->AddBCC('marsyuen@yahoo.com.hk', 'Yuen Shiu Kei ');
		$mail2->AddBCC('cwho@netvigator.com', '何湛華');
		$mail2->AddBCC('okaywong@ymail.com', 'wong on ki');
		$mail2->AddBCC('lokyin8888@yahoo.com', '蔡保國');
		$mail2->AddBCC('kcfong68@gmail.com', 'Fong King Chung');
		$mail2->AddBCC('loming0112@yahoo.com.hk', '黃錦榮');
		$mail2->AddBCC('ahchi737@yahoo.com.hk', 'leung  chi  keung');
		$mail2->AddBCC('benlok0106@yahoo.com.hk', 'Lok Kwok Bun');
		$mail2->AddBCC('yyleung993@gmail.com', '梁 毓 元');
		$mail2->AddBCC('info@dazzling-mfg.com', 'Au Siu To');
		$mail2->AddBCC('manlung60882701@gmail.com', 'kongmanlung');
		$mail2->AddBCC('hactlyin@gmail.com', 'cheung ho yin');
		$mail2->AddBCC('yip120012@yahoo.com.hk', 'leung wan yip');
		$mail2->AddBCC('boboswp@yahoo.com.hk', '尹乃剛');
		$mail2->AddBCC('Wilson_lung@hotmail.com', '龍偉興');
		$mail2->AddBCC('ip120888@yahoo.com.hk', '葉國銓');
		$mail2->AddBCC('C.P.Tam@bigfoot.com', 'Tam Chi Piu');
		$mail2->AddBCC('bubimiu0110@hotmail.com', 'wong kam wing');
		$mail2->AddBCC('singwithyan@Gmail.com', '郭鴻昇');
		$mail2->AddBCC('bl3838@gmail.com', 'lee ka cheong ben');
		$mail2->AddBCC('choywah2007@yahoo.com.hk', '蔡展華');
		$mail2->AddBCC('ronaldleung3892@yahoo.com.hk', 'Leung Ho On');
		$mail2->AddBCC('chochris2003@yahoo.com.hk', '曹樂文');
		$mail2->AddBCC('mahingshu@yahoo.com.hk', 'Ma Hing shu');
		$mail2->AddBCC('skyball7892001@yahoo.com.hk', '賈家池');
		$mail2->AddBCC('wkf319@hkbn.net', 'Wong ki fung');
		$mail2->AddBCC('wckeung8@hotmail.com', 'wong chun keung');
		$mail2->AddBCC('Cheungkwokshinglu@yahoo.com.hk', '張國盛');
		$mail2->AddBCC('tonymwfmw@gmail.com', '馬偉輝');
		$mail2->AddBCC('mr533hk@yahoo.com.hk', 'wong kong wai');
		$mail2->AddBCC('tonyluk110@yahoo.com.hk', '陸定基');
		$mail2->AddBCC('raymond928@gmail.com', 'CHAN Ching Mun');
		$mail2->AddBCC('ericchu0413@gmail.com', 'CHU KAI WING');
		$mail2->AddBCC('yatman9883@yahoo.com.hk', '陳水球');
		$mail2->AddBCC('tsuicb@yahoo.com', '徐焯彬');
		$mail2->AddBCC('kalokmail@gmail.com', 'CHAN WAI SUM');

		$mail2->Send();

	// !!! 2014-09-19 Matthew Email notification for registered user End

	echo 'End';

?>

