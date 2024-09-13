<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request): array
    {
        /* Section 1 and Section shouldn't be mixed */

        $routeName = $request->getPathInfo();
        
        /* Normal User Resource */
        $array = array(
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        );

        

        /**
         * Section 1
         *
         ** This is used in Assign Permissions to the User */


        /**
         * Section 2
         *
         ** This is used in login */
        if ($routeName === '/api/login') {
            $array['token'] = $request->get('token');
        }
        return $array;
    }
}
