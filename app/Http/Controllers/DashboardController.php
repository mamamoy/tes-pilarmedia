<?php

namespace App\Http\Controllers;

use App\DataTables\ProductsDataTable;
use App\Http\Resources\ProductResource;
use App\Http\Resources\SalesPersonResource;
use App\Http\Resources\SalesResource;
use App\Models\Products;
use App\Models\Sales;
use App\Models\SalesPersons;
use App\Models\SalesProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{

    public function getProducts(Request $request)
    {
        // dd($data = Sales::with(['salesProduct.product', 'salesPerson'])->first());
        if ($request->ajax()) {
            $data = Sales::with('salesPerson')->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('dashboard.edit', $row->SalesID);
                    $deleteUrl = route('dashboard.destroy', $row->SalesID);

                    $editBtn = '<a href="' . $editUrl . '" class="edit btn btn-success btn-sm">Edit</a>';
                    $deleteBtn = '
                        <form method="POST" action="' . $deleteUrl . '">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')">Delete</button>
                        </form>
                    ';

                    return $editBtn . ' ' . $deleteBtn;
                })


                ->addColumn('SalesPersonID', function ($query) {
                    return $query->salesPerson->SalesPersonName;
                })
                ->addColumn('SalesAmount', function ($query) {
                    return '$ ' . $query->SalesAmount;
                })
                ->addColumn('created_at', function ($query) {
                    return $query->created_at->format('d-m-Y H:i:s');
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
                $data = [
            'top10HighestSales' => Sales::with(['salesPerson', 'salesProduct.product'])
                ->orderBy('SalesAmount', 'desc')
                ->limit(10)
                ->get(),
            'top10LowestSales' => Sales::with(['salesPerson', 'salesProduct.product'])
                ->orderBy('SalesAmount', 'asc')
                ->limit(10)
                ->get(),
            'products' => ProductResource::collection(Products::all()),
            'salesPersons' => SalesPersonResource::collection(SalesPersons::all()),
        ];

        // dd($data);
        return view('dashboard.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $sales = $request->validate([
            'SalesPersonID' => 'required',
            'ProductID' => 'required'
        ]);

        $productIds = $request->input('ProductID');
        $total = Products::whereIn('ProductID', $productIds)->sum('ProductPrice');

        $salesCode = null;
        if (Sales::count() == 0) {
            $salesCode = 'S-1';
        } else {
            $number = Sales::count() + 1;
            $salesCode = 'S-' . $number;
        }

        $sales = Sales::create([
            'SalesCode' => $salesCode,
            'SalesPersonID' => $request->SalesPersonID,
            'SalesAmount' => $total,
        ]);

        foreach ($productIds as $productId) {
            SalesProducts::create([
                'SalesID' => $sales->SalesID,
                'ProductID' => $productId,
            ]);
        }

        if ($sales) {
            return redirect()->route('dashboard.index')->with('success', 'Saved');
        } else {
            return redirect()->route('dashboard.index')->with('error', 'Error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sales = Sales::findOrFail($id);

        $data = [
            'sales' => $sales,
            'salesPersons' => SalesPersonResource::collection(SalesPersons::all()),
            'products' => ProductResource::collection(Products::all()),
            'productIDs' => SalesProducts::where('SalesID', $id)->pluck('ProductID')->toArray(),
            'salesPersonID' => $sales->SalesPersonID,
        ];
        // dd($data);

        return view('dashboard.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sales = $request->validate([
            'SalesPersonID' => 'required',
            'ProductID' => 'required'
        ]);

        $sales = Sales::where('SalesID', $id)->first();
        $productIds = $request->input('ProductID');
        $total = Products::whereIn('ProductID', $request->input('ProductID'))->sum('ProductPrice');

        $sales->update([
            'SalesPersonID' => $request->SalesPersonID,
            'SalesAmount' => $total,
        ]);

        $oldSalesProducts = SalesProducts::where('SalesID', $sales->SalesID)->get();

        foreach ($oldSalesProducts as $salesProduct) {
            $salesProduct->delete();
        }

        foreach ($productIds as $productId) {
            SalesProducts::create([
                'SalesID' => $sales->SalesID,
                'ProductID' => $productId,
            ]);
        }

        if ($sales) {
            return redirect()->route('dashboard.index')->with('success', 'Saved');
        } else {
            return back()->with('error', 'Error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sales = Sales::where('SalesID', $id)->first();
        $sales->delete();

        return redirect()->route('dashboard.index')->with('success', 'Deleted');
    }
}
