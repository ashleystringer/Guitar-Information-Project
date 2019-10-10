<?php
class ChordfinderSelect extends ChordfinderIndexView{
        private $chordByKey;
        private $guitar_neck;
        public function __construct(){
            $this->chordByKey = 0;
        }
        public function receiveChordByKey($chord){
            $this->chordByKey = $chord;
        }
    public function display($key, $chord, $neck){
            parent::displayHeader();
        ?>
        <script type="text/javascript">
        var guitarneck = document.getElementById("guitarneck");  
        
            </script>
            <div>
            </div>
            <div>
              <form action="<?=BASE_URL?>/chordfinder/select" method="get"> <!-- How do I go about this? -->
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
                <select name="chord">
                    <option> </option>
                    <option value="Major">Major</option>
                    <option value="Minor">Minor</option>
                    <option value="Major 7th">Major 7th</option>
                    <option value="Minor 7th">Minor 7th</option>
                    <option value="Dominant 7th">Dominant 7th</option>
                </select>
                <input type="submit" value="Select">
              </form>
               <div id="infoBox">
                    <?php 
                       if($this->chordByKey == 0){
                           echo "No chord selected";
                       }else{
                           if($key != NULL && $chord != NULL){   
                             echo "Key: " . $key . " Chord: " . $chord;
                            echo " ";
                            $chordString = implode(" ", $this->chordByKey);
                            echo $chordString;
                           }else{
                               echo "Please select a key and a chord";
                           }
                       }
                    ?>
                </div>
                <div>
                    <?php 
                    $guitarneck = new GuitarNeckView(23, $neck);
                    //$guitarneck = new GuitarNeckView(23, $neck);
                    $guitarneck->setChord($this->chordByKey);
                    $guitarneck->display(); //?
                   // $guitarneck->setScale($this->chordByKey);
                   // $guitarneck->display();
                    ?>
                </div>  
            </div>
        
<?php
            parent::displayFooter();
    }
}