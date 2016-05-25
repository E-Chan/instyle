<?php

namespace Instyle;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['body'];

    protected $appends = ['relativeCreatedAt'];

    public function user()
    {
        return $this->belongsTo('Instyle\User');
    }
    public function getRelativeCreatedAtAttribute()
    {
        return $this->created_at->diffForHumans();
    }

 }
