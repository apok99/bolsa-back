<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1xtTZE77Tml9ti41',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::S5A85SS9FIaPGc4A',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'createUser',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/me' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'me',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/buy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'buy',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sell' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sell',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/users/wallets' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users-wallets',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/companies' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'companies',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/season' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'seasonStart',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'getSeason',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/news' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getNews',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'filterGetNews',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/wallet-worth' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-wallet-worth',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/companies-info' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-companies-info',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/users/best-worths' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get-best-worths',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/historial-worths' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-get-historical-worths',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/bank-loan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-bank-loan-request',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/bank-loan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bank-loans',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/daily-pay-bank' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'daily-pay-bank',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/redeem-business' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'redeem-business',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/business' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get-business',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'buy-business',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/companies-generate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'companies-generate',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/hour' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::G2zb4Y8vsX5xkEwM',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
    ),
    3 => 
    array (
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'generated::1xtTZE77Tml9ti41' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'generated::1xtTZE77Tml9ti41',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::S5A85SS9FIaPGc4A' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:295:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000000000062c0000000000000000";}";s:4:"hash";s:44:"exuujPVEJQEaXNkZZn1OeGZXC+qKYU8OaTEuV1SawXk=";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::S5A85SS9FIaPGc4A',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'createUser' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\CreateUserController@__invoke',
        'controller' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\CreateUserController@__invoke',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'createUser',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\AuthUserController@login',
        'controller' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\AuthUserController@login',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'me' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'me',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'jwtAuth',
        ),
        'uses' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\MeUserController@__invoke',
        'controller' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\MeUserController@__invoke',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'me',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'buy' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'buy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'jwtAuth',
        ),
        'uses' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\UserBuyController@__invoke',
        'controller' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\UserBuyController@__invoke',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'buy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sell' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sell',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'jwtAuth',
        ),
        'uses' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\UserSellController@__invoke',
        'controller' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\UserSellController',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'sell',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'users-wallets' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'users/wallets',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'jwtAuth',
        ),
        'uses' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\UserWalletsController@__invoke',
        'controller' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\UserWalletsController@__invoke',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'users-wallets',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'companies' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'companies',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'jwtAuth',
        ),
        'uses' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\UserWalletsController@__invoke',
        'controller' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\UserWalletsController@__invoke',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'companies',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'seasonStart' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'season',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'jwtAuth',
        ),
        'uses' => 'App\\CoreContext\\Season\\Infrastructure\\Controllers\\SeasonStartController@__invoke',
        'controller' => 'App\\CoreContext\\Season\\Infrastructure\\Controllers\\SeasonStartController@__invoke',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'seasonStart',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'getSeason' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'season',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'jwtAuth',
        ),
        'uses' => 'App\\CoreContext\\Season\\Infrastructure\\Controllers\\GetSeasonController@__invoke',
        'controller' => 'App\\CoreContext\\Season\\Infrastructure\\Controllers\\GetSeasonController@__invoke',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'getSeason',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'getNews' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'news',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'jwtAuth',
        ),
        'uses' => 'App\\CoreContext\\Companies\\Infrastructure\\Controllers\\GetNewsController@__invoke',
        'controller' => 'App\\CoreContext\\Companies\\Infrastructure\\Controllers\\GetNewsController@__invoke',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'getNews',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filterGetNews' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'news',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'jwtAuth',
        ),
        'uses' => 'App\\CoreContext\\Companies\\Infrastructure\\Controllers\\FilterNewsController@__invoke',
        'controller' => 'App\\CoreContext\\Companies\\Infrastructure\\Controllers\\FilterNewsController@__invoke',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'filterGetNews',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user-wallet-worth' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user/wallet-worth',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'jwtAuth',
        ),
        'uses' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\UserGetWorthPatrimony@__invoke',
        'controller' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\UserGetWorthPatrimony@__invoke',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'user-wallet-worth',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user-companies-info' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user/companies-info',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'jwtAuth',
        ),
        'uses' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\UserCompaniesInfo@__invoke',
        'controller' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\UserCompaniesInfo@__invoke',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'user-companies-info',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get-best-worths' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'users/best-worths',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'jwtAuth',
        ),
        'uses' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\GetBestWorthDailyController@__invoke',
        'controller' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\GetBestWorthDailyController@__invoke',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'get-best-worths',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user-get-historical-worths' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user/historial-worths',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'jwtAuth',
        ),
        'uses' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\UserGetHistoricalWorthsController@__invoke',
        'controller' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\UserGetHistoricalWorthsController@__invoke',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'user-get-historical-worths',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user-bank-loan-request' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user/bank-loan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'jwtAuth',
        ),
        'uses' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\RequestBankLoadUser@__invoke',
        'controller' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\RequestBankLoadUser@__invoke',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'user-bank-loan-request',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bank-loans' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'bank-loan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'jwtAuth',
        ),
        'uses' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\GetBankLoans@__invoke',
        'controller' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\GetBankLoans@__invoke',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'bank-loans',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'daily-pay-bank' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'daily-pay-bank',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'jwtAuth',
        ),
        'uses' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\BankLoadDaily@__invoke',
        'controller' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\BankLoadDaily@__invoke',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'daily-pay-bank',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'redeem-business' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'redeem-business',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'jwtAuth',
        ),
        'uses' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\RedeemBusiness@__invoke',
        'controller' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\RedeemBusiness@__invoke',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'redeem-business',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get-business' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'business',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'jwtAuth',
        ),
        'uses' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\GetAllBusinessController@__invoke',
        'controller' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\GetAllBusinessController@__invoke',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'get-business',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'buy-business' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'business',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'jwtAuth',
        ),
        'uses' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\BuyBusinessController@__invoke',
        'controller' => 'App\\CoreContext\\Users\\Infrastructure\\Controllers\\BuyBusinessController@__invoke',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'buy-business',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'companies-generate' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'companies-generate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\CoreContext\\Companies\\Infrastructure\\Controllers\\CreateCompaniesController@__invoke',
        'controller' => 'App\\CoreContext\\Companies\\Infrastructure\\Controllers\\CreateCompaniesController@__invoke',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'companies-generate',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::G2zb4Y8vsX5xkEwM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'hour',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:388:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:169:"function(){
    echo (new \\DateTime(\'now\', new \\DateTimeZone(\'Europe/Madrid\')))->format(\'d-M-Y H:i:s\').\'<br/>\';
    echo (new \\DateTime(\'now\'))->format(\'d-M-Y H:i:s\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000006310000000000000000";}";s:4:"hash";s:44:"aokqIxaVNLZBYOkNXg1KUJPJ1+TSfWdD82sAgXxXyDQ=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::G2zb4Y8vsX5xkEwM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
