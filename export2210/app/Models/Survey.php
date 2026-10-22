<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class Survey extends Model
{
    public const OTHER = 'other';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'full_name',
        'unit_id',
        'university_other',
        'training_unit',
        'training_unit_other',
        'student_year',
        'current_residence',
        'family_situation',
        'family_situation_other',
        'destination_province',
        'departure_time',
        'support_type',
        'ip_address',
    ];

    /**
     * @return array<string, string>
     */
    public static function trainingUnits(): array
    {
        return [
            'bach_khoa' => 'Trường ĐH Bách khoa, ĐHQG-HCM',
            'kh_tu_nhien' => 'Trường ĐH Khoa học tự nhiên, ĐHQG-HCM',
            'khxh_nv' => 'Trường ĐH Khoa học Xã hội và Nhân văn, ĐHQG-HCM',
            'cntt' => 'Trường ĐH Công nghệ Thông tin, ĐHQG-HCM',
            'quoc_te' => 'Trường ĐH Quốc tế, ĐHQG-HCM',
            'kinh_te_luat' => 'Trường ĐH Kinh tế - Luật, ĐHQG-HCM',
            'suc_khoe' => 'Trường ĐH Khoa học Sức khoẻ, ĐHQG-HCM',
            self::OTHER => 'Khác',
        ];
    }

    /**
     * @return array<string, string>
     */
    public static function studentYears(): array
    {
        return [
            'year_1' => 'Năm 1',
            'year_2' => 'Năm 2',
            'year_3' => 'Năm 3',
            'year_4' => 'Năm 4',
            'year_5' => 'Năm 5',
            self::OTHER => 'Khác',
        ];
    }

    /**
     * @return array<string, string>
     */
    public static function familySituations(): array
    {
        return [
            'poor' => 'Hộ nghèo (Có sổ hộ nghèo)',
            'near_poor' => 'Hộ cận nghèo (Có sổ hộ cận nghèo)',
            'hardship' => 'Có hoàn cảnh khó khăn (Có giấy xác nhận của địa phương)',
            'storm_flood' => 'Bị ảnh hưởng bởi bão, lũ',
            self::OTHER => 'Khác',
        ];
    }

    /**
     * @return array<string, string>
     */
    public static function provinces(): array
    {
        return [
            'lam_dong' => 'Lâm Đồng (Bình Thuận, Đăk Nông cũ)',
            'khanh_hoa' => 'Khánh Hoà (Ninh Thuận, Khánh Hoà cũ)',
            'dak_lak' => 'Đăk Lăk (Phú Yên, Đăk Lăk cũ)',
            'gia_lai' => 'Gia Lai (Bình Định, Gia Lai cũ)',
            'quang_ngai' => 'Quảng Ngãi (KonTum, Quảng Ngãi cũ)',
            'da_nang' => 'Đà Nẵng (Quảng Nam, Đà Nẵng cũ)',
            'hue' => 'Huế',
            'quang_tri' => 'Quảng Trị (Quảng Bình, Quảng Trị cũ)',
            'ha_tinh' => 'Hà Tĩnh',
            'nghe_an' => 'Nghệ An',
            'thanh_hoa' => 'Thanh Hoá',
            'ninh_binh' => 'Ninh Bình (Hà Nam, Ninh Bình cũ)',
            'ha_noi' => 'Hà Nội',
        ];
    }

    /**
     * @return array<string, string>
     */
    public static function departureTimes(): array
    {
        return [
            '2026-01-12_15' => '12/01 – 15/01/2026',
            '2026-01-16_21' => '16/01 – 21/01/2026',
        ];
    }

    /**
     * @return array<string, string>
     */
    public static function supportTypes(): array
    {
        return [
            'bus_seat' => 'Di chuyển bằng xe ghế ngồi theo thời gian khởi hành do Ban Tổ chức quy định',
            'ticket_cash' => 'Nhận hỗ trợ vé xe từ Ban Tổ chức (bằng tiền) để chủ động di chuyển về quê theo lịch trình cá nhân.',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function getDisplayUniversityAttribute(): ?string
    {
        return $this->unit?->name ?? $this->university_other;
    }

    public function getTrainingUnitLabelAttribute(): string
    {
        return $this->formatChoice(
            $this->training_unit,
            self::trainingUnits(),
            $this->training_unit_other
        );
    }

    public function getStudentYearLabelAttribute(): string
    {
        return self::studentYears()[$this->student_year] ?? $this->student_year;
    }

    public function getFamilySituationLabelAttribute(): string
    {
        return $this->formatChoice(
            $this->family_situation,
            self::familySituations(),
            $this->family_situation_other
        );
    }

    public function getDestinationProvinceLabelAttribute(): string
    {
        return self::provinces()[$this->destination_province] ?? $this->destination_province;
    }

    public function getDepartureTimeLabelAttribute(): string
    {
        return self::departureTimes()[$this->departure_time] ?? $this->departure_time;
    }

    public function getSupportTypeLabelAttribute(): string
    {
        return self::supportTypes()[$this->support_type] ?? $this->support_type;
    }

    public function scopeFilter(Builder $query, Request $request): Builder
    {
        return $query
            ->when(
                $request->filled('unit_id'),
                fn (Builder $builder) => $builder->where('unit_id', $request->integer('unit_id'))
            )
            ->when(
                $request->filled('destination_province'),
                fn (Builder $builder) => $builder->where('destination_province', $request->string('destination_province')->toString())
            )
            ->when(
                $request->filled('q'),
                function (Builder $builder) use ($request) {
                    $keyword = $request->string('q')->trim()->toString();

                    $builder->where('full_name', 'like', '%'.$keyword.'%');
                }
            );
    }

    /**
     * @param  array<string, string>  $options
     */
    protected function formatChoice(?string $value, array $options, ?string $other): string
    {
        if ($value === self::OTHER) {
            $detail = trim((string) $other);

            return $detail !== '' ? 'Khác: '.$detail : 'Khác';
        }

        return $options[$value] ?? (string) $value;
    }
}
