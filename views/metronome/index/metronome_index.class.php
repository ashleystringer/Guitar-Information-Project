<?php
class MetronomeIndex extends IndexView{
    public function display(){
        //uses Tone.js and P5.js to create to create metrononome
        parent::displayHeader();
        
        ?>
    <input type="button" id="toggleBtn" value="Toggle">
        <style>
            canvas{
                background-color: gray;
            }

        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.9.0/p5.js"></script> <!-- for canvas, and tone -->
        <script src="https://unpkg.com/tone"></script>
        <script>
         var tone = new Tone.Synth().toMaster();
         var toggleBtn = document.getElementById("toggleBtn");
         var bpmBtn = document.getElementById("");
         Tone.Buffer.Transport.bpm.value = 60;
         function metronome(){
             tone.Loop(function(time){
                 
             }, '4n').start(0);
             Tone.Transport.start();
         }
         function start(){
             Tone.Transport.start();
         }
         function stop(){
             Tone.Transport.stop();
         }
         function selectTempo(){
             
         }
         tone.onload = function(){
             tone.Loop(function(time){    
             }, '4n').start(0);
             Tone.Transport.start();     
         };
         toggleBtn.addEventListener("onclick", start);
       //maybe use PPQ?

        function setup(){
            createCanvas(400, 400); //p5.js
            //Tone.Transport.start(0); //?
            /*
             *Tone.Transport.setInterval(function(time){player.start(time)}, "4n");
             * 
             */
            //Tone.Transport.setInterval();
            //Tone.Transport.start(0);
        }
        function draw(){
          //  text(Tone.now(), 10, 20);
          //  text(Tone.Transport.seconds, 10, 30);
        }
        </script>
        <div id="canvasDiv"></div>
 <?php
        parent::displayFooter();
    }
}