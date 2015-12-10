<?php
 // echo '0|1|5*Hồ Xuân Hương được tôn vinh là gì?|Bà chúa thơ Hán|Bà chúa thơ Nhật|Bà chúa thơ Việt|Bà chúa thơ Nôm|D* Trong Microsoft Word, để định dạng chữ đậm ta sử dụng tổ hợp phím tắt nào?|Ctrl + U|Ctrl + I|Ctrl + B|Ctrl + D|C*Loại tàu vũ trụ gì có thể hạ cánh xuống mặt đất như một chiếc máy bay và có thể sử dụng lại nhiều lần?|Tàu con trâu|Tàu con trai|Tàu con thoi|Tàu con mèo|C*Người ta thường so sánh \"Quê hương là chùm ... ngọt\"?|Nho|Khế|Quả|Hoa|B*Loại xe nào sau đây có thể dùng để chở nhiều hàng hoá?|Xe đạp|Xe lu|Xe tăng|Xe tải|D';
 
	//$level = 3;//$HTTP_POST_VARS['level'];
	//$ln = 5;//$HTTP_POST_VARS['ln'];
	$level = $_POST['level'];
	
	$allQuest = array();
	
	$doc = new DOMDocument();
	
	if($level==1)
		$doc->load('data1.xml');
	else if($level==2)
		$doc->load('data2.xml');
	else if($level==3)
		$doc->load('data3.xml');

	$data = $doc->getElementsByTagName("quest");
	foreach( $data as $quest )
	{
		array_push($allQuest, $quest->nodeValue);
	}

	shuffle($allQuest);
	
	echo '0|'.$level.'|5*'.$allQuest[0]."*".$allQuest[1]."*".$allQuest[2]."*".$allQuest[3]."*".$allQuest[4];
?>