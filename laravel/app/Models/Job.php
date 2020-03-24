<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Job extends Model
{
    protected $fillable = ['position', 'company_name', 'place', 'experience', 'education', 'salary', 'content', 'requirement', 'ps', 'email', 'phone', 'date', 'category'];
    public $timestamps = false;

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function job_follows(){
        return $this->hasMany(JobFollow::class);
    }

    public function list(){
        $data = Job::withCount(['job_follows'])->leftJoin('companies', 'jobs.company_name', 'companies.name')->selectRaw('companies.logo as company_logo')->orderBy('job_follows_count', 'desc')->orderBy('id', 'desc')->paginate(10)->toArray();
    	return $data;
    }
    // 按工作类别筛选
    public function category($category){
        $data = Job::whereIn('category', $category)->orderBy('id', 'desc')->paginate(10)->toArray();

        return $data;
    }
    // 按工作地点筛选
    public function place($place){
        $i = 0;
        foreach ($place as $place) {
            $query[$i] = DB::table('jobs')->where('place', 'like', '%' . $place . '%');
            $i++;
        }
        
        $data = $query[0];
        for($i = 0; isset(($query[$i+1])); $i++){
            $data = $data->union($query[$i+1]);
        }
        $query = $data->toSql();
        $data = DB::table(DB::raw("($query) as a"))->mergeBindings($data)->orderBy('id','desc')->paginate(10)->toArray(); 
    
        return $data;
    }
    // 按工作类别和工作地点筛选
    public function category_place($category, $place){
        $i = 0;
        foreach ($place as $place) {
            $query[$i] = DB::table('jobs')->whereIn('category', $category)->where('place', 'like', '%' . $place . '%');
            $i++;
        }
        
        $data = $query[0];
        for($i = 0; isset(($query[$i+1])); $i++){
            $data = $data->union($query[$i+1]);
        }
        $query = $data->toSql();
        $data = DB::table(DB::raw("($query) as a"))->mergeBindings($data)->orderBy('id','desc')->paginate(10)->toArray(); 
    
        return $data;
    }

    public function detail($job_id){
    	$data = Job::where('id', $job_id)->withCount(['comments', 'job_follows'])->get()->toArray();

    	return $data;
    }

    public function courses($job_id){
        $data = DB::table('jobs_courses')->where('job_id', $job_id)->leftJoin('courses', 'jobs_courses.course_id', 'courses.id')->leftJoin('colleges', 'courses.college_id', 'colleges.id')->selectRaw('jobs_courses.id, course_id, courses.name, courses.major, college_id, colleges.name as college_name, semester, credit, courses.summary')->paginate(10)->toArray();

        return $data;
    }

    public function books($job_id){
        $data = DB::table('jobs_books')->where('job_id', $job_id)->leftJoin('books', 'jobs_books.book_id', 'books.id')->selectRaw('jobs_books.id, book_id, title, pic, author, press, date, category_1, category_2, summary')->paginate(10)->toArray();

        return $data;
    }

    public function competitions($job_id){
        $data = DB::table('jobs_competitions')->where('job_id', $job_id)->leftJoin('competitions', 'jobs_competitions.competition_id', 'competitions.id')->selectRaw('jobs_competitions.id, competition_id, name, link')->paginate(10)->toArray();

        return $data;
    }
   
}
