<?php

namespace App\Http\Controllers\admin;

use App\Models\Billing;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\BilingProduct;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BillingController extends Controller
{
    public function index(){


        $bills = DB::table('billing')->orderBy('id', 'desc')->paginate(10);


            // dd($billings);
        return view('admin.billing.index',compact('bills'));
    }

    public function create(){
        $Customers=Customer::all();
        $Products=Product::all();
        return view('admin.billing.add',compact('Customers','Products'));
    }
    public function store(Request $request)
    {
        // Validate the input (uncomment this if needed)
         $request->validate([
            'date' => 'required|date',
            'name' => 'required|string',
        ]);


        $TotalBillAmount = 0;

        $customer_details =$request->input('name');
        $customers=Customer::all();
        foreach($customers as $customer){
            if($customer_details == $customer->name){
                $phone=$customer->phone;
                $email=$customer->email;
                $adr=$customer->address;
            }
        }

        // Default Value Store //
        $receive_amount = $request->input('ReceivedAmount');


      $CustomerName = $request->input('name');

        $pAt=Billing::latest()->first();
        if ($pAt && $pAt->c_id == $CustomerName) {
            $previousAmount = $pAt->bal_amt;
        } else {
            $previousAmount = 0;
        }

        $billing = Billing::create([
            'date' =>$request->input('date'),
            'c_id' => $request->input('name'),
            'mob_no' => $phone,
            'email' => $email,
            'adr' => $adr,
            'bil_amt' => 0,
            'p_amt' => 0,
            'tot_amt' => 0,
            'r_amt' => $receive_amount,
            'bal_amt' => 0,
        ]);


        foreach ($request->product as $key => $productId) {
            $qty = $request->Quantity[$key];
            $rate = $request->Rate[$key];
            $billAmount = $qty * $rate;

            // Accumulate the total bill amount
            $TotalBillAmount += $billAmount;

            BilingProduct::create([
                'date' => $billing->date,
                'b_id' => $billing->id,
                'p_id' => $productId,
                'qty' => $qty,
                'rate' => $rate,
                'amt' => $billAmount,
            ]);
        }

        if ($pAt) {
            $TotalAmount = $previousAmount + $TotalBillAmount;
        } else {
            $TotalAmount = $TotalBillAmount;
        }

        if($receive_amount){
            $BalanceAmount= $TotalAmount-$receive_amount;
        }
        else{
            $BalanceAmount= $TotalAmount;

        }

        $billing->update([
            'bil_amt' => $TotalBillAmount,
            'tot_amt'=>$TotalAmount,
            'bal_amt' => $BalanceAmount,
            'p_amt' => $previousAmount
        ]);

        // Step 4: Redirect back with a success message
        return redirect()->route('admin.billing.index')->with('success', 'Billing created successfully!');
    }



    //     $Qty=  $request->get('Quantity');
    //     $total= $request->get('Rate');
    //     $billAmount=$Qty*$total;
    //     $Amount=$billAmount;

    //     Billing::create([
    //         'date' => $request->get('date'),
    //         'name' => $request->get('name'),
    //         'prod' => $request->get('Product'),
    //         'qty' => $request->get('Quantity'),
    //         'rate' => $request->get('Rate'),
    //         'bil_amt' => $Amount,
    //         'p_amt' => $request->get('PreviousAmount'),
    //         't_amt' => $request->get('TotalAmount'),
    //         'r_amt' => $request->get('ReceivedAmount'),
    //         'bal_amt' => $request->get('BalanceAmount'),
    //     ]);
    //     return redirect()->route('admin.billing.index')->with('sucess','Billing created successfully!');
    // }

    public function edit(string $id){
        $billing=Billing::find($id);
        return view('admin.billing.edit',compact('billing'));
    }

    public function update(Request $request, string $id){
        $billing=Billing::find($id);
        $request->validate([
            // 'date'=>'required',
            // 'name'=>'required',
            // 'Product'=>'required',
            // 'Quantity'=>'required',
            // 'Rate'=>'required|integer',
            // 'BillAmount'=>'required|integer',
            // 'PreviousAmount'=>'required|integer',
            // 'TotalAmount'=>'required|integer',
            // 'ReceivedAmount'=>'required|integer',
            // 'BalanceAmount'=>'required|integer',
        ]);

        $billing->update([
            'date' => $request->get('date'),
            'name' => $request->get('Customer_id'),
            'prod' => $request->get('Product'),
            'qty' => $request->get('Quantity'),
            'rate' => $request->get('Rate'),
            'bil_amt' => $request->get('BillAmount'),
            'p_amt' => $request->get('PreviousAmount'),
            't_amt' => $request->get('TotalAmount'),
            'r_amt' => $request->get('ReceivedAmount'),
            'bal_amt' => $request->get('BalanceAmount'),
        ]);
        return redirect()->route('admin.billing.index')->with('success', 'Billing updated successfully!');
    }

    public function destroy(string $id){
        $billing=Billing::find($id);
        $billing->destroy();
        return redirect()->route('admin.billing.index');
    }

    public function show(string $id) {
        $bill = Billing::find($id);

        // Check if the billing record exists
        if (!$bill) {
            return redirect()->back()->with('error', 'Billing record not found.');
        }

        $billings = DB::table('billing')
            ->leftJoin('billing_products', 'billing.id', '=', 'billing_products.b_id')
            ->where('billing.id', $id) // Filter by the specific ID
            ->select('billing.*', 'billing_products.*')
            ->orderBy('billing.id', 'desc') // Sort by ID in descending order
            ->get();

        return view('admin.billing.show', compact('bill', 'billings'));
    }

    public function search_data(Request $request)
    {
        $searchQuery=$request->input('search');

        $records=Billing::where(function($query) use ($searchQuery) {
        $query->where('mob_no','LIKE',"%{$searchQuery}%")
        ->orWhere('c_id','LIKE',"%{$searchQuery}%");
        })->paginate(8);

        return view('admin.billing.view',compact('searchQuery','records'));

    }
}



