<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupStudent extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'group_students';

        /**
         * The primary key associated with the table.
         *
         * @var string
         */
        protected $primaryKey = 'id';

        protected $dates = ['created_at', 'updated_at', 'deleted_at'];

        public function group()
        {
            return $this->belongsTo(Group::class,'student_id','id');
        }
}
