<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'entries';

    /**
     * Run the migrations.
     * @table entries
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('entryID');
            $table->integer('childID');
            $table->double('height',8,2)->nullable()->default(null);
            $table->double('weight',8,2)->nullable()->default(null);
            $table->double('waist',8,2)->nullable()->default(null);
            $table->double('WHR_v',8,2)->nullable()->default(null);
            $table->double('BMI_v',8,2)->nullable()->default(null);
            $table->double('fruits',8,2)->nullable()->default(null);
            $table->double('veggies',8,2)->nullable()->default(null);
            $table->time('exercise')->nullable()->default(null)->comment('exercise ');
            $table->double('screenTimeSD',8,2)->nullable()->default(null)->comment('Screen time during School Days ');
            $table->double('screenTimeNSD',8,2)->nullable()->default(null)->comment('screen time during Non- School Days');
            $table->time('sleepSD')->nullable()->default(null)->comment('Sleep time during School Days ');
            $table->time('sleepNSD')->nullable()->default(null)->comment('sleep time during Non- School Days ');
            $table->nullableTimestamps();
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
