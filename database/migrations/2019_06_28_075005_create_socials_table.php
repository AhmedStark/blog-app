<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
class CreateSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('site');
            $table->string('icon');
            $table->string('link');
            $table->timestamps();
        });
        DB::table('socials')->insert([
            ['site'=>'facebook','link'=>'https://www.facebook.com/','icon'=>'fa fa-facebook','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['site'=>'twitter','link'=>'https://www.twitter.com/','icon'=>'fa fa-twitter','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],     
            ['site'=>'linkedin','link'=>'https://www.linkedin.com/','icon'=>'fa fa-linkedin','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],        
            ['site'=>'instagram','link'=>'https://www.instagram.com/','icon'=>'fa fa-instagram','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],        
   
            
        
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socials');
    }
}
