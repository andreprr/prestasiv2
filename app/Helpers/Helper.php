<?php

// app/Helpers/Helper.php


use App\Models\CourseMember;
use App\Models\CourseSection;
use App\Models\User;
use App\Notifications\NotifEmail;
use Illuminate\Support\Facades\DB;
use App\Models\FormInput;
use App\Models\FormInputDetail;
use App\Models\EventStep;
use App\Models\Event;
// use App\Models\Input
use App\Models\StepField;

/**
 * Calculates the progress of a course member in a course.
 *
 * @param int $coursemember_id The ID of the course member.
 * @return float The progress of the course member as a percentage.
 */
if (!function_exists('countProgress')) {
    function countProgress($coursemember_id)
    {
        // code for the helper method

        $data = CourseMember::select('progress','course_id')->where('course_members.id',$coursemember_id)->first();

        $not_progressed = CourseSection::select(DB::raw('count(*) as jumlah'))->where('order','>',$data->progress)->where('course_id',$data->course_id)->where('status','publish')->first();

        $total = CourseSection::select(DB::raw('count(*) as total'))->where('course_id',$data->course_id)->where('status','publish')->first();

        // dd($data);
        return (($total->total - $not_progressed->jumlah) * 100 / $total->total);
    }
}

if(!function_exists('sentNotifStepChange')) {
    function sentNotifStepChange($id_user, $name, $submit_id, $previousStepName, $currentStepName, $eventName) {
        $subject = 'Pemberitahuan Perubahan Status Usulan - '.$submit_id;
        $messageLines = [
            "Yth. {$name},",
            "",
            "Kami ingin memberitahukan bahwa terdapat perubahan status pada usulan yang Anda ajukan, dengan rincian sebagai berikut:",
            "",
            "Jenis Usulan: {$eventName}",
            "Kode Usulan: {$submit_id}",
            "Status Sebelumnya: {$previousStepName}",
            "Status Saat Ini: {$currentStepName}",
            "",
            "Perubahan ini dilakukan berdasarkan hasil verifikasi terbaru yang telah kami lakukan. Untuk informasi lebih lanjut silahkan kunjungi aplikasi Prestasi pada link berikut.",
            "",
            "Terima kasih atas perhatian Anda.",
            "",
            "Hormat kami,",
            "Prestasi Team"
        ];
        $actionDetails = [
            'text' => 'Lihat Status Usulan',
            'url' => url('/'), // You can replace this with the actual URL
        ];
        $user = User::findOrFail($id_user);
        $user->notify(new NotifEmail($subject, $messageLines, $actionDetails));
    }
}

if(!function_exists('sentNotifSuccess')) {
    function sentNotifSuccess($id_user, $name, $submit_id, $currentStepName, $eventName) {
        $subject = 'Pemberitahuan Usulan Diterima - '.$submit_id;
        $messageLines = [
            "Yth. {$name},",
            "",
            "Kami dengan senang hati memberitahukan bahwa usulan yang Anda ajukan telah berhasil diterima, dengan rincian sebagai berikut:",
            "",
            "Jenis Usulan: {$eventName}",
            "Kode Usulan: {$submit_id}",
            "Status Saat Ini: {$currentStepName}",
            "",
            "Silakan mengunjungi aplikasi Prestasi untuk informasi lebih lanjut melalui link berikut.",
            "",
            "Terima kasih atas usulan Anda dan selamat atas keberhasilannya!",
            "",
            "Hormat kami,",
            "Prestasi Team"
        ];
        $actionDetails = [
            'text' => 'Lihat Berkas',
            'url' => url('/'), // Ganti dengan URL yang sesuai
        ];
        $user = User::findOrFail($id_user);
        $user->notify(new NotifEmail($subject, $messageLines, $actionDetails));
    }
}

if(!function_exists('sentNotifFail')) {
    function sentNotifFail($id_user, $name, $submit_id, $currentStepName, $eventName) {
        $subject = 'Pemberitahuan Usulan Ditolak - '.$submit_id;
        $messageLines = [
            "Yth. {$name},",
            "",
            "Kami ingin memberitahukan bahwa usulan yang Anda ajukan telah ditolak, dengan rincian sebagai berikut:",
            "",
            "Jenis Usulan: {$eventName}",
            "Kode Usulan: {$submit_id}",
            "Status Saat Ini: {$currentStepName}",
            "",
            "Penolakan ini dilakukan berdasarkan hasil verifikasi yang telah kami lakukan. Anda dapat melihat lebih detail di aplikasi Prestasi melalui link berikut.",
            "",
            "Terima kasih atas partisipasi Anda, dan kami berharap Anda sukses di kesempatan lain.",
            "",
            "Hormat kami,",
            "Prestasi Team"
        ];
        $actionDetails = [
            'text' => 'Lihat Detail Penolakan',
            'url' => url('/'), // Ganti dengan URL yang sesuai
        ];
        $user = User::findOrFail($id_user);
        $user->notify(new NotifEmail($subject, $messageLines, $actionDetails));
    }
}



if(!function_exists('sentEmail')) {
    function sentEmail($id_user,$subject,$messageLines,$actionDetails){
        $user = User::findOrFail($id_user);
        $user->notify(new NotifEmail($subject, $messageLines, $actionDetails));
    }
}

