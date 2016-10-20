<?php

define('__ROOT__', (dirname(__FILE__)));
require_once(__ROOT__.'/Ressource/helper/function.php');

//header echo
echo ('
        <!DOCTYPE html>
        <head>
          <meta name="viewport" content="width=device-width" />
          <title>webinterface test</title>
          <script src="Ressoucre/js/fclock.js" language="javascript"> </script>
          <link href="/noUiSlider/nouislider.min.css" rel="stylesheet">
        </head>

      ');

echo ('
      <body onload="uhr_anzeigen()">
        <strong>
          <div style="float: right;" id="uhr">
          <!-- Stell ma vor, hier is die uhr -->
          </div>
        </strong>
        <br>
        <br>
        <!-- GPIO-ports 13, 19 and 26 are already connected to relay board, waiting to be used -->
        <table>
          <tr>
            <td>GPIO 5:</td>
            <td>GPIO 6:</td>
            <td>Ansage</td>
          </tr>
          <tr>
            <td><form method="get" action="index.php">
            <input type="submit" value="Go!" name="gpio5_hit">
            </td>
            <td>
            <input type="submit" value="EIN" name="gpio6_ein"><input type="submit" value="AUS" name="gpio6_aus">
            </td>
            <td><input type="submit" value="play" name="play_mp3">
            </form>
            </td>
          </tr>
          <tr>
            <td> log: <!-- debugging-->
');

                  $modeon5 = trim(@shell_exec("gpio -g mode 5 out"));
                  $val     = trim(@shell_exec("gpio -g write 5 0"));

                  if(isset($_GET['gpio5_hit'])){
                    $val = trim(@shell_exec("gpio -g write 5 1"));
                    echo("GPIO5 ein");

                    sleep(1);
                    $val = trim(@shell_exec("gpio -g write 5 0"));
                    echo("GPIO5 aus");
                  }
          echo('
          </td>
          <td> log: <!-- debugging -->
          ');
                 $modeon6 = trim(@shell_exec("gpio -g mode 6 out"));
                   if(isset($_GET['gpio6_ein'])){
                    $val = trim(@shell_exec("gpio -g write 6 1"));
                    echo("GPIO18 EIN");
                   }
                  else if(isset($_GET['gpio6_aus'])){
                   $val = trim(@shell_exec("gpio -g write 6 0"));
                   echo("GPIO6 AUS");
                  }
        echo('
              </td>
              <td> log: <!-- debugging -->');
                  if(isset($_GET['play_mp3'])){
                    $val = trim(@shell_exec("mpg123 /kzh/sounds/veranstaltung_beginnt.mp3"));
                  }

       echo('
               </td>
              </tr>
              <tr>
              <style>
              input[type=range][orient=vertical]
              {
              writing-mode: bt-lr; /* IE */
              -webkit-appearance: slider-vertical; /* WebKit */
              width: 8px;
              height: 175px;
              padding: 0 5px;
              }
              </style>
              <td>Slidertest<br>
              <form method="GET" action="index.php" oninput="numerisch.value=ch1.value">
              <input type="range" name="ch1" min="0" max="255" orient="vertical" id="value_CH1" step="5"

              ');

              valRequest(1);
        echo('

              onchange="ch1.form.submit()">
              <output name="numerisch">
            ');

              valRequest(0);
        echo('
                </output>
              </form>
                  <br>

                  </td>
                  <td></td>
                  <td></td>
                  </tr>
                </table>
              </body>
              </html>

');



 ?>
