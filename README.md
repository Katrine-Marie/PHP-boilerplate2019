# PHP-boilerplate2019
A PHP MVC framework - intended for use in my personal projects.

Includes, beside the framework logic itself,
* a complete login system, and
* a Gulp setup for SASS compilation, as well as concatenation and minification of JS files.

## How to Use

### MVC framework

The `/public` directory contains the assets used for the project, such as CSS and JS files, and images. The CSS and JS in this directory can be generated by the Gulp workflow, if you wish to use that.

The `/app` directory is where all the MVC logic goes.

### Data setup
You edit the `/app/config/config.php` file, to use your own database authentication, site name and URL root.

### Controllers and Views
Controller files are created in the `/app/controllers`directory - remember that they are supposed to `extend` the base `Controller`class, like so:

```
class Pages extends Controller { }
```

Each controller class must contain a public function named `index`. The content of this method is the index view for the URL matching your `domain/controller` pattern.

If you need to match more URL's, like f.i. `domain/controller/id`, simply create another method, with the name of the URL param to match.

Views for each controller method can be created in the `/app/views` folder - preferrably by creating a folder with the same name as the controller, and then creating a file for each url param that needs a separate view.

When you have created the view templates, you can use them in the controller methods by calling `$this->view('controller-name/method-name');`

### Models

In order to use data from the database, you need to create a model, which you can do under `/app/models`.

A model file is a class that must contain a constructor instantiating the Database class, like so:

```
class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }
}
```

After this, you create as many functions as you need, to create, read, update or delete data. An example could be:

```
public function findUserByEmail($email){
  $this->db->query("SELECT * FROM users WHERE email = :email");
  $this->db->bind(':email', $email);

  $row = $this->db->single();

  if($this->db->rowCount() > 0){
    return true;
  } else {
    return false;
  }
}
```

To create a link between a model and a controller, add the model to the controller's constructor, like f.i.:

```
public function __construct(){
  $this->postModel = $this->model('Post');
}
```

After that, if you wish to use the data in a certain view, you can do it within the public function creating the view, as such:

```
$data = $this->postModel->getPosts();
```

And when you call the view function, you can pass the data along as `$this->view('pages/index', $data);`

## Login system

In order to use the login system as it is included by default, you will need a db table with the name `users`, and the fields `name`, `password` and `email`. If you wish to alter this and use different names and/or more fields, edit the `User` model in `/app/models/User.php`.

## Gulp setup

The `/source` directory is where you will find some base styling in `.scss` files, to get started with. It is also where you can place your JS files, if you wish to have ES6+ code compiled by Babel, and/or minified and bundled.

You use the `gulp watch` command, in order to automatically run the above mentioned tasks upon file changes in `*.scss` or `*.js` files the `/source` directory.

You use the `gulp imagemin` command in order to minify image files placed in the `/public/images` directory.

NOTE: This setup still uses Gulp 3.9.1 - update to version 4 pending.

## Miscellaneous

You may want to edit the manifest-file found in `/public/manifest.json` if you want your site to be a PWA.

It contains default colors, names and icon sources that should be changed to reflect your own (icons should/could be located in `/public/images/icons`).
