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


































<?php

	$OptionsSex = array(1=>'Мъж', 2=>'Жена');
	$OptionsForUs = array(1=>'Newspaper', 2=>'QWE', 3=>'Google', 4=>'Site', 5=>'Friend');
	
	function EOD($exp){return $exp;}
		$EOD = function($q){return $q;};
	
	function writeData($data){
		$db = new mysqli('localhost', 'training', 'training', 'training');
		if($db -> connect_error) {
			die('Connect error ('.$db->connect_errno.' )'.$db->connect_error);
		}
		$db->set_charset('utf8');
	
	foreach ($data as &$v) {
		$v = $db->real_escape_string(trim($v));
	}
		unset($v);
		
	$fields = "`".implode("`,`", array_keys($data))."`";
	$values = "'".implode("','", $data)."'";
	
	echo $SQL = "INSERT INTO vladi_db ({$fields}) VALUES ($values)";
	if($db->query($SQL)) {
		echo "success!";
	}
	else {
		echo $db->error;
		echo "fail";
	}
	
	return $db->insert_id;
}

	if (isset($_POST['doSubmit'])) {
		$name = $_POST ['name'];
		$email = $_POST ['email'];
		$forUs = $_POST ['forUs'];
		$agree = $_POST ['agree'];
		$sex = $_POST ['sex'];
		$info = $_POST ['info'];
		
		$error = array ();
		$validName = '/^(?:\p{Cyrillic}+[ -]?){1,4}$/u';
		$validEmail = '/([a-z0-9_.-]+)' .'@' .'([a-z0-9.-]+)+'.	'\.' . '([a-z]+){2,10}/i';
	
	if (! ($name && preg_match ( $validName, $name ))) {
		$error ['name'] = 'Името не е попълнено или e въведено на латиница!';
	}
	
	if ($email) {
		if (! preg_match ( $validEmail, $email )) {
			$error ['email'] = 'Невалиден емайл адрес!';
		}
	}
	if (! $info) {
		$error ['info'] = "Не е попълнен коментара";
	}
	if ($agree != 1) {
		$error ['iagree'] = "Не сте съгласни с общите условия";
	}
	 
	if(!empty($error)) {
		$FormMessage = implode('<br/>', $error);
	} else {
		
		$data=array();
		$data['name']=trim($_POST['name']);
		$data['gander']=(int)$_POST['sex'];
		$data['email']=trim($_POST['email']);
		$data['know_for_us_from']= isset($_POST['forUs']) ? implode(',', $_POST['forUs']) : '';
		$data['comment']=trim($_POST['info']);
		$data['date_time']=date('Y-m-d H:i:s');
		$data['ip']=$_SERVER['REMOTE_ADDR'];
				
		var_dump($data);
		echo '<pre>'.print_r($data, true).'</pre>';
		echo writeData($data);
		$FormMessage = "Вие изпратихте формата успешно!";
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
		<?//=$error['name'];?>
		<br />
		<?php
			foreach ($OptionsSex as $k=>$v){
				$selected = $_POST['sex']==$k ? ' checked="checked"' : '';
				echo <<<EOD
				<label><input type="radio" name="sex" value="{$k}"{$selected}>{$v}</label>
EOD;
			}
		?>
		<br /><label for="email">Е-майл:</label> <input type="text" name="email" id="email" placeholder="ivan.ivanov@gmail.com" value="<?=$_POST['email'];?>"><br />
		 <select name="forUs[]" multiple="multiple">
		 <?php 
		 if(empty($_POST['forUs'])) $_POST['forUs'] = array();
		 foreach ($OptionsForUs as $k=>$v){
		 	//$selected = $_POST['forUs']==="$k" ? ' selected="selected"' : '';
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
<label><input type="checkbox" name="agree" value="1"{$selected}>Съгласен съм с общите условия</labe><br />
EOD;
		?>
		<input type="submit" name="doSubmit" value="Изпрати">
	</form>
</body>
</html>






















<script language="JavaScript" type="text/javascript" src="<?=JS_DIR;?>jquery-1.11.1.min.js"></script>
<script language="JavaScript" type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>

<script type="text/javascript">
var flag = false;
var clearId;
var isAnimationStarted = false;

function changePic(obj){
	
	if(isAnimationStarted) return;
	
	isAnimationStarted = true;
	
	clearTimeout(clearId);
	
	if(obj==null){
		var currTd = $('a.dot.selected');
		var currId = $(currTd).attr('id').replace('link_',''); //id1
		var nextTd = $(currTd).next().length==0 ? $('a.dot').first() : $(currTd).next();	
		var nextId = $(nextTd).attr('id').replace('link_',''); //id2
	} else {
		if($(obj).hasClass('selected')) { return; }
		var currTd = $('a.dot.selected');
		var currId = $(currTd).attr('id').replace('link_',''); //id1
		var nextTd = $(obj);
		var nextId = $(nextTd).attr('id').replace('link_',''); //id2
	}
	
	$('img#'+currId).fadeOut(500, function(){
			$(currTd).removeClass('selected');
			$(nextTd).addClass('selected');
			$('img#'+nextId).fadeIn(500, function() { isAnimationStarted=false; });
	});
	
	if(flag){
		return;
	}
	
	clearId = setTimeout(function(){changePic(null)}, 5000);
}

$(document).ready(function(){
	
	$('a.dot').click(function(){
		flag = true;
		changePic(this);
	});
	
	clearId = setTimeout(function(){
		changePic(null);
	}, 3000);

	
});
</script>
<div class="galleryWrap">
	<img src="/i/tmp/slade_show1.jpg" class="selected" id="id1" style="display: inline;">
	<img src="/i/tmp/slade_show2.jpg" id="id2" style="display: none;">
	<img src="/i/tmp/slade_show3.jpg" id="id3" style="display: none;">
	<img src="/i/tmp/slade_show4.jpg" id="id4" style="display: none:">
	<div style="position:absolute; right:10px; bottom:10px; width: 120px; height: 25px">
	
		<a class="dot selected" id="link_id1"></a> 			
		<a class="dot" id="link_id2"></a> 
		<a class="dot" id="link_id3"></a>
		<a class="dot" id="link_id4"></a>

	</div>
</div>	
</html>
