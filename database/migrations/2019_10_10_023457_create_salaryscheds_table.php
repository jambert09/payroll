<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalaryschedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaryscheds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('salary_date')->nullable();
            $table->text('status')->nullable();
            $table->text('emp_id')->nullable();
            $table->text('semisalary')->nullable();
            $table->text('liquidation')->nullable();
            $table->text('tardi_under')->nullable();
            $table->text('overtime')->nullable();
            $table->text('otmeal')->nullable();
            $table->text('etc1')->nullable();
            $table->text('salarywages')->nullable();
            $table->text('mpf')->nullable();
            $table->text('sssdeduc')->nullable();
            $table->text('phicdeduc')->nullable();
            $table->text('hdmfdeduc')->nullable();
            $table->text('birc')->nullable();
            $table->text('bire')->nullable();
            $table->text('totaldeduc')->nullable();
            $table->text('etcdeduc')->nullable();
            $table->text('ths')->nullable();
            $table->text('sssemp')->nullable();
            $table->text('ecemp')->nullable();
            $table->text('phicemp')->nullable();
            $table->text('hdmfemp')->nullable();
            $table->text('totalemp')->nullable();
            $table->text('totalempcost')->nullable();

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
        Schema::dropIfExists('salaryscheds');
    }
}
