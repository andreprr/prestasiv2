<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class RoomMongo extends Model
{
   protected $connection = 'mongodb';
   protected $collection = 'room';

}
