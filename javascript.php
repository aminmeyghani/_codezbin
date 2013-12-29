<?php require_once("includes/namespace.php");?>
<body>
<?php require_once("topnav.php") ?>

<div id="content" class="maincontent">
<div id="expand_collapse_container">
<?php require_once("page_controls.php") ?>
</div><!--end expand collapse-->

	<ul class="snippet_container">

		<li><a href="#" class="snippet-trigger">Module Pattern</a>
		<div class="snippet">
			<pre class="brush: javascript;">
				/****************** AM ****************************
				    Defintions
				**************************************************/
				var Meyghani = (function(){

				var _name = "Amin";
				var _lastName = "Meyghani";


				//AM
				/**
				 * @qdoc function
				 * @name getFirstName
				 * @function
				 *
				 * @description returns the first name private variable
				 * @param {void} void
				 * @returns {String} String uppercased name.
				 */
				function getFirstName(){
				    return upcase(_name);
				}

				//AM
				/**
				 * @qdoc function
				 * @name getLastName
				 * @function
				 *
				 * @description returns the last name private variable
				 * @param {void} void
				 * @returns {String} String upcased last name.
				 */
				function getLastName(){
				    return upcase(_lastName);
				}

				//AM
				/**
				 * @qdoc function
				 * @name setFirstName
				 * @function
				 *
				 * @description sets the first name
				 * @param {String name} the new name to be used to set the name property
				 * @returns {void} void.
				 */
				function setFirstName(name){
				    _name = upcase(name);
				}
				/****************** AM ****************************
				    Helpers
				**************************************************/
				//AM
				/**
				 * @qdoc function
				 * @name upcase
				 * @function
				 *
				 * @description takes a string and make it uppercase
				 * @param {str} the string to be turned into uppercase
				 * @returns {String} a string object that is the uppercase of the input str.
				 */
				function upcase(str){
				    return str.toUpperCase();
				}

				return{
				    fullname : _name + " " + _lastName,
				    firstName : getFirstName,
				    lastName: getLastName,
				    setFirstName : setFirstName
				};


				})();

				var firstName = Meyghani.firstName();
				var fullName = Meyghani.fullname;

				console.log(firstName);
				Meyghani.setFirstName("Alan");
				var newName = Meyghani.firstName();
				console.log(newName);
				console.log("----------------");
			</pre>
			</div><!--end snippet-->
		</li><!--end :) -->


		<li><a href="#" class="snippet-trigger">Dynamic Method Call</a>
		<div class="snippet">
			<pre class="brush: javascript;">
				/****************** AM ****************************
				    Dynamic Method Call
				**************************************************/
				var server = {
				    restart: function () {
				        console.log("Restarting the server");
				    },
				    off: function (){
				        console.log("Shutting off the server");
				    },
				    doNothing : function () {
				        console.log("doing nothing");
				    }
				}

				function canTurnOffServer () {
				    return true;
				}
				function canRestartServer () {
				    return false;
				}


				server [  canRestartServer() ? 'restart'  :   canTurnOffServer()   ?  'off' : 'doNothing'](); // -> Shutting off the server.
			</pre>
			</div><!--end snippet-->
		</li><!--end :) -->

		</ul><!--end snippet container-->
	<div id="footer"></div><!--end footer-->

</div><!--end content-->
</body>
</html>