<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    const DELETE_AT = 'delete_at';
    
    protected $table = 'contact';
    protected $primaryKey = 'id';
    
    public $timestamps = true;
    public $fillable = [
        'name',
        'contact',
        'email'
    ];

    /**
     * Uncomment if database fields encryption is needed.
     * Check migration for contact table for more details.
     * 
     * protected $casts = [
     *     'name'    => 'encrypted',
     *     'contact' => 'encrypted',
     *     'email'   => 'encrypted',
     * ];
     * 
     **/
}
