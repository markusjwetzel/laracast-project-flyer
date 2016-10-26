<?php

namespace App;

use \Image;

class Thumbnail {

    /**
     * Creates a thumbnail for the photo.
     * @param  string $src
     * @param  string $destination
     * @return void
     */
    public function make($src, $destination)
    {
        Image::make( $src)
            ->fit(200)
            ->save( $destination );
    }
}
