<?php require_once("includes/namespace.php");?>
<body>
<?php require_once("topnav.php") ?>

<div id="content" class="maincontent">
<div id="expand_collapse_container">
<?php require_once("page_controls.php") ?>
</div><!--end expand collapse-->

	<ul class="snippet_container">

		<li><a href="#" class="snippet-trigger">Change Directory</a>
		<div class="snippet">
			<pre class="brush: shell;">
			cd / #changes directory to the root.</pre>
			</div><!--end snippet-->
		</li><!--end :) -->


		<li><a href="#" class="snippet-trigger">Remove Directory</a>
		<div class="snippet">
		<pre class="brush: shell;">
		#recursively removes files from the
		#folder and ultimately removes the folder.
		rm -r nameOfTheFolder </pre>
			</div><!--end snippet-->
		</li><!--end :) -->


		<li><a href="#" class="snippet-trigger">List Directory</a>
		<div class="snippet">
		<pre class="brush: shell;">
		#Shows the content of the directory as a list
		ls -l
		#shows the content and the hidden content.
		ls -al</pre>
			</div><!--end snippet-->
		</li><!--end :) -->


		<li><a href="#" class="snippet-trigger">TAR a folder</a>
		<div class="snippet">
		<pre class="brush: shell;">
		tar -zcvf myname.tar.gz foldername</pre>
		</div><!--end snippet-->
		</li><!--end :) -->


		<li><a href="#" class="snippet-trigger">"UNTAR" a folder</a>
		<div class="snippet">
		<pre class="brush: shell;">
		tar -zxvf myname.tar.gz</pre>
		</div><!--end snippet-->
		</li><!--end :) -->

		<li><a href="#" class="snippet-trigger">Show results in a manageable manner</a>
		<div class="snippet">
			<pre class="brush: shell;">
			# If you want to see the listing in a directory
			# and you have a lot of content that might not
			# fit the screen, you can see the results one at a time
			# bit hitting space after your run the following:
			ls -l | more
			#or at any point you can hit esc to stop it.</pre>
			</div><!--end snippet-->
		</li><!--end :) -->


		<li><a href="#" class="snippet-trigger">Creating a Symbolic Link</a>
		<div class="snippet">
			<pre class="brush: shell;">
			# Creating Alias
			# In this example, the first part is the destination
			# and the second part is the source. So sublime will point to
			# the long name folder
			ln -s "/Applications/Sublime\ Text.app/Contents/SharedSupport/bin/" /usr/local/bin/sublime
			# if you have a link there already you can remove it:
			rm  /usr/local/bin/sublime
		</pre>
			</div><!--end snippet-->
		</li><!--end :) -->

		<li><a href="#" class="snippet-trigger">Download Entire Site with wget</a>
		<div class="snippet">
			<pre class="brush: shell;">
			wget --mirror -p --convert-links -P /addressOfFolder/tosave http://something.com
		</pre>
			</div><!--end snippet-->
		</li><!--end :) -->

		<li><a href="#" class="snippet-trigger">Wget snippet to download a single page</a>
		<div class="snippet">
			<pre class="brush: shell;">
				#Downloads all the other folders
			wget -E -H -k -K -p -e robots=off --adjust-extension --span-hosts --convert-links --backup-converted --page-requisites http://somesite.com
			# Sometimes just the simple -O option works just fine.
			wget -O nameYourFile.html http://somesite.com
		</pre>
			</div><!--end snippet-->
		</li><!--end :) -->






		</ul><!--end snippet container-->

	<div id="footer"></div><!--end footer-->

</div><!--end content-->

</body>
</html>
