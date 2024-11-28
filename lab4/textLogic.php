<?php
/*require_once 'htmlpurifier/library/HTMLPurifier.auto.php';
$config = HTMLPurifier_Config::createDefault();
$purifier = new HTMLPurifier($config);*/
//return $purifier->purify($string);
//return nl2br(htmlentities(htmlspecialchars($string, ENT_QUOTES)));

function checkPreset() {
    if (isset($_GET['preset']))  return true; 
    else return false;
}

function setPreset(){

    $preset = htmlspecialchars($_GET['preset']);
    
    switch ($preset) {
        case '1':
            $htmlCode = file_get_contents('texts/preset1.txt');
            break;
        case '2':
            $htmlCode = file_get_contents('texts/preset2.txt');
            break;
        case '3':
            $htmlCode = file_get_contents('texts/preset3.txt');
            break;
        default:
            $htmlCode = "";
            break;
    }

    return $htmlCode;
}

function pastProcessedTextFromForm(){
    $text = $_POST['input_text'];
    $exNumber = $_POST['select_ex'];

    $resultString = TextProcessing($text, $exNumber);

    return $resultString;
}


function TextProcessing($text, $exNum){
    switch ($exNum) {
        case '5':
            $resultText = Ex5($text);
            break;
        case '8':
            $resultText = Ex8($text);
            break;
        case '14':
            $resultText = Ex14($text);
            break;
        case '16':
            $resultText = Ex16($text);
            break;
        default:
            $resultText = $text;
            break;
    }

    return $resultText;
}


function Ex5($inText){
    $exText = "<strong><p> Задание 5: Тире, вставленное минусом между двумя пробелами заменять на среднее тире (&ndash;), двойной минуc между пробелами заменять на &mdash; и привязывать его к предыдущему слову неразрывным пробелом.</p></strong>";
    /*$newString1 = str_replace(" - ", "&ndash; ", $inText);
    $newString2 = str_replace(" -- ", "&mdash; ", $newString1); 
    return $exText . $newString2;*/

    $patterns = array('/\s-\s/', '/\s--\s/');
    $replacements = array('&ndash; ', '&mdash; ');
    $string = preg_replace($patterns, $replacements, $inText);
    return $exText . $string;
}

function Ex8($inText){
    $exText = "<strong><p> Задание 8: Расстановка точек в сокращениях «и т. д.» и «и т. п.», например, итд => и т. д. </p></strong>";

    $patterns = '/(и)\s??(т)\.?\s??([п]|[д]){1}\.?/u';
    $replacements = '$1 $2. $3. ';
    $string = preg_replace($patterns, $replacements, $inText);

    return $exText . $string;
}

function Ex14($inText){
    $exText = "<strong><p> Задание 14: Автоматически сформировать “Указатель ссылок”. Работает как оглавление, но ссылки делаются якорными на ссылки в документе</p></strong>";
    //preg_match_all('/<a [\W\w]+>[\W\w]+(<\/a>)+?/u', $inText, $linksArray);
    //$replace = preg_replace('/<a ([^>]*)>(.*?)<\/a>/u', addLink($counter), $inText);
    
    $counter = 0;
    $addLinks = preg_replace_callback('/<a ([^>]*)>(.*?)<\/a>/u', function($matches) use (&$counter) {
        $counter++;
        return '<a ' . $matches[1] . 'id="link' . $counter++ . '" >' . $matches[2] . '</a>';
    }, $inText);

    preg_match_all('/<a [^>]*>.*?<\/a>/u', $addLinks, $linksArray);
    
    $referencePointer = "<strong><p>Указатель ссылок</p></strong><ul>";
    foreach($linksArray[0] as $key => $link){
        $number = $key + 1;
        preg_match('/id="link(\d*)"/', $link, $anchor);
        preg_match('/>(.*?)</', $link, $matches);
        $linkText = !empty($matches[1]) ? $matches[1] : "---Медиа---" ;
        $referencePointer .= "<li> Ссылка" . $anchor[1] .": " . "<a href=\"#link" . $anchor[1] . "\">$linkText</a>" . "</li>";
    }
    $referencePointer .= "</ul>";
    return $exText . $referencePointer . $addLinks;
}

function Ex16($inText){
    $exText = "<strong><p> Задание 16: Фильтр запретных слов - “пух”, “рот”, “делать”, “ехать”, “около”, “для”. Задача – заменить на ### (нужное количество символов) запрещенные слова в тексте. </p></strong>";

    $forbiddenWords = array("пух", "рот", "делать", "ехать", "около", "для");
    //$censor = [];
   // $replacement = [];
   $censoredText = $inText;
    foreach($forbiddenWords as $word){
        $censor = "/([а-я]*)(" . preg_quote($word, '/') . ")([а-я]*)/ui";
        $replacement = str_repeat('#', mb_strlen($word, 'UTF-8'));

        $censoredText = preg_replace_callback($censor, function($matches) use ($replacement){
            
            return $matches[1] . $replacement . $matches[3];
        }, $censoredText);
    }
    return $exText . $censoredText;
}


/*function GetHTMLFromURL($URL){
    $html = file_get_contents($URL);

    $html = preg_replace('/<header.*?<\/header>/s', '', $html);

    $html = preg_replace('/<nav.*?<\/nav>/s', '', $html);

    $html = preg_replace('/<footer.*?<\/footer>/s', '', $html);

    return $html;
}*/