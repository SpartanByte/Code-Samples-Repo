<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    // This needs to be inside the Model class, not outside/at the top
    use SoftDeletes;
    // setting the table to notifications (for notifications and profiles)
    protected $table = 'contacts';

    protected $fillable = [
    	'profile_id',
        'name',
        'email',
        'gallery',
        'gallery_id',
        'reminders_on',
        'expirations_on'
    ];

    public function profile(){
    	return $this->hasMany('App\User');
    }

    public function userGalleries(){
        return $this->belongsTo('App\Models\Gallery', 'gallery', 'gallery');
    }

    // to match a single contact to their galleries
    public function myGalleries(){
        return $this->hasOne('App\Models\Gallery', 'gallery', 'gallery');
    }
}
