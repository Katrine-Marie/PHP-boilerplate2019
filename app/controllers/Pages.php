<?php

/*
  Pages is the default to show if nothing else is shown in the URL.

  The comments below show how you could use data from a model in the controller -
  the model is not provided by default, but can be created under /models and hooked up to the controller in the constructor.
*/

class Pages extends Controller {

	public function __construct(){
		//$this->postModel = $this->model('Post');
	}

	public function index(){

		//$posts = $this->postModel->getPosts();

// 		$data = [
// 			'title' => 'Welcome',
// 			'posts' => $posts
// 		];

		$data = [
			'title' => 'Welcome'
		];

		$this->view('pages/index', $data);
	}

	public function about(){
		$this->view('pages/about');
	}

}
