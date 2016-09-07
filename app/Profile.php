<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Eloquent\Dialect\Json;

class Profile extends Model {
    use Json;

    const PRV_FACEBOOK = 0;

    protected $fillable = ['user_id', 'uid', 'provider', 'access_token', 'access_token_secret'];
    protected $jsonColumns = ['meta'];

    //User {
    //    token: "EAAChXuUYrvMBANiBg3BUpDZBl53WrATdRVGkcPeik8cc1iCZB7jXbDrv8n86JH986oTghnggBan2l7jZAjvXBK2vZA6gOt7FDlEc8QpoLKyE1ZCbeV8hKAAdj8jgZBFM0M5UevNbuQwGiyvK64x7439r0YZB8L7ur6mkNFDWKfPegZDZD"
    //    refreshToken: null
    //    expiresIn: "5142480"
    //    id: "904554269598480"
    //    nickname: null
    //    name: "Nhat Quang Ho"
    //    email: "hnquang112@yahoo.com.vn"
    //    avatar: "https://graph.facebook.com/v2.6/904554269598480/picture?type=normal"
    //    user: [
    //        "name" => "Nhat Quang Ho"
    //        "email" => "hnquang112@yahoo.com.vn"
    //        "gender" => "male"
    //        "verified" => true
    //        "id" => "904554269598480"
    //    ]
    //    "avatar_original": "https://graph.facebook.com/v2.6/904554269598480/picture?width=1920"
    //}
    public function __construct() {
        parent::__construct();
        $this->hintJsonStructure('meta', '{
			"refresh_token":null,
			"expires_in":null,
			"nickname":null,
			"name":null,
			"email":null,
			"avatar":null,
			"avatar_original":null
		}');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

}
