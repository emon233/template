<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Uuids;
use OwenIt\Auditing\Contracts\Auditable;

class Access extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory, Uuids, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'model_name', 'method_name'
    ];

    /**
     * The attributes that should be appends
     *
     * @var array
     */
    protected $appends = [
        'model_title'
    ];

    /**
     * Make Model Title Attribute
     *
     * @return void
     */
    public function getModelTitleAttribute()
    {
        return str_replace("App\Models\\", "", $this->model_name);
    }
}
