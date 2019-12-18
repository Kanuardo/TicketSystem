<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'name'=>'Kabdula Anuar',
            'email'=>'admin@mail.ru',
            'password' => bcrypt('password'),
            'is_admin'=>1,
            'remember_token' => Str::random(10),
            'created_at'=>'2019-12-18 04:08:06',
            'updated_at'=>'2019-12-18 04:08:06'
        ));
        DB::table('departments')->delete();
        \App\Department::create(array(
            'title'=>'IT отдел',
            'slug'=>'it-otdel',
            'created_at'=>'2019-12-18 04:08:06',
            'updated_at'=>'2019-12-18 04:08:06'
        ));
        \App\Department::create(array(
            'title'=>'Отдел продаж',
            'slug'=>'otdel-prodazh',
            'created_at'=>'2019-12-18 04:08:08',
            'updated_at'=>'2019-12-18 04:08:08'
        ));
        \App\Department::create(array(
            'title'=>'Финансовый отдел',
            'slug'=>'finansovyy-otdel',
            'created_at'=>'2019-12-18 04:08:09',
            'updated_at'=>'2019-12-18 04:08:09'
        ));

        factory(App\User::class, 3)->create();
        factory(App\Tickets::class, 15)->create();
    }
}
