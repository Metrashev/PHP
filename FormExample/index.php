<?php
	$OptionsSex = array('male'=>'Мъж', 'female'=>'Жена');
	$OptionsForUs = array(''=>'', 0=>'Newspaper', 4=>'QWE', 1=>'Google', 2=>'Site', 3=>'Friend');

	function EOD($exp){return $exp;}
	$EOD = function($q){return $q;};
	
	if (isset($_POST['doSubmit'])) {
	$name = $_POST ['name'];
	$email = $_POST ['email'];
	$forUs = $_POST ['forUs'];
	$agree = $_POST ['agree'];
	$sex = $_POST ['sex'];
	$info = $_POST ['info'];
	
	$error = array ();
	$validName = '/^(?:\p{Cyrillic}+[ -]?){1,4}$/u';
	$validEmail = '/([a-z0-9_.-]+)'.'@'.'([a-z0-9.-]+)+'.'\.'.'([a-z]+){2,10}/i';
	
	if (!($name && preg_match ($validName, $name))) {
		$error ['name'] = 'Името не е попълнено или e въведено на латиница!';
	}
	
	if ($email) {
		if (!preg_match ($validEmail, $email)) {
			$error ['email'] = 'Невалиден емайл адрес!';
		}
	}
	
	if (!$info) {
		$error ['info'] = "Не е попълнен коментара";
	}
	if ($agree != 1) {
		$error ['iagree'] = "Не сте съгласни с общите условия";
	}
	
	if(!empty($error)) {
		$FormMessage = implode('<br/>', $error);
	} else {
		$to = "vladi@studioitti.com";
		$subject = 'глор';
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$info=nl2br($_POST['info']);
		
		$message = <<<EOD
<html>

<body>
<p>You have a new form request from your web site.</p>
	<p>The client is: {$_POST['name']}</p>
	<p>Sex: {$_POST['sex']}</p>
	<p>Send e-mail from:{$_POST['email']}</p>
	<p>Comment:{$EOD(nl2br($_POST['info']))}</p>
</body>
</html>
EOD;
		echo '<hr><br>'.$message.'<br/><hr>';
		mail($to, "=?utf-8?B?".base64_encode($subject)."?=", $message, $headers);
		$FormMessage = "Вие изпратихте мейла успешно!";
	}
}

?>
<html>
<head>
<meta charset="utf8">
</head>
<body>
<?=$FormMessage?>
<form method="post" action="">
		<label for="name">Име:</label> <input type="text" name="name" id="name" placeholder="Иван" value="<?=$_POST['name'];?>">
		<?=$error['name'];?>
		<br />
		<?php
		
			
			
			foreach ($OptionsSex as $k=>$v){
				$selected = $_POST['sex']==$k ? ' checked="checked"' : '';
				echo <<<EOD
<label><input type="radio" name="sex" value="{$k}"{$selected}>{$v}</label>
EOD;
			}
			
		 ?>
		<br />Е-майл: <input type="text" name="email"	placeholder="ivan.ivanov@gmail.com" value="<?=$_POST['email'];?>"><br />
		 <select name="forUs[]" multiple="multiple" onchange="this.form.submit()">
		 <?php 
		 
		
		 	
		 if(empty($_POST['forUs'])) $_POST['forUs'] = array();
		 foreach ($OptionsForUs as $k=>$v){
		  	$selected = in_array("$k", $_POST['forUs'], true) ? ' selected="selected"' : '';
		 	echo <<<EOD
<option value="{$k}"{$selected}>{$v}</option>
EOD;
		 }
		 
		 ?>
		</select><br />

		<textarea name="info" rows="5" cols="20"><?=$_POST ['info']?></textarea><br />
		<?php
		$selected = $_POST['agree']=='1' ? ' checked="checked"' : '';

			echo <<<EOD
	    <input type="checkbox" name="agree" value="1"{$selected}>Съгласен съм с общите условия<br />
EOD;
			?>
		<input type="submit" name="doSubmit" value="Изпрати">
	</form>
</body>
</html>
