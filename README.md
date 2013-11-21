movie-name-extractor
====================

code to extract movie name out of file name

regex filter 1: <pre>"/\(.*?\)/i"</pre>   -- to remove all data in ()

regex filter 2: <pre>"/\[.*?\]/i"</pre>   -- to remove all data in []

removing noise using manual method:

<pre>
$array = array("HSBS BrRip x264 - YFIY",
 "HSBS BrRip x264 YIFY",
 "BluRay.HSBS.18p.DTS.x264-CHD3D",
 "bluray.3D.h-sbs.dts.x264-publichd",
 "BluRay.3D.H-SBS.DTS.x264-z-man",
 "3d HSBS YIFY",
 "3D.HSBS.BluRay.x264.YIFY",
 "BluRay.x264.YIFY",
 "HDTV.x264-FQM",
 "Bluray.HSBS.x264.YIFY",
 "HSBS YIFY",
 "HDTV.x264-EVOLVE",
 "HDTV.x264-COMPULSiON",
 "HDTV.x264-IMMERSE");

 $replace = str_replace($array,"",$string);
</pre>

