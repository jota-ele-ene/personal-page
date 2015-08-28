personal-page
============

This repo just contain some PHP + JS files that runs my personal page at http://joseluisnuñez.es. It just use some nice jquery plugins for visually shown some links to my online profiles and randomly retrieve some high quality image from unsplash.com for the background. 

It also implements a light PHP-based URL shortener using a MySQL server.


Want To Use It
=============

If you like it, feel free to clone the repo and/or upload the files to your webserver. Change values in var.php to match your environment, create a database in your MySQL server (see my own values in the var.php file). Be sure that the .htaccess is considered by your web server (include some rewrite rules that are required for the shortener)


To-Do
=====
1. Use local images.
2. Add configuration pages.
3. Use a file-based database to eliminate the MySQL dependence


I used
======

PHP, jquery y jquery-ui
[Unsplash.it](http://unsplash.it) as a tool to randomly retrieve images from [Unsplash.com](http://unsplash.com)
[Font Awesome](https://fortawesome.github.io/Font-Awesome/), for scalable vector icons
[Ferromenu](http://www.alessandroferrini.it/lab/jQueryPlugins/ferroMenu/) A simple, responsive and customizable jQuery menu plugin. Powered by HTML5 and CSS3.
[HTML5 Canvas Bubble](http://blog.hostgrenade.com/2012/04/25/html5-canvas-bubble-demo-v2/) A nice JS effect 
