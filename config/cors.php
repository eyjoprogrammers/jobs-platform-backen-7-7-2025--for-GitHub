<?php
return [
    'paths' => ['api/*'],
    'allowed_origins' => ['*'],             // لاحقاً يمكن تحديد النطاق الدقيق
    'allowed_methods' => ['*'],
    'allowed_headers' => ['*'],
    'max_age' => 0,
    'supports_credentials' => false,
  ];