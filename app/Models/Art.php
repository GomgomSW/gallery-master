<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    use HasFactory;

    protected $table = 'arts';

    protected $primaryKey = 'id';

    // protected $timestamps = true;

    protected $fillable = ['name', 'release','writer', 'type', 'description', 'image_path', 'user_id'];

    // Make Specific Data Hidden
    protected $hidden = ['updated_at'];

    protected $visible = ['name', 'release', 'description'];
}
