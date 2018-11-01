<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
// テーブル内のデータを削除
      DB::table('students')->delete();
// 日本語引数を設定
      $faker = Faker\Factory::create('ja_JP');
// 配列内['1','2']の数字を入れる。例 1or2 が入る
      $dept = ['1','2'];


// 挿入回数を設定する。
      for ($i = 0; $i < 50; $i++) {
  // Eloquentを設定した「Employee.php」へパスを通す
        \App\Student::create([
// 'coloum' => $faker->var();,
          'name' => $faker->name(),
          'email' => $faker->email(),
          'tel' => $faker->phoneNumber()
        ]);

      }
    }
  }
