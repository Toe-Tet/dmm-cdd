<?php 

namespace App\Repositories;

use App\Services\Guzzle\ApiClient;

class BaseRepository {

	public function api()
	{
		return new ApiClient();
	}

}