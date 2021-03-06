<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMentalScoreToResults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {
        Schema::table('results', function (Blueprint $table){

            $table->integer('MentalScore')->nullable()->default(null)->comment('Score For Mental Health Quiz ');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('results', function(Blueprint $table){
            $table->dropColumn(['MentalScore']);
        });
    }
}
