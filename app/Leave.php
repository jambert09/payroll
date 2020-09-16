<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Leave extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     *
     *
     */
    protected $fillable = [
        'employee_id',
        'leave_type',
        'date_from',
        'date_to',
        'leave_type_offer',
        'days',
        'reason',
        'emailap'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'employee_id');
    }

    public function scopeApproved($query)
    {
        return $query->where('is_approved',true);
    }
}
