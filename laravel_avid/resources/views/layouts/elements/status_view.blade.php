<?php
    if ($data->active == 1){
        $text = "Aktif";
        $label = "success";
    } else 
    if ($data->active == 2){
        $text = "Nonaktif";
        $label = "warning";
    }
    echo "<span class='badge badge-" . $label . "'>". $text . "</span>";

?>