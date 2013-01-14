<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,700,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="styles/bootstrap.min.css">
        <link rel="stylesheet" href="styles/prettify.css">

        <script src="scripts/prettify.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>
    </head>
    <body>
    	<div class="container">
    		<div class="hero-unit">
    			<div class="row">
    				<div class="media">
    					<img class="media-object pull-left" src="img/terminal.png" alt="terminal shell">
    					<div class="media-body">
    						<div class="media-heading">
    							<h1>Simple Virtual Host<br>Entry Builder</h1>
    							<h3>...I mean Super Simple</h3>
    						</div>
    						<p>Just plug in your info and out spits some code, copy/paste that into your httpd-vhosts.conf file, add the record to your /etc/hosts file and restart apache.</p>
    						<p>Super simple page built in 10 minutes using <a href="http://twitter.github.com/bootstrap">Bootstrap</a> and <a href="http://www.iconfinder.com/">Icon Finder</a>.
    					</div>
    				</div>
    			</div>
    		</div>
    	<div class="row">
    		<div class="span4">
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				   <label for="directory">Directory: </label>
				   <input class="input-block-level" type="text" name="directory" placeholder="/Users/USERNAME/Sites/example"><br>

				   <label for="servername">Server Name: </label>
				   <input class="input-block-level" type="text" name="servername" placeholder="example.dev"><br>

				   <label for="serveralias">Server Alias: </label>
				   <input class="input-block-level" type="text" name="serveralias" placeholder="www.example.dev"><br>

				   <label for="admin">Server Admin Email: </label>
				   <input class="input-block-level" type="text" name="admin" placeholder="user@email.com"><br>
				   <button type="submit" name="submit" class="btn btn-large btn-block btn-primary">Output Vhost Entry</button>
				</form>
				<br><br>
				<?php if(isset($_POST['submit'])) : ?>
					<div class="well">
						<h4>You can add this little nugget to your hosts file</h4>
						<p>To do that, open up terminal and type:</p>
						<pre class="prettyprint linenums">
			    			<code>
sudo nano /etc/hosts
			    			</code>
			    		</pre>
			    		<p>And then past this snippet in there somewhere: </p>
						<pre class="prettyprint linenums">
			    			<code>
127.0.0.1 <?php echo $_POST['servername']; ?>
			    			</code>
			    		</pre>
					</div>
				<?php endif; ?>
			</div>
			<div class="span8">
				<?php if(isset($_POST['submit'])) : ?>
				<h3>Copy/Paste this into your httpd-vhosts.conf</h3>
			    	<pre class="prettyprint linenums">
			    		<code>
	&lt;VirtualHost *:80&gt;

	    DocumentRoot "<?php echo $_POST['directory']; ?>"
	    
	    ServerName <?php echo $_POST['servername']; ?>
	    
	    ServerAlias <?php echo $_POST['serveralias']; ?>

	    ServerAdmin <?php echo $_POST['admin']; ?>
	    
	    ErrorLog "/private/var/log/apache2/<?php echo $_POST['servername']; ?>-error_log"
	    
	    CustomLog "/private/var/log/apache2/<?php echo $_POST['servername']; ?>-access_log" common
	    
	        &lt;Directory "<?php echo $_POST['directory']; ?>"&gt;

	            Options Indexes FollowSymLinks

	            AllowOverride All

	            Order allow,deny

	            Allow from all

	        &lt;/Directory&gt;

	&lt;/VirtualHost&gt;
			    		</code>
			    	</pre>
			    <?php else : ?>
			    	<div class="holding-cell">
			    		<h2>Output Container</h2>
			    		<p><--- Fill that sucker out and submit, watch the magic. </p>
			    	</div>
			    <?php endif; ?>
			</div>
		</div>
	</div>



    	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="scripts/app.js"></script>
    </body>
</html>