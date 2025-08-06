<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

use App\Models\User;
use App\Models\UserProfile;
use App\Models\Job;
use App\Models\Event;
use App\Models\EventStep;
use App\Models\StepField;
use App\Models\ApplicantsJob;
use App\Models\ResearchField;
use App\Models\InstitutionCategory;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //roles
        $adminRole = Role::create(['name' => 'admin']);
        $memberRole = Role::create(['name' => 'member']);
        

        //permissions
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'user']);
        Permission::create(['name' => 'userprofile']); 
        Permission::create(['name' => 'master']);
        Permission::create(['name' => 'forminput']);
        Permission::create(['name' => 'api.public']);
        Permission::create(['name' => 'api.private']);
        
        $adminRole->syncPermissions(['dashboard','user','api.public','api.private','master','forminput']);
        $memberRole->syncPermissions(['dashboard','userprofile','api.public','api.private','forminput']);

        //admin
        $user = User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@mail.com',
            'status' => 'active',
            'password' => bcrypt('admin')
        ]);

        UserProfile::create([
            'user_id' => $user->id,
            'img_url' => 'userdefault.png'
        ]);

        $user->assignRole('admin');

        //member
        $user = User::factory()->create([
            'name' => 'Sample Member',
            'username' => 'member',
            'email' => 'member@mail.com',
            'status' => 'active',
            'password' => bcrypt('member')
        ]);

        UserProfile::create([
            'user_id' => $user->id,
            'phone' => '081234567',
            'img_url' => 'userdefault.png',
            'nip' => '1234'
        ]);

        $user->assignRole('member');
        
        ApplicantsJob::create(['name' => 'Mahasiswa']);
        ApplicantsJob::create(['name' => 'Dosen']);
        ApplicantsJob::create(['name' => 'Peneliti']);
        ApplicantsJob::create(['name' => 'Wiraswasta']);

        ResearchField::create(['name' => 'Sosial']);
        ResearchField::create(['name' => 'Pendidikan']);
        ResearchField::create(['name' => 'Kesehatan']);
        ResearchField::create(['name' => 'Agama']);
        ResearchField::create(['name' => 'Hukum']);
        ResearchField::create(['name' => 'Politik']);
        ResearchField::create(['name' => 'Ekonomi']);
        ResearchField::create(['name' => 'Teknologi Informasi']);
        ResearchField::create(['name' => 'Kebudayaan']);

        InstitutionCategory::create(['name' => 'Perguruan Tinggi']);
        InstitutionCategory::create(['name' => 'Lembaga Survey']);
        InstitutionCategory::create(['name' => 'Organisasi Profesi']);

        //Event
        $event =  Event::create([
            'event' => 'FORMULIR PELAYANAN SURAT KETERANGAN PENELITIAN',
            'description' => 'Formulir pelayanan permohonan surat keterangan penelitian ini merupakan formulir resmi pelayanan pada Badan Kesatuan Bangsa dan Politik Kota Cimahi. Pemohon disilahkan mengisi semua pertanyaan dan melampirkan dokumen yang menjadi persyaratan administrasi. Pemohon juga dapat meminta hasilnya melalui emai, WA atau diambil sendiri bentuk fisiknya di  Bakesbangpol atau Mal Pelayanan Publik Kota Cimahi.'
        ]);

        $event_step = EventStep::create([
            'event_id' => $event->id,
            'event_step' => 'Pendaftaran Usulan',
            'step_owner' => 'member',
            'step_order' => '1',
            'step_description' => 'Tahap pendaftaran isi formulir usulan'
        ]);
        
        StepField::create([
            'step_id' => $event_step->id,
            'field_name' => 'applicantsjob_id',
            'field_label' => 'Pekerjaan',
            'field_description' => 'Silahkan pilih pekerjaan anda',
            'field_type' => 'select',
            'model_referer' => 'App\Models\ApplicantsJob',
            'need_verif' => 1,
            'is_required' => 1,
            'field_order' => 1
        ]);

        StepField::create([
            'step_id' => $event_step->id,
            'field_name' => 'institution_category_id',
            'field_label' => 'Bentuk Lembaga / Instansi Pemohon',
            'field_description' => 'Silahkan pilih bentuk lembaga / instansi pemohon',
            'field_type' => 'select',
            'model_referer' => 'App\Models\InstitutionCategory',
            'need_verif' => 1,
            'is_required' => 1,
            'field_order' => 2
        ]);

        StepField::create([
            'step_id' => $event_step->id,
            'field_name' => 'institution',
            'field_label' => 'Nama Asal lembaga / instansi pemohon',
            'field_description' => 'Silahkan diisi dengan asal lembaga atau instansi dimana anda bertugas. Misalnya Universitas Padjajaran, Lembaga Survey Indonesia, dan lain-lain',
            'field_type' => 'text',
            'need_verif' => 1,
            'is_required' => 1,
            'field_order' => 3
        ]);

        StepField::create([
            'step_id' => $event_step->id,
            'field_name' => 'research_basis',
            'field_label' => 'Dasar Penelitian',
            'field_description' => 'Silahkan diisi dengan peraturan atau surat atau landasan hukum lainnya sebagai dasar penelitian',
            'field_type' => 'textarea',
            'need_verif' => 1,
            'is_required' => 1,
            'field_order' => 4
        ]);

        StepField::create([
            'step_id' => $event_step->id,
            'field_name' => 'research_title',
            'field_label' => 'Judul Penelitian',
            'field_description' => 'Masukkan Judul Penelitian',
            'field_type' => 'text',
            'need_verif' => 1,
            'is_required' => 1,
            'field_order' => 5
        ]);

        StepField::create([
            'step_id' => $event_step->id,
            'field_name' => 'research_fields',
            'field_label' => 'Bidang Penelitian',
            'field_description' => 'Silahkan pilih bidang yang akan dijadikan penelitian',
            'field_type' => 'select',
            'model_referer' => 'App\Models\ResearchField',
            'need_verif' => 1,
            'is_required' => 1,
            'field_order' => 6
        ]);

        StepField::create([
            'step_id' => $event_step->id,
            'field_name' => 'research_location',
            'field_label' => 'Lokasi Penelitian',
            'field_description' => 'silahkan disebutkan lokasi penelitian. Misalnya seluruh kelurahan di Kota Cimahi, Dinas Pendidikan, Puskesmas Cimahi Tengah, Yayasan Grapiks, dan lain lain',
            'field_type' => 'textarea',
            'need_verif' => 1,
            'is_required' => 1,
            'field_order' => 7
        ]);

        StepField::create([
            'step_id' => $event_step->id,
            'field_name' => 'start_at',
            'field_label' => 'Waktu MEMULAI Penelitian',
            'field_description' => 'silahkan diisi dengan rencana kapan MULAI dilaksanakan',
            'field_type' => 'date',
            'need_verif' => 1,
            'is_required' => 1,
            'field_order' => 8
        ]);

        StepField::create([
            'step_id' => $event_step->id,
            'field_name' => 'finish_at',
            'field_label' => 'Waktu SELESAI Penelitian',
            'field_description' => 'silahkan diisi dengan rencana kapan Penelitian BERAKHIR',
            'field_type' => 'date',
            'need_verif' => 1,
            'is_required' => 1,
            'field_order' => 9
        ]);

        StepField::create([
            'step_id' => $event_step->id,
            'field_name' => 'team_leader',
            'field_label' => 'Ketua Tim Peneliti',
            'field_description' => 'Diisi apabila penelitian yang anda lakukan melibatkan beberapa orang dalam satu Tim',
            'field_type' => 'text',
            'need_verif' => 1,
            'is_required' => 0,
            'field_order' => 10
        ]);

        
        StepField::create([
            'step_id' => $event_step->id,
            'field_name' => 'team_members',
            'field_label' => 'Anggota Tim Peneliti',
            'field_description' => 'Diisi apabila penelitian yang anda lakukan melibatkan beberapa orang dalam satu Tim, pisahkan dengan titik koma (;)',
            'field_type' => 'textarea',
            'need_verif' => 1,
            'is_required' => 0,
            'field_order' => 11
        ]);
        
        StepField::create([
            'step_id' => $event_step->id,
            'field_name' => 'applicants_photo',
            'field_label' => 'Lampirkan foto BERWARNA Peneliti',
            'field_description' => 'Upload 1 file yang didukung: drawing atau image. Maks 10 MB.',
            'field_type' => 'file',
            'need_verif' => 1,
            'is_required' => 1,
            'field_order' => 12
        ]);

        StepField::create([
            'step_id' => $event_step->id,
            'field_name' => 'applicants_idcard',
            'field_label' => 'Lampirkan KTP',
            'field_description' => 'Upload 1 file yang didukung: drawing atau image. Maks 10 MB.',
            'field_type' => 'file',
            'need_verif' => 1,
            'is_required' => 1,
            'field_order' => 13
        ]);

        
        StepField::create([
            'step_id' => $event_step->id,
            'field_name' => 'applicants_research_letter',
            'field_label' => 'Lampirkan Surat Permohonan Penelitian dari Instansi anda',
            'field_description' => 'Upload 1 file yang didukung: PDF, document, drawing, atau image. Maks 10 MB.',
            'field_type' => 'file',
            'need_verif' => 1,
            'is_required' => 1,
            'field_order' => 14
        ]);

        StepField::create([
            'step_id' => $event_step->id,
            'field_name' => 'number_applicants_research_letter',
            'field_label' => 'Nomor Surat Permohonan Penelitian dari Instansi anda',
            'field_description' => 'Silahkan diisi dengan nomor surat permohonan penelitian dari instansi pemohon',
            'field_type' => 'text',
            'need_verif' => 1,
            'is_required' => 1,
            'field_order' => 15
        ]);
        
        StepField::create([
            'step_id' => $event_step->id,
            'field_name' => 'date_applicants_research_letter',
            'field_label' => 'Tanggal Surat Permohonan Penelitian dari Instansi anda',
            'field_description' => 'Silahkan diisi dengan tanggal surat permohonan penelitian dari instansi pemohon',
            'field_type' => 'date',
            'need_verif' => 1,
            'is_required' => 1,
            'field_order' => 16
        ]);

        StepField::create([
            'step_id' => $event_step->id,
            'field_name' => 'regard_applicants_research_letter',
            'field_label' => 'Perihal Surat Permohonan Penelitian dari Instansi anda',
            'field_description' => 'Silahkan diisi dengan perihal surat permohonan penelitian dari instansi pemohon',
            'field_type' => 'text',
            'need_verif' => 1,
            'is_required' => 1,
            'field_order' => 17
        ]);

        StepField::create([
            'step_id' => $event_step->id,
            'field_name' => 'applicants_approval_letter',
            'field_label' => 'Lampirkan surat persetujuan penelitian dari instansi yang akan menjadi lokasi penelitian',
            'field_description' => 'Diisi dengan surat persetujuan atau bentuk lainnya seperti (ttd+cap) dari instansi/lembaga yang akan menjadi lokasi peneltian. Misalnya persetujuan dari Puskesmas, Dinas Pendidikan, dan lain-lain. Apabila lokasi penelitian mencakup semua Dinas, semua Kelurahan se-Kota Cimahi tidak DIPERLUKAN persetujuan. ',
            'field_type' => 'file',
            'need_verif' => 1,
            'is_required' => 1,
            'field_order' => 18
        ]);

        StepField::create([
            'step_id' => $event_step->id,
            'field_name' => 'applicants_proposal',
            'field_label' => 'Lampirkan Proposal Penelitian',
            'field_description' => 'Upload 1 file yang didukung: PDF, document, drawing, atau image. Maks 10 MB.',
            'field_type' => 'file',
            'need_verif' => 1,
            'is_required' => 1,
            'field_order' => 19
        ]);

        $event_step = EventStep::create([
            'event_id' => $event->id,
            'event_step' => 'Verifikasi Berkas',
            'step_owner' => 'admin',
            'step_order' => '2',
            'step_description' => 'Tahap verifikasi Berkas Pendaftaran'
        ]);

        $event_step = EventStep::create([
            'event_id' => $event->id,
            'event_step' => 'Penerbitan Surat Keterangan Penelitian',
            'step_owner' => 'admin',
            'step_order' => '3',
            'step_description' => 'Tahap Penerbitan Surat Keterangan Penelitian'
        ]);

        StepField::create([
            'step_id' => $event_step->id,
            'field_name' => 'research_letter',
            'field_label' => 'Surat Keterangan Penelitian',
            'field_description' => 'Upload File Surat Keterangan Penelitian dalam bentuk pdf',
            'field_type' => 'file',
            'need_verif' => 0,
            'is_required' => 1,
            'field_order' => 1
        ]);
    }
}
