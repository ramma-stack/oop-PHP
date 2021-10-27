<?php require_once('../includes/nav.php'); in(1);?>

<div class="p-5 lg:w-2/3 w-full mx-1 rounded-2xl bg-gradient-to-t from-purple-400 to-blue-500">
<section class="gap-10">
    <form class="flex w-2/3  flex-col m-auto justify-center" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <p class="bg-indigo-100 justify-center m-auto mb-2 text-center w-2/3 rounded-md block">
        <?php
        if(isset($_GET['post_id'])){
            $id = $_SESSION['post_id'] = $_GET['post_id'];
        }
        if(isset($_POST['submit'])){
            if(!empty($_POST['id'])){
                $upload->post_id = $_POST['id'];
            }
            $upload->user_id = $session->user_id;
            $upload->title = $_POST['name'];
            $upload->price = $_POST['price'];
            $img = $_FILES['file'];
            $upload->set_image($img);
            $ex = $upload->save();
            if($ex == 1){
             echo "زیادکردنی پۆست سەرکەوتووبوو";
            }else{
              echo $ex;
            }
        }
        ?>
        </p>
<input class="p-2 hidden rounded-md outline-none my-4" value="<?php if(!empty($id)){ echo $id;} ?>" type="text" name="id">
<input class="p-2 rounded-md outline-none my-4" type="text" name="name">
<input class="p-2 rounded-md outline-none my-4" type="text" name="price">
<input class="inline" type="file" name="file">
<button name="submit" class="btn w-1/5 justify-center mt-5">submit</button>
</form>

</section>
</div>

<?php require_once('../includes/footer.php');?>