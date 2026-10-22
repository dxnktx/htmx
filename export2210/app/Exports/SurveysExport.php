<?php

namespace App\Exports;

use App\Models\Survey;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SurveysExport implements FromQuery, ShouldAutoSize, WithHeadings, WithMapping, WithStyles
{
    private int $rowNumber = 0;

    public function __construct(private readonly Request $request)
    {
    }

    public function query()
    {
        return Survey::with('unit')
            ->filter($this->request)
            ->latest();
    }

    /**
     * @return list<string>
     */
    public function headings(): array
    {
        return [
            'STT',
            'Họ và tên',
            'Đơn vị đào tạo',
            'Sinh viên năm',
            'Chỗ ở hiện tại',
            'Hoàn cảnh gia đình',
            'Tỉnh về quê',
            'Thời gian khởi hành',
            'Hình thức hỗ trợ',
            'Ngày gửi',
        ];
    }

    /**
     * @param  Survey  $survey
     * @return list<string|int|null>
     */
    public function map($survey): array
    {
        return [
            ++$this->rowNumber,
            $survey->full_name,
            $survey->display_university,
            $survey->student_year_label,
            $survey->current_residence,
            $survey->family_situation_label,
            $survey->destination_province_label,
            $survey->departure_time_label,
            $survey->support_type_label,
            optional($survey->created_at)->format('d/m/Y H:i'),
        ];
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public function styles(Worksheet $sheet): array
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF'],
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'B91C1C'],
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ],
        ];
    }
}
