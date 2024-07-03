<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'posted_at',
        'level',
        'preparation_minutes',
        'ingredients',
        'author',
        'instructions',
        'picture'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
