<?php

$d = new DOMDocument;
$mock = new DOMDocument;
$d->loadHTML(file_get_contents('https://docs.google.com/document/d/e/2PACX-1vQ2UTb-_kM3u9OW4ijIeQdUWSfoi40sLVTZ74TNfwD6B1Xrld6ZFZDKCww4VYI34nFtHe0z3Eyijn52/pub?embedded=true'));
$body = $d->getElementsByTagName('body')->item(0);
foreach ($body->childNodes as $child){
    $mock->appendChild($mock->importNode($child, true));
}

echo $mock->saveHTML();

?>
