<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Console\Scheduling\Schedule;

class AuthorController extends Controller
{

    public function showAllAuthorsTtl()
    {   
        $value = Author::all();
        if (Cache::has('ttl')) {
            Cache::forget('ttl');
            // echo $value;
            Cache ::put('ttl', Author::all() , 300);
        }
        
        return response()->json($value, 200);
    }

    public function showOneAuthorTtl($id)
    {

        $value = Author::find($id);
        if (Cache::has('ttl')) {
            Cache::forget('ttl');
            // echo $value;
            Cache ::put('ttl', $value , 300);
        }
        
        return response()->json($value, 200);
    }



    public function createTtl(Request $request)
    {    
      
        $author = Author::create($request->all());

        return response()->json($author, 201);

        $value = Cache::get('ttl');
    }

   

    public function updateTtl($id, Request $request)
    {
        $author = Author::findOrFail($id);
        $author->update($request->all());

        if (Cache::has('ttl')) {
            Cache::forget('ttl');
            // echo $value;
            Cache ::put('ttl', $author , 300);
        }

        return response()->json($author, 200);
    }

    // public function delete($id)
    // {
    //     Author::findOrFail($id)->delete();
    //     return response('Deleted Successfully', 200);
    // }
    
    protected function resetTtl()
    {   
        
        if (Cache::has('ttl')) {
            Cache::forget('ttl');
            // echo $value;
            Cache ::put('ttl', Author::all() , 300);
        }
        
        
    }

    protected function schedule(Schedule $schedule)
    {
        $schedule->call(resetTtl () )->everyFiveMinutes();

    }
}
