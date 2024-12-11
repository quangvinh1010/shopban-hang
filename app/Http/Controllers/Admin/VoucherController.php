<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index(Request $request)
    {
        $query = Voucher::query();

        // Check if there's a search term
        if ($request->has('searchVoucher') && $request->input('searchVoucher')) {
            $query->where('code', 'like', '%' . $request->input('searchVoucher') . '%');
        }

        // Retrieve vouchers
        $vouchers = $query->get();

        return view('admin.vouchers.index', compact('vouchers'));
    }


    public function create()
    {
        return view('admin.vouchers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:vouchers,code',
            'discount_amount' => 'nullable|numeric|min:0',
            'discount_percent' => 'nullable|integer|min:0|max:100',
            'valid_from' => 'nullable|date',
            'valid_to' => 'nullable|date|after_or_equal:valid_from',
            'usage_limit' => 'nullable|integer|min:1',
        ]);

        try {
            Voucher::create($request->all());
        } catch (\Exception $e) {
            return redirect()->route('admin.vouchers.index')->withErrors(['error' => 'Lỗi khi tạo voucher.']);
        }

        return redirect()->route('admin.vouchers.index')->with('success', 'Voucher đã được tạo thành công!');
    }


    public function edit($id)
    {
        $voucher = Voucher::findOrFail($id);
        return view('admin.vouchers.edit', compact('voucher'));
    }

    public function update(Request $request, $id)
    {
        $voucher = Voucher::findOrFail($id);

        $request->validate([
            'code' => 'required|unique:vouchers,code,' . $id,
            'discount_amount' => 'nullable|numeric|min:0',
            'discount_percent' => 'nullable|integer|min:0|max:100',
            'valid_from' => 'nullable|date',
            'valid_to' => 'nullable|date|after_or_equal:valid_from',
            'usage_limit' => 'nullable|integer|min:1',
        ]);

        $voucher->update($request->all());

        return redirect()->route('admin.vouchers.index')->with('success', 'Voucher đã được cập nhật!');
    }

    public function destroy($id)
    {
        $voucher = Voucher::findOrFail($id);
        $voucher->delete();

        return redirect()->route('admin.vouchers.index')->with('success', 'Voucher đã được xóa!');
    }

    public function applyVoucher(Request $req)
    {
        $cus_id = auth('cus')->id();
        $voucherCode = $req->input('voucher_code');

        // Tìm voucher
        $voucher = Voucher::where('code', $voucherCode)->first();

        if (!$voucher) {
            return redirect()->back()->with('no', 'Mã voucher không hợp lệ');
        }

        // Kiểm tra thời hạn
        if ($voucher->valid_to && $voucher->valid_to < now()) {
            return redirect()->back()->with('no', 'Phiếu giảm giá này đã hết hạn');
        }

        // Kiểm tra giới hạn sử dụng
        if ($voucher->usage_limit !== null && $voucher->used_count >= $voucher->usage_limit) {
            return redirect()->back()->with('no', 'Phiếu giảm giá này đã được sử dụng hết');
        }

        // Tính toán giảm giá
        $totalAmount = session('totalAmount', 0);
        if ($totalAmount <= 0) {
            return redirect()->back()->with('no', 'Không có sản phẩm trong giỏ hàng để áp dụng mã giảm giá');
        }

        $discount = 0;
        if ($voucher->discount_amount) {
            $discount = $voucher->discount_amount;
        } elseif ($voucher->discount_percent) {
            $discount = ($totalAmount * $voucher->discount_percent) / 100;
        }
        $discount = min($discount, $totalAmount);

        $newTotalAmount = $totalAmount - $discount;

        // Lưu vào session
        session([
            'voucher_code' => $voucherCode,
            'voucher_discount' => $discount,
            'newTotalAmount' => $newTotalAmount,
        ]);

        // Giảm số lần sử dụng
        $voucher->increment('used_count');

        return redirect()->back()->with('ok', 'Voucher được áp dụng thành công');
    }
}
