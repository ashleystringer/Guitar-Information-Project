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
        var synth = new Tone.Synth().toMaster(); //tone.js
//        synth.triggerAttackRelease("C4", "8n");
        var toggleBtn = document.getElementById("toggleBtn");
        if(!toggleBtn){
            console.log("toggle button doesn't exist");
        }else{
            console.log("toggle button exists");
            console.log("toggle button " + toggleBtn.value);
        }
        toggleBtn.addEventListener("click", e => Tone.Transport.toggle());


        function triggerSynth(time){
            synth.triggerAttackRelease('C2', '16n', time);
        }
        Tone.Transport.bpm.value = 180;
        Tone.Transport.schedule(triggerSynth, 0);
        Tone.Transport.loopEnd = '1m';
        Tone.Transport.loop = true;
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