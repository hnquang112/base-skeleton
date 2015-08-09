<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Photo;
use App\Models\PhotoAlbum;
use App\Models\User;
use App\Models\Video;
use App\Models\VideoAlbum;

class DashboardController extends AdminController {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$title = "Dashboard";

		$news = Article::count();
		$newscategory = ArticleCategory::count();
		$users = User::count();
		$photo = Photo::count();
		$photoalbum = PhotoAlbum::count();
		$video = Video::count();
		$videoalbum = VideoAlbum::count();
		return view('admin.dashboard.index', compact('title', 'news', 'newscategory', 'video', 'videoalbum', 'photo',
			'photoalbum', 'users'));
	}
}