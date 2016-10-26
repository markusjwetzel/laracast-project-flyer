<?php

use App\Flyer;

/**
 * Display a flash message
 * @param  string $title
 * @param  string $message
 * @return void
 */
function flash($title = null, $message = null)
{
	$flash = app('App\Http\Flash');

	if( func_num_args() == 0 ) {
		return $flash;
	}

	return $flash->info($title,$message);
}

/**
 * The path to a given flyer.
 * @param  App\Flyer  $flyer
 * @return string
 */
function flyer_path(Flyer $flyer)
{
	return $flyer->zip . '/' . str_replace( " ", "-", $flyer->street );
}

/**
 * Helper for setting up simple forms.
 * @param  string $body
 * @param  string|object $path
 * @param  string $type
 * @return string
 */
function link_to($body, $path, $type)
{
	$csrf = csrf_field();

	if( is_object($path) ) {

		$action = $path->getTable();

		if( in_array( $type, ['PUT', 'PATCH', 'DELETE'] ) ) {
			$action .= '/' . $path->getKey();
		}
	} else {
		$action = $path;
	}

	return <<<EOT
		<form method="POST" action="{$action}">
			<input type='hidden' name='_method' value='{$type}'>
			$csrf
			<button type="submit">{$body}</button>
		</form>
EOT;
}
