<!DOCTYPE html>
<html  lang="en">
<head>
 
<meta charset="utf-8">
 
<title>Xray Jquery show image</title>
 
<style media="screen">
body {
    background-color:#f0f0f0;
 }
.thumbnail:hover {
    position:relative;
    top:-25px;
    left:-35px;
    width:1024px;
    height:auto;
    display:block;
    z-index:999;
</style>
 
</head>
<body>
 
<?PHP
 
//======================================================================
//
// Name: Web Image Browser
// Description: A web Image browser written in PHP
// Version: 0.1 beta 15
//
// License: This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
// GNU General Public License for more details.
//
//======================================================================
 
 
  // a subdirectory of the current directory called images
  $dirlist = getFileList("gallery-images/");
 
// If you want to list all files with whole arrey uncomment this line:
//print_r($dirlist);
 
 
usort($dirlist, build_sorter('lastmod'));
 
 
//oppretter Tabell med Ramme  align="left|right|center"
echo '<table border="0" align="center">';
    echo '<tr>';
 
//Her starter 1 rad med bilder
//Print out 0 to 3
$output = array_slice($dirlist, 0, 4);
 
 
foreach ($output as $item) {
 
    echo '<th width="10%">';
 
 
//show image
echo "<a href='show_image.php?image_path=".$item['name']."'".$item['name']."'>";
echo '<img src="' .$item['name']. '" height="200" width="200" />';
echo '</a>';
echo "\n<br />\n";
// echo '</th>';
// echo '<th>';
 
 
//Her gir vi ut Filnavn OG DATO
  // echo "Filename:";
     echo "<a href='show_image.php?image_path=".$item['name']."'".$item['fname']."'>".$item['fname']."</a>";
     echo "\n<br />\n";
     echo $item[''] . '' . date ("F d Y H:i:s.", $item['lastmod']) . "\n<br />\n";
     echo "\n<br />\n";
 
 
echo '</th>';
}
echo '</tr>';
// End of Row 1
 
 
//Her starter 2 rad med bilder
//Print out 4 to 6
 
$outputr2 = array_slice($dirlist, 5, 4); 
//oppretter ny RAD
echo '<tr>';
foreach ($outputr2 as $item) {
 
    echo '<th>';
 
 
//show image
echo "<a href='show_image.php?image_path=".$item['name']."'".$item['name']."'>";
echo '<img src="' .$item['name']. '" height="200" width="200" />';
echo '</a>';
echo "\n<br />\n";
// echo '</th>';
// echo '<th>';
 
 
//Her gir vi ut Filnavn OG DATO
   echo "Filename:";
     echo "<a href='show_image.php?image_path=".$item['name']."'".$item['fname']."'>".$item['fname']."</a>";
     echo "\n<br />\n";
     echo $item[''] . '' . date ("F d Y H:i:s.", $item['lastmod']) . "\n<br />\n";
     echo "\n<br />\n";
 
echo '</th>';
}
// End of Row 3
 
//Her starter 2 rad med bilder
//Print out 7 to 9
 
$outputr2 = array_slice($dirlist, 9, 4); 
//oppretter ny RAD
echo '<tr>';
foreach ($outputr2 as $item) {
 
    echo '<th>';
 
 
//show image
echo "<a href='show_image.php?image_path=".$item['name']."'".$item['name']."'>";
echo '<img src="' .$item['name']. '" height="200" width="200" />';
echo '</a>';
echo "\n<br />\n";
// echo '</th>';
// echo '<th>';
 
 
//Her gir vi ut Filnavn OG DATO
   echo "Filename:";
     echo "<a href='show_image.php?image_path=".$item['name']."'".$item['fname']."'>".$item['fname']."</a>";
     echo "\n<br />\n";
     echo $item[''] . '' . date ("F d Y H:i:s.", $item['lastmod']) . "\n<br />\n";
 
echo '</th>';
}
// End of Row 3
 
 
 
// Avslutter hele tabellen etter dette
echo '</tr>';
echo '</table>';
echo '</body>';
echo '</html>';
 
 
//Functions do not touch JBP
 
 
//function to Sort Date
function build_sorter($key) {
    return function ($a, $b) use ($key) {
        return strnatcmp($b[$key], $a[$key]);
    };
}
 
 
  function getFileList($dir)
  {
    // array to hold return value
    $retval = [];
 
    // add trailing slash if missing
    if(substr($dir, -1) != "/") {
      $dir .= "/";
    }
 
    // open pointer to directory and read list of files
    $d = @dir($dir) or die("getFileList: Failed opening directory {$dir} for reading");
    while(FALSE !== ($entry = $d->read())) {
      // skip hidden files
      if($entry{0} == ".") continue;
      if(is_dir("{$dir}{$entry}")) {
        $retval[] = [
          'name' => "{$dir}{$entry}/",
          'type' => filetype("{$dir}{$entry}"),
          'size' => 0,
          'lastmod' => filemtime("{$dir}{$entry}")
        ];
      } elseif(is_readable("{$dir}{$entry}")) {
        $retval[] = [
          'name' => "{$dir}{$entry}",
      'fname' => "{$entry}",
          'type' => mime_content_type("{$dir}{$entry}"),
          'size' => filesize("{$dir}{$entry}"),
          'lastmod' => filemtime("{$dir}{$entry}")
        ];
      }
    }
    $d->close();
 
    return $retval;
  }
?>
