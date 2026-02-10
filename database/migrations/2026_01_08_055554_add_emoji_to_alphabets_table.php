<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alphabets', function (Blueprint $table) {
            $table->string('emoji')->nullable()->after('letter'); // add after 'letter'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alphabets', function (Blueprint $table) {
            $table->dropColumn('emoji');
        });
    }
};
