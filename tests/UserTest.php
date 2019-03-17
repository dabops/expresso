<?php

class UserTest extends TestCase
{
	/**
	 * Test that a user can be created and stored into the database
	 *
	 * @return void
	 */
	public function testCreate()
	{
		$name = 'CoffeeMachine';
		$this->json('POST', '/users', ['name' => $name])
			->seeJson([
				'name' => $name,
			]);
	}

	/**
	 * Test that if the name of the user is to short, an error message occured
	 *
	 * @return void
	 */
	public function testFailCreate()
	{
		$name = 'C';
		$this->json('POST', '/users', ['name' => $name])
			->seeJson([
				'name' => ['The name must be at least 2 characters.'],
			]);
	}

	/**
	 * Get the users page and see if the user previously stored appear
	 *
	 * @return void
	 */
	public function testRetrieve()
	{
		$name = 'CoffeeMachine';
		$this->json('GET', '/users')
			->seeJson([
				'name' => $name
			]);
	}
}
