<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthrptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthrpts', function (Blueprint $table) {
           // $table->id();
           // $table->timestamps();
            $table->id();
            $table->integer('groupnumber')->default(0);
            //$table->date('entrydate')->format('d/m/Y')->nullable();
            $table->integer('fyear')->default(0);
            $table->integer('fmonth')->default(0);
            $table->integer('placement')->default(0);
            $table->integer('video')->default(0);
            $table->integer('rv')->default(0);
            $table->integer('bs')->default(0);
            $table->integer('total_hours')->default(0); 
            $table->integer('publisher_id')->default(0);
            $table->text('remarks')->nullable();
            $table->text('fullname');
            $table->integer('final_entry')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monthrpts');
    }
}
