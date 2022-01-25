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
            $table->bigIncrements('id');
            $table->string('incoice_number', 50); //رقم الفاتورة
            $table->date('incoice_date'); // تاريخ الفاتورة
            $table->date('due_date'); // تاريخ الاستحقاق
            $table->string('product', 50); // المنتج
            $table->foreignId('section_id')->constrained()->onDelete('cascade');
            $table->decimal('Amount_collection', 8, 2)->nullable();
            $table->decimal('Amount_commission', 8, 2)->nullable(); // عمولة المبلغ
            $table->string('discount', 8, 2); // خصم على الفاتورة
            $table->decimal('value_vat', 8, 2); // قيمة الضريبة
            $table->string('rate_vat', 999); // نسبة الضريبة
            $table->decimal('total', 8, 2); // المجموع الكلي
            $table->string('status', 50); // الحالة و ححدنا عدد المحارف مشان ما احجز مساحة كبية في الداتا بيز لأنو لو ما ححدت عدد المحارف القيمة الافتراضية هي 255
            $table->integer('value_status'); // قيمة الحالة
            $table->text('note')->nullable();
            $table->date('Payment_Date')->nullable();
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
