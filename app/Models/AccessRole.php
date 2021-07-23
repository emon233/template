<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Uuids;
use OwenIt\Auditing\Contracts\Auditable;

class AccessRole extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory, Uuids, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'access_id', 'role_id'
    ];

    /**
     * Get the Access that owns the AccessRole
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function access()
    {
        return $this->belongsTo(Access::class, 'access_id', 'id');
    }

    /**
     * Get the Role that owns the AccessRole
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(User::class, 'role_id', 'id');
    }
}
