@extends('mhs.mahasiswa')
@section('content')
Mahasiswa
<h1 class="mb-3 h3">
    {{-- Ketua Program Studi --}}
    Notifikasi
</h1>

<div class="p-2 table_component rounded-4" role="region" tabindex="0">

    <!-- Tombol Mark All as Read -->
    <div class="text-end mb-3">
        <button class="btn btn-sm btn-secondary" id="markAllRead">Tandai Semua Dibaca</button>
    </div>

    <!-- Notifikasi List -->
    <div class="row">
        <div class="col-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">

                    <h5 class="px-3 py-2 mb-0 card-title">Daftar Notifikasi</h5>
                </div>
        <div class="card-body p-2 my-0 table-hover">
            
            @php
                $notifications = [
                    ['id' => 1, 'message' => 'Surat Keterangan Lulus telah selesai!', 'date' => '11 Maret 2025', 'status' => 'unread'],
                    ['id' => 2, 'message' => 'Surat Pengantar Tugas masih menunggu ACC Kaprodi.', 'date' => '9 Maret 2025', 'status' => 'unread'],
                    ['id' => 3, 'message' => 'Surat Keterangan Mahasiswa Aktif sedang dibuat oleh MO.', 'date' => '8 Maret 2025', 'status' => 'read'],
                    ['id' => 4, 'message' => 'Surat Laporan Hasil Studi telah selesai dibuat.', 'date' => '7 Maret 2025', 'status' => 'read'],
                ];
            @endphp

            @foreach ($notifications as $notif)
            <div class="notification-item d-flex justify-content-between align-items-center p-3 mb-2 rounded 
                {{ $notif['status'] == 'unread' ? 'bg-light' : 'bg-white' }}" 
                data-id="{{ $notif['id'] }}">
                
                <div>
                    <strong>{{ $notif['message'] }}</strong>
                    <p class="text-muted small">{{ $notif['date'] }}</p>
                </div>
                
                <div>
                    @if($notif['status'] == 'unread')
                        <button class="btn btn-sm btn-success mark-read">Tandai Dibaca</button>
                    @endif
                    <button class="btn btn-sm btn-danger delete-notif">Hapus</button>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>

@endsection

@section('ExtraJS')
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Mark a single notification as read
    document.querySelectorAll(".mark-read").forEach(button => {
        button.addEventListener("click", function() {
            let notifItem = this.closest(".notification-item");
            notifItem.classList.remove("bg-light");
            notifItem.classList.add("bg-white");
            this.remove();
        });
    });

    // Delete a notification
    document.querySelectorAll(".delete-notif").forEach(button => {
        button.addEventListener("click", function() {
            let notifItem = this.closest(".notification-item");
            notifItem.remove();
        });
    });

    // Mark all as read
    document.getElementById("markAllRead").addEventListener("click", function() {
        document.querySelectorAll(".notification-item").forEach(item => {
            item.classList.remove("bg-light");
            item.classList.add("bg-white");
            let markReadBtn = item.querySelector(".mark-read");
            if (markReadBtn) markReadBtn.remove();
        });
    });
});
</script>
@endsection
