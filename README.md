movie-info-extractor
====================

>code to extract movie name out of file name

**step 1:** regex filter 1: to remove all data in () and []
<pre>
"/\(.*?\)/i"
"/\[.*?\]/i"
</pre>


**step 2:** Now a movie name may look like:
<pre>Iron.Man.3.213.3D.18p</pre>

Replace the "." with " " or white space to get name like
<pre>Iron Man 3 213 3D 18p</pre>

>Now the movie is of From **[name] [version] [year] [3D/2D] [resolution]**

>So now we need to parse this kind of name to get all information!

Parsing can be done using different **regex filters**

Regex 1: **to identify movie part no** like in Iron Man **3**
<pre>/\b\d /i</pre>
Regex 2: **to determine the year** like Iron man **213** or Iron Man **2013**
<pre>/\d{3,4}/i</pre>
Regex 3: **to determine dimensions** like Iron man **3D** or Iron Man **3d**
<pre>/[0-90]{1}d|[0-9]{1}D/i</pre>
Regex 4: **to determine Resolution** like Iron man **18p** or Iron Man **1080p**
<pre>/\d{1,4}p|\d{1,4}P/</pre>

And from this we can generate information like
<pre>
  Filename: Iron.Man.3.213.3D.18p
  Title: Iron Man 3
  Part: 3
  Year: 213
  Resolution: 18p
  Dimension: 3D
</pre>

<hr>
**in case of serials** we have names like:
<pre>Breaking Bad - [2x12] - Phoenix</pre>
which become like
<pre>Breaking Bad - - Phoenix</pre>
after **step 1**
So if we ignore contents after symbols other than "." we get
<pre>Breaking Bad</pre>
and from the filtered text (in **regex**) like
<pre>[s2e11]</pre>
we can parse it to get

**season :** 2nd

**episode :** 11th

