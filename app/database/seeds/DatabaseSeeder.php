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
		
		$cache1 = new Service();
		$cache1->name = 'Varnish Cache #1';
		$cache1->type = 'image_cache';
		$cache1->save();

		$cache2 = new Service();
		$cache2->name = 'Varnish Cache #2';
		$cache2->type = 'image_cache';
		$cache2->save();
		
		$web = new Service();
		$web->name = 'Web Server';
		$web->type = 'web_server';
		$web->save();
		
		$db = new Service();
		$db->name = 'Database Server';
		$db->type = 'mysql';
		$db->save();
		
		
		$de_hz1 = new Server();
		$de_hz1->ip = '78.46.95.113';
		$de_hz1->name = 'Image Server #1';
		$de_hz1->hostname = 'de-hz1.cubeupload.com';
		$de_hz1->metric = 2;
		$de_hz1->save();
		
		$gb_rs1 = new Server();
		$gb_rs1->ip = '78.129.143.101';
		$gb_rs1->name = 'Image Server #2';
		$gb_rs1->hostname = 'gb-rs1.cubeupload.com';
		$gb_rs1->metric = 3;
		$gb_rs1->save();
		
		$gb_gd1 = new Server();
		$gb_gd1->ip = '109.70.149.133';
		$gb_gd1->name = 'Web Server';
		$gb_gd1->hostname = 'gb-gd1.cubeupload.com';
		$gb_gd1->metric = 1;
		$gb_gd1->save();
		
		$de_hz1->services()->save( $cache1 );
		$gb_rs1->services()->save( $cache2 );
		$gb_gd1->services()->save( $web );
		$gb_gd1->services()->save( $db );
		
		
		
	}

}