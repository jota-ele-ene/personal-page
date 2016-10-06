personal-page
============

This repo just contain some PHP + JS files that runs my personal page at http://joseluisnuñez.es. It just use some nice jquery plugins for visually shown some links to my online profiles and randomly retrieve some high quality image from unsplash.com for the background. 

It also implements a light PHP-based URL shortener using a MySQL server.


Want To Use It
=============

If you like it, feel free to clone the repo and/or upload the files to your webserver. 
Remember:
1.- Change values in custom.php to match your environment
2.- If you want to configure and use the shortener, create a database in your MySQL server (see my own values in the custom.php file). 
3.- Be sure that the .htaccess is considered by your web server (it includes some rewrite rules that are required for the shortener). Include these lines in your Apache configuration file
<Directory "/path/to/your/root/document">
    Options Includes
    AllowOverride All
    Options FollowSymLinks
</Directory>
4.- Decide the method you will use to implement your shortener database (choose between File-backed database and the MySQL engine)
5.- In case you prefer the MySQL engine, create a database and a user to interact with it. Please edit the config file and update values for the database name, user and password
6.- You can now enjoy your page

Performance
=====
In order to measure your system performance and chose between File system or database, run this quick test
1. Choose an URL that will be the used to compere between a direct acccess or access through shortener
2. Select the proper values in the config file to use the Database. Run the shortener for the URL chosen on 1
3. Change the config file to use the File System and run the shortener for the same URL
4. Edit the test.php file at /features and change the URLs used as parameters for the function pingDomain at the end. Use your own URL chosen in 1 and the short versions got in 2 and 3
5. Check the number of iterations (line 18)
6. Use the browser to execute the test.php script. ou'll get a CSV file that can be imported in excel
7. Calculate the average time of getting a responde (columns 2 and 3). It will be the faster configuration the one where you get the lowest average

As a reference, I run it with these results
* Iterations: 1000	
* Average time in seconds of direct response for http://www.google.com: 0,0205349   	 
* Average time in seconds of response using the File system as an ad-hoc data base: 0,0761040
* Average time in seconds of response using the MySQL database: 0,0766574   	 
* Time in seconds longer of the worst option (MySQL database in my case): 0,0005534   


I used
======

PHP, jquery y jquery-ui
[Unsplash.it](http://unsplash.it) as a tool to randomly retrieve images from [Unsplash.com](http://unsplash.com)
[Font Awesome](https://fortawesome.github.io/Font-Awesome/), for scalable vector icons
[Ferromenu](http://www.alessandroferrini.it/lab/jQueryPlugins/ferroMenu/) A simple, responsive and customizable jQuery menu plugin. Powered by HTML5 and CSS3.
[HTML5 Canvas Bubble](http://blog.hostgrenade.com/2012/04/25/html5-canvas-bubble-demo-v2/) A nice JS effect 
