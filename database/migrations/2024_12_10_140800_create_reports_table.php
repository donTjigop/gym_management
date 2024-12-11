<?php

// database/migrations/xxxx_xx_xx_create_transactions_table.php

// database/migrations/xxxx_xx_xx_create_reports_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->foreignId('member_id')->constrained()->onDelete('cascade');  // Foreign key for members
            $table->date('report_date');  // Report date
            $table->string('status');  // Report status (pending/paid)
            $table->timestamps();  // Created at and updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('reports');
    }
}

