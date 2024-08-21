<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puzzles extends Model
{
    use HasFactory;

    protected $fillable = ['puzzle_string'];

    public function studentSubmission(){

        return $this->hasMany(studentSubmission::class);
    }
}
