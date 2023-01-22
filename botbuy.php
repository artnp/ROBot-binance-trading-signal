<html>
<head><meta charset="utf-8"><
<body style="background-color:black;">

   <?php
			exec("node sellnow.js", $output); 
			echo implode("\n", $output);
			header( "refresh:0;url=bot.php" );
		?>
</body>
</html>
