<?php
class ForumIndex extends IndexView{
    public function display($topics){
        Session::create();
        parent::displayHeader();
        ?>
        <!-- List names of each topic and group it by category, date and original poster-->
        <!-- Here will be the titles of the discussions fetched and displayed here-->
  
        <div id="forumWrapper">
            <div id="forumBoardLeft">
                <?php
                    if($categories == 0){
                        echo "No categories available";
                    }else{
                        echo "<table>";
                        echo "<tr> <td>Categories</td> <td>Topics</td> <td>Posts</td></tr>";
                        foreach($categories as $i => $category){
                            $cat_name = $category->cat_name;
                            $cat_number = $category->cat_number; //number of posts
                            //echo "<tr><td>$cat_name</td><td>$cat_number</td><td></td></tr>";
                        }
                        echo "</table>";
                    }
                ?>
               <!-- <div class="topic">
                </div>-->
            </div>
            <div id="forumBoardRight">
                <?php
                $test = BASE_URL . "/forum/topic";
                    if($topics == 0){
                        echo "No discussions available.";
                    }else{
                        echo "<table>";
                        echo "<tr class='topic_list'><td>Topics</td> <td>Posts</td> <td>By</td></tr>";
                        foreach($topics as $i => $topic){
                            $topid_id = $topic->getID();
                            $topic_subject = $topic->getSubject();
                            $topic_by = $topic->getPoster();
                            //include number posts per topic
                            //$test .= "/topic_id";
                            echo "<tr><td><a href='",$test,"'>$topic_subject</a></td><td>...</td><td><a href='#'>$topic_by</a></td><tr>";
                        }
                        echo "</table>";
                    }
                ?>
                <div>
                    <?php 
                        if(isset($_SESSION['login_status'])){ //
                            ?>
                            <div><a href="<?= BASE_URL?>/forum/createtopic">Create Topic</a></div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        
   <?php
        parent::displayFooter();
    }
    public function forumTabs(){
        ?>
        <?php
     }
}