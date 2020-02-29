<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    // Add [content] to fillable property to allow mass assignment on [App\Models\Status].
    protected $fillable = ['content'];


    // 将 Eloquent 关联定义为函数，如下，我们可在微博模型中，指明一条微博属于一个用户。
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
