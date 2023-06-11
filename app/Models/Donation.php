<?php

namespace App\Models;

use App\Models\Donor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function donor()
    {
        return $this->hasMany(Donor::class);
    }

    public function updateStatus()
    {
        if ($this->end_date <= now()->toDateString()) {
            $this->status = 'finish';
            $this->save();
        }
    }
}
