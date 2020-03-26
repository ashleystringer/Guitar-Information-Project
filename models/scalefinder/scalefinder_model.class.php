<?php
class ScalefinderModel{
    
    private $db; //for the user information
    private $dbConnection;
    static private $_instance = NULL;
    private $tblUserPrefs;
    private $steps;
    private $tones;
    private $notesByKey;
    private $scales;
    
    public function __construct(){
        self::initScales();
        self::getNotesByKey();
     }
    private function initScales(){
        $this->tones = array("C", "C#", "D", "D#", "E", "F", "F#", "G", "G#", "A", "A#", "B");
        //1, b2, 2, b3, 3, 4, b5, 5, #5, 6, b7, 7
        //0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11
        $this->steps = array("1", "b2", "2", "b3", "3", "4", "b5", "5", "#5", "6", "b7", "7");
        $this->scales["Major"]  = array(0, 2, 4, 5, 7, 9, 11);
        $this->scales["Harmonic Minor"] = array(0, 2, 3, 5, 7, 8, 11);
        $this->scales["Pentatonic Minor"] = array(0, 3, 5, 7, 10);
        $this->scales["Pentatonic Major"] = array(0, 2, 4, 7, 9);
        $this->scales["Pentatonic Blues"] = array(0, 3, 5, 6, 7, 10);
        //return $scales;
    }  
 
    private function getNotesByKey(){
        $this->notesByKey["C"] = array("C", "C#", "D", "D#", "E", "F", "F#", "G", "G#", "A", "A#", "B");
        $this->notesByKey["C#"] = array("C#", "D", "D#", "E", "F", "F#", "G", "G#", "A", "A#", "B", "C");
        $this->notesByKey["D"] = array("D", "D#", "E", "F", "F#", "G", "G#", "A", "A#", "B", "C", "C#");
        $this->notesByKey["D#"] = array("D#", "E", "F", "F#", "G", "G#", "A", "A#", "B", "C", "C#", "D");
        $this->notesByKey["E"] = array("E", "F", "F#", "G", "G#", "A", "A#", "B", "C", "C#", "D", "D#");
        $this->notesByKey["F"] = array("F", "F#", "G", "G#", "A", "A#", "B", "C", "C#", "D", "D#", "E");
        $this->notesByKey["F#"] = array("F#", "G", "G#", "A", "A#", "B", "C", "C#", "D", "D#", "E", "F");
        $this->notesByKey["G"] = array("G", "G#", "A", "A#", "B", "C", "C#", "D", "D#", "E", "F", "F#");
        $this->notesByKey["G#"] = array("G#", "A", "A#", "B", "C", "C#", "D", "D#", "E", "F", "F#", "G");
        $this->notesByKey["A"] = array("A", "A#", "B", "C", "C#", "D", "D#", "E", "F", "F#", "G", "G#");
        $this->notesByKey["A#"] = array("A#", "B", "C", "C#", "D", "D#", "E", "F", "F#", "G", "G#", "A");
        $this->notesByKey["B"] = array("B", "C", "C#", "D", "D#", "E", "F", "F#", "G", "G#", "A", "A#");
    }
    public function findPattern($scale){
       // $scalePattern = $this->scales[$scale];
        $scalePattern = array();
        foreach($this->scales[$scale] as $note){ //ex. this->scales['Major'] as $note
            $selectedNote = $this->steps[$note]; //ex. $this->steps[2] = 2
            array_push($scalePattern, $selectedNote); //maps scale onto steps array
        }
        return $scalePattern;
    }
    public function findScale($key, $scale){
        //use initialized scales and parameter for key to find the proper scale or mode
        $this->getNotesByKey();
       //self::initScales();
        $scaleByKey = array();
        foreach($this->scales[$scale] as $note){ //ex. this->scales['Major'] as $note
            $selectedNote = $this->notesByKey[$key][$note]; //ex. this->notesByKey['C']['2'] = 'D'
            array_push($scaleByKey, $selectedNote); //ex. C - D - E - F - G - A - B
        }
          return $scaleByKey;
    }
}