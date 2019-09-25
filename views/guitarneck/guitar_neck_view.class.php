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
       // displayFullNeck();
        /*if($this->scale){
            echo "<br> Scale exists <br>";
        }else{
            echo "<br> Scale does not exist <br>";
        }*/
        echo "<div>";
        $this->displayFretNum();
          echo "<table id='guitarneck'>";
          for($j = 5; $j > -1; $j--){
            $fretNum = -1;  
            echo "<tr>";  
            if(!$this->scale){
                for($i = 0; $i < $this->neckLength; $i++){
                  //   if($j == 0){
                        $fretNum++;
                     //   $this->displayedNeck[0][$fretNum] = $fretNum;
                 //     }
                      //echo "<td>testing</td>";
                    //  else{
                        echo "<td class='notes'>" . $this->neck[$j][$i] . "</td>";
                        //echo "<td class='notes'>" . $this->displayedNeck[$j][$i] . "</td>";
                    //  }
                }
               // displayNotes(); //doesn't display?
            }else{
                 for($i = 0; $i < $this->neckLength; $i++){
                  /* if($j == 0){
                    $fretNum++;   
                     //   $this->displayedNeck[0][$fretNum] = $fretNum;
                    }*/
              //    else{
                    if(in_array($this->neck[$j][$i], $this->scale)){
                          echo "<td class='notes'>" . $this->neck[$j][$i] . "</td>"; 
                         // echo "<td class='notes'>" . $this->displayedNeck[$j][$i] . "</td>";
                     }else{
                         echo "<td class='notes'>" . " " . "</td>";
                     }
                   // }
                }  
            }
            echo "</tr>";
          }
          echo "</table>";
          echo "</div>";
    }
}