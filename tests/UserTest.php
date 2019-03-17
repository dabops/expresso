<?php

class UserTest extends TestCase
{
	/**
	 * A basic functional test example.
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
	 * A basic functional test example.
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
	 * A basic functional test example.
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
