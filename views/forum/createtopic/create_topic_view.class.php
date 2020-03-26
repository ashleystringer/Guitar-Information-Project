<?php
class CreateTopicView extends IndexView{
    public function display(){
        parent::displayHeader();
        self::displayForm();
        parent::displayFooter();
    }
    public function displayForm(){
        ?>
        <style>
            tr{
                margin: 10px;
            }
            
        </style>
        <div id="forumWrapper">
            <div id="forumBoardRight" style="padding: 5px;">
            <form method="post" action="<?= BASE_URL?>/forum/addtopics">
                
                <div style="margin-bottom: 5px;"><input type="text" value="Topic Title" id="subject" required></div>
                <table>
                    <thead>
                    <th><input type="text" style="margin-bottom: 5px;" value="" id=""></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                            <textarea id="" required></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td><select style="margin-bottom: 5px;">
                                    <?php $options = array("music", "misc", "test");
                                        foreach($options as $i => $option){
                                            echo "<option>$option</option>";
                                        }
                                    ?>
                                </select></td>
                        </tr>
                        <tr>
                            <input type="hidden" value="<?= $_SESSION['username']?>" id="user">
                            <input type="hidden" name="date" value="<?php time(); ?>">
                            <td><input type="submit" value="Submit"></td>
                        </tr>
                    </tbody>
                </table>
         
            </form>
            </div>
        </div>
        <?php
    }
}