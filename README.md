Twig Frontend Skeleton
======================

This is a skeleton repository which helps to quickly start a new static frontend with [Twig](http://twig.sensiolabs.org/) template engine.

Suggested Usage
---------------

Fork this repository or download it through GitHub. Then, use [Composer](https://getcomposer.org/) to install required dependencies:

	$ composer install
	
And finally, start PHP builtin webserver:

	$ php -S 0.0.0.0:4000 index.php
	
Now opening `http://0.0.0.0:4000/` you should see the home page and you can start editing Twig templates (in `templates` directory), CSS, Javascripts and other files you would edit normally during frontend development.

Internals
---------

Starting the PHP builtin webserver as shown above, every request will be routed to the `index.php` file which acts as a front controller and router.

The router tries to detect requests to assets files and serves them normally:

	$request = ltrim($_SERVER["REQUEST_URI"], '/');
	if (preg_match('/\.(?:png|jpg|jpeg|gif|ico|css|js|ttf|otf|woff)$/', $request)) {
    	return false;
	}
	
Otherwise the router tries to render a Twig template file based on the current request. For example, if the current request URI is `/my-page.html`, the router tries to render the `templates/my-page.html.twig` template. If the template doesn't exists the request is served normally.

During the template rendering the `$siteSettings` array is passed to the template so you can add all parameters you need.