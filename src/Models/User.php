<?php

namespace Vixplanc\BasePadrao\Models;

use App\Models\User as ModelsUser;

class User extends ModelsUser
{
    public function toArray(){
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'active' => $this->hasPermissionTo('active-user'),
            'roles' => $this->getRoleNames(),
        ];
    }
}
