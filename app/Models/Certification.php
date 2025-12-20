<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_member_id',
        'title',
        'description',
        'certificate_image',
        'issued_by',
        'issued_date',
        'expiry_date',
        'type',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'issued_date' => 'date',
        'expiry_date' => 'date',
    ];

    // Relationship: Certification belongs to team member
    public function teamMember()
    {
        return $this->belongsTo(TeamMember::class);
    }

    // Scope untuk hanya certifications yang aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk ordering
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    // Scope untuk filter by type
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }
}
