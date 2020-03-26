<?php
class ChordfinderController{
    private $chordfinder_model;
    private $default_tuning;
    private $guitar_neck;
    private $test;
    public function __contruct(){
        $this->chordfinder_model = new ScalefinderOtherModel(); //why won't this be identified in select()
        $this->default_tuning = "Standard";
        $this->guitar_neck = new GuitarNeck();
        // $this->test = new ChordfinderModel();
    }
    public function index(){
        $view = new ChordfinderIndex();
        $view->display();
    }
    public function select(){
        //$key = $_GET["key"];
       // $chord = $_GET["chord"];
          if(FILTER_HAS_VAR(INPUT_GET, "key")){
              $key = filter_input(INPUT_GET, "key", FILTER_SANITIZE_STRING);
            }
          if(FILTER_HAS_VAR(INPUT_GET, "chord")){
               $chord = filter_input(INPUT_GET, "chord", FILTER_SANITIZE_STRING);
            }
        
        $view = new ChordfinderSelect();
        $test = new ChordfinderModel();
        
        
        if(isset($key) && isset($chord)){
            $chordByKey = $test->findChord($key, $chord);
            $view->receiveChordByKey($chordByKey);
        }
        $guitarneck = new GuitarNeck();
        $neck = $guitarneck->getFullNeck("Standard");
        //$neck = $this->guitar_neck->test($this->default_tuning);
        
        $view->display($key, $chord, $neck);
       // $this->chordfinder_model->findChord($key, $chord);
    }
}