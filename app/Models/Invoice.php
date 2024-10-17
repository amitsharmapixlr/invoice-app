<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'invoice_number',
        'total_amount',
        'due_date',
        'remaining_balance',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
