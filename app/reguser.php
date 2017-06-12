<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reguser extends Model
{
     protected $fillable = [
        'username','firstname','lastname', 'email', 'password' ];
        protected $table = 'regusers';

        public function getAuthPassword() {
              return $this->email;
        }
}
