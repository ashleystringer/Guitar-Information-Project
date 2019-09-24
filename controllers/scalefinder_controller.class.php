<?php

class ScalefinderController{
    
    private $scalefinder_model; //what's wrong with scalefinder model????
    private $guitar_neck;
    
    public function __construct(){
        $this->scalefinder_model = new ScalefinderOtherModel();
        $this->guitar_neck = new GuitarNeck();
        //$this->scalefinder_model = new ChordfinderModel(); //what's wrong with ScalefinderModel()????
    }
    public function index(){
        echo "Index!";
        $view = new ScalefinderOther();
        $view->display();
        echo "testing index";
    }
    public function select(){ //parameters later
        //this will be used to select the scale by key - $this->scalefinder_model->findScale();
        $key = $_GET["key"];
        $scale = $_GET["scale"];
        $tuning = $_GET["tuning"];
       // echo "test => " . $test;
       // echo "Greetings from select";
        $view = new ScalefinderSelect();
        $scaleByKey = null;
        
        if(isset($key) && isset($scale)){
        $scaleByKey = $this->scalefinder_model->findScale($key, $scale);
        $scalePattern = $this->scalefinder_model->findPattern($scale);
        $view->receiveScaleByKey($scaleByKey, $scalePattern);
        }
        $neck = $this->guitar_neck->test($tuning);
        //$neck = $this->guitar_neck->getNeckByScale($tuning, $scaleByKey);
        $view->display($key, $scale, $neck);
       // $view->display($key);
        //echo "scaleByKey in controller => " . $view->scaleByKey[1];
        //$this->scalefinder_model->findScale($key, $scale);
    }
    public function test($testVar){
        echo "testVar - " . $testVar;
        $view = new ScalefinderTest();
        $view->display();
    }
}