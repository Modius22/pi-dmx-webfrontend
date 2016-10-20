<?php

  /**
   * @param int $x
   * @return int;
   * @license MIT
   */
  function valRequest($x){

    if(isset($_GET['ch1'])){
            $ch1_value = $_GET['ch1'];
            if ($x == 1)
            {
              echo ('value="' . $ch1_value . '"' );
            }else {
              echo ( $ch1_value );
            }
        }
      return 1;
  }
