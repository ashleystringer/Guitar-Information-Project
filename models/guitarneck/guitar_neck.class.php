<?php
class GuitarNeck{
    private $tuning;
    private $listOfTunings;
    private $tones;
    private $fretLength;
    private $scale;
    private $chord;
    //also make stuff for chords
    //find chord by boxes and put them in array
    
    public function __construct(){
        echo "Constructor in GuitarNeck class";
        $this->tuning = $tuning;
        $this->fretLength = 23;
        $this->initTunings(); //why 'this' and not 'self'?
        $this->scale = null;
    }
    private function initTunings(){
        $this->tones = array("C", "C#", "D", "D#", "E", "F", "F#", "G", "G#", "A", "A#", "B");
        $this->listOfTunings["Standard"] = array(4, 9, 2, 7, 11, 4); //maybe as numbers? 
        $this->listOfTunings["Drop D"] = array(2, 9, 2, 7, 11, 4);
        $this->listOfTunings["Double Drop D"] = array(2, 9, 2, 7, 11, 2);
    }
    
    public function test($tuning){
  //      echo "tuning => " . $tuning;
        $notes = array();
        //echo "listOfTunings[tuning][0] = " . $this->listOfTunings["Standard"][0];
       // if($this->scale == NULL){ 
        
        for($i = 0; $i < 6; $i++){
            // array_push($notes, $i);
                for($j = 0; $j < 23; $j++){
            
                if(($this->listOfTunings[$tuning][$i] + $j) < 12){
                
                    $note = $this->listOfTunings[$tuning][$i] + $j;
                    $notes[$i][$j] = $this->tones[$note];
                }else{
                    $note = $this->listOfTunings[$tuning][$i] + $j - 12;
                        if($note > 11){
                            //echo "testing note being greater then 11";
                            $note -= 12;
                        }
               
                        $notes[$i][$j] = $this->tones[$note];
                    }
                }
            }
            
        //}
      //  $notes = array(1, 4, 2, 5, 11);
        //echo "notes[0][0] " . $notes[5][21];
       // return $tuning;
       return $notes;
      //return 0;
    }
    public function test2($tuning, $scale){
           $neckByScale = array();
           $neckArray = test($tuning, $scale);
            for($i = 0; $i < 6; $i++){
                for($j = 0; $j < 23; $j++){
                    if(in_array($neckArray[$i][$j], $scale)){
                       array_push($neckByScale, $neckArray[$i][$j]);
                    }
                }
            }
            return $neckByScale;
    }
   /* public function getNeckByScale($tuning, $scale){
        $neckByScale = array();
        $this->scale = $scale;
        if($this->scale == NULL){
            echo "Scale does not exist";
            test($tuning);
        }else{
            test2($tuning, $scale);
        }
    
    }*/
}
