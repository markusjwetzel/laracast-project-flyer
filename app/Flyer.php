<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
	/**
	 * Fillable fields for a flyer.
	 * @var array
	 */
	protected $fillable = [
		'street',
		'city',
		'state',
		'country',
		'zip',
		'price',
		'description'
	];

	/**
	 * Find the flyer at the given address.
	 * @param  Builder $query
	 * @param  string $zip
	 * @param  string $street
	 * @return Builder
	 */
	public static function locatedAt($zip, $street)
	{
		$street = str_replace( '-', ' ', $street );
		return static::where( compact( 'zip', 'street' ) )->firstOrFail();
	}

	public function getPriceAttribute($price)
	{
		return '$' . number_format($price);
	}

    public function photos()
    {
    	return $this->hasMany('App\Photo');
    }
    
    public function owner()
    {
    	return $this->belgonsTo('App\User', 'user_id');
    }

    public function ownedBy(User $user)
    {
    	return $this->user_id == $user->id;
    }

    public function addPhoto( Photo $photo )
    {
    	return $this->photos()->save( $photo );
    }
}
