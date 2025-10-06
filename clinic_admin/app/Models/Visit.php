<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    /** @use HasFactory<\Database\Factories\VisitFactory> */
    use HasFactory;

    protected $fillable = ['patient_id', 'visit_date', 'reason', 'notes'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
