@extends('admin.layout')

@section('title', 'Quản lý Voucher')

@section('content')

    <form action="{{ route('admin.vouchers.index') }}" method="GET" class="form-inline" role="form">
        @csrf
        <div class="form-group">
            <label for="searchVoucher" class="sr-only">Voucher Code</label>
            <input type="text" class="form-control" id="searchVoucher" name="searchVoucher" placeholder="Search Voucher"
                value="{{ request()->input('searchVoucher') }}">
        </div>
        <button type="submit" class="btn btn-primary" aria-label="Search">
            <i class="fa fa-search" style="font-size: 18px; color: rgb(0, 0, 0);"></i>
        </button>
        <a href="{{ route('admin.vouchers.create') }}" class="btn btn-success ml-auto" title="Add new Voucher">
            <i class="fa fa-plus"></i> Add new
        </a>
    </form>


    <br>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Mã Voucher</th>
                    <th>Số Tiền Giảm Giá</th>
                    <th>Phần Trăm Giảm Giá</th>
                    <th>Ngày Áp Dụng</th>
                    <th>Ngày Hết Hạn</th>
                    <th>Số Lần Sử Dụng</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vouchers as $voucher)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $voucher->code }}</td>
                        <td>{{ $voucher->discount_amount }}</td>
                        <td>{{ $voucher->discount_percent }}%</td>
                        <td>{{ $voucher->valid_from }}</td>
                        <td>{{ $voucher->valid_to }}</td>
                        <td>{{ $voucher->usage_limit - $voucher->used_count }}</td>
                        <td class="text-right">
                            <a href="{{ route('admin.vouchers.edit', $voucher->id) }}" class="btn btn-sm btn-primary"
                                title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.vouchers.destroy', $voucher->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                    onclick="return confirm('Are you sure you want to delete this voucher?')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
