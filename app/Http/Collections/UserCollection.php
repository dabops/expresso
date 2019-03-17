<?php

namespace App\Http\Collections;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
		return [
			'data' => $this->collection->transform(function ($item) {
				return new UserResource($item);
			})
		];
    }
}
