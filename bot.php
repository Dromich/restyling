<?php
/*if(isset($_POST['NAme'])){$name = $_POST['NAme'];}

if(isset($_POST['text'])){$text = $_POST['text'];}

$mess = "NAme: {$name}\nMesege: {$text}";*/


$method = $_SERVER['REQUEST_METHOD'];
//Script Foreach
$c = true;
if ( $method === 'POST' ) {
	$project_name = trim($_POST["project_name"]);
	$admin_email  = trim($_POST["admin_email"]);
	$form_subject = trim($_POST["form_subject"]);
	foreach ( $_POST as $key => $value ) {
		if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
				<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
				<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
			</tr>
			";
			$bot_message .= "
			<b>$key</b><i> " . $value. " </i>  \n";

			
		}
	}
} else if ( $method === 'GET' ) {
	$project_name = trim($_GET["project_name"]);
	$admin_email  = trim($_GET["admin_email"]);
	$form_subject = trim($_GET["form_subject"]);
	foreach ( $_GET as $key => $value ) {
		if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
				<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
				<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
			</tr>
			";
			$bot_message .= "
			<b>$key</b><i> " . $value. " </i>  \n";
		
			
		}
	}
}
$message = "<table style='width: 100%;'>$message</table>";

$bot_message= "<strong>".$form_subject.":</strong>

$bot_message";

function adopt($text) {
	return '=?UTF-8?B?'.Base64_encode($text).'?=';
}
$headers = "MIME-Version: 1.0" . PHP_EOL .
"Content-Type: text/html; charset=utf-8" . PHP_EOL .
'From: '.adopt($project_name).' <'.$admin_email.'>' . PHP_EOL .
'Reply-To: '.$admin_email.'' . PHP_EOL;
mail($admin_email, adopt($form_subject), $message, $headers );


$token='905188487:AAFWK9n0u7QFSlODWgg9VWFaTq1xYmL_xdQ';
//my chat 381624708
//Naz chat 537444625
$query = [
    'chat_id' => 381624708 ,
    'parse_mode' => 'HTML',
    'text' => $bot_message
];
$query1 = [
    'chat_id' => 381624708 ,
    'parse_mode' => 'HTML',
    'text' => $bot_message
];

$query_2 = http_build_query($query);

$query_3 = http_build_query($query1);

$request = "https://api.telegram.org/bot".$token."/sendMessage?".$query_2;
$request1 = "https://api.telegram.org/bot".$token."/sendMessage?".$query_3;


file_get_contents($request);
file_get_contents($request1);

//echo($request);
?>