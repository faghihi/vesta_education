<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(TeachersTableSeeder::class);
        $this->call(UsecourseTableSeeder::class);
        $this->call(SectionsTableSeeder::class);
        $this->call(PackagesTableSeeder::class);

        $this->call(TakeCourseTableSeeder::class);
        $this->call(TeacherTagTableSeeder::class);
        $this->call(ReviewCourseTableSeeder::class);
        $this->call(ReviewTeacherTableSeeder::class);
        $this->call(PackageCourseTableSeeder::class);
        $this->call(CourseTeacherTableSeeder::class);
        $this->call(CourseTagTableSeeder::class);
        $this->call(CoursepartTableSeeder::class);
    }
}
