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
            '_route' => 'generated::wQcj0gQx57UcXF1u',
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
            '_route' => 'generated::w5sy4MX4G1m3dPX8',
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
      ),
      '/random-gift-season' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'random-gift-season',
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
    'generated::wQcj0gQx57UcXF1u' => 
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
        'as' => 'generated::wQcj0gQx57UcXF1u',
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
    'generated::w5sy4MX4G1m3dPX8' => 
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
        'as' => 'generated::w5sy4MX4G1m3dPX8',
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
    'random-gift-season' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'random-gift-season',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'jwtAuth',
        ),
        'uses' => 'App\\CoreContext\\Season\\Infrastructure\\Controllers\\GetRandomGiftController@__invoke',
        'controller' => 'App\\CoreContext\\Season\\Infrastructure\\Controllers\\GetRandomGiftController@__invoke',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'random-gift-season',
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
  ),
)
);
