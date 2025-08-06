<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class JawabanMongoNew extends Model
{
   protected $connection = 'mongodb';
   protected $collection = 'jawaban_new';

}
