<?php require_once('../includes/nav.php'); in(2);?>

<div class="p-5 lg:w-2/3 w-full mx-1 rounded-2xl bg-gradient-to-t from-purple-400 to-blue-500">
<section class="gap-10">
    <form class="flex w-2/3  flex-col m-auto justify-center" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <p class="bg-indigo-100 justify-center m-auto mb-2 text-center w-2/3 rounded-md block">
        <?php
        if(isset($_POST['submit'])){
        //     $user->id = $session->user_id;
            $user->username = $_POST['name'];
            $user->password = $_POST['password'];
            $user->email = $_POST['email'];
            $user->rule = $_POST['rule'];

            $ex = $user->create();
            if($ex == 1){
              direct("viewuser.php");
             echo "زیادکردنی بەکارهێنەر سەرکەوتووبوو";
            }else{
              echo "زیادکردنی بەکارهێنەر نەکرا";
            }
        }
        ?>
        </p>
<input class="p-2 hidden rounded-md outline-none my-4" value="<?php if(!empty($id)){ echo $id;} ?>" type="text" name="id">
<input class="p-2 rounded-md outline-none my-4" placeholder="Username" type="text" name="name">
<input class="p-2 rounded-md outline-none my-4" placeholder="Password" type="password" name="password">
<input class="p-2 rounded-md outline-none my-4" placeholder="Email" type="text" name="email">
<select name="rule" class="p-2 rounded-md outline-none my-4">
        <option value="0">Editor</option>
        <option value="1">Admin</option>
</select>
<button name="submit" class="btn justify-center mt-5">Create User</button>
</form>

</section>
</div>

<?php require_once('../includes/footer.php');?>