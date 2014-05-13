<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Example</title>
    </head>
    <body>
        <?php
        
        //Показва какви файлове има в тази директория
         $dir = scandir('C:\Users\Vladimir\Desktop\nbproject');
         echo '<pre>'.print_r($dir,TRUE).'<pre>';
        ?>
    </body>
</html>
