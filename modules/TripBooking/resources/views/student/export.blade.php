<div>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Sinh viên ở</th>
                <th>Mã sinh viên</th>
                <th>Tên sinh viên</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Số CCCD</th>
                <th>Số điện thoại</th>
                <th>Email</th>
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
            @foreach($students as $item)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>
                    @isset($item->rUser->uid) 
                        @if(strlen($item->rUser->uid) >= 36)
                            Ngoại trú
                        @else
                            Nội trú
                        @endif
                    @endisset
                </td>
                <td>{!! "'" . $item->ma_sinh_vien !!}</td>
                <td>{!! htmlspecialchars($item->ten_sinh_vien ?? '') !!}</td>
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
                <td>{!! htmlspecialchars($item->rUser->email  ?? '') !!}</td>
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
                <td>{!! htmlspecialchars($item->don_vi_dao_tao  ?? '') !!}</td>
                <td>{!! htmlspecialchars($item->khoa_bo_mon  ?? '') !!}</td>
                <td>{!! htmlspecialchars($item->sinh_vien_nam_thu  ?? '') !!}</td>
                <td>{!! htmlspecialchars($item->diem_trung_binh  ?? '') !!}</td>
                <td>{!! htmlspecialchars($item->thanh_tich_hoat_dong_xa_hoi  ?? '') !!}</td>
                <td>{!! htmlspecialchars($item->danh_hieu_5_tot  ?? '') !!}</td>
                <td>{!! htmlspecialchars($item->rTrip->hoan_canh_gia_dinh ?? '') !!}</td>
                <td>
                    @if(isset($item->rTrip->giay_xac_nhan))
                        {!! asset('storage/uploads/trip/' . ($item->rTrip->giay_xac_nhan ?? '../default.png')) !!}
                    @endif
                </td>
                <td>{!! htmlspecialchars($item->rTrip->hoan_canh_ban_than ?? '') !!}</td>
                <td>{!! htmlspecialchars($item->rTrip->thong_tin_nguoi_lien_he ?? '') !!}</td>
                <td>{!! $item->rTrip->so_dien_thoai_nguoi_than ?? '' !!}</td>
                <td>{!! htmlspecialchars($item->rTrip->hanh_ly_mang_theo ?? '') !!}</td>
                <td>{!! htmlspecialchars($item->rTrip->van_de_suc_khoe ?? '') !!}</td>
                <td>{!! $item->rTrip->tinh_thanh ?? '' !!}</td>
                <td>{!! htmlspecialchars($item->rTrip->dia_diem_xuong_xe ?? '') !!}</td>
                <td>{!! htmlspecialchars($item->rUser->ten_tai_khoan ?? '') !!}</td>
                <td>{!! "'" . ($item->rUser->so_tai_khoan ?? '') !!}</td>
                <td>{!! htmlspecialchars($item->rUser->ngan_hang ?? '') !!}</td>
                <td>{!! htmlspecialchars($item->rUser->chi_nhanh ?? '') !!}</td>
                @if(isset($item->rTrip))
                    <td>{!! $item->rTrip->status == '0' ? 'Chờ xét duyệt' : ($item->rTrip->status == '1' ? 'Chấp nhận' : 'Từ chối') !!}</td>
                @else
                    <td></td>
                @endif
                <td>{!! date('d/m/Y h:i:s', strtotime($item->rTrip->created_at ?? '')) !!}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>