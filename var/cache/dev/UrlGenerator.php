<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception::showAction'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception::cssAction'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    'home' => [[], ['_controller' => 'App\\Controller\\MainController::index'], [], [['text', '/']], [], []],
    'post.index' => [[], ['_controller' => 'App\\Controller\\PostController::index'], [], [['text', '/post/']], [], []],
    'post.category' => [['cat'], ['_controller' => 'App\\Controller\\PostController::findByCat'], [], [['variable', '/', '[^/]++', 'cat', true], ['text', '/post/category']], [], []],
    'post.create' => [[], ['_controller' => 'App\\Controller\\PostController::create'], [], [['text', '/post/create']], [], []],
    'post.show' => [['id'], ['_controller' => 'App\\Controller\\PostController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/post/show']], [], []],
    'post.delete' => [['id'], ['_controller' => 'App\\Controller\\PostController::remove'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/post/delete']], [], []],
    'custom' => [['id'], ['_controller' => 'App\\Controller\\ProfileController::custom'], ['id' => '\\d+'], [['variable', '/', '\\d+', 'id', true], ['text', '/custom']], [], []],
    'profile' => [[], ['_controller' => 'App\\Controller\\ProfileController::profile'], [], [['text', '/profile']], [], []],
    'ban' => [['id'], ['_controller' => 'App\\Controller\\ProfileController::ban'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/ban']], [], []],
    'unban' => [['id'], ['_controller' => 'App\\Controller\\ProfileController::unban'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/unban']], [], []],
    'register' => [[], ['_controller' => 'App\\Controller\\RegistrationController::register'], [], [['text', '/register']], [], []],
    'app_login' => [[], ['_controller' => 'App\\Controller\\SecurityController::login'], [], [['text', '/login']], [], []],
    'app_logout' => [[], ['_controller' => 'App\\Controller\\SecurityController::logout'], [], [['text', '/logout']], [], []],
    'category_route' => [['cat'], ['_controller' => 'App\\Controller\\PostController::findByCat'], [], [['variable', '/', '[^/]++', 'cat', true], ['text', '/category']], [], []],
    'profile_route' => [[], ['_controller' => 'App\\Controller\\ProfileController::profile'], [], [['text', '/profile']], [], []],
    'user_route' => [['id'], ['_controller' => 'App\\Controller\\ProfileController::custom'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/custom']], [], []],
    'question_create_route' => [[], ['_controller' => 'App\\Controller\\PostController::create'], [], [['text', '/create']], [], []],
];
