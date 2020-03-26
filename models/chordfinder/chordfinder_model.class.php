<?php
class ChordfinderModel{ 
    
        /*I guess use IndexedDB here since it's 'business logic'
         * 
         */

   private $db; //for the user information
    private $dbConnection;
    static private $_instance = NULL;
    private $tblUserPrefs;
    private $tones;
    private $notesByKey;
    private $scales;
    private $tonesByChord;
    
    public function __construct(){
        self::getTonesByChord();
        self::getNotesByKey();
    }
    public function display(){
        echo "Disply() in ChordfinderModel()";
    }
    public function getTonesByChord(){
        //0 (1), 1 (b2), 2 (2), 3 (b3), 4 (3), 5 (4), 6 (b5), 7 (5), 8 (#5), 9 (6), 10 (b7), 11 (7)
        $this->tonesByChord["Major"] = array(0, 4, 7);
        $this->tonesByChord["Minor"] = array(0, 3 ,7);
        $this->tonesByChord["Major 7th"] = array(0, 4, 7, 11);
        $this->tonesByChord["Minor 7th"] = array(0, 3, 7, 10);
        $this->tonesByChord["Dominant 7th"] = array(0, 4, 7, 10);
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
        public function findChord($key, $chord){
            $chordByKey = array();
            foreach($this->tonesByChord[$chord] as $note){
                $selectedNote = $this->notesByKey[$key][$note];
                //echo $selectedNote;
                array_push($chordByKey, $selectedNote);
            }
            return $chordByKey;
        }
        //also have function for different movements 
        //must consider chord shapes throughout the neck
        //also, 'recommended scales'
}