<?php
/**
 * Create your routes in here. The name is the lowercase name of the controller
 * without the controller part, the stuff after the hash is the method.
 * e.g. page#index -> OCA\Nodue\Controller\PageController->index()
 *
 * The controller class has to be registered in the application.php file since
 * it's instantiated in there
 */
return [
    'routes' => [
       ['name' => 'main#index', 'url' => '/', 'verb' => 'GET'],

       ['name' => 'note#index', 'url' => '/notes', 'verb' => 'GET'],
       ['name' => 'note#show', 'url' => '/notes/{noteId}', 'verb' => 'GET'],
       ['name' => 'note#store', 'url' => '/notes', 'verb' => 'POST'],
       ['name' => 'note#update', 'url' => '/notes/{noteId}', 'verb' => 'POST'],
       ['name' => 'note#destroy', 'url' => '/notes/{noteId}', 'verb' => 'POST'],

       //['name' => 'page#do_echo', 'url' => '/echo', 'verb' => 'POST'],
    ]
];
