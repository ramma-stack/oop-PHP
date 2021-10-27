<?php require_once('../includes/nav.php'); in(1);?>


<div class="p-5 lg:w-1/3 w-full mx-1 rounded-2xl bg-gradient-to-t from-purple-400 to-blue-500">
<?php
    if(isset($_GET['post_id'])){
        $post_id = $_GET['post_id'];
        $id = $upload->viwe_id("`post_id` = '$post_id'");
        $ex = $upload->delete("`post_id` = '$post_id' and `user_id` = '$session->user_id'");
        if($ex == 1 && !empty($id)){
            unlink("../images/$id->fileName");
            echo "سڕینەوەی پۆست سەرکەوتووبوو";
           }else{
            echo "سڕینەوەی پۆست نەکرا";
           }
    }
?>
<section class="grid grid-cols-8 mx-5 mt-5 gap-10">
    <?php
    $query = "`user_id` = '$session->user_id'";
    $data = $upload->viwe_all($query);
    foreach ($data as $key) {?>
        <div class="col-span-8 bg-white sm:col-span-4 xl:col-span-2 shadow-lg shadow-gray-900 rounded-lg overflow-hidden">
            <div class="overflow-hidden">
                <img class="w-full transition duration-200 transform hover:scale-110" src="../images/<?= $key->fileName ?>" alt="">
            </div>
            <div class="m-5">
               <h3 class="text-dark-800 mb-3 text-md font-Merr font-semibold"><?= $key->title ?></h3>
               <div class="flex mb-3 justify-start">
                   <button class="shadow-lg shadow-gray-900 w-6 h-6 mr-1 rounded-full bg-black"></button>
                   <button class="shadow-lg shadow-gray-900 w-6 h-6 mr-1 rounded-full bg-blue-800"></button>
                   <button class="shadow-lg shadow-gray-900 w-6 h-6 mr-1 rounded-full bg-white"></button>
                   <button class="shadow-lg shadow-gray-900 w-6 h-6 mr-1 rounded-full bg-red-800"></button>
                   <button class="shadow-lg shadow-gray-900 w-6 h-6 mr-1 rounded-full bg-green-800"></button>
               </div>
               <div class="flex mb-3">
                   <button class="border text-gray-500 border-dark-50 rounded-md p-0.5 px-1.5 mx-1">S</button>
                   <button class="border text-gray-500 border-dark-50 rounded-md p-0.5 px-1.5 mx-1">M</button>
                   <button class="border text-gray-500 border-dark-50 rounded-md p-0.5 px-1.5 mx-1">L</button>
                   <button class="border text-gray-500 border-dark-50 rounded-md p-0.5 px-1.5 mx-1">XL</button>
                   <button class="border text-gray-500 border-dark-50 rounded-md p-0.5 px-1.5 mx-1">XXL</button>
                </div>
                <div class="flex justify-between my-4">
                    <a href="upload_post.php?post_id=<?= $key->post_id ?>" class="btn1 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                          </svg>
                        Update Post</a>
                        <a href="?post_id=<?= $key->post_id ?>" class="btn text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                              </svg>
                            Delete Post</a>
                </div>
            </div>
        </div>
        <?php } ?>
     </section>
    </div>

<?php require_once('../includes/footer.php');?>