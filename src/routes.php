<?php

use Leaf\Http\Response;
use Leaf\Http\Request;

require __DIR__ . '/../config/database.php';

// User routes
$app->post('/users/register', 'UserController@register');
$app->post('/users/login', 'UserController@login');

// Quiz routes
$app->get('/quizzes', 'QuizController@index');
$app->post('/quizzes/submit', 'QuizController@submit');
