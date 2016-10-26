<?php

namespace App;

use App\Photo;
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

	/**
	 * Formats the price attribute to a dollar / number format.
	 * @param  integer $price
	 * @return string
	 */
	public function getPriceAttribute($price)
	{
		return '$' . number_format($price);
	}

	/**
	 * A Flyer has many photos.
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
    public function photos()
    {
    	return $this->hasMany('App\Photo');
    }
    
    /**
     * A Flyer belongs to a user.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
    	return $this->belgonsTo('App\User', 'user_id');
    }

    /**
     * Validates the given User owns this Flyer.
     * @param  App\User   $user
     * @return boolean
     */
    public function ownedBy(User $user)
    {
    	return $this->user_id == $user->id;
    }

    /**
     * Uploads a new photo and persists to the database
     * @param App\Photo $photo
     * @return void
     */
    public function addPhoto(Photo $photo )
    {
    	return $this->photos()->save( $photo );
    }
}
