<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'job_title',
        'salary',
        'department',
        'joined_date'
    ];

    /**
     * The sales that belong to the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sales(): BelongsToMany
    {
        return $this->belongsToMany(Sales::class, 'employee_id');
    }
}
