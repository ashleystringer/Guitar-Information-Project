<?php
//ini_set("display_errors", 1);
class ForumController{
    private $forum_model;
    public function __construct(){
      //  $this->forum_model = new ForumModel();
    }
    public function index(){
        //$topics = $this->forum_model->listTopics();
        $ForumModel = new ForumModel();
        $topics = $ForumModel->listTopics();
        //pagination for later
        
        /*if(FILTER_HAS_VAR(INPUT_GET, "p")){
              $page = filter_input(INPUT_GET, "p", FILTER_SANITIZE_STRING);
            }else{
                
            }
            //$page //limit
        if(!$topics){
            echo "<br> No topics are available <br>";
        }*/
        $view = new ForumIndex();
        $view->display($topics);
    }
    public function topic($topic_id){
        //$posts = array();    
        $ForumModel = new ForumModel();
        $posts = $ForumModel->listPosts($topic_id);
        $view = new ForumTopicView();
        $view->display($posts);
    }
    public function post(){
        $post_array = array();
        $ForumModel = new ForumModel();
        if(FILTER_HAS_VAR(INPUT_POST, "content")){
              $content = filter_input(INPUT_POST, "content", FILTER_SANITIZE_STRING);
            }
       }
}

