<?php
    function rsearch($folder, $pattern_array) {
        $return = array();
        $iti = new RecursiveDirectoryIterator($folder);
        foreach(new RecursiveIteratorIterator($iti) as $file){
            if (in_array(strtolower(array_pop(explode('.', $file))), $pattern_array)){
                $return[] = $file->__toString();
            }
        }
        return $return;
    }
?>