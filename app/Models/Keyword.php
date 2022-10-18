<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    use HasFactory;

    protected $fillable = [
        'keyword',

    ];

    public $timestamps = false;

    /**
     */
    public function questions()
    {
        return $this->belongsTo(Question::class);
    }
}
