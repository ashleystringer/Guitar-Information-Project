<?php

class ScalefinderIndex extends ScalefinderIndexView{
    private $scaleByKey;
    private $guitar_neck;
    private $scalePattern;
    public function __constuct(){
        $this->scaleByKey = 0;
        $this->guitar_neck = new GuitarNeckView(22);
    }
    public function receiveScaleByKey($scale, $pattern){
       $this->scaleByKey = $scale; //is changing, but not in display
       $this->scalePattern = $pattern;
       // echo "scaleByKey " . $this->scaleByKey[0];
    }
    /*public function displayGuitarNeck($tuning){
        echo "displayGuitarNeck() in ScalefinderSelect class";
    }*/
    public function display($key, $scale, $neck){
            parent::displayHeader();
        ?>
            <div>
               
                
            </div>
            <div>
              <form action="<?=BASE_URL?>/scalefinder/select" method="get"> <!-- How do I go about this? -->
                <select name="key">
                    <option> </option>
                    <option value="C">C</option>
                    <option value="C#">C#/Db</option>
                    <option value="D">D</option>
                    <option value="D#">D#/Eb</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                    <option value="F#">F#/Gb</option>
                    <option value="G">G</option>
                    <option value="G#">G#/Ab</option>
                    <option value="A">A</option>
                    <option value="A#">A#/Bb</option>
                    <option value="B">B</option>
                </select>
                <select name="scale">
                    <option> </option>
                    <option value="Major">Major</option>
                    <option value="Harmonic Minor">Harmonic Minor</option>
                    <option value="Pentatonic Minor">Pentatonic Minor</option>
                    <option value="Pentatonic Major">Pentatonic Major</option>
                    <option value="Pentatonic Blues">Pentatonic Blues</option>
                </select>
                  <select name="tuning">
                      <option value="Standard">Standard (E-A-D-G-B-E)</option>
                      <option value="Drop D">Drop D (D-A-D-G-B-E)</option>
                      <option value="Double Drop D">Double Drop D (D-A-D-G-B-D)</option>
                      <!-- -->
                  </select>
                <input type="submit" value="Select">
              </form>
                <div id="infoBox">
                    <?php 
                       if($this->scaleByKey == 0){
                           echo "No scale selected";
                       }else{
                           
                           if($key != NULL && $scale != NULL){
                           echo "Key: " . $key . " Scale: " . $scale;
                           echo " ";
                           $scaleString = implode(" ", $this->scaleByKey);
                           $patternString = implode(" ", $this->scalePattern);
                           echo "<br>" . $patternString;
                           echo "<br>";
                           echo $scaleString;
                           }else{
                               echo "Please select a key and a scale";
                           }
                           
                       }
                    ?>
                </div>
                <div>
                    <?php 
                        $guitarneck = new GuitarNeckView(23, $neck);
                        $guitarneck->setScale($this->scaleByKey);
                        $guitarneck->display();
                        
                        //variables in objects vs. static variables and functions
                    ?>
                </div>
            </div>
     <?php
            parent::displayFooter();
    }
}