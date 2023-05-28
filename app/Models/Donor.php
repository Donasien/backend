<?php

namespace App\Models;

use App\Models\Donation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donor extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function donation(){
        return $this->belongsTo(Donation::class);
    }
}
