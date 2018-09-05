<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userproject extends Model
{
    protected $fillable = [
    	'user_id', 'project_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function project() {
        return $this->belongsTo('App\Project');
    }
}
