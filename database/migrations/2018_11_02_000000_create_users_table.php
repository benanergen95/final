<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'users';

    /**
     * Run the migrations.
     * @table users
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('currentChild')->nullable()->default(null);
            $table->string('fname')->nullable()->default(null);
            $table->string('lname')->nullable()->default(null);
            $table->string('pType', 45)->nullable()->default('');
            $table->string('email');
            $table->string('password')->nullable()->default(null);
            $table->tinyInteger('admin')->default('0');
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable()->default(null);

            $table->unique(["email"], 'users_email_unique');
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
