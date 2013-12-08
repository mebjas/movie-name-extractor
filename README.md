movie-info-extractor
====================

code to extract movie name out of file name

**step 1:** regex filter 1: <pre>"/\(.*?\)/i"</pre>   -- to remove all data in ()

**step 2:** regex filter 2: <pre>"/\[.*?\]/i"</pre>   -- to remove all data in []

**step 3:** Now a movie name may look like:
<pre>Iron.Man.3.213.3D.18p</pre>

Replace the "." with " " or white space to get name like
<pre>Iron Man 3 213 3D 18p</pre>
<pre>
Code:
$string = "Iron.Man.3.213.3D.18p";
$string = str_replace("."," ",$string);
</pre>

Now the movie is of From **[name] [version] [year] [3D/2D] [resolution]**

So now we need to parse this kind of name to get all information!


**in case of serials** we have names like:
<pre>Breaking Bad - [2x12] - Phoenix</pre>
which become like
<pre>Breaking Bad - - Phoenix</pre>
after **step 2**
So if we ignore contents after symbols other than "." we get
<pre>Breaking Bad</pre>
and from the filtered text (in **regex**) like
<pre>[s2e11]</pre>
we can parse it to get

**season :** 2nd

**episode :** 11th

