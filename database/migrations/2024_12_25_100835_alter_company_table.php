<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_company_detail', function (Blueprint $table) {
            $table->renameColumn('phone', 'phone');
            $table->renameColumn('company', 'company');
            $table->renameColumn('country', 'country');
            $table->renameColumn('address', 'address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_company_detail', function (Blueprint $table) {
            //
        });
    }
};
