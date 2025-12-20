<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'photo',
        'is_certified',
        'bio',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_certified' => 'boolean',
        'is_active' => 'boolean',
    ];

    // Relationship: Team member has many certifications
    public function certifications()
    {
        return $this->hasMany(Certification::class);
    }

    // Scope untuk hanya team yang aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk ordering
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    // Scope untuk certified members
    public function scopeCertified($query)
    {
        return $query->where('is_certified', true);
    }
}
