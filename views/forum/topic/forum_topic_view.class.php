<?php
class ForumTopicView extends IndexView{
    public function display($posts){
        parent::displayHeader();
        ?>
        <div></div>
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
        parent::displayFooter();
    }
}