<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VideoAlbum extends Model {

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	/**
	 * Returns a formatted post content entry,
	 * this ensures that line breaks are returned.
	 *
	 * @return string
	 */
	public function description() {
		return nl2br($this->description);
	}

	/**
	 * Get the author.
	 *
	 * @return User
	 */
	public function author() {
		return $this->belongsTo('App\Models\User');
	}

	/**
	 * Get the gallery's videos.
	 *
	 * @return array
	 */
	public function videos() {
		return $this->hasMany('App\Models\Video');
	}

	/**
	 * Get the photo album's language.
	 *
	 * @return Language
	 */
	public function language() {
		return $this->belongsTo('App\Models\Language');
	}
}
