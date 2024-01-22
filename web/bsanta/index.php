<?php
  $fb="";
  $name="";
  $surname="";
  $trashbox="";
  if (isset($_GET["name"])){
  	$name=$_GET["name"];}
  if (isset($_GET["surname"])){
  	$surname=$_GET["surname"];}
  
  
  //first action
  if(!empty($_GET["letter"])){
  	$trashbox=$_GET["letter"];
  	}  
  	
    	
  //filtration of parametres	
  $name=preg_replace('/([\(\)<>`\'])/', '', $name);
  $surname=preg_replace('/([\(\)<>`\'])/', '', $surname);
  if(!empty($_GET["surname"])){
  	$surname.=" must try harder!";
  	}	
  
  
  //try facebook
  if(!empty($_GET["fb"])){
  	$fb=$_GET["fb"];
  	$fb=preg_replace('/([\(\)<>`\'\\|])/', '', $fb);
  	$regexp='/(http:\\/\\/localhost:[8888]).+/'; 
        if(preg_match($regexp, $fb)){
        	$fb=base64_encode($fb);
  		system("curl http://localhost:3000?u=" . escapeshellarg($fb));
  		}else{
  		print('Try harder, little child.');
  		}
  	}
  	
?>
<!DOCTYPE html>
<html>
	<head>
		<script>
			function x(a,b) {
				console.log(`${a} ${b}`);
				}
			x("<?= $name ?>","<?= $surname ?>");
		</script>
	</head>
	<body>
		<form action="/">
			<h1>Letter to Santa</h1>
			<p>
				<label>Name:</label>
				<input required type="text" name="name" placeholder="Enter your name" autofocus>
			</p>
			<p>
				<label>Surname:</label>
				<input required type="text" name="surname" placeholder="Enter surname">
			</p>
			<p>
				<label>Your facebook:</label>
				<input type="text" name="fb" placeholder="http://facebook.com/...">
			</p>
			<p>
    				<label>Letter:</label>
    				<br />
 			   	<textarea name="letter" cols="50" rows="30" placeholder="Dear Santa,..."></textarea>
  			</p>
			<button class=button type=submit> Send </button>
		</form>
	</body>
</html>
