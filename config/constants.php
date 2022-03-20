<?php

return [
  'operations' => [
      'like' => 1,
      'comment' => 2,
      'share' => 3,
      'view_story' => 4,
      'view_video' => 5
  ],

    'status_code' => [
        'INTERNAL_ERROR' => 500,
        'NOT_FOUND' => 404,
        'UNAUTHENTICATED' => 401,
        'UNAUTHORIZED' => 403,
        'UNPROCESSABLE_ENTITY' => 422,
    ]
];
