<?php return array (
  'arcanedev/log-viewer' => 
  array (
    'providers' => 
    array (
      0 => 'Arcanedev\\LogViewer\\LogViewerServiceProvider',
    ),
  ),
  'barryvdh/laravel-cors' => 
  array (
    'providers' => 
    array (
      0 => 'Barryvdh\\Cors\\ServiceProvider',
    ),
  ),
  'barryvdh/laravel-ide-helper' => 
  array (
    'providers' => 
    array (
      0 => 'Barryvdh\\LaravelIdeHelper\\IdeHelperServiceProvider',
    ),
  ),
  'beyondcode/laravel-dump-server' => 
  array (
    'providers' => 
    array (
      0 => 'BeyondCode\\DumpServer\\DumpServerServiceProvider',
    ),
  ),
  'brozot/laravel-fcm' => 
  array (
    'providers' => 
    array (
      0 => 'LaravelFCM\\FCMServiceProvider',
    ),
    'aliases' => 
    array (
      'FCM' => 'LaravelFCM\\Facades\\FCM',
      'FCMGroup' => 'LaravelFCM\\Facades\\FCMGroup',
    ),
  ),
  'fideloper/proxy' => 
  array (
    'providers' => 
    array (
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ),
  ),
  'flugger/laravel-responder' => 
  array (
    'providers' => 
    array (
      0 => 'Flugg\\Responder\\ResponderServiceProvider',
    ),
    'aliases' => 
    array (
      'Responder' => 'Flugg\\Responder\\Facades\\Responder',
      'Transformer' => 'Flugg\\Responder\\Facades\\Transformer',
    ),
  ),
  'garygreen/pretty-routes' => 
  array (
    'providers' => 
    array (
      0 => 'PrettyRoutes\\ServiceProvider',
    ),
  ),
  'laravel-doctrine/orm' => 
  array (
    'providers' => 
    array (
      0 => 'LaravelDoctrine\\ORM\\DoctrineServiceProvider',
    ),
    'aliases' => 
    array (
      'Registry' => 'LaravelDoctrine\\ORM\\Facades\\Registry',
      'Doctrine' => 'LaravelDoctrine\\ORM\\Facades\\Doctrine',
      'EntityManager' => 'LaravelDoctrine\\ORM\\Facades\\EntityManager',
    ),
  ),
  'laravel/telescope' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Telescope\\TelescopeServiceProvider',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'laravelcollective/html' => 
  array (
    'providers' => 
    array (
      0 => 'Collective\\Html\\HtmlServiceProvider',
    ),
    'aliases' => 
    array (
      'Form' => 'Collective\\Html\\FormFacade',
      'Html' => 'Collective\\Html\\HtmlFacade',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'nunomaduro/collision' => 
  array (
    'providers' => 
    array (
      0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    ),
  ),
  'rap2hpoutre/laravel-log-viewer' => 
  array (
    'providers' => 
    array (
      0 => 'Rap2hpoutre\\LaravelLogViewer\\LaravelLogViewerServiceProvider',
    ),
  ),
  'tymon/jwt-auth' => 
  array (
    'aliases' => 
    array (
      'JWTAuth' => 'Tymon\\JWTAuth\\Facades\\JWTAuth',
      'JWTFactory' => 'Tymon\\JWTAuth\\Facades\\JWTFactory',
    ),
    'providers' => 
    array (
      0 => 'Tymon\\JWTAuth\\Providers\\LaravelServiceProvider',
    ),
  ),
);