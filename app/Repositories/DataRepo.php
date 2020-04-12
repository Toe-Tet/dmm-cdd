<?php 

namespace App\Repositories;

class DataRepo {

	public static function auth()
	{
		return app(AuthRepository::class);
	}

	public static function customer()
	{
		return app(CustomerRepository::class);
	}
}