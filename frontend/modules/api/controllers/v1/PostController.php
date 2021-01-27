<?php

namespace frontend\modules\api\controllers\v1;

use frontend\modules\api\resource\Post;

class PostController extends ActiveController
{
    public $modelClass = Post::class;
}