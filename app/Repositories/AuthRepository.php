<?php 

namespace App\Repositories;

class AuthRepository extends BaseRepository {

	public function login(array $attribute)
	{
		return $this->api()->post('/api/login', $attribute);
	}

	public function logout()
	{
		return $this->api()->post('/api/logout');
	}
}