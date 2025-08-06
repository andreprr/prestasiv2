<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class JawabanMongo extends Model
{
   protected $connection = 'mongodb';
   protected $collection = 'jawaban';

}
