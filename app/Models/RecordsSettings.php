<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordsSettings extends Model
{
    use HasFactory;
    protected $fillable = ['field_label', 'field_name', 'order'];
}
