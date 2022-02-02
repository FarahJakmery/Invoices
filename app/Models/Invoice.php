<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_number',
        'incoice_date',
        'due_date',
        'product',
        'section_id',
        'Amount_collection',
        'Amount_commission',
        'discount',
        'value_vat',
        'rate_vat',
        'total',
        'status',
        'value_status',
        'note',
        'Payment_Date',
    ];
    use HasFactory;

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
