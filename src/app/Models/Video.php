<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model {

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	/**
	 * Deletes a video
	 *
	 * @return bool
	 */
	public function delete() {
		// Delete the post
		return parent::delete();
	}

	/**
	 * Returns a formatted post content entry,
	 * this ensures that line breaks are returned.
	 *
	 * @return string
	 */
	public function content() {
		return nl2br($this->content);
	}

	/**
	 * Get the author.
	 *
	 * @return User
	 */
	public function author() {
		return $this->belongsTo('App\Models\User', 'user_id');
	}

	/**
	 * Get the video.
	 *
	 * @return Video
	 */
	public function album() {
		return $this->belongsTo('App\Models\VideoAlbum', 'video_album_id');
	}

	/**
	 * Get the video's language.
	 *
	 * @return Language
	 */
	public function language() {
		return $this->belongsTo('App\Models\Language');
	}
}
