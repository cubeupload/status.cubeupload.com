<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		
		DB::table('services')->delete();
		DB::table('servers')->delete();
		DB::table('issues')->delete();
		DB::table('issue_service')->delete();
		
		// de-hz1.cubeupload.com
		$dehz1 = new Server();
		$dehz1->hostname = 'de-hz1.cubeupload.com';
		$dehz1->ip = '78.46.95.113';
		$dehz1->metric = 1;
		$dehz1->description = 'Varnish cache server';
		$dehz1->save();

		$http1 = new Service();
		$http1->name = 'httpd';
		$http1->friendly_name = 'HTTP';
		$dehz1->services()->save( $http1 );
	
		$sysadmin = new User();
		$sysadmin->username = 'sysadmin';
		$sysadmin->email = 'tom@cubeupload.com';
		$sysadmin->password = 'cubeupload';
		$sysadmin->enabled = true;
		$sysadmin->save();

	}

}