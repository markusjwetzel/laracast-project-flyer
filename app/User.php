<?php

namespace App;

use App\Flyer;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Checks to see if a user owns the referenced object.
     * @param  object $relation
     * @return boolean
     */
    public function owns($relation)
    {
        return $relation->user_id == $this->id;
    }

    /**
     * A User has many Flyers
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function flyers()
    {
        return $this->hasMany(Flyer::class);
    }

    /**
     * Creates a new Flyer
     * @param  App\Flyer  $flyer
     * @return void
     */
    public function publish(Flyer $flyer)
    {
        return $this->flyers()->save($flyer);
    }
}
