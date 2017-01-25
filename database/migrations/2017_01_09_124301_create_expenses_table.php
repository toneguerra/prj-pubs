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
            $table->string('name', 100);
            $table->char('abrev', 3);
            $table->timestamps();
        });

        DB::table('expense_types')->insert(['name' => 'Relatório Gestão Fiscal', 'abrev' => 'RGF']);
        DB::table('expense_types')->insert(['name' => 'Relátorio Execução Orçamentária', 'abrev' => 'REO']);

        Schema::create('expense_periods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
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
            $table->string('name', 100);
            $table->char('abrev', 4);
            $table->integer('expense_period_id')->unsigned();
            $table->foreign('expense_period_id')->references('id')->on('expense_periods');
            $table->timestamps();
        });

            DB::table('expense_period_details')->insert(['name' => 'Janeiro', 'abrev'=>'Jan', 'expense_period_id'=>'1']);
            DB::table('expense_period_details')->insert(['name' => 'Fevereiro', 'abrev'=>'Fev', 'expense_period_id'=>'1']);
            DB::table('expense_period_details')->insert(['name' => 'Março', 'abrev'=>'Mar', 'expense_period_id'=>'1']);
            DB::table('expense_period_details')->insert(['name' => 'Abril', 'abrev'=>'Abr', 'expense_period_id'=>'1']);
            DB::table('expense_period_details')->insert(['name' => 'Maio', 'abrev'=>'Mai', 'expense_period_id'=>'1']);
            DB::table('expense_period_details')->insert(['name' => 'Junho', 'abrev'=>'Jun', 'expense_period_id'=>'1']);
            DB::table('expense_period_details')->insert(['name' => 'Julho', 'abrev'=>'Jul', 'expense_period_id'=>'1']);
            DB::table('expense_period_details')->insert(['name' => 'Agosto', 'abrev'=>'Ago', 'expense_period_id'=>'1']);
            DB::table('expense_period_details')->insert(['name' => 'Setembro', 'abrev'=>'Set', 'expense_period_id'=>'1']);
            DB::table('expense_period_details')->insert(['name' => 'Outubro', 'abrev'=>'Out', 'expense_period_id'=>'1']);
            DB::table('expense_period_details')->insert(['name' => 'Novembro', 'abrev'=>'Nov', 'expense_period_id'=>'1']);
            DB::table('expense_period_details')->insert(['name' => 'Dezembro', 'abrev'=>'Dez', 'expense_period_id'=>'1']);

            DB::table('expense_period_details')->insert(['name' => '1º Bimestre', 'abrev'=>'1Bim', 'expense_period_id'=>'2']);
            DB::table('expense_period_details')->insert(['name' => '2º Bimestre', 'abrev'=>'2Bim', 'expense_period_id'=>'2']);
            DB::table('expense_period_details')->insert(['name' => '3º Bimestre', 'abrev'=>'3Bim', 'expense_period_id'=>'2']);
            DB::table('expense_period_details')->insert(['name' => '4º Bimestre', 'abrev'=>'4Bim', 'expense_period_id'=>'2']);
            DB::table('expense_period_details')->insert(['name' => '5º Bimestre', 'abrev'=>'5Bim', 'expense_period_id'=>'2']);
            DB::table('expense_period_details')->insert(['name' => '6º Bimestre', 'abrev'=>'6Bim', 'expense_period_id'=>'2']);

            DB::table('expense_period_details')->insert(['name' => '1º Trimestre', 'abrev'=>'1Tri', 'expense_period_id'=>'3']);
            DB::table('expense_period_details')->insert(['name' => '2º Trimestre', 'abrev'=>'2Tri', 'expense_period_id'=>'3']);
            DB::table('expense_period_details')->insert(['name' => '3º Trimestre', 'abrev'=>'3Tri', 'expense_period_id'=>'3']);
            DB::table('expense_period_details')->insert(['name' => '4º Trimestre', 'abrev'=>'4Tri', 'expense_period_id'=>'3']);

            DB::table('expense_period_details')->insert(['name' => '1º Quadrimestre', 'abrev'=>'1Qua', 'expense_period_id'=>'4']);
            DB::table('expense_period_details')->insert(['name' => '2º Quadrimestre', 'abrev'=>'2Qua', 'expense_period_id'=>'4']);
            DB::table('expense_period_details')->insert(['name' => '3º Quadrimestre', 'abrev'=>'3Qua', 'expense_period_id'=>'4']);

            DB::table('expense_period_details')->insert(['name' => '1º Semestre', 'abrev'=>'1Sem', 'expense_period_id'=>'5']);
            DB::table('expense_period_details')->insert(['name' => '2º Semestre', 'abrev'=>'2Sem', 'expense_period_id'=>'5']);

            DB::table('expense_period_details')->insert(['name' => 'Anual', 'abrev'=>'Anl', 'expense_period_id'=>'6']);


        Schema::create('expense_segments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->char('abrev', 4);
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
            $table->integer('expense_period_detail_id')->unsigned();
            $table->string('path', 100);
            $table->foreign('year_id')->references('id')->on('years');
            $table->foreign('expense_segment_id')->references('id')->on('expense_segments');
            $table->foreign('expense_period_detail_id')->references('id')->on('expense_period_details');
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
        Schema::dropIfExists('expense_period_details');    //1Tri - 2Tri - jan - Fev
        Schema::dropIfExists('expense_periods');          //mensal - trimestral        
    }
}
