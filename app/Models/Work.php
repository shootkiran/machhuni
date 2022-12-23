<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = ['title', 'alternative_name', 'description'];
    public static function seed()
    {
        Work::createWork("Painting", "Constuction", ["House Painting", "Room Colouring"]);
        $w1 =   Work::createWork("Website Development", "Web Development");
        Work::createWork("Farming Helper", "Farming");
        Work::createWork("Construction Helper", "Constuction");
        Work::createWork("Brick Layer", "Construction");
        Work::createWork("Tractor Plough", "Farming");
        Work::createWork("Taxi", "Transportation");
        User::find(1)->Works()->syncWithoutDetaching([1, 2]);
    }
    
    public function scopeExcludeMe($query){
        dd($query);
    }
    public static function createWork(string $title, string $category, array $alternative_titles = null, string $description = null)
    {
        Work::firstOrCreate([
            'title' => $title
        ], [
            'alternative_titles' => \json_encode($alternative_titles),
            'description' => $description,
            'work_category_id' => WorkCategory::firstOrCreate(['name' => $category])->id
        ]);
    }
    public function nearByUsers()
    {
        return $this->Users()->limit(10)->get();
    }
    public function Users()
    {
        return $this->belongsToMany(User::class);
    }
}
