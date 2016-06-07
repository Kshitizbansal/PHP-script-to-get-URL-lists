<?php
$url="http://journals.aps.org/search/results?page=1&per_page=".$_POST["results"]."&journal=prb&clauses=%5B%7B%22operator%22:%22AND%22,%22field%22:%22all%22,%22value%22:%22".rawurlencode($_POST["search"])."%22%7D%5D#title";
$html = file_get_contents($url);
file_put_contents("url_prb.txt", "");
$myfile = fopen("url_prb.txt", "a") or die("Unable to open file!");
$a=0;

preg_match_all('#PhysRevB.[0-9]*\.[0-9]*","title"#is', $html, $matches);

foreach ($matches[0] as $value) 
{   $a=$a+1;
    preg_match_all('#PhysRevB.[0-9]*\.[0-9]*#is', $value, $string);  
    fwrite($myfile, "http://journals.aps.org/prb/abstract/10.1103/".$string[0][0]."\n");
    if($a==$_POST["results"]){break;}
}
echo "File created"
?>