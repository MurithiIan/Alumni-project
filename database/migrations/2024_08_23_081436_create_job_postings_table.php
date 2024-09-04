<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPostingsTable extends Migration
{
    public function up()
    {
        Schema::create('job_postinngs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('job_name');
            $table->text('job_description');
            $table->text('job_qualification');
            $table->string('job_location');
            $table->decimal('job_amount', 8, 2);
            $table->string('job_picture')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_postinngs');
    }
}
