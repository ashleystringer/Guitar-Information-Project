<?php
class MetronomeModel{
    private $bpm;
    private $measure;
    private $counter;
    private $isPaused;
    
    public function __construct($bpm, $measure){
        $this->bpm = $bpm;
        $this->measure = $measure;
        $this->isPaused = false;
    }
    public function start(){
        while(!$this->isPaused){
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