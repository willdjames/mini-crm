<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestResponse;
use App\Http\Controllers\EmployeesController;

class EmployeeTest extends TestCase {
     
	/**
	 *<p>Protege de passar parametro errado sem registro no banco de dados na url,
	 * evitando do resultset do banco ser nulo e retornando status 500</p> 
	 * 
	 */
	public function testEditEmployee_ExistingRecord(){

		$id = 1; // parametro com registro existente no banco

		$user = factory(User::class)->create();
		
		$response = $this->actingAs($user)
			->withSession(['admin@example.com' => 'secret'])
	        ->call('GET', '/employees/u/'. $id. '/edit/')
			->getStatusCode();
			
		$this->assertEquals(200, $response);		
	}


	/**
	 *<p>Protege de passar parametro errado sem registro no banco de dados na url,
	 * evitando do resultset do banco ser nulo e retornando status 500</p> 
	 * 
	 */
	public function testEditEmployee_NotExistingRecord(){

		$id = 999; // parametro que nao existe no banco

		$user = factory(User::class)->create();
		
		$response = $this->actingAs($user)
			->withSession(['admin@example.com' => 'secret'])
	        ->call('GET', '/employees/u/'. $id. '/edit/')
			->getStatusCode();
			
		$this->assertEquals(302, $response);		
	}

	/**
	 *<p>Protege de passar parametro errado sem registro no banco de dados na url,
	 * evitando do resultset do banco ser nulo e retornando status 500</p> 
	 * 
	 */
	public function testEditEmployee_Anything(){

		$id = 'anything'; // parametro qualquer coisa digitada

		$user = factory(User::class)->create();
		
		$response = $this->actingAs($user)
			->withSession(['admin@example.com' => 'secret'])
	        ->call('GET', '/employees/u/'. $id. '/edit/')
			->getStatusCode();
			
		$this->assertEquals(302, $response);		
	}



}
