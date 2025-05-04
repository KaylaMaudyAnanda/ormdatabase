<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Skill extends Model
{
    protected $fillable = ['name'];
    // Relasi Many to Many
    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }
}
