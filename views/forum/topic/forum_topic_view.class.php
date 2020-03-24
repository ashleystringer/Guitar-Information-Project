<?php
class ForumTopicView extends IndexView{
    public function display($posts){
        parent::displayHeader();
        ?>
    <style>
        #createPost{
            display:none;
        }        
    
    </style>

        <div id="topicTitle"></div>
        <div><input type="button" id="addPostBtn" value="Add Post"></div>
        <div>
           <?php 
           if($post == 0){
              echo "No posts are available"; 
           }else{
               echo "<table>";
                foreach($posts as $i => $post){
                    $display_post = new ForumPostView();
                    $display_post->display($post);
                    /*
                    $post_by = $post->getPostBy();
                    $post_content = $post->getContent();
                    $post_date = $post->getDate();
                    echo "<tr><td>$post_date</td><td>$post_by</td></tr>";
                    echo "<tr>$post_content</tr>";
                     */
                }
               echo "</table>";
           }
           ?>

        </div>
        <?php 
            self::displayCreatePost();
        ?>
        <script>
            var createPost = document.getElementById("createPost");
            var addPostBtn = document.getElementById("addPostBtn");
            addPostBtn.addEventListener("click", function(){
                displayCreatePost();
            });
        function displayCreatePost(){
            if(createPost.style.display != "none"){
                createPost.style.display = "none";
            }else{
                createPost.style.display = "block";
            }
        }
        </script>
    <?php
        parent::displayFooter();
    }
    public function displayCreatePost(){
        ?>
            <div id="createPost">
            <table>
                <form method="post" action="<?=BASE_URL?>/forum/createpost">
                    <tr>
                        <textarea></textarea>
                    </tr>
                    <tr>
                        <td><input type="submit" name="content"></td>
                        <td><input type="button" value="Cancel"></td>
                        <!-- -->
                    <input type="hidden" name="date" value="<?php time(); ?>">
                    </tr>
                </form>
            </table>
        </div>
        <?php
    }
}