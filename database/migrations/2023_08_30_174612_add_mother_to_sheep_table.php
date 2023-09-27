<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMotherToSheepTable extends Migration
{
    public function up()
    {
        Schema::table('sheep', function (Blueprint $table) {
            $table->string('mother')->nullable()->after('color');
        });
    }

    public function down()
    {
        Schema::table('sheep', function (Blueprint $table) {
            $table->dropColumn('mother');
        });
    }
}

