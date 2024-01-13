<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pcregisters', function (Blueprint $table) {
            $table->id();
                   
            // Foreign key for usertype = 0
            $table->string('userid');
        
            // Make sure 'userid' column in 'users' table has an index
            // You can also add the index directly to the 'users' migration file if it's missing
            // $table->index('userid');
        
            $table->foreign('userid')->references('userid')->on('users');
            $table->string('user_id')->unique();
            $table->string('username');
            $table->string('photo')->nullable();
            $table->text('description');
            $table->string('pc_name');
            $table->string('serial_number')->unique();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pcregisters');
    }
};
