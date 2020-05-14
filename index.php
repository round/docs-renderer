<?php

$docID = $_GET['id'];
$docURL = 'https://docs.google.com/document/d/e/' . $docID . '/pub';
$docEmbed = $docURL . '?embedded=true';


$d = new DOMDocument;
$mock = new DOMDocument;
$d->loadHTML(file_get_contents($docURL));



// $title = $d->getElementsByTagName('title')->item(0)->nodeValue; //can also be textContent
// $body = $d->getElementsByTagName('body')->item(0);
// $body = $d->getElementById('contents')->item(0);
// foreach ($body->childNodes as $child){
//     $mock->appendChild($mock->importNode($child, true));
// }



$title = $d->getElementsByTagName('title')->item(0)->nodeValue; //can also be textContent
$body = $d->getElementById('contents');
foreach ($body->childNodes as $child){
  $mock->appendChild($mock->importNode($child, true));
}

$renderedPage = $mock->saveHTML();


?>

<html>
  <head>
    <title><?php echo $title ?></title>
  </head>
  <body>
    <?php echo $renderedPage ?>
  </body>
</html>
