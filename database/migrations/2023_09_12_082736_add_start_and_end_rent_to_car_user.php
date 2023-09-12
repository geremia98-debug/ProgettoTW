<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStartAndEndRentToCarUser extends Migration
{
    
    
//Run the migrations
  public function up()
  {
    Schema::table('car_user', function (Blueprint $table) {

        $table->date('start_rent');
        $table->date('end_rent');
    });

}

    
     
//Reverse the migrations.
  public function down(){
    Schema::table('car_user', function (Blueprint $table) {

        $table->dropColumn(['start_rent', 'end_rent']);
    });
}
}

