@extends('layouts.menuHalamanUser')
@section('pageTitle')
    <h2>Rekapan Presensi</h2>
@endsection
@section('content')
    <div class="section full mt-2  mb-5">
        <div class="section-title">Title</div>
        <div class="wide-block pt-2 pb-2">
            <div class="row">
                <div class="col">
                    <form action="{{ route('dashboard.rekapan') }}" method="get">
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label for="bulan">Inputkan Bulan dan Tahunnya Pada Inputan Dibawah</label>
                            <br />
                                <input type="month" class="form-control" name="bulan" id="bulan" placeholder="Password"
                                    autocomplete="off">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            <div class="icon-box bg-primary">
                                <ion-icon name="search-circle-outline"></ion-icon>
                            </div>Tampilkan
                        </button>
                    </form>
                </div>
            </div>
            @if ($bulans !== null)
                <div class="tab-content mt-2" style="margin-bottom:100px;">
                    <div class="tab-pane fade show active" id="home" role="tabpanel">
                        <h2>Rekapan Absensi Bulan {{ $bulanIni }} Tahun {{ $tahunIni }}</h2>
                        <ul class="listview image-listview">
                            <li>
                                <div class="item">
                                    <div class="icon-box">
                                        <ion-icon name="bookmark-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>
                                            Tanggal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;<span>Status
                                                | &nbsp;</span><span>Jam Absen</span></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <ul class="listview image-listview">
                            @forelse ($bulans as $item)
                                <li>
                                    <div class="item">
                                        @if ($item->created_at->format('H:i:s') < '08:00:00')
                                            <div class="icon-box bg-primary">
                                                <ion-icon name="checkmark-circle-outline"></ion-icon>
                                            </div>
                                        @else
                                            <div class="icon-box bg-danger">
                                                <ion-icon name="alarm-outline"></ion-icon>
                                            </div>
                                        @endif
                                        <div class="in">
                                            <div>{{ $item->created_at->format('d-m-Y') }} &nbsp;
                                                @if ($item->status_absensi === "2")
                                            <span class="badge badge-info">Cuti</span>
                                            @elseif($item->status_absensi === "3")
                                            <span class="badge badge-info">Sakit</span>
                                            @elseif($item->status_absensi === "4")
                                            <span class="badge badge-info">Izin</span>
                                            @elseif($item->status_absensi === '5')
                                            <span class="badge badge-success">Hari Libur</span>
                                            @elseif($item->status_absensi === '6')
                                            <span class="badge badge-secondary">Tidak Ada Jadwal</span>
                                            @elseif($item->status_absensi === '7')
                                            <span class="badge badge-secondary">Pengajuan Izin Ditolak</span>
                                            @elseif($item->status_absensi === "1")
                                                @if ($item->created_at->format('H:i:s') < '08:00:00')
                                                <span class="badge badge-success">Hadir</span>
                                                @else
                                                <span class="badge badge-warning">Terlambat</span>
                                                @endif
                                                &nbsp;
                                                <span class="badge badge-info">{{ $item->created_at->format('H:i:s') }}</span>
                                            @else
                                            <span class="badge badge-danger">Alfa</span>    
                                            @endif
                                                &nbsp;
                                                <span
                                                    class="badge badge-info">{{ $item->created_at->format('H:i:s') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <h1>Belum Ada Absen</h1>
                            @endforelse
                        </ul>
                    </div>

                </div>
            @endif
        </div>
    </div>
@stop
@push('js')
@endpush
