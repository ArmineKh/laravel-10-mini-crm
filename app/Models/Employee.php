<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;


class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'company_id',
        'email',
        'phone'
    ];

    public function company(): BelongsTo 
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
