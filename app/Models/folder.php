<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class folder extends Model
{
    use HasFactory;

    // public function folders(){
    //     $folders = Folder::all();
    //     return $folders;
    // }
    public function tasks()
    {
        return $this->hasMany('App\Models\Task', 'folder_id', 'id');
    }
}
