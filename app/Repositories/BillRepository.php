<?php

namespace App\Repositories;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Customer;
use App\Models\ProductSizeColor;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Exceptions\UserUnauthorizedException;
use Config;

class BillRepository
{
    //Index-Search Bill
    public function search($inputs)
    {
        return Bill::join('customer', 'bill.customer_id', '=', 'customer.id')
        ->select('bill.id as id', 'customer.name as customer_id',
                'bill.total as total', 'bill.payment as payment',
                'bill.dateorder as dateorder', 'bill.note as note', 'bill.status as status')
        ->when(isset($inputs['bill.id']), function ($query) use ($inputs) {
            return $query->where('bill.id', $inputs['id']);
        })
        ->when(isset($inputs['bill.dateorder']), function ($query) use ($inputs) {
            return $query->where('bill.dateorder', 'LIKE', '%' . $inputs['dateorder'] . '%');
        })
        ->orderBy('bill.id', 'desc')
        ->paginate(10);
    }

    //Store
    public function store($inputs, $customer_id, $cart)
    {
        return Bill::create([
            'customer_id' => $customer_id,
            'total'       => $cart['total_price'],
            'payment'     => $inputs['payment'],
            'dateorder'   => date('Y-m-d'),
            'note'        => $inputs['note'] ? $inputs['note'] : '',
            'status'      => 1,
        ]);
    }
    public function storeBillDetail($bill_id, $PSCdata, $rowCart, $price)
    {
        return BillDetail::create([
            'id_bill'               => $bill_id,
            'id_product_size_color' => $PSCdata[0]['id'],
            'amount'                => $rowCart['quantity'],
            'price'                 => $price
        ]);
    }

    //Show
    public function show($id)
    {
        return Bill::findOrFail($id);
    }
    public function showPSC($rowCart)
    {
        return ProductSizeColor::whereproduct_id($rowCart['product_id'])
            ->wheresize_id($rowCart['size_id'])
            ->wherecolor_id($rowCart['color_id'])
            ->get();
    }
    public function showBillDetail($id)
    {
        return BillDetail::where('id_bill', $id)
            ->join('product_size_color', 'bills_detail.id_product_size_color', '=', 'product_size_color.id')
            ->join('size','product_size_color.size_id', '=', 'size.id')
            ->join('color','product_size_color.color_id', '=', 'color.id')
            ->join('product', 'product_size_color.product_id', '=', 'product.id')
            ->select('bills_detail.id_bill as id_bill', 'product.img as img',
                    'product.name as name', 'product.id as product_id',
                    'size.id as size_id', 'color.id as color_id',
                    'size.size as size','color.color as color',
                    'bills_detail.price as price','bills_detail.amount as amount')
            ->orderBy('bills_detail.id', 'desc')
            ->paginate();
    }
    public function showBill($id)
    {
        return Bill::findOrFail($id);
    }
    public function showBillID($id)
    {
        return Bill::whereid($id)
        ->join('customer', 'bill.customer_id', '=', 'customer.id')
        ->select('bill.id as id',
                'customer.name as customer_id',
                'bill.total as total',
                'bill.payment as payment',
                'bill.dateorder as dateorder',
                'bill.note as note',
                'bill.status as status')
        ->orderBy('bill.id', 'desc')
        ->paginate();
    }
    public function showbill2($id)
    {
        return ProductSizeColor::whereid($id);
    }
    public function getBillDetail($bill_id)
    {
        return BillDetail::when(isset($bill_id), function ($query) use ($bill_id) {
            return $query->where('id_bill', $bill_id);
            })
            ->orderBy('id', 'desc')
            ->paginate();
    }
    
    //update
    public function update($id)
    {
        return Bill::find($id)
            ->update(['status' => 2]);
    }
    public function updateStatus($id)
    {
        return Bill::find($id)
            ->update(['status' => 3]);
    }
    public function updateBillDetail($row)
    {
        $BillDetail = ProductSizeColor::whereproduct_id($row->product_id)
                ->wheresize_id($row->size_id)
                ->wherecolor_id($row->color_id)->get();
        return ProductSizeColor::whereproduct_id($row->product_id)
                ->wheresize_id($row->size_id)
                ->wherecolor_id($row->color_id)
                ->update(['amount' => $BillDetail[0]['amount'] - $row->amount]);
    }

    //delete
    public function destroy($id, $bill)
    {
        BillDetail::where('id_bill', $id)
            ->delete();
        Bill::findOrFail($id)
            ->delete();
        return Customer::findOrFail(session('bill'))
            ->delete();
    }

    //statistical
    public function statistical()
    { 
        $statusOne      = Bill::where('status', '=', 1)->count();
        $statusTwo      = Bill::where('status', '=', 2)->count();
        $statusThree    = Bill::where('status', '=', 3)->count();
        $sum            = Bill::where('status', '=', 3)->sum('total');
        return [
            'statusOne'     => $statusOne,
            'statusTwo'     => $statusTwo,
            'statusThree'   => $statusThree,
            'sum'           => $sum
        ];
    } 
}
