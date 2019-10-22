<?php
class ForumPost{
    private $post_id, $post_content, $post_date, $post_topic, $post_by;
    public function __construct($post_id, $post_content, $post_date, $post_topic, $post_by){ //maybe turn this into an array
        $this->post_id = $post_id;
        $this->post_content = $post_content;
        $this->post_date = $post_date;
        $this->post_topic = $post_topic;
        $this->post_by = $post_by;
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