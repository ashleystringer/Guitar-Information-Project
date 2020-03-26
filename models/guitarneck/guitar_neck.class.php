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
    
    public function getFullNeck($tuning){ //getFullNeck //originally test()
        $notes = array();
        
        for($i = 0; $i < 7; $i++){ //$i initially was 6
            
                for($j = 0; $j < 23; $j++){
                    if($i == 6){
                     $notes[$i][$j] = $j;   
                     //adding fret numbers to scale here and not in view
                     //easier to make the numbers appear even 
                    }else{
                    if(($this->listOfTunings[$tuning][$i] + $j) < 12){ //ex: listOfTunings['standard'][0] + 1;

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
                
           }
            
       return $notes;
    }
}