if(!function_exists('sentEmailSample')) {
    function sentEmailSample(){
        $user = User::findOrFail(1);
        $messageLines = [
            'Halo Ini line 1',
            'Halo ini line 2',
            'Ini line 3',
        ];
        $subject = 'Status Changed Notification';
        $actionDetails = [
            'text' => 'View Details Bisa generate file file yg dibutuhkan, pake signurl biar otomatis bisa doanload tanpa login',
            'url' => url('/'), // You can replace this with the actual URL
        ];
        $user->notify(new NotifEmail($subject, $messageLines, $actionDetails));
    }
}

if(!function_exists('getModelData')) {
    function getModelData($path){
        $data = $path::get();
        return $data;
    }
}

if(!function_exists('firstStepByEventId')) {
    function firstStepByEventId($id){
        $data = EventStep::select('id')->where('event_id', $id)->orderBy('step_order','asc')->first();
        return $data->id;
    }
}

if(!function_exists('prevStep')) {
    function prevStep($event_id, $step_id){
        $order = EventStep::select('step_order')->where('id', $step_id)->first(); 
        $prev_id = EventStep::select('id')->where('event_id', $event_id)->where('step_order','<', $order->step_order)->orderBy('step_order','desc')->first();
        if($prev_id){
            return $prev_id->id;
        }else{
            return null;
        }
    }
}

if(!function_exists('nextStep')) {
    function nextStep($event_id, $step_id){
        $order = EventStep::select('step_order')->where('id', $step_id)->first(); 
        $next_id = EventStep::select('id')->where('event_id', $event_id)->where('step_order','>', $order->step_order)->orderBy('step_order','asc')->first();
        if($next_id){
            return $next_id->id;
        }else{
            return null;
        }
    }
}

if(!function_exists('getValue')) {
    function getValue($form_input_id, $step_id, $field_name){
        $value = FormInputDetail::select('value')->where('form_input_id', $form_input_id)->where('field_name', $field_name)->where('step_id', $step_id)->first();
        if($value){
            return $value->value;
        }else{
            return null;
        }
    }
}

if(!function_exists('getVerif')) {
    function getVerif($form_input_detail){
        $value = FormInputDetail::select('isValid','reason','valid_at')->where('id', $form_input_detail)->first();
        return (object)$value;
    }
}

if(!function_exists('progressForm')) {
    function progressForm($uid){
        
        $data['event'] = FormInput::selectRaw('current_step,form_inputs.event_id,status,count(*) as total_step')->join('event_steps','event_steps.event_id','form_inputs.event_id')->where('uniq_id', $uid)->groupBy('current_step','form_inputs.event_id','status')->first();
        
        $data['steps'] = Event::select('events.event','events.description','event_steps.*')->join('event_steps','event_steps.event_id','events.id')->where('events.id',$data['event']->event_id)->first();
        $data['current_step'] = EventStep::where('id',$data['event']->current_step)->first();
        $data['step_inputed'] = count(EventStep::select('id')->where('event_id', $data['event']->event_id) ->where('step_order','<=',$data['current_step']->step_order)->get());
        //dd($data['current_step']);
        //dd($data['step_inputed']);
        
        return (object)$data;
    }
}

if(!function_exists('isOwnerStep')) {
    function isOwnerStep($step_id){
        $owner = EventStep::select('step_owner', 'event_id')->where('id', $step_id)->first();
        if($owner){
            if($owner->step_owner == auth()->user()->roles()->first()->name){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}

// if(!function_exists('isCurrentStep')) {
//     function isCurrentStep($uid,$step_id){
//         $step = FormInput::selectRaw('current_step')->where('uniq_id', $uid)->first();
//         if($step){
//             if($step->current_step == $step_id){
//                 return true;
//             }else{
//                 return false;
//             }
//         }else{
//             return false;
//         }
//     }
// }

if(!function_exists('upsertForm')) {
    function upsertForm($uid,$field,$value){
        $head = FormInput::
        leftJoin('form_input_details', function($join) use ($field)
            {
                $join->on('form_input_details.form_input_id', '=', 'form_inputs.id');
                $join->on('form_input_details.step_id', '=', 'form_inputs.current_step');
                $join->where('form_input_details.field_name',$field);
            }
        )
        ->where('form_inputs.uniq_id', $uid)
        ->select('form_inputs.*','form_input_details.id as form_input_detail_id')
        ->first();

        if($head->form_input_detail_id){
            FormInputDetail::where('id',$head->form_input_detail_id)->update([
                'value' => $value
            ]);
        }else{
            $field_data = StepField::where('step_id', $head->current_step)
            ->where('field_name',$field)
            ->first();

            FormInputDetail::create([
                'form_input_id' => $head->id,
                'step_id' => $field_data->step_id,
                'field_name' => $field_data->field_name,
                'field_label' => $field_data->field_label,
                'field_description' => $field_data->field_description,
                'field_type' => $field_data->field_type,
                'allowed_type' => $field_data->allowed_type,
                'default_value' => $field_data->default_value,
                'model_referer' => $field_data->model_referer,
                'need_verif' => $field_data->need_verif,
                'is_required' => $field_data->is_required,
                'field_order' => $field_data->field_order,
                'value' => $value
            ]);
        }
    }
}