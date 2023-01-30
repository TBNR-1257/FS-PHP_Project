<?php

  // session_id('rhythmandblues');
  // session_set_cookie_params((60*60*24*31),'/','.cloudwaysapps.com');
  session_start();

  // require all the classes & functions files
  require "includes/class-db.php";
  require "includes/class-user.php";
  require "includes/class-post.php";
  require "includes/class-assignment.php";
  require "includes/class-authentication.php";
  require "includes/class-form-validation.php";
  require "includes/class-csrf.php";

  $path = $_SERVER["REQUEST_URI"];

  //  Trim / at the back of the url to avoid switching back to homepage
  $path = trim( $path , "/" );

  // Removes all URL parameters that starts from '?'
  $path = parse_url( $path, PHP_URL_PATH );

  switch( $path ) {
    case 'home';
      require 'pages/home.php';
      break;
    case 'news';
      require 'pages/news.php';
      break;
    case 'guide';
      require 'pages/guide.php';
      break;
    case 'backstory';
      require 'pages/backstory.php';
      break;
    case 'about';
      require 'pages/about.php';
      break;
    case 'login';
      require 'pages/login.php';
      break;
    case 'signup';
      require 'pages/signup.php';
      break;
    case 'logout';
      require 'pages/logout.php';
      break;
    case 'dashboard';
      require 'pages/dashboard.php';
      break;
    case 'manage-assignments';
      require 'pages/manage-assignments.php';
      break;
    case 'manage-assignments-add';
      require 'pages/manage-assignments-add.php';
      break;
    case 'manage-assignments-edit';
      require 'pages/manage-assignments-edit.php';
      break;
    case 'assignment';
      require 'pages/assignment.php';
      break;
    case 'manage-users';
      require 'pages/manage-users.php';
      break;
    case 'manage-users-add';
      require 'pages/manage-users-add.php';
      break;
    case 'manage-users-edit';
      require 'pages/manage-users-edit.php';
      break;
    case 'manage-posts';
      require 'pages/manage-posts.php';
      break;
    case 'manage-posts-add';
      require 'pages/manage-posts-add.php';
      break;
    case 'manage-posts-edit';
      require 'pages/manage-posts-edit.php';
      break;
    case 'post';
      require 'pages/post.php';
      break;
      

    default:
      require 'pages/home.php';
      break;
  }