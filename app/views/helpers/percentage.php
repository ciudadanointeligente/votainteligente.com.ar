<?php
class PercentageHelper extends AppHelper {
    function imageForPercentage($percentage){
        return ((round($percentage,-1))/10);
    }
}
?>