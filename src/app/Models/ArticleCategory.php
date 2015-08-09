<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleCategory extends Model {

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $table = "article_categories";

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
	 * Get the slider's images.
	 *
	 * @return array
	 */
	public function articles() {
		return $this->hasMany('App\Models\Article');
	}

	/**
	 * Get the category's language.
	 *
	 * @return Language
	 */
	public function language() {
		return $this->belongsTo('App\Models\Language');
	}
}
