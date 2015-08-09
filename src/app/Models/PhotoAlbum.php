<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhotoAlbum extends Model {

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	/**
	 * Deletes a gallery all
	 * the associated images.
	 *
	 * @return bool
	 */
	public function delete() {
		// Delete the gallery images
		$this->photos()->delete();

		// Delete the gallery
		return parent::delete();
	}

	/**
	 * Get the post's author.
	 *
	 * @return User
	 */
	public function author() {
		return $this->belongsTo('App\Models\User', 'user_id');
	}
	/**
	 * Get the post's comments.
	 *
	 * @return array
	 */
	public function photos() {
		return $this->hasMany('App\Models\Photo');
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