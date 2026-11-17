<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;
use Illuminate\Database\Eloquent\Builder;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $equipment = $this->filteredEquipment($request)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('reports.index', compact('equipment'));
    }

    public function exportCsv(Request $request)
    {
    $equipment = $this->filteredEquipment($request)
        ->orderBy('equipment_name')
        ->get();

    return response()->streamDownload(function () use ($equipment) {

        $handle = fopen('php://output', 'w');

        fwrite($handle, "\xEF\xBB\xBF");

        fputcsv($handle, [
            'Equipment ID',
            'Equipment Name',
            'Category',
            'Unit Price',
            'Description',
            'Availability Status',
        ], ',', '"', '');

        foreach ($equipment as $item) {
            fputcsv($handle, [
                $item->id,
                $item->equipment_name,
                $item->category,
                $item->unit_price,
                $item->description,
                $item->availability_status,
            ], ',', '"', '');
        }

        fclose($handle);

    }, 'equipment_report.csv', [
        'Content-Type' => 'text/csv; charset=UTF-8',
    ]);
    }

    public function exportPdf(Request $request)
    {
    $equipment = $this->filteredEquipment($request)
        ->orderBy('equipment_name')
        ->get();

    $data = [
        'equipment' => $equipment,
        'category' => $request->category,
        'availability_status' => $request->availability_status,
        'generatedAt' => now(),
    ];

    $pdf = Pdf::loadView('reports.pdf', $data);

    return $pdf->download('equipment_report.pdf');
    }
    private function filteredEquipment(Request $request): Builder
    {
        $query = Equipment::query();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('availability_status')) {
            $query->where('availability_status', $request->availability_status);
        }

        return $query;
    }
}
