<?php

namespace Tests\Unit;

use App\Exports\SurveysExport;
use App\Models\Survey;
use App\Models\Unit;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Tests\TestCase;

class SurveysExportTest extends TestCase
{
    public function test_it_exports_the_requested_headings_and_maps_rows_with_sequential_numbers(): void
    {
        $export = new SurveysExport(Request::create('/'));
        $survey = new Survey([
            'full_name' => 'Nguyen Van A',
            'university_other' => 'Trường Đại học thử nghiệm',
            'student_year' => 'year_1',
            'current_residence' => 'KTX Khu A',
            'family_situation' => 'poor',
            'destination_province' => 'lam_dong',
            'departure_time' => '2026-01-12_15',
            'support_type' => 'bus_seat',
        ]);
        $survey->created_at = '2026-01-01 10:30:00';

        $firstRow = $export->map($survey);
        $secondRow = $export->map($survey);

        $this->assertSame([
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
        ], $export->headings());
        $this->assertSame(1, $firstRow[0]);
        $this->assertSame('Trường Đại học thử nghiệm', $firstRow[2]);
        $this->assertSame('Lâm Đồng (Bình Thuận, Đăk Nông cũ)', $firstRow[6]);
        $this->assertSame('01/01/2026 10:30', $firstRow[9]);
        $this->assertSame(2, $secondRow[0]);
    }

    public function test_it_styles_the_heading_row(): void
    {
        $export = new SurveysExport(Request::create('/'));

        $this->assertSame([
            1 => [
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF'],
                ],
                'fill' => [
                    'fillType' => 'solid',
                    'startColor' => ['rgb' => 'B91C1C'],
                ],
                'alignment' => [
                    'horizontal' => 'center',
                    'vertical' => 'center',
                ],
            ],
        ], $export->styles(new Worksheet()));
    }

    public function test_a_selected_unit_takes_precedence_over_the_other_university_name(): void
    {
        $survey = new Survey([
            'university_other' => 'Trường do người dùng nhập',
        ]);
        $unit = new Unit();
        $unit->setAttribute('ten_don_vi', 'Đơn vị trong danh sách');
        $survey->setRelation('unit', $unit);

        $this->assertSame('Đơn vị trong danh sách', $survey->display_university);
    }

    public function test_it_applies_the_admin_filters_to_the_export_query(): void
    {
        $export = new SurveysExport(Request::create('/', 'GET', [
            'unit_id' => '7',
            'destination_province' => 'lam_dong',
            'q' => '  Nguyen Van A  ',
        ]));

        $this->assertSame([
            7,
            'lam_dong',
            '%Nguyen Van A%',
        ], $export->query()->getBindings());
    }
}
