<?php  require_once('../includes/header.php'); in(0);?>
<body class="container m-auto text-3xl bg-gray-100">

<div class="flex justify-center m-5">
<div class="bg-gray-500 shadow-md shadow-black w-3/5 flex justify-center rounded-md">
<form class="flex justify-center flex-col p-5 w-full" method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
<p class="text-white text-center m-2 font-mono text-3xl">LogIn</p>
<input name="username" value="<?=  $_POST['username']?? "";  ?>" class="rounded-md m-1.5 p-2 outline-none text-xl" type="text" name="" id="">
<input name="password" value="<?=  $_POST['password']?? "";  ?>" class="rounded-md m-1.5 p-2 outline-none text-xl" type="password" name="" id="">
<button name="submit" class="bg-red-400 text-xl p-1.5 uppercase self-center w-2/5 text-white font-sans m-1 rounded-md block">submit</button>
<?php 
if(isset($_POST['submit'])){
 $username = $db->secure($_POST['username']);
 $password = $db->secure($_POST['password']);
 $result = $user->verify($username,$password);
 $session->login($result);
 ?>
<p class="text-white text-center m-2 font-mono text-3xl">
<?= $result ? direct("index.php") : "Coreect!" ; ?>
</p>
<?php } ?>
</form>
</div>
</div>
