<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMalfunctionsTable extends Migration
{
    public function up()
    {
        Schema::create('malfunctions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('machine_id')->constrained();
            $table->foreignId('status_id')->constrained();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->text('description');
            $table->timestamp('finished_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('malfunctions');
    }
}

