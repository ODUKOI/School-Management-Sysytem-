<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLevelIdToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
             $table->unsignedBigInteger('level_id')->nullable(); // Add nullable level_id column
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('set null'); // Foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['level_id']);
            $table->dropColumn('level_id');
        });
    }
}
