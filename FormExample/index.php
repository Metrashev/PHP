<!DOCTYPE HTML> 
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 

<?php
$nameErr = $emailErr = $genderErr = $commentErr = $acceptErr = "";
$name = $email = $comment = $gender = $accept = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "Name is required";
   } else {
     $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-z0-9]+$/i",$name)) {
       $nameErr = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_POST["email"])) {
     $emailErr = "Enter some e-mail!";
   } else {
     $email = test_input($_POST["email"]);
     if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
       $emailErr = "Invalid email format";
     }
   }
     
  if (empty($_POST["comment"])) {
     $commentErr = "Comment is required";
   } else {
       $comment = test_input($_POST["comment"]);
   }

  

   if (empty($_POST["gender"])) {
     $genderErr = "Select gander";
   } else {
     $gender = test_input($_POST["gender"]);
   }
   
   if (empty($_POST["check"])) {
     $acceptErr = "Accept the condition!";
   } else {
     $accept = test_input($_POST["check"]);
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<h2>PHP Form </h2>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   Name: <input type="text" name="name" value="<?php echo $name;?>">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
   E-mail: <input type="text" name="email" value="<?php echo $email;?>">
   <?php echo $emailErr;?>
   <br><br>
   <p>Comment:</p>
   <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
   <span class="error">* <?php echo $commentErr;?></span>
   <br><br>
   Gender:
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?>  value="female">Female
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?>  value="male">Male
   <?php echo $genderErr;?>
   <br><br>
   <input type="checkbox" name="check"  <?php if (isset($accept) && $accept=="accept") echo "checked";?>value="accept">Accept the conditions
   <span class="error">* <?php echo $acceptErr;?></span>
   <br></br>
   <input type="submit" name="submit" value="Submit"> 
   <p><span class="error">* required field.</span></p>
</form>
</body>
</html>