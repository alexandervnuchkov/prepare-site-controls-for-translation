<?php
    include('shared/simple_html_dom.php');
    include('shared/rglob.php');
    include('shared/recurse_copy.php');
    error_reporting(E_ERROR);
    ini_set("display_errors", 1);
    
    if(isset($_GET['submitEditor'])) {
        $varEditors = $_GET['editorVersion'];
        $languageLocale = $_GET['languageList'];
        
        echo 'Language locale: ' . $languageLocale;
        echo '<br />Selection: ' . $varEditors;
        
        if ($varEditors == 'helpcenter') {
            $folder = 'Sites\\helpcenter.onlyoffice.com\\';
        } elseif ($varEditors == 'website') {
            $folder = 'Sites\\www.onlyoffice.com\\';
        }
        
        $pattern_array = array('ascx');
        $filepaths = rsearch($folder, $pattern_array);

        foreach($filepaths as $files => $path) {
            if(strpos($path, '.fr.') == false && strpos($path, '.de.') == false && strpos($path, '.ru.') == false && strpos($path, '.it.') == false && strpos($path, '.es.') == false && strpos($path, '.cs.') == false && strpos($path, '.pt.') == false && strpos($path, '.pl.') == false && strpos($path, '.nl.') == false && strpos($path, '.uk.') == false && strpos($path, '.tr.') == false) {
            $enPages[] = $path;
            }
        }
        $i = 0;
        $string = $folder . 'Web\\';
        
        if($languageLocale !== 'en') {
            
            $str = '.'.$languageLocale. '.';
            foreach($filepaths as $files => $path) {
                if(strpos($path, $str) !== false) {
                    $langPages[] = $path;
                }
            }
            foreach($langPages as $singlePage) {
                foreach($enPages as $singleEnPage) {
                    $singleEnPageToLang = str_replace(".ascx","." . $languageLocale . ".ascx",$singleEnPage);
                    $singlePageToCopy = str_replace($string, '', $singlePage);
                    $singleEnPageToCopy = str_replace($string, '', $singleEnPage);
                    if($singlePage == $singleEnPageToLang) {
                        recurse_copy($singlePage, 'copied\\' . $varEditors . '_for_' . $languageLocale . '\\' . $languageLocale . '\\' . $singlePageToCopy);
                        recurse_copy($singleEnPage, 'copied\\' . $varEditors . '_for_' . $languageLocale . '\\en\\' . $singleEnPageToCopy);
                        $i++;
                    }
                }
            }
        } else {
            foreach($enPages as $singleEnPage) {
                $singleEnPageToCopy = str_replace($string, '', $singleEnPage);
                recurse_copy($singleEnPage, 'copied\\' . $varEditors . '_origin\\en\\' . $singleEnPageToCopy);
                $i++;
            }
        }
        echo '<br />' . $i . ' files were copied.';
    }
?>
<html>
<head>
    <title>Files aligned for translation</title>
    <?php
        include('shared/headLinks.php');
    ?>
</head>
<body id="parse">
    <h1>Files aligned for translation</h1>
    <?php
        include('shared/form.php');
        if($_GET['languageList'] == '') echo '<p></p>';
    ?>
    <p id="back-top" style="display: none">
        <a title="Scroll up" href="#top"></a>
    </p>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/arrowup.min.js"></script>
</body>
</html>