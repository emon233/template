<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Uuids;
use OwenIt\Auditing\Contracts\Auditable;

class Role extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory, Uuids;

    /**
     * Guarded Attributes
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * HasMany Relation with User class
     *
     * @return void
     */
    public function users()
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }
}
