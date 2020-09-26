<?php

return array (
  'autoload' => false,
  'hooks' => 
  array (
    'app_init' => 
    array (
      0 => 'epay',
    ),
    'leesignhook' => 
    array (
      0 => 'leesign',
    ),
    'admin_login_init' => 
    array (
      0 => 'loginbg',
    ),
  ),
  'route' => 
  array (
    '/leesign$' => 'leesign/index/index',
  ),
);