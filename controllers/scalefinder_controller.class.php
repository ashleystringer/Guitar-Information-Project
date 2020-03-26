<?php
//ini_set('display_errors', 1);
class ScalefinderController{
    
    private $scalefinder_model; //what's wrong with scalefinder model????
    private $guitar_neck;
    
    public function __construct(){
        $this->scalefinder_model = new ScalefinderModel();
        $this->guitar_neck = new GuitarNeck();
        //$this->scalefinder_model = new ChordfinderModel(); //what's wrong with ScalefinderModel()????
    }
    public function index(){
        echo "Index!";
        //$view = new ScalefinderIndex();
        //$view->display();
        echo "testing index";
    }
    public function select(){ //parameters later
        //this will be used to select the scale by key - $this->scalefinder_model->findScale();
        $key = $_GET["key"];
        $scale = $_GET["scale"];
        $tuning = $_GET["tuning"];
        if(!$tuning){
            $tuning = "Standard";
        }
        
        $view = new ScalefinderIndex();
        $scaleByKey = null;
        
        if(isset($key) && isset($scale)){
            $scaleByKey = $this->scalefinder_model->findScale($key, $scale);
            $scalePattern = $this->scalefinder_model->findPattern($scale);
            $view->receiveScaleByKey($scaleByKey, $scalePattern);
        }
        $neck = $this->guitar_neck->getFullNeck($tuning); //gets full neck, regardless of key and scale being null 

        $view->display($key, $scale, $neck);
    }
}