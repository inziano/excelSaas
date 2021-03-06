<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'is_processed',
        'processed_date',
        'user_id'
    ];

    protected $dates = [
        'processed_date'
    ];

    /**
     * Get the user that owns the Upload
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {

        return $this->belongsTo(User::class);
    }
}
