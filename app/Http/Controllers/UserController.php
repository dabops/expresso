<?php

namespace App\Http\Controllers;

use App\Http\Collections\UserCollection;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;


class UserController extends Controller
{
	/**
	 * Display a collection of user.
	 *
	 * @return UserCollection
	 */
    public function index()
    {
		return new UserCollection(User::paginate());
    }

	/**
	 * Store a new user and return a user resource.
	 *
	 * @param Request $request
	 * @return UserCollection
	 * @throws ValidationException
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'bail|required|min:2|max:255',
		]);

		$user = User::create($request->all());
		return response(
			new UserResource($user),
			201
		);
	}

	/**
	 * Update a user and return a user resource.
	 *
	 * @param Request $request
	 * @param int $id
	 * @return UserResource
	 * @throws ValidationException
	 */
	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'wins' => 'bail|required|integer',
		]);

		$user = User::findOrFail($id);

		$user->update($request->all());

		return response(
			new UserResource($user),
			200
		);
	}
}
