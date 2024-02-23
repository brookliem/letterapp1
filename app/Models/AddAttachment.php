<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddAttachment extends Model
{
    use HasFactory;

    protected $fillable = ['addattachments', 'template_id',];

    // Define the inverse of the one-to-many relationship
    public function template()
    {
        return $this->belongsTo(Templates::class, 'template_id');
    }
}
