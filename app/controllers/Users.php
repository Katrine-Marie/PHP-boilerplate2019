<?php
  class Users extends Controller{

    public function __construct(){
      $this->userModel = $this->model('User');
    }

    public function index(){
      redirect('welcome');
    }




    public function login(){
      // Check if logged in
      if($this->isLoggedIn()){
        redirect('posts');
      }

      // Check if POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_err' => '',
          'password_err' => '',
        ];

        // Check for email
        if(empty($data['email'])){
          $data['email_err'] = 'Please enter email.';
        }

        // Check for name
        if(empty($data['name'])){
          $data['name_err'] = 'Please enter name.';
        }

        // Check for user
        if($this->userModel->findUserByEmail($data['email'])){
          // User Found
        } else {
          // No User
          $data['email_err'] = 'This email is not registered.';
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['password_err'])){

          // Check and set logged in user
          $loggedInUser = $this->userModel->login($data['email'], $data['password']);

          if($loggedInUser){
            // User Authenticated!
            $this->createUserSession($loggedInUser);

          } else {
            $data['password_err'] = 'Password incorrect.';
            // Load View
            $this->view('users/login', $data);
          }

        } else {
          // Load View
          $this->view('users/login', $data);
        }

      } else {
        // If NOT a POST

        // Init data
        $data = [
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => '',
        ];

        // Load View
        $this->view('users/login', $data);
      }
    }


    // Create Session With User Info
    public function createUserSession($user){
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_email'] = $user->email;
      $_SESSION['user_name'] = $user->name;
      redirect('pages/index');
    }

    // Logout & Destroy Session
    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      session_destroy();
      redirect('pages/index');
    }

    // Check Logged In
    public function isLoggedIn(){
      if(isset($_SESSION['user_id'])){
        return true;
      } else {
        return false;
      }
    }

  }
