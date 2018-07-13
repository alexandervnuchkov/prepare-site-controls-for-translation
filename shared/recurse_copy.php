<?php
    function recurse_copy($src,$dst) {
        $dir = dirname($src);
        if (!file_exists(dirname($dst))) {
            mkdir(dirname($dst), 0777, true);
        }
        copy($src,$dst);
    }
?>