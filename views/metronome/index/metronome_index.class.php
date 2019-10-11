<?php
class MetronomeIndex extends IndexView{
    public function display(){
        //uses Tone.js and P5.js to create to create metrononome
        parent::displayHeader();
        
        ?>
        <script></script> <!-- for canvas, and tone -->
<?php
        parent::displayFooter();
    }
}