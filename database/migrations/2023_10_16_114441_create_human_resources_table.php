<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_human_resources_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHumanResourcesTable extends Migration
{
    public function up()
    {
        Schema::create('human_resources', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->date('creation_date');
            $table->string('file_path')->nullable();
            $table->enum('type', ['contrat', 'passation', 'congé sans sold', 'Maternité', 'congé annuel', 'Maladi', 'Evenement Familar']);
            $table->enum('filter', ['mariage', 'décét', 'paternité'])->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('human_resources');
    }
}
