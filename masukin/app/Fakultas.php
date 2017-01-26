<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    protected $table = 'omi_fakultas';
    protected $primaryKey = 'id';
    public $increment = false;
}
