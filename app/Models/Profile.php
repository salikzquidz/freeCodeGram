<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $guarded= [];
    
    public function user(){
        return $this->belongsTo(User::class);   
    }


    public function profileImage()
    {
        $defaultImagePath = "https://i.stack.imgur.com/l60Hf.png";
        return ($this->image) ? '/storage/' . $this->image : $defaultImagePath;
    }
}
