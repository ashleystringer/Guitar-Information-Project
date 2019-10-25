<?php
class ForumPost{
    private $post_id, $post_content, $post_date, $post_topic, $post_by;
    public function __construct($post_array){ //maybe turn this into an array
        $this->post_id = $post_array["id"];
        $this->post_content = $post_array["content"];
        $this->post_date = $post_array["date"];
        $this->post_topic = $post_array["topic"];
        $this->post_by = $post_array["by"];
    }
    public function setID($post_id){
        $this->post_id = $post_id;
    }
    public function getID(){
        return $this->post_id;
    }
    public function getContent(){
        return $this->post_content;
    }
    public function getDate(){
        return $this->post_date;
    }
    public function getTopic(){
        return $this->post_topic;
    }
    public function getPostBy(){
        return $this->post_by;
    }
}