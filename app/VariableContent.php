<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VariableContent extends Model
{
    protected $table = 'variable_content';
    protected $fillable = ['order', 'content_id', 'type', 'image', 'content_1', 'content_2'];
}
