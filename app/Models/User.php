<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    use HasFactory;

    public function status_user($id)
    {
        if ($id == 1) {
            return ('Так');
        } else {
            return ('Ні');
        }
    }
}
