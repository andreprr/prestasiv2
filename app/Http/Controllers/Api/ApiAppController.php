<?php

namespace App\Http\Controllers\Api;

use App\Models\Course;

use App\Models\Tag;


Class ApiAppController {


    public function getAllCourses()
    {
        $courses = Course::where('status','publish')->get();
        return jsend_success($courses);
    }

    public function getMajorTags()
    {
        $courses = Tag::where('type','major')->get();
        return jsend_success($courses);
    }
}