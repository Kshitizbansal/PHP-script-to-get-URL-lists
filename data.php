<?php
$url="http://journals.plos.org/plosone/search?q=".$_POST["search"]."&filterSubjects=Magnetic+properties&filterJournals=PLoSONE";
$html = file_get_contents($url);
$dom = new DOMDocument;
@$dom->loadHTML($html);
file_put_contents("url.txt", "");
$myfile = fopen("url.txt", "a") or die("Unable to open file!");
foreach ($dom->getElementsByTagName("a") as $node)
{
  if($node->parentNode->nodeName == "dt")
  {
     $txt = "http://journals.plos.org/".$node->getAttribute("href")."\n";
     fwrite($myfile, $txt);
  }
}
echo "File created"
/*$classname="active-file";
$finder = new DomXPath($dom);
$node = $finder->query("//a");
echo $node->nodeValue;*/
?>				