movie-info-extractor code in php
====================

this is a php library that can be directly used to get information about filename (movie)


all you have to do is **include the library**

And call the function. For example:
<pre>
	$xml = getmovieDetails("Iron.Man.3.3D.2013.720p");
	var_dump($xml);
</pre>
**output**
<pre>
Array
(
    [part] => 3 
    [year] => 2013
    [dimension] => 3D
    [resolution] => 720p
    [title] => Iron Man 3   
)
</pre>
