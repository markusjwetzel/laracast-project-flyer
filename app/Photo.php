<?php

namespace App;

use \File;
use Illuminate\Database\Eloquent\Model;;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
    /**
     * The associated table.
     * @var string
     */
	protected $table = 'flyer_photos';

    /**
     * Fillable fields for a photo.
     * @var array
     */
	protected $fillable = ['path', 'thumbnail_path', 'name'];

    /**
     * A photo belongs to a flyer.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function flyer()
    {
    	return $this->belongsTo('App\Flyer');
    }

    /**
     * The default upload directory for photos.
     * @return string
     */
    public function baseDir()
    {
        return 'images/photos';
    }

    /**
     * Sets default attributes for file name and path.
     * @param string $name
     */
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->path = $this->baseDir() . '/' . $name;
        $this->thumbnail_path = $this->baseDir() . '/tn-' . $name;
    }

    /**
     * Deletes the photos from the server and the database.
     * @return void
     */
    public function delete()
    {
        File::delete([
            $this->path,
            $this->thumbnail_path
        ]);

        parent::delete();
    }
}
