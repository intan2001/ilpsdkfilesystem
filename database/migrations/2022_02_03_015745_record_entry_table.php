<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecordEntryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table)
        {
            $table->id();
            $table->string('perkara');
            $table->string('rujukan_surat');
            $table->string('rujukan_fail');
            $table->string('tarikh_surat');
            $table->string('tarikh_terima');
            $table->string('serahan');
            $table->string('daripada');
            $table->string('cacatan');
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
        Schema::dropIfExists('records');
    }
}
