<?php require_once('../includes/nav.php'); in(2);?>


<div class="p-5 lg:w-1/3 w-full mx-1 rounded-2xl bg-gradient-to-t from-purple-400 to-blue-500">
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $ex = $user->delete("`id` = '$id'");
    if($ex == 1 && !empty($id)){
        echo "سڕینەوەی بەکارهێنەر سەرکەوتووبوو";
       }else{
        echo "سڕینەوەی بەکارهێنەر نەکرا";
       }
}
?>
<section class="grid grid-cols-8 mx-5 mt-5 gap-10">
    <?php
    $data = $user->viwe_all(0);
    foreach ($data as $key) {?>
        <div class="col-span-8 bg-white sm:col-span-4 xl:col-span-2 shadow-lg shadow-gray-900 rounded-lg overflow-hidden">
            <div class="overflow-hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-40 w-full text-blue-400" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
            </svg>
            </div>
            <div class="m-5">
               <h3 class="text-dark-800 mb-3 text-md font-Merr font-semibold"><?= $key->username ?></h3>
               <h3 class="text-dark-800 mb-3 text-md font-Merr font-semibold"><?= $key->email ?></h3>
               <h3 class="text-dark-800 mb-3 text-md font-Merr font-semibold"><?= $key->rule == 0 ? "Editor" : "Admin" ?></h3>
                <div class="flex justify-between my-4">
                    <button class="btn1 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                          </svg>
                          Update Post</button>
                        <a href="?id=<?= $key->id ?>" class="btn text-sm">
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