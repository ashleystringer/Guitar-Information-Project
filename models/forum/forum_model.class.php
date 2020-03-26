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
          //echo "DB exists";  
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
           echo "Error";
           return false;
       }
       catch(Exception $e){
          $e->getMessage();
          return false;
       }
    }
    public function listPosts($topic_id){
        try{
            $sql = "SELECT post_content, DATE(post_date) as date FROM " . $this->tblPosts . " WHERE post_topic=$topid_id";
            $sql .= " ORDER BY post_date DESC";
            $query = $this->dbConnection->query($sql);
            if(!$query){
                throw new DatabaseException();
            }elseif($query->num_rows == 0){
                throw new Exception("No posts available");
                return 0;
            }else{
                $posts = array();
                while($obj= $query->fetch_object()){
                    $post_array = array("id" => stripslashes($obj->post_id), "content" => stripslashes($obj->post_content), 
                        "date" => stripslashes($obj->post_date), "topic" => stripslashes($obj->post_topic), "by" => stripslashes($obj->post_by));
                    $post = new ForumPost($post_array);
                    $post->setID($obj->topic_id);
                    array_push($posts, $post);
                }
                return $posts;
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
    public function addPost($content){
        try{
          $date;
          $sql = "INSERT INTO " . $this->tblPosts . " (`post_content`, `post_date`, `post_topic`, `post_by`) ";
          $sql .= "VALUES($content, $date)";
          $query = $this->dbConnection->query($sql);
          if(!$query){
              $errmsg = $this->dbConnection->error;
              throw new DatabaseException($errmsg);
          }
          return $query;
        }
        catch(DatabaseException $e){
            
        }
    }
    public function addTopic($topic){
        /*try{
            $subject = $topic->getSubject();
            $date = $topic->getDate();
            $cat = $topic->getCategory();
            $user = $topic->getUser();
            $sql = "INSERT INTO " . $this-tblTopics . " (`topic_subject`, `topic_date`, `topic_cat`, `topic_by`) ";
            $sql .= "VALUES($subject, $date, $cat, $user)";
            if(!$query){
                $errmsg = $this->dbConnection->error;
                throw new DatabaseException($errmsg);
            }
            return $query;
        }
        catch(DatabaseException $e){
            
        }*/
    }

}