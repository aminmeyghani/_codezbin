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

		<li><a href="#" class="snippet-trigger">Inheritance in JavaScript</a>
		<div class="snippet">
			<pre class="brush: javascript;">
				/****************** AM ****************************
					Creating the constructor function
				**************************************************/
				/*AM: This creates the generic constructore
				for the account type. so then later other
				accounts will inherit from it.
				*/
				var Account = function(type, number, name, amount) {
				    this._type = type;
				    this._number = number;
				    this._name = name;
				    this._amount = amount;
				}
				/****************** AM ****************************
					The amount method on the account super class.
				**************************************************/
				/*AM: Prints the total amount in the bacnk. The account
				could be of any type.
				*/
				//TODO: later it should print out the tpy eof the aoccunt
				// thta tit is .
				Account.prototype.information = function() {
				    console.log(" The type of this account is: " + this._type);
				    console.log(" Account #: " + this._number);
				    console.log(" Total avaialble amount :  " + this._amount);
				    console.log(" Name of the account is : " + this._name);
				    console.log("**************");
				};
				/****************** AM ****************************
					Creating an instance of the account usning the call
					method
				**************************************************/
				//TODO: a better way of doing the input arguemnts would
				// be to pass the parameters in an object after this.
				var Savings = function(number, name, amount) {
				    Account.call(
				        this,
				        "Savings",
				        number || "#0",
				         name || "Generic Saving Account Name",
				        amount || "defualt intial value : 1000"
				    );
				};
				var Checkings = function(number, name, amount) {
				    Account.call(this, "Checkings", number, name, amount);
				};
				/****************** AM ****************************
					Setting up the relationship between the account
					and the savings account and the other account
				**************************************************/
				Savings.prototype = Object.create(Account.prototype);
				Checkings.prototype = Object.create(Account.prototype);

				/****************** AM ****************************
				    overriding the information method that is
				    defined in the super class, and we are overridnig
				    in the subclass.
				**************************************************/
				Savings.prototype.information = function(){
				    console.log("Overriden method of the super class: ");
				    console.log("Type of account: " + this._type);
				    console.log("-----------------");
				}
				/****************** AM ****************************
					Creating an instance of the savings account and
					checking account 	and calling the method on it
				**************************************************/
				// inherints the amount vale from the constructor of the super class.
				var mySavings = new Savings();
				// ****note the diffence between the constructores for each of the accounts.
				var myChecking = new Checkings("55889979", "My Checking account Account", "500");
				mySavings.information();
				myChecking.information();
			</pre>
			</div><!--end snippet-->
		</li><!--end :) -->

		<li><a href="#" class="snippet-trigger">Dependency Injection</a>
		<div class="snippet">
			<pre class="brush: javascript;">
				/****************** AM ****************************
				http://stackoverflow.com/questions/20058391/javascript-dependency-injection
				http://merrickchristensen.com/articles/javascript-dependency-injection.html
				**************************************************/
				var Injector = {
				   dependencies: {},
				   add : function(qualifier, obj){
				      this.dependencies[qualifier] = obj; 
				   },
				   get : function(func){
				      var obj = new func;
				      var dependencies = this.resolveDependencies(func);
				      func.apply(obj, dependencies);
				      return obj;
				   },
				   resolveDependencies : function(func) {
				      var args = this.getArguments(func);
				      var dependencies = [];
				      for ( var i = 0; i < args.length; i++) {
				         dependencies.push(this.dependencies[args[i]]);
				      }
				      return dependencies;
				   },
				   getArguments : function(func) {
				      //This regex is from require.js
				      var FN_ARGS = /^function\s*[^\(]*\(\s*([^\)]*)\)/m;
				      var args = func.toString().match(FN_ARGS)[1].split(',');
				      return args;
				   }
				};
			</pre>
			</div><!--end snippet-->
		</li><!--end :) -->

		<li><a href="#" class="snippet-trigger">Simple jQuery Overlay Plugin</a>
		<div class="snippet">
			<pre class="brush: javascript;">
				/****************** AM ****************************
					Overlay (loader)
					Usage:
					--------
					Quovo.overlay.remove();
					Quovo.overlay.add([optional options object] );
					You don't have to pass the object paramter or all
					of the options.
					--------
					Optional options:
					content : jQuery object (eg:  {content : $("<p>The elements ...</p>")  }),
					the html element  or anything else to be added as the content of the overlay.
					opacity : int, the opacity value between 0 and 100.
					fadeDuration : int, the fadeIn and fadeOut fadeDuration in miliseconds
					--------
					Examples:
					Adding the overlay using all of the options:
						Quovo.overlay.add({ content : $("<p>The elements ...</p>"), opacity : 50, fadeDuration : 200});
					Adding Example using just the content option:
						Quovo.overlay.add({content : $("<p>The elements ...</p>")  });
					Removing Example:
						Quovo.overlay.remove();
				**************************************************/
				,overlay:(function(){
					var DEFAULTS = {
						duration : 200,
						opacity : 70,
						extraWidth : (Context.isManager ? 20 : 0),
						content : $("<div><span id='overlayUpdateText'></span> </div>")
					};
					function add(opt){
						options = _.extend(DEFAULTS , opt);
						var target = $('.module-overlay-area');
						var overlayWidth = target.outerWidth() + options.extraWidth;
						// var overlayWidth = target.width() + options.extraWidth;
						var olay = $('.overlay');
						// var flex = $('.module-overlay-area').parent();
			      if( !olay.length ){
				     	//insertion:
							var overlay = $(
								'<div class="overlay" style="width:'+ overlayWidth +'px">\
								<article class="loader"><img src="/img/loading.gif"><br></article></div>')
							.children('.loader').append(options.content ).end()
							.css('opacity', (options.opacity/100)) // try catch maybe?
							.hide().appendTo(target).fadeIn(options.duration);
							// if (flex) overlay.outerHeight(flex.outerHeight());
						}
						$( window ).resize(function() {
						  try{
						  	overlay.outerWidth(target.outerWidth()+options.extraWidth);
						  	// overlay.outerWidth(target.width()+options.extraWidth);
						  }catch(e){
						  	// console.log(e.message);
						  }
						  // try{
						  //   if (flex) { overlay.outerHeight(flex.outerHeight()); }
						  // }catch(e){
						  // 	// console.log(e.message);
						  // }
						});
					}
					//update overlay text
					function text(str){
						d3.select('#overlayUpdateText').text(str);
					}
					function remove(){
						if (typeof(options) == 'undefined'){ return; }
						$('.overlay').fadeOut(options.duration, function () {
							$(this).remove();
						});
					}
					return {
						add : add,
						text: text,
						remove: remove
					}
				})()
			</pre>
			</div><!--end snippet-->
		</li><!--end :) -->

		</ul><!--end snippet container-->
	<div id="footer"></div><!--end footer-->

</div><!--end content-->
</body>
</html>