<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class Role extends Model
{
    use HasFactory;
    use HasRoles;
    use HasPermissions;
    protected $fillable = ["name",'guard_name'];
}
