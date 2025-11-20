<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // setting table to  'posts'
    protected $table = 'posts';
    protected $fillable = [
    	'title',
    	'descriptions',
    	'body',
    ];

    // Creating relationships
    public function posts()
    {
    	return $this->hasMany('App\Models\Post', 'title');
    }

    public function comments()
    {
    	return $this->belongsTo('App\Models\Post', 'id');
    }
}
