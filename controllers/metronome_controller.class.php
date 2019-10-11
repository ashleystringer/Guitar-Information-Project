<?php
ini_set("display_errors", 1);
class MetronomeController{
    private $metronome;
    public function __construct(){
        //echo "<br> testing constructor in MetronomeController";
        $this->metronome = new Metronome();
    }
    public function index(){
        /*$bpm = $_GET["bpm"];
        $measure = $_GET["measure"];*/
        //$view = new MetronomeIndex();
        $view = MetronomeIndex::getMetronomeIndex();
        $view->display();
        /*if(isset($bpm) && isset($measure)){
            $metronome = new Metronome($bpm, $measure);
            $metronome->start();
        }*/
    }
    public function pause($opt){
        //echo "<br> testing pause() <br>";
        //$this->metronome->test();
        //$op = array(3, 1, 4, 2);
        //$test = $this->metronome->test();
        $test = $this->metronome->checkPause();
        echo json_encode($test);
        //to pause using asynchronous request from metronome_index
    }
    public function test($t){
        echo "<br>test<br>";
        $bpm = $_GET["bpm"];
        echo "$bpm";
        $measure = $_GET["measure"];
        $view = MetronomeIndex::getMetronomeIndex();
        $view->method1($bpm, $measure);
    }
}