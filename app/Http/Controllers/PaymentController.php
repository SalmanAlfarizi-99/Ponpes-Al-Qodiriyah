<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentType;
use App\Models\Santri;
use App\Models\AuditLog;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:payments.view')->only(['index', 'show']);
        $this->middleware('permission:payments.create')->only(['create', 'store']);
        $this->middleware('permission:payments.edit')->only(['edit', 'update']);
        $this->middleware('permission:payments.delete')->only(['destroy']);
    }

    public function index(Request $request)
    {
        $query = Payment::with(['santri', 'paymentType', 'recorder']);

        if ($request->filled('search')) {
            $query->whereHas('santri', function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%")
                  ->orWhere('nis', 'like', "%{$request->search}%");
            });
        }

        if ($request->filled('payment_type_id')) {
            $query->where('payment_type_id', $request->payment_type_id);
        }

        if ($request->filled('month')) {
            $query->where('month', $request->month);
        }

        if ($request->filled('year')) {
            $query->where('year', $request->year);
        }

        $payments = $query->orderBy('payment_date', 'desc')->paginate(15)->withQueryString();
        $paymentTypes = PaymentType::active()->get();
        
        // Summary
        $totalAmount = Payment::whereMonth('payment_date', Carbon::now()->month)
            ->whereYear('payment_date', Carbon::now()->year)
            ->sum('amount');

        return view('payments.index', compact('payments', 'paymentTypes', 'totalAmount'));
    }

    public function create()
    {
        $santri = Santri::active()->orderBy('name')->get();
        $paymentTypes = PaymentType::active()->get();
        $receiptNumber = Payment::generateReceiptNumber();
        
        return view('payments.create', compact('santri', 'paymentTypes', 'receiptNumber'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'santri_id' => 'required|exists:santri,id',
            'payment_type_id' => 'required|exists:payment_types,id',
            'amount' => 'required|numeric|min:0',
            'month' => 'nullable|integer|between:1,12',
            'year' => 'required|integer|min:2020',
            'payment_date' => 'required|date',
            'receipt_number' => 'nullable|unique:payments,receipt_number',
            'payment_method' => 'required|in:cash,transfer,other',
            'notes' => 'nullable|string',
        ]);

        $validated['recorded_by'] = auth()->id();
        $validated['receipt_number'] = $validated['receipt_number'] ?? Payment::generateReceiptNumber();

        $payment = Payment::create($validated);

        AuditLog::log('create', $payment, null, $payment->toArray());

        return redirect()->route('payments.index')
            ->with('success', 'Pembayaran berhasil dicatat.');
    }

    public function show(Payment $payment)
    {
        $payment->load(['santri', 'paymentType', 'recorder']);
        return view('payments.show', compact('payment'));
    }

    public function edit(Payment $payment)
    {
        $santri = Santri::active()->orderBy('name')->get();
        $paymentTypes = PaymentType::active()->get();
        
        return view('payments.edit', compact('payment', 'santri', 'paymentTypes'));
    }

    public function update(Request $request, Payment $payment)
    {
        $validated = $request->validate([
            'santri_id' => 'required|exists:santri,id',
            'payment_type_id' => 'required|exists:payment_types,id',
            'amount' => 'required|numeric|min:0',
            'month' => 'nullable|integer|between:1,12',
            'year' => 'required|integer|min:2020',
            'payment_date' => 'required|date',
            'payment_method' => 'required|in:cash,transfer,other',
            'notes' => 'nullable|string',
        ]);

        $oldValues = $payment->toArray();
        $payment->update($validated);

        AuditLog::log('update', $payment, $oldValues, $payment->fresh()->toArray());

        return redirect()->route('payments.index')
            ->with('success', 'Pembayaran berhasil diperbarui.');
    }

    public function destroy(Payment $payment)
    {
        $oldValues = $payment->toArray();
        $payment->delete();

        AuditLog::log('delete', $payment, $oldValues, null);

        return redirect()->route('payments.index')
            ->with('success', 'Pembayaran berhasil dihapus.');
    }
}
