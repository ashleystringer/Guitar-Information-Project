<?php
class ForumModel{
    private $db;
    private $dbConnection;
    static private $_instance = null;
    private $tblUsers;
    private $tblPosts;
    private $tblTopics;
    private $tblCat;
    public function __construct(){
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblTopics = $this->db->getTopics();
        
        foreach($_POST as $key => $value){
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }
        foreach($_GET as $key => $value){
            $GET[$key] = $this->dbConnection->real_escape_string($value);
        }
    }
    //topics, posts, and OP names
    public function listTopics(){
        if($this->db){
         // echo "DB exists";  
        }
        try{            
            $sql = "SELECT topic_subject, DATE(topic_date) as date, topic_by FROM " . $this->tblTopics . 
            " WHERE " . $this->tblTopics . ".topic_id ORDER BY topic_date DESC"; //left join
                    //sort by date `topic_date`
         
            $query = $this->dbConnection->query($sql);
           if(!$query){
            //   echo "<br> Exception <br>";
                throw new DatabaseException();
            }elseif($query->num_rows == 0){
             //   echo "<br> 0 <br>";
                throw new Exception("No topics available.");
                return 0;
            }else{
                $topics = array();
                while($obj = $query->fetch_object()){
                    $topic = new ForumTopic(stripslashes($obj->topic_subject), stripslashes($obj->topic_date),
 stripslashes($obj->topic_cat), stripslashes($obj->topic_by)); 
                    $topic->setID($obj->topic_id);
                    array_push($topics, $topic);
                }
                return $topics;
            }
        }   
       catch(DatabaseException $e){
           return false;
       }
       catch(Exception $e){
          $e->getMessage();
          return false;
       }
    }
    
    /*public function listPosts($topic_subjects, $topic_id){
        $posts = array();
        try{
            $sql = "SELECT * FROM " . $this->tblPosts . " WHERE " . $this->tblPosts . ".post_topic=" . $this->tblTopics . ".topic_subject";
            $query = $this->dbConnection->query($sql);
            if(!$query){
                throw new DatabaseException();
            }elseif($query->num_rows == 0){
                return 0;
            }else{
                while($obj = $query->fetch_object){
                    $post = new ForumPost($obj->post_content, $obj->post_date, $obj->post_topic, $obj->post_by);
                }
                return $posts;
            }
            
        }
        catch(DatabaseException $e){
            
        }
    }*/
    
    //for categories, topics, and post number
    public function listCategories(){
        try{
            $sql = "";
            $query;
            if(!$query){
               throw new DatabaseException(); 
            }elseif($query->num_rows == 0){
                return 0;
            }else{
                
            }
         }
        catch(DatabaseException $e){
            
        }
        catch(Exception $e){
            
        }
        
    }

}