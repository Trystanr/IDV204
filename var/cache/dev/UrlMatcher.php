<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'home', '_controller' => 'App\\Controller\\MainController::index'], null, null, null, false, false, null]],
        '/post' => [[['_route' => 'post.index', '_controller' => 'App\\Controller\\PostController::index'], null, null, null, true, false, null]],
        '/post/create' => [[['_route' => 'post.create', '_controller' => 'App\\Controller\\PostController::create'], null, null, null, false, false, null]],
        '/profile' => [
            [['_route' => 'profile', '_controller' => 'App\\Controller\\ProfileController::profile'], null, null, null, false, false, null],
            [['_route' => 'profile_route', '_controller' => 'App\\Controller\\ProfileController::profile'], null, null, null, false, false, null],
        ],
        '/register' => [[['_route' => 'register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/create' => [[['_route' => 'question_create_route', '_controller' => 'App\\Controller\\PostController::create'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|wdt/([^/]++)(*:24)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:69)'
                            .'|router(*:82)'
                            .'|exception(?'
                                .'|(*:101)'
                                .'|\\.css(*:114)'
                            .')'
                        .')'
                        .'|(*:124)'
                    .')'
                .')'
                .'|/post/(?'
                    .'|category/([^/]++)(*:160)'
                    .'|show/([^/]++)(*:181)'
                    .'|delete/([^/]++)(*:204)'
                .')'
                .'|/c(?'
                    .'|ustom/(?'
                        .'|(\\d+)(*:232)'
                        .'|([^/]++)(*:248)'
                    .')'
                    .'|ategory/([^/]++)(*:273)'
                .')'
                .'|/ban/([^/]++)(*:295)'
                .'|/unban/([^/]++)(*:318)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        24 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        69 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        82 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        101 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'], ['token'], null, null, false, false, null]],
        114 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'], ['token'], null, null, false, false, null]],
        124 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        160 => [[['_route' => 'post.category', '_controller' => 'App\\Controller\\PostController::findByCat'], ['cat'], null, null, false, true, null]],
        181 => [[['_route' => 'post.show', '_controller' => 'App\\Controller\\PostController::show'], ['id'], null, null, false, true, null]],
        204 => [[['_route' => 'post.delete', '_controller' => 'App\\Controller\\PostController::remove'], ['id'], null, null, false, true, null]],
        232 => [[['_route' => 'custom', '_controller' => 'App\\Controller\\ProfileController::custom'], ['id'], null, null, false, true, null]],
        248 => [[['_route' => 'user_route', '_controller' => 'App\\Controller\\ProfileController::custom'], ['id'], null, null, false, true, null]],
        273 => [[['_route' => 'category_route', '_controller' => 'App\\Controller\\PostController::findByCat'], ['cat'], null, null, false, true, null]],
        295 => [[['_route' => 'ban', '_controller' => 'App\\Controller\\ProfileController::ban'], ['id'], null, null, false, true, null]],
        318 => [
            [['_route' => 'unban', '_controller' => 'App\\Controller\\ProfileController::unban'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
