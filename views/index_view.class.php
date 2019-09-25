<?php

class IndexView{
    public function displayHeader(){
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <meta name="viewport" content="">
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
                <link type="text/css" rel="stylesheet" href="<?= BASE_URL?>/www/css/site_stylesheet.css"/>
             <script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
             <script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>
            </head>
            <body>
                
             <div id="mainPad">
                <div id="navbar">
                    <table>
                        <tr>
                            <td><a href="<?= BASE_URL?>/home/index">Home</a></td>
                            <td><a href="<?= BASE_URL?>/scalefinder/select">Scalefinder</a></td>
                            <td><a href="<?= BASE_URL?>/chordfinder/select">Chordfinder</a></td>
                            <td><a href="<?= BASE_URL?>/metronome/index">Metronome</a></td>
                            <td><a href="<?= BASE_URL?>/forum/index">Forum</a></td>
                            <td><a href="<?= BASE_URL?>/login/index">Login</a>
                        </tr>
                      <!--  <tr><td><a href="<?= BASE_URL?>/scalefinder/select">Scalefinder</a></td></tr>
                        <tr><td><a href="<?= BASE_URL?>/scalefinder/test/2">Scalefinder test</a></td></tr>
                        <tr><td><a href="<?= BASE_URL?>/chordfinder/select">Chordfinder test</a></td></tr>-->
                    </table>
                </div>
             </div>
        <?php
    }
    
    public function displayFooter(){
        ?>
                <br>
                <br>
                <hr>
                <div id="footer">&copy 2019</div>
            </body>
        </html>
        <?php
    }
}