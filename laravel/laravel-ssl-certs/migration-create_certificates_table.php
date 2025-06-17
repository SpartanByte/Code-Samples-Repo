<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ssl_certificates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('port');
            $table->string('domain')->unique();
            $table->string('issuer');
            $table->date('date_issued'); // This should not be timestamped but an inputted Year/Month/Day or other specified format ()
            $table->date('expiration_date');  // This should not be timestamped but an inputted Year/Month/Day or other specified format
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ssl_certificates');
    }
}