<?php  require_once('../includes/header.php'); ?>
<body class="bg-gray-200 my-4 mx-4">

<section for="navigation" class="bg-white p-0.5 shadow-lg shadow-black flex flex-row justify-between rounded-xl m-auto">
  <a href="index.php"><img class="w-14 flex items-center" src="../images/home.svg" alt=""></a>
  <ol class="flex flex-row w-full justify-between">
      <?php
      if($session->rule == 1){ ?>
      <li class="p-1 flex items-center"><a href="index.php" class="bg-gradient-to-t from-purple-400 to-blue-500 ml-1 text-white rounded-md text-xl px-4 py-1 hover:opacity-90 transition duration-200">Welcome Admin</a></li>
      <?php }else{ ?>
      <li class="p-1 flex items-center"><a href="index.php" class="bg-gradient-to-t from-purple-400 to-blue-500 ml-1 text-white rounded-md text-xl px-4 py-1 hover:opacity-90 transition duration-200">Welcome Member</a></li>
      <?php } ?>
      <div class="flex items-center">
          <a href="?logout" class="bg-gradient-to-t from-purple-400 to-blue-500 mr-3 text-white rounded-md text-2xl px-4 pb-1 hover:opacity-90 transition duration-200">Logout</a>
      </div>
  </ol>
</section>
<section class="container m-auto mt-10 flex lg:flex-row flex-col">
        <ul class="p-5 self-center lg:self-start lg:w-1/3 w-2/3 mx-1 mb-2 lg:mb-0 rounded-2xl bg-gradient-to-t from-purple-400 to-blue-500">
            <li class="bg-white p-3 mb-2 m-1 rounded-2xl text-lg"><a href="upload_post.php">Post</a></li>
            <li class="bg-white p-3 mb-2 m-1 rounded-2xl text-lg"><a href="viewyourpost.php">View Your Post</a></li>
            <?php if($session->rule == 1){ ?>
               <li class="bg-white p-3 mb-2 m-1 rounded-2xl text-lg"><a href="viewpost.php">Viwe Post</a></li>
               <li class="bg-white p-3 mb-2 m-1 rounded-2xl text-lg"><a href="adduser.php">Add User</a></li>
               <li class="bg-white p-3 mb-2 m-1 rounded-2xl text-lg"><a href="viewuser.php">Viwe User</a></li>
            <?php } ?>
        </ul>
    </section>
    <!-- <div class="p-5 lg:w-2/3 w-full mx-1 rounded-2xl bg-gradient-to-t from-purple-400 to-blue-500">
    <?php

//    $user->id = "2"; 
//    $user->username = $db->secure("<script>alert('ok');</script>"); 
//    $user->username = "<h1>shadyar</h1>"; 
//    $user->password = "123";
//    $user->email = "aso@gmail.com";
//    $user->rule = "1";
//    $query = $user->update();
//    echo $query;

//   $query = $db_object->viwe_id(2);
//   echo $query->username;
?>
    </div> -->