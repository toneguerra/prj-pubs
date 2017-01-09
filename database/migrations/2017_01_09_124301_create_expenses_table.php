<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('expense_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->char('abrev', 3);
            $table->timestamps();
        });

        DB::table('expense_types')->insert(['name' => 'Relatório Gestão Fiscal', 'abrev' => 'RGF']);
        DB::table('expense_types')->insert(['name' => 'Relátorio Execução Orçamentária', 'abrev' => 'REO']);

        Schema::create('expense_periods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->timestamps();
        });

        DB::table('expense_periods')->insert(['name' => 'Mensal']);
        DB::table('expense_periods')->insert(['name' => 'Bimestral']);
        DB::table('expense_periods')->insert(['name' => 'Trimestral']);
        DB::table('expense_periods')->insert(['name' => 'Quadrimestral']);
        DB::table('expense_periods')->insert(['name' => 'Semestral']);
        DB::table('expense_periods')->insert(['name' => 'Anual']);

 
        Schema::create('expense_period_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->char('abrev', 4);
            $table->integer('expense_period_id')->unsigned();
            $table->foreign('expense_period_id')->references('id')->on('expense_periods');
            $table->timestamps();
        });

        Schema::create('expense_segments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->char('abrev', 3);
            $table->integer('expense_type_id')->unsigned();
            $table->integer('expense_period_id')->unsigned();
            $table->foreign('expense_type_id')->references('id')->on('expense_types');
            $table->foreign('expense_period_id')->references('id')->on('expense_periods');
            $table->timestamps();
        });

        Schema::create('years', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year');
            $table->timestamps();
        });

        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year_id')->unsigned();
            $table->integer('expense_segment_id')->unsigned();
            $table->foreign('year_id')->references('id')->on('years');
            $table->foreign('expense_segment_id')->references('id')->on('expense_segments');
            $table->string('name', 50);
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
        Schema::dropIfExists('expenses');                   //arquivos publicados
        Schema::dropIfExists('years');                      //Tabela Geral de Anos 2016
        Schema::dropIfExists('expense_segments');           //Anexo I - Relatório de Execução
        Schema::dropIfExists('expense_types');              //RGF - REO
        Schema::dropIfExists('expense_periods_details');    //1Tri - 2Tri - jan - Fev
        Schema::dropIfExists('expense_periods');          //mensal - trimestral        
    }
}
