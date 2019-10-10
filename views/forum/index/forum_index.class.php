<?php
class ForumIndex extends IndexView{
    public function display($topics){
        parent::displayHeader();
        ?>
        <!-- List names of each topic and group it by category, date and original poster-->
        <!-- Here will be the titles of the discussions fetched and displayed here-->
        <div id="forumBoardLeft">
            <?php
                if($categories == 0){
                    echo "No categories available";
                }else{
                    echo "<table>";
                    echo "<tr> <td>Categories</td> <td>Topics</td> <td>Posts</td></tr>";
                    foreach($categories as $i => $category){
                        
                    }
                    echo "</table>";
                }
            ?>
           <!-- <div class="topic">
            </div>-->
        </div>
        <div id="forumBoardRight">
            <?php
                if($topics == 0){
                    echo "No discussions available.";
                }else{
                    echo "<table>";
                    echo "<tr><td>Topics</td> <td>Posts</td> <td>By</td></tr>";
                    foreach($topics as $i => $topic){
                        $topic_subject = $topic->getSubject();
                        $topic_by = $topic->getPoster();
                        echo "<tr><td>$topic_subject</td><tr>";
                    }
                    echo "</table>";
                }
            ?>
        </div>
   <?php
        parent::displayFooter();
    }
    public function forumTabs(){
        ?>
        <?php
     }
}