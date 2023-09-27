<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMotherToCattleTable extends Migration
{
    public function up()
    {
        Schema::table('cattle', function (Blueprint $table) {
            $table->string('mother')->nullable()->after('color');
        });
    }

    public function down()
    {
        Schema::table('cattle', function (Blueprint $table) {
            $table->dropColumn('mother');
        });
    }
}
