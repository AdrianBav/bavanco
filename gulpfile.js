var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

	// Compile SASS and combile all stylesheets into a single file (all.css)
    mix
    	.sass(['app.scss', 'deeds.scss'], 'resources/assets/css/app.css')
		.styles([
            'normalize.css',
            'app.css',            
        ]);

 	// Copy the application javascript to the public folder
    mix.copy('resources/assets/js/app.js', 'public/js/app.js');        

	// Add versioning to the stylesheet and scripts
    mix.version(['css/all.css', 'js/app.js']);

});
