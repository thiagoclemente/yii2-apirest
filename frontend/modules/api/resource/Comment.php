<?php

namespace frontend\modules\api\resource;

class Comment extends \common\models\Comment
{
    public function fields()
    {
        return [
            'id',
            'title',
            'body',
            'post_id'
        ];
    }

    public function extraFields()
    {
        return [
            'created_at',
            'updated_at',
            'created_by',
            'post'
        ];
    }

    /**
     * Gets query for [[Post]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\PostQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::class, ['id' => 'post_id']);
    }
}