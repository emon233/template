<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Uuids;
use OwenIt\Auditing\Contracts\Auditable;

class User extends Authenticatable implements Auditable, MustVerifyEmail, CanResetPassword
{
    use \OwenIt\Auditing\Auditable;
    use HasApiTokens, HasFactory, Notifiable, Uuids, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name',
        'email', 'phone_no',
        'password', 'email_verified_at', 'phone_no_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_no_verified_at' => 'datetime',
    ];

    /**
     * The attributes that should be appends
     *
     * @var array
     */
    protected $appends = [
        'full_name', 'image_path'
    ];


    /**
     * Make Full Name Attribute
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Make Image Path Attribute
     *
     * @return void
     */
    public function getImagePathAttribute()
    {
        return asset('assets/defaults/user-image.png');
    }

    /** Relations */

    /**
     * BelongsTo Relation with Role class
     *
     * @return void
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    /** End Relations */

    /** Query Scopes */

    /**
     * Query Scope with Search Keywords
     *
     * @param [type] $query
     * @param [type] $keywords
     * @return void
     */
    public function scopeSearch($query, $request)
    {
        $keywords = $request->keywords ?? null;
        $order_by = $request->order_by ?? DEFAULT_ORDER_BY;
        $order = $request->order ?? DEFAULT_ORDER;

        if (!is_null($keywords)) {
            $columns = \Schema::getColumnListing($this->getTable());

            $query = $query->where(function ($q) use ($keywords, $columns) {
                foreach ($columns as $column) {
                    $q->orWhere($column, 'LIKE', "%{$keywords}%");
                    $arrayKeywords = explode(" ", $keywords);
                    foreach ($arrayKeywords as $keyword) {
                        $q->orWhere($column, 'LIKE', "%{$keyword}%");
                    }
                }
            });
        }

        $query = $query->orderBy($order_by, $order);
    }

    /** End Query Scopes */
}
