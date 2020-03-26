<?php
class GuitarNeckView{
    private $neckLength;
    private $neck;
    private $scale;
    private $chord;
    private $scalelength;
    public function __construct($necklength, $neck){
        $this->neckLength = $necklength;
        $this->neck = $neck;
        $this->scale = null;
        $this->scalelength = null;
        $this->chord = null;
    }
    public function setChord($chord){
        $this->scale = $chord; //change this
        $this->scalelength = 23; 
    }
    public function setScale($scale){
        $this->scale = $scale; 
        $this->scalelength = sizeof($this->scale); 
    }
    private function displayNotes(){
              for($i = 0; $i < $this->neckLength; $i++){
                      //echo "<td>testing</td>";
                      echo "<td class='notes'>" . $this->neck[$j][$i] . "</td>";
                }
    }
    private function displayFretNum(){
        //have a table above the neck
        //generate columns by number of frets
        //add these columns as child elements of this table
        echo "<table>";
        echo "<tr>";
        for($i=0; $i < $this->neckLength; $i++){
            echo "<td class='notes'>" . $i . "</td>";
        }
        echo "</tr>";
        echo "</table>";
    }
    /*
     * add elements to array() from 1 to 23
     */
    public function display(){

        echo "<div>";
        //$this->displayFretNum(); 
          echo "<table id='guitarneck'>";
          for($j = 6; $j > -1; $j--){ //$j initially was 5
            $fretNum = -1;  
            echo "<tr>"; 
            if(!$this->scale){ //if scale in setScale() is null
                for($i = 0; $i < $this->neckLength; $i++){
                        $fretNum++;
                        
                        echo "<td class='notes'>" . $this->neck[$j][$i] . "</td>"; 
                    
                }

               }else{
                 for($i = 0; $i < $this->neckLength; $i++){
                        if(in_array($this->neck[$j][$i], $this->scale) && $j < 6){
                              echo "<td class='notes'>" . $this->neck[$j][$i] . "</td>"; 
                         }elseif($j == 6){
                             echo "<td class='notes'> $i</td>";
                         }else{
                             echo "<td class='notes'>" . " " . "</td>";
                         }    
                }  
            }
            echo "</tr>";
          }
          echo "</table>";
          echo "</div>";
    }
}