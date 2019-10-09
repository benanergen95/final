<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZValuesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'z_values';

    /**
     * Run the migrations.
     * @table z_values
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('sex')->nullable()->default(null);
            $table->integer('age')->nullable()->default(null);
            $table->decimal('l', 5, 4)->nullable()->default(null);
            $table->decimal('m', 6, 4)->nullable()->default(null);
            $table->decimal('s', 6, 5)->nullable()->default(null);
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
