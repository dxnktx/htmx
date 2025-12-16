<div>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã đăng ký</th>
                <th>Mã sinh viên</th>
                <th>Tên sinh viên</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Số CCCD</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Nơi ở hiện tại</th>
                <th>CCCD mặt trước</th>
                <th>CCCD mặt sau</th>
                <th>Đơn vị đào tạo</th>
                <th>Khoa/Bộ môn</th>
                <th>Sinh viên năm thứ</th>
                <th>Điểm trung bình</th>
                <th>Thành tích hoạt động xã hội</th>
                <th>Danh hiệu 5 tốt</th>
                <th>Hoàn cảnh gia đình</th>
                <th>Giấy xác nhận</th>
                <th>Hoàn cảnh bản thân</th>
                <th>Thông tin liên hệ</th>
                <th>Số điện thoại người thân</th>
                <th>Hành lý mang theo</th>
                <th>Vấn đề sức khỏe</th>
                <th>Tỉnh thành</th>
                <th>Địa điểm xuống xe</th>
                <th>Tên tài khoản</th>
                <th>Số tài khoản</th>
                <th>Ngân hàng</th>
                <th>Chi nhánh</th>
                <th>Trạng thái</th>
                <th>Ngày đăng ký</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trips as $item)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{!! $item->rUser->uid ?? '' !!}</td>
                <td>{!! "'" . $item->ma_sinh_vien !!}</td>
                <td>{!! htmlspecialchars($item->rStudent->ten_sinh_vien ?? '') !!}</td>
                <td>
                    @isset($item->rUser->gioi_tinh)
                        {!! htmlspecialchars($item->rUser->gioi_tinh == '1' ? 'Nam' : 'Nữ') !!}
                    @endisset
                </td>
                <td>
                    @isset($item->rUser->ngay_sinh)
                        {!! htmlspecialchars(date('d/m/Y', strtotime($item->rUser->ngay_sinh))) !!}
                    @endisset
                </td>
                <td>{!! htmlspecialchars($item->rUser->so_cccd  ?? '') !!}</td>
                <td>{!! htmlspecialchars($item->rUser->so_dien_thoai  ?? '') !!}</td>
                <td>{!! htmlspecialchars($item->rUser->dia_chi  ?? '') !!}</td>
                <td>{!! htmlspecialchars($item->rUser->noi_o_hien_tai  ?? '') !!}</td>
                <td>                    
                    @if(isset($item->rUser->cccd_mat_truoc))
                        {!! htmlspecialchars(asset('storage/uploads/user/' . ($item->rUser->cccd_mat_truoc ?? '../default.png'))) !!}
                    @endif
                </td>
                <td>
                    @if(isset($item->rUser->cccd_mat_sau))
                    {!! htmlspecialchars(asset('storage/uploads/user/' . ($item->rUser->cccd_mat_sau ?? '../default.png'))) !!}
                    @endif
                </td>
                <td>{!! htmlspecialchars($item->rStudent->don_vi_dao_tao  ?? '') !!}</td>
                <td>{!! htmlspecialchars($item->rStudent->khoa_bo_mon  ?? '') !!}</td>
                <td>{!! htmlspecialchars($item->rStudent->sinh_vien_nam_thu  ?? '') !!}</td>
                <td>{!! htmlspecialchars($item->rStudent->diem_trung_binh  ?? '') !!}</td>
                <td>{!! htmlspecialchars($item->rStudent->thanh_tich_hoat_dong_xa_hoi  ?? '') !!}</td>
                <td>{!! htmlspecialchars($item->rStudent->danh_hieu_5_tot  ?? '') !!}</td>
                <td>{!! htmlspecialchars($item->hoan_canh_gia_dinh) !!}</td>
                <td>
                    @if(isset($item->giay_xac_nhan))
                        {!! asset('storage/uploads/trip/' . ($item->giay_xac_nhan ?? '../default.png')) !!}
                    @endif
                </td>
                <td>{!! htmlspecialchars($item->hoan_canh_ban_than) !!}</td>
                <td>{!! htmlspecialchars($item->thong_tin_nguoi_lien_he ?? '') !!}</td>
                <td>{!! $item->so_dien_thoai_nguoi_than ?? '' !!}</td>
                <td>{!! htmlspecialchars($item->hanh_ly_mang_theo) !!}</td>
                <td>{!! htmlspecialchars($item->van_de_suc_khoe) !!}</td>
                <td>{!! $item->tinh_thanh !!}</td>
                <td>{!! htmlspecialchars($item->dia_diem_xuong_xe) !!}</td>
                <td>{!! htmlspecialchars($item->rUser->ten_tai_khoan ?? '') !!}</td>
                <td>{!! "'" . ($item->rUser->so_tai_khoan ?? '') !!}</td>
                <td>{!! htmlspecialchars($item->rUser->ngan_hang ?? '') !!}</td>
                <td>{!! htmlspecialchars($item->rUser->chi_nhanh ?? '') !!}</td>
                <td>{!! $item->status == '0' ? 'Chờ xét duyệt' : ($item->status == '1' ? 'Chấp nhận' : 'Từ chối') !!}</td>
                <td>{!! date('d/m/Y h:i:s', strtotime($item->created_at)) !!}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>