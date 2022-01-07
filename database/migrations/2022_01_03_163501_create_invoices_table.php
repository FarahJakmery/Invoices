<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('incoice_number'); //رقم الفاتورة
            $table->date('incoice_date'); // تاريخ الفاتورة
            $table->date('due_date'); // تاريخ الاستحقاق
            $table->string('product'); // المنتج
            $table->string('section'); // القسم
            $table->string('discount'); // خصم على الفاتورة
            $table->decimal('rate_vat'); // نسبة الضريبة
            $table->decimal('value_vat', 8, 2); // قيمة الضريبة
            $table->string('total', 8, 2); // المجموع الكلي
            $table->string('status', 50); // الحالة و ححدنا عدد المحارف مشان ما احجز مساحة كبية في الداتا بيز لأنو لو ما ححدت عدد المحارف القيمة الافتراضية هي 255
            $table->integer('value_status'); // قيمة الحالة
            $table->text('note')->nullable();
            $table->string('user');
            $table->softDeletes(); // يعني إذا قمنا بحذف فاتورة ما لا تحذف بشكل نهائي يعني يتم أرشفتها أي لا تحذف من الداتابيز
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
        Schema::dropIfExists('invoices');
    }
}
