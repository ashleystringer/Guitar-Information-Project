<?php
class ForumTopic{
  private $topic_id, $topic_subject, $topic_date, $topic_cat, $topic_by;
    public function __construct($topic_subject, $topic_date, $topic_cat, $topic_by){
        $this->topic_subject = $topic_subject;
        $this->topic_date = $topic_date;
        $this->topic_cat = $topic_cat;
        $this->topic_by = $topic_by;
    }
    public function setID($topic_id){
        $this->topic_id = $topic_id;
    }
    public function getID(){
        return $this->topic_id;
    }
    public function getSubject(){
        return $this->topic_subject;
    }
    public function getDate(){
        return $this->topic_date;
    }
    public function getCategory(){
        return $this->topic_cat;
    }
    public function getUser(){
        return $this->topic_by;
    }
}