<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'results';

    /**
     * Run the migrations.
     * @table results
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('resultID');
            $table->unsignedInteger('childID');
            $table->integer('Rwhr')->nullable()->default(null);
            $table->integer('RBmi')->nullable()->default(null)->comment('Bmi \\\\n0 = Normal Range \\\\n1 = Underweight \\\\n2 = Overweight ');
            $table->integer('RfruitsIntake')->nullable()->default(null)->comment('Fruit intake\\\\n0= Enough \\\\n1= Not Enough');
            $table->integer('RveggiesIntake')->nullable()->default(null)->comment('Veggies intake\\\\n0= Enough \\\\n1 = Not Enough');
            $table->integer('Rexercise')->nullable()->default(null)->comment('Exercise \\\\n0= Enough       \\\\n1 = Not Enough');
            $table->integer('RscreentimeSD')->nullable()->default(null)->comment('Screen time School Days \\\\n0= Less than 2 hrs   \\\\n1 = More than 2 hrs');
            $table->integer('RscreentimeNSD')->nullable()->default(null)->comment('Screen time Non- School Days \\\\n0= Less than 2 hrs  \\\\n1 = More than 2 hrs');
            $table->integer('RStimeSD')->nullable()->default(null)->comment('sleep time School Days \\\\n0= Enough \\\\n1 = Not Enough \\\\n2 = More Than Enough ');
            $table->integer('RStimeNSD')->nullable()->default(null)->comment('sleep time Non- School Days \\\\n0= Enough \\\\n1 = Not Enough \\\\n2 = More Than Enough');

            $table->index(["childID"], 'results_childid_foreign');
            $table->nullableTimestamps();


            $table->foreign('childID', 'results_childid_foreign')
                ->references('childID')->on('child')
                ->onDelete('cascade')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
