<?php
class Metronome{
    private $bpm;
    private $measure;
    private $counter;
    private $pause;
    public function __construct(){
      //  echo "<br> Constructor in Metronome class";
        $this->pause = false;
    }
    public function test(){
      if($this->pause == true){
          $this->pause = false;
      }else{
          $this->pause = true;
      }
      return $this->pause;
    }
    function checkPause(){
        if($this->pause == true){
            return true;
        }else{
            return false;
        }
    }
    public function setTime($bpm, $measure){
        $this->bpm = $bpm;
        $this->measure = $measure;      
    }
    public function start(){
        $checkPause = checkPause();
        while($checkPause != true){
            $checkPause = checkPause();
            usleep(1000000 * (60 / $this->bpm));
            $this->counter++;
            if($this->counter % $this->measure == 0){
                echo "TICK\n";
            }else{
                echo "TOCK\n";
            }
        }
    }
}