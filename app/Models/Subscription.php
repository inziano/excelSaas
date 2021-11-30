<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'package_id',
        'user_id',
        'billable_amount'
    ];

    protected $dates = [
        'start_date',
        'end_date'
    ];

    protected $casts = [
        'user_id' => 'integer',
        'package_id' => 'integer'
    ];

    /**
    * Get the user that owns the Subscription
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function user(){
       return $this->belongsTo(User::class);
    }
}
