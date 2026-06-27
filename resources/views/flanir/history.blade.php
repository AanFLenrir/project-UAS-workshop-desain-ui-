<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FLANIR - History Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
        * { font-family: 'Plus Jakarta Sans', sans-serif; }
        body { background: #f1f5f9; }
        .sidebar-transition { transition: all .3s ease; }
        .status-badge { font-size: 0.6rem; letter-spacing: 0.05em; }
        .transaction-card { transition: all 0.2s ease; }
        .transaction-card:hover { transform: translateY(-2px); box-shadow: 0 8px 25px -8px rgba(0,0,0,0.08); }
        .detail-row { display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid #f1f5f9; }
        .detail-row:last-child { border-bottom: none; }
        .detail-label { font-weight: 600; color: #475569; font-size: 0.85rem; }
        .detail-value { color: #0f172a; font-weight: 500; font-size: 0.9rem; }
        .modal-overlay { background: rgba(15, 23, 42, 0.5); backdrop-filter: blur(4px); }
        .fade-in { animation: fadeIn 0.3s ease forwards; }
        @keyframes fadeIn { 0% { opacity: 0; transform: translateY(8px); } 100% { opacity: 1; transform: translateY(0); } }
        .menu-active { background: #f3e8ff; color: #7c3aed; font-weight: 700; }
    </style>
</head>
<body>

<div class="flex min-h-screen">

    <!-- ==================== SIDEBAR ==================== -->
    <aside id="sidebar" class="sidebar-transition w-72 bg-white border-r border-slate-200 flex flex-col shadow-sm">

        <!-- LOGO -->
        <div class="h-24 flex items-center justify-between px-6 border-b">
            <div id="logoText">
                <h1 class="text-4xl font-black text-purple-600">FLANIR</h1>
                <p class="text-slate-500 text-sm">Klinik Hewan Modern</p>
            </div>
            <button onclick="toggleSidebar()" class="bg-purple-100 text-purple-600 w-10 h-10 rounded-xl hover:bg-purple-200">
                ☰
            </button>
        </div>

        <!-- MENU -->
        <nav class="flex-1 p-5 space-y-2">

            <a href="{{ route('flanir.dashboard') }}"
               class="flex items-center gap-4 px-4 py-4 rounded-2xl hover:bg-slate-100 transition">
                🏠 <span class="menu-text">Dashboard</span>
            </a>

            <a href="{{ route('flanir.layanan') }}"
               class="flex items-center gap-4 px-4 py-4 rounded-2xl hover:bg-slate-100 transition">
                🐶 <span class="menu-text">Layanan</span>
            </a>

            <a href="{{ route('flanir.konsultasi') }}"
               class="flex items-center gap-4 px-4 py-4 rounded-2xl hover:bg-slate-100 transition">
                📋 <span class="menu-text">Konsultasi</span>
            </a>

            <a href="{{ route('flanir.pembayaran') }}"
               class="flex items-center gap-4 px-4 py-4 rounded-2xl hover:bg-slate-100 transition">
                💳 <span class="menu-text">Pembayaran</span>
            </a>

            <!-- ⭐ HISTORY TRANSAKSI (aktif) -->
            <a href="{{ route('flanir.history') }}"
               class="flex items-center gap-4 px-4 py-4 rounded-2xl menu-active transition">
                📜 <span class="menu-text">History Transaksi</span>
            </a>

            <a href="{{ route('flanir.chat', 1) }}"
               class="flex items-center gap-4 px-4 py-4 rounded-2xl hover:bg-slate-100 transition">
                💬 <span class="menu-text">Chat Dokter</span>
            </a>

            <a href="{{ route('flanir.akun') }}"
               class="flex items-center gap-4 px-4 py-4 rounded-2xl hover:bg-slate-100 transition">
                👤 <span class="menu-text">Akun Saya</span>
            </a>

        </nav>

        <!-- PROFILE -->
        <div class="p-5 border-t">
            <div class="bg-purple-50 rounded-3xl p-4">
                <div class="flex items-center gap-3">
                    <div class="w-14 h-14 rounded-full bg-purple-600 text-white flex items-center justify-center text-xl font-bold">
                        SP
                    </div>
                    <div id="profileText">
                        <h4 class="font-bold">Sarah Putri</h4>
                        <p class="text-sm text-slate-500">Pasien</p>
                    </div>
                </div>
                <a href="{{ route('flanir.logout') }}"
                   class="block mt-4 bg-red-500 text-white text-center py-3 rounded-2xl font-bold hover:bg-red-600 transition">
                    Logout
                </a>
            </div>
        </div>

    </aside>

    <!-- ==================== MAIN ==================== -->
    <div class="flex-1">

        <!-- TOPBAR -->
        <header class="bg-white border-b px-10 py-6 flex justify-between items-center">
            <div>
                <h2 class="text-3xl font-black">History Transaksi</h2>
                <p class="text-slate-500">Riwayat & kelola transaksi Anda</p>
            </div>
            <div class="flex items-center gap-4">
                <div class="text-right">
                    <h4 class="font-bold">Sarah Putri</h4>
                    <p class="text-sm text-slate-500">Pasien</p>
                </div>
                <img src="https://ui-avatars.com/api/?name=Sarah+Putri&background=8A56F2&color=fff"
                     class="w-12 h-12 rounded-full">
            </div>
        </header>

        <!-- ========== CONTENT ========== -->
        <main class="p-8">

            <!-- Tombol Kelola & info -->
            <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
                <div class="flex items-center gap-3">
                    <h3 class="text-xl font-bold text-slate-800">📜 Riwayat Transaksi</h3>
                    <span class="bg-purple-100 text-purple-700 text-xs font-bold px-3 py-1 rounded-full" id="totalCount">8 transaksi</span>
                </div>
                <button onclick="openManageModal()" class="bg-purple-600 text-white px-5 py-2.5 rounded-xl text-sm font-semibold hover:bg-purple-700 transition shadow-lg shadow-purple-200/50 flex items-center gap-2">
                    ⚙️ Kelola Transaksi
                </button>
            </div>

            <!-- FILTER -->
            <div class="flex flex-wrap items-center gap-3 mb-6">
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Filter:</span>
                <button onclick="filterTransactions('all')" class="filter-btn px-4 py-1.5 rounded-full text-xs font-semibold bg-purple-600 text-white">Semua</button>
                <button onclick="filterTransactions('Vaksinasi')" class="filter-btn px-4 py-1.5 rounded-full text-xs font-semibold bg-slate-100 text-slate-600 hover:bg-slate-200">Vaksinasi</button>
                <button onclick="filterTransactions('Grooming')" class="filter-btn px-4 py-1.5 rounded-full text-xs font-semibold bg-slate-100 text-slate-600 hover:bg-slate-200">Grooming</button>
                <button onclick="filterTransactions('Konsultasi')" class="filter-btn px-4 py-1.5 rounded-full text-xs font-semibold bg-slate-100 text-slate-600 hover:bg-slate-200">Konsultasi</button>
                <button onclick="filterTransactions('Operasi')" class="filter-btn px-4 py-1.5 rounded-full text-xs font-semibold bg-slate-100 text-slate-600 hover:bg-slate-200">Operasi</button>
                <button onclick="filterTransactions('Perawatan')" class="filter-btn px-4 py-1.5 rounded-full text-xs font-semibold bg-slate-100 text-slate-600 hover:bg-slate-200">Perawatan</button>
                <span class="ml-auto text-xs text-slate-400" id="filterResult">Menampilkan semua (8)</span>
            </div>

            <!-- DAFTAR TRANSAKSI -->
            <div id="transactionList" class="space-y-4"></div>

            <!-- Pagination (statis) -->
            <div class="flex items-center justify-between mt-8 pt-4 border-t border-slate-200 text-sm text-slate-400">
                <span>Menampilkan 1–8 dari 8 transaksi</span>
                <div class="flex gap-2">
                    <button class="px-4 py-2 rounded-xl bg-slate-100 text-slate-400 cursor-not-allowed">←</button>
                    <button class="px-4 py-2 rounded-xl bg-purple-600 text-white font-bold">1</button>
                    <button class="px-4 py-2 rounded-xl bg-slate-100 text-slate-400 cursor-not-allowed">→</button>
                </div>
            </div>

        </main>

    </div>

</div>

<!-- ========== MODAL DETAIL ========== -->
<div id="detailModal" class="fixed inset-0 z-50 flex items-center justify-center px-4 opacity-0 pointer-events-none transition-opacity duration-300">
    <div class="modal-overlay absolute inset-0" onclick="closeDetailModal()"></div>
    <div class="relative bg-white rounded-3xl shadow-2xl max-w-lg w-full p-7 md:p-9 transform transition-all duration-300 scale-95">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-xl font-bold flex items-center gap-2">
                <span id="detailIcon">💉</span>
                <span id="detailTitle">Detail Transaksi</span>
            </h3>
            <button onclick="closeDetailModal()" class="text-slate-400 hover:text-slate-600 p-1 rounded-full hover:bg-slate-100 transition">✕</button>
        </div>
        <div class="space-y-1" id="detailContent"></div>
        <div class="flex gap-3 mt-7 pt-5 border-t">
            <button onclick="closeDetailModal()" class="flex-1 bg-slate-100 text-slate-600 py-3 rounded-xl font-semibold hover:bg-slate-200 transition">Tutup</button>
            <button onclick="closeDetailModal(); openManageModal();" class="flex-1 bg-purple-600 text-white py-3 rounded-xl font-semibold hover:bg-purple-700 transition shadow-lg shadow-purple-200/50">⚙️ Kelola</button>
        </div>
    </div>
</div>

<!-- ========== MODAL KELOLA ========== -->
<div id="manageModal" class="fixed inset-0 z-50 flex items-center justify-center px-4 opacity-0 pointer-events-none transition-opacity duration-300">
    <div class="modal-overlay absolute inset-0" onclick="closeManageModal()"></div>
    <div class="relative bg-white rounded-3xl shadow-2xl max-w-3xl w-full p-7 md:p-9 transform transition-all duration-300 scale-95 max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-xl font-bold">⚙️ Kelola Transaksi</h3>
            <button onclick="closeManageModal()" class="text-slate-400 hover:text-slate-600 p-1 rounded-full hover:bg-slate-100 transition">✕</button>
        </div>
        <p class="text-sm text-slate-500 mb-6">Kelola semua transaksi yang telah selesai. Anda dapat mengedit atau menghapus data.</p>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 text-xs uppercase font-bold text-slate-400 tracking-wider">
                    <tr>
                        <th class="px-4 py-3 text-left">Layanan</th>
                        <th class="px-4 py-3 text-left hidden sm:table-cell">Kategori</th>
                        <th class="px-4 py-3 text-left hidden md:table-cell">Tanggal</th>
                        <th class="px-4 py-3 text-left">Biaya</th>
                        <th class="px-4 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100" id="manageTableBody"></tbody>
            </table>
        </div>
        <div class="mt-6 pt-4 border-t flex justify-between items-center flex-wrap gap-3">
            <span class="text-xs text-slate-400">📌 Total: <span id="manageCount">8</span> transaksi</span>
            <button onclick="addTransaction()" class="bg-emerald-600 text-white px-5 py-2.5 rounded-xl text-sm font-semibold hover:bg-emerald-700 transition flex items-center gap-2">
                ➕ Tambah Transaksi
            </button>
        </div>
    </div>
</div>

<!-- ========== MODAL EDIT / TAMBAH ========== -->
<div id="editModal" class="fixed inset-0 z-[60] flex items-center justify-center px-4 opacity-0 pointer-events-none transition-opacity duration-300">
    <div class="modal-overlay absolute inset-0" onclick="closeEditModal()"></div>
    <div class="relative bg-white rounded-3xl shadow-2xl max-w-md w-full p-7 transform transition-all duration-300 scale-95">
        <div class="flex items-center justify-between mb-5">
            <h3 id="editModalTitle" class="text-xl font-bold">✏️ Edit Transaksi</h3>
            <button onclick="closeEditModal()" class="text-slate-400 hover:text-slate-600 p-1 rounded-full hover:bg-slate-100 transition">✕</button>
        </div>
        <form onsubmit="handleEditSubmit(event)" class="space-y-4">
            <input type="hidden" id="editIndex" value="">
            <div>
                <label class="text-xs font-bold uppercase tracking-wider text-slate-500 block mb-1.5">Nama Layanan</label>
                <input id="editService" type="text" required class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none transition">
            </div>
            <div>
                <label class="text-xs font-bold uppercase tracking-wider text-slate-500 block mb-1.5">Kategori</label>
                <select id="editCategory" class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none transition bg-white">
                    <option value="Vaksinasi">Vaksinasi</option>
                    <option value="Grooming">Grooming</option>
                    <option value="Konsultasi">Konsultasi</option>
                    <option value="Operasi">Operasi</option>
                    <option value="Perawatan">Perawatan</option>
                </select>
            </div>
            <div>
                <label class="text-xs font-bold uppercase tracking-wider text-slate-500 block mb-1.5">Biaya (Rp)</label>
                <input id="editPrice" type="number" required class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none transition">
            </div>
            <div>
                <label class="text-xs font-bold uppercase tracking-wider text-slate-500 block mb-1.5">Tanggal</label>
                <input id="editDate" type="date" required class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm focus:ring-2 focus:ring-purple-400 focus:border-transparent outline-none transition">
            </div>
            <div class="flex items-center gap-3 pt-2">
                <button type="submit" class="bg-purple-600 text-white px-6 py-3 rounded-xl text-sm font-semibold hover:bg-purple-700 transition shadow-lg shadow-purple-200/50 flex-1">💾 Simpan</button>
                <button type="button" onclick="closeEditModal()" class="px-6 py-3 rounded-xl text-sm font-medium text-slate-500 hover:bg-slate-100 transition">Batal</button>
            </div>
        </form>
    </div>
</div>

<!-- ========== JAVASCRIPT ========== -->
<script>
    // ===== SIDEBAR TOGGLE =====
    let collapsed = false;
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const logoText = document.getElementById('logoText');
        const profileText = document.getElementById('profileText');
        const menuTexts = document.querySelectorAll('.menu-text');
        collapsed = !collapsed;
        if (collapsed) {
            sidebar.classList.remove('w-72');
            sidebar.classList.add('w-24');
            logoText.style.display = 'none';
            profileText.style.display = 'none';
            menuTexts.forEach(item => item.style.display = 'none');
        } else {
            sidebar.classList.remove('w-24');
            sidebar.classList.add('w-72');
            logoText.style.display = 'block';
            profileText.style.display = 'block';
            menuTexts.forEach(item => item.style.display = 'inline');
        }
    }

    // ===== DATA TRANSAKSI =====
    let transactions = [
        { id: 'TRX-001', service: 'Vaksin Anjing (DHPPI)', icon: '💉', category: 'Vaksinasi', price: 350000, date: '2026-06-12', doctor: 'drh. Anhaz', pet: 'Anjing Golden Retriever', detail: 'DHPPI + Rabies', status: 'Selesai', displayDate: '12 Juni 2026', displayPrice: 'Rp 350.000' },
        { id: 'TRX-002', service: 'Grooming Basic (Kucing)', icon: '✂️', category: 'Grooming', price: 275000, date: '2026-06-08', doctor: 'drh. Sari', pet: 'Kucing Persia', detail: 'Mandi + Potong kuku + Bulu', status: 'Selesai', displayDate: '8 Juni 2026', displayPrice: 'Rp 275.000' },
        { id: 'TRX-003', service: 'Konsultasi Kesehatan Anjing', icon: '🩺', category: 'Konsultasi', price: 150000, date: '2026-06-02', doctor: 'drh. Budi', pet: 'Anjing Bulldog', detail: 'Pemeriksaan umum + saran nutrisi', status: 'Selesai', displayDate: '2 Juni 2026', displayPrice: 'Rp 150.000' },
        { id: 'TRX-004', service: 'Operasi Sterilisasi Kucing', icon: '🏥', category: 'Operasi', price: 850000, date: '2026-05-28', doctor: 'drh. Anhaz', pet: 'Kucing Anggora', detail: 'Sterilisasi + perawatan pasca operasi', status: 'Selesai', displayDate: '28 Mei 2026', displayPrice: 'Rp 850.000' },
        { id: 'TRX-005', service: 'Perawatan Gigi Anjing', icon: '🦷', category: 'Perawatan', price: 420000, date: '2026-05-20', doctor: 'drh. Dina', pet: 'Anjing Poodle', detail: 'Scaling gigi + polish', status: 'Selesai', displayDate: '20 Mei 2026', displayPrice: 'Rp 420.000' },
        { id: 'TRX-006', service: 'Vaksin Kucing (FVRCP)', icon: '💉', category: 'Vaksinasi', price: 320000, date: '2026-05-15', doctor: 'drh. Sari', pet: 'Kucing Kampung', detail: 'FVRCP + Rabies', status: 'Selesai', displayDate: '15 Mei 2026', displayPrice: 'Rp 320.000' },
        { id: 'TRX-007', service: 'Grooming Premium (Anjing)', icon: '✂️', category: 'Grooming', price: 450000, date: '2026-05-10', doctor: 'drh. Rizki', pet: 'Anjing Siberian Husky', detail: 'Mandi + potong bulu + styling', status: 'Selesai', displayDate: '10 Mei 2026', displayPrice: 'Rp 450.000' },
        { id: 'TRX-008', service: 'Konsultasi Perilaku Kucing', icon: '🩺', category: 'Konsultasi', price: 180000, date: '2026-05-05', doctor: 'drh. Budi', pet: 'Kucing Persia', detail: 'Konsultasi perilaku agresif + terapi', status: 'Selesai', displayDate: '5 Mei 2026', displayPrice: 'Rp 180.000' }
    ];

    let currentFilter = 'all';
    let editIndex = -1;

    // ===== FILTER =====
    function filterTransactions(category) {
        currentFilter = category;
        const cards = document.querySelectorAll('.transaction-card');
        const resultText = document.getElementById('filterResult');
        let visibleCount = 0;
        cards.forEach(card => {
            const cat = card.dataset.category;
            if (category === 'all' || cat === category) {
                card.style.display = 'flex';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.classList.remove('bg-purple-600', 'text-white');
            btn.classList.add('bg-slate-100', 'text-slate-600');
        });
        const activeBtn = document.querySelector(`.filter-btn[onclick*="'${category}'"]`);
        if (activeBtn) {
            activeBtn.classList.remove('bg-slate-100', 'text-slate-600');
            activeBtn.classList.add('bg-purple-600', 'text-white');
        }
        resultText.textContent = category === 'all' ? `Menampilkan semua (${visibleCount})` :
            `Menampilkan ${category} (${visibleCount})`;
        document.getElementById('totalCount').textContent = `${visibleCount} transaksi`;
    }

    // ===== RENDER DAFTAR TRANSAKSI =====
    function renderTransactions() {
        const list = document.getElementById('transactionList');
        list.innerHTML = '';
        transactions.forEach((t, idx) => {
            const card = document.createElement('div');
            card.className = 'transaction-card bg-white rounded-2xl border border-slate-100 shadow-sm p-5 flex flex-wrap items-center justify-between gap-4';
            card.dataset.category = t.category;
            card.innerHTML = `
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 bg-purple-50 rounded-2xl flex items-center justify-center text-2xl">${t.icon}</div>
                    <div>
                        <h4 class="font-bold text-slate-800">${t.service}</h4>
                        <p class="text-sm text-slate-500">${t.displayDate}</p>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="status-badge bg-emerald-100 text-emerald-700 px-2.5 py-0.5 rounded-full font-bold">✓ Selesai</span>
                            <span class="text-xs text-slate-400">${t.id}</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <span class="font-bold text-slate-800">${t.displayPrice}</span>
                    <button onclick="openDetailModal(${idx})" class="text-purple-600 hover:text-purple-800 text-sm font-semibold bg-purple-50 hover:bg-purple-100 px-4 py-2 rounded-xl transition">
                        Detail
                    </button>
                </div>
            `;
            list.appendChild(card);
        });
        filterTransactions(currentFilter);
    }

    // ===== DETAIL MODAL =====
    function openDetailModal(index) {
        const t = transactions[index];
        document.getElementById('detailIcon').textContent = t.icon;
        document.getElementById('detailTitle').textContent = t.service;
        document.getElementById('detailContent').innerHTML = `
            <div class="detail-row"><span class="detail-label">Nama Layanan</span><span class="detail-value">${t.service}</span></div>
            <div class="detail-row"><span class="detail-label">Kategori</span><span class="detail-value">${t.category}</span></div>
            <div class="detail-row"><span class="detail-label">Biaya</span><span class="detail-value font-bold text-purple-700">${t.displayPrice}</span></div>
            <div class="detail-row"><span class="detail-label">Tanggal</span><span class="detail-value">${t.displayDate}</span></div>
            <div class="detail-row"><span class="detail-label">Dokter</span><span class="detail-value">${t.doctor}</span></div>
            <div class="detail-row"><span class="detail-label">Hewan</span><span class="detail-value">${t.pet}</span></div>
            <div class="detail-row"><span class="detail-label">Layanan Detail</span><span class="detail-value text-sm">${t.detail}</span></div>
            <div class="detail-row"><span class="detail-label">Status</span><span class="detail-value"><span class="bg-emerald-100 text-emerald-700 px-3 py-0.5 rounded-full text-xs font-bold">✓ ${t.status}</span></span></div>
        `;
        const modal = document.getElementById('detailModal');
        modal.classList.remove('opacity-0', 'pointer-events-none');
        modal.querySelector('.relative').classList.remove('scale-95');
        modal.querySelector('.relative').classList.add('scale-100');
    }

    function closeDetailModal() {
        const modal = document.getElementById('detailModal');
        modal.classList.add('opacity-0', 'pointer-events-none');
        modal.querySelector('.relative').classList.remove('scale-100');
        modal.querySelector('.relative').classList.add('scale-95');
    }

    // ===== MANAGE MODAL =====
    function openManageModal() {
        renderManageTable();
        const modal = document.getElementById('manageModal');
        modal.classList.remove('opacity-0', 'pointer-events-none');
        modal.querySelector('.relative').classList.remove('scale-95');
        modal.querySelector('.relative').classList.add('scale-100');
    }

    function closeManageModal() {
        const modal = document.getElementById('manageModal');
        modal.classList.add('opacity-0', 'pointer-events-none');
        modal.querySelector('.relative').classList.remove('scale-100');
        modal.querySelector('.relative').classList.add('scale-95');
    }

    function renderManageTable() {
        const tbody = document.getElementById('manageTableBody');
        tbody.innerHTML = '';
        transactions.forEach((t, idx) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td class="px-4 py-3 font-medium text-slate-800">${t.icon} ${t.service}</td>
                <td class="px-4 py-3 hidden sm:table-cell"><span class="text-[10px] font-bold uppercase bg-purple-50 text-purple-600 px-3 py-1 rounded-full">${t.category}</span></td>
                <td class="px-4 py-3 hidden md:table-cell text-slate-400">${t.displayDate}</td>
                <td class="px-4 py-3 font-bold text-slate-800">${t.displayPrice}</td>
                <td class="px-4 py-3 text-right">
                    <div class="flex items-center justify-end gap-2">
                        <button onclick="openEditModal(${idx})" class="text-purple-600 hover:text-purple-800 bg-purple-50 hover:bg-purple-100 p-1.5 rounded-lg transition" title="Edit">✏️</button>
                        <button onclick="deleteTransaction(${idx})" class="text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 p-1.5 rounded-lg transition" title="Hapus">🗑️</button>
                    </div>
                </td>
            `;
            tbody.appendChild(row);
        });
        document.getElementById('manageCount').textContent = transactions.length;
    }

    // ===== DELETE =====
    function deleteTransaction(index) {
        if (confirm(`Yakin ingin menghapus transaksi "${transactions[index].service}"?`)) {
            transactions.splice(index, 1);
            renderManageTable();
            renderTransactions();
            alert('✅ Transaksi berhasil dihapus!');
        }
    }

    // ===== EDIT MODAL =====
    function openEditModal(index) {
        editIndex = index;
        const t = transactions[index];
        document.getElementById('editModalTitle').textContent = '✏️ Edit Transaksi';
        document.getElementById('editIndex').value = index;
        document.getElementById('editService').value = t.service;
        document.getElementById('editCategory').value = t.category;
        document.getElementById('editPrice').value = t.price;
        document.getElementById('editDate').value = t.date;
        const modal = document.getElementById('editModal');
        modal.classList.remove('opacity-0', 'pointer-events-none');
        modal.querySelector('.relative').classList.remove('scale-95');
        modal.querySelector('.relative').classList.add('scale-100');
    }

    function closeEditModal() {
        const modal = document.getElementById('editModal');
        modal.classList.add('opacity-0', 'pointer-events-none');
        modal.querySelector('.relative').classList.remove('scale-100');
        modal.querySelector('.relative').classList.add('scale-95');
    }

    // ===== ADD =====
    function addTransaction() {
        editIndex = -1;
        document.getElementById('editModalTitle').textContent = '➕ Tambah Transaksi Baru';
        document.getElementById('editIndex').value = '';
        document.getElementById('editService').value = '';
        document.getElementById('editCategory').value = 'Vaksinasi';
        document.getElementById('editPrice').value = '';
        document.getElementById('editDate').value = '';
        const modal = document.getElementById('editModal');
        modal.classList.remove('opacity-0', 'pointer-events-none');
        modal.querySelector('.relative').classList.remove('scale-95');
        modal.querySelector('.relative').classList.add('scale-100');
    }

    // ===== HANDLE EDIT SUBMIT =====
    function handleEditSubmit(e) {
        e.preventDefault();
        const idx = parseInt(document.getElementById('editIndex').value);
        const service = document.getElementById('editService').value.trim();
        const category = document.getElementById('editCategory').value;
        const price = parseInt(document.getElementById('editPrice').value);
        const date = document.getElementById('editDate').value;
        if (!service || !price || !date) { alert('Harap lengkapi semua field!'); return; }

        const dateObj = new Date(date + 'T00:00:00');
        const months = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        const displayDate = `${dateObj.getDate()} ${months[dateObj.getMonth()]} ${dateObj.getFullYear()}`;
        const displayPrice = `Rp ${price.toLocaleString('id-ID')}`;
        const iconMap = { 'Vaksinasi':'💉', 'Grooming':'✂️', 'Konsultasi':'🩺', 'Operasi':'🏥', 'Perawatan':'🦷' };

        const newData = {
            id: `TRX-${String(transactions.length + 1).padStart(3, '0')}`,
            service: service,
            icon: iconMap[category] || '📋',
            category: category,
            price: price,
            date: date,
            doctor: 'drh. Sistem',
            pet: 'Hewan Peliharaan',
            detail: 'Layanan klinik',
            status: 'Selesai',
            displayDate: displayDate,
            displayPrice: displayPrice
        };

        if (isNaN(idx) || idx < 0 || idx >= transactions.length) {
            transactions.push(newData);
            alert('✅ Transaksi baru berhasil ditambahkan!');
        } else {
            transactions[idx] = { ...transactions[idx], ...newData };
            alert('✅ Transaksi berhasil diperbarui!');
        }
        closeEditModal();
        renderManageTable();
        renderTransactions();
    }

    // ===== INISIALISASI =====
    document.addEventListener('DOMContentLoaded', function() {
        renderTransactions();
        document.querySelector('.filter-btn[onclick*="\'all\'"]')?.classList.add('bg-purple-600', 'text-white');
        document.querySelector('.filter-btn[onclick*="\'all\'"]')?.classList.remove('bg-slate-100', 'text-slate-600');
        document.getElementById('totalCount').textContent = `${transactions.length} transaksi`;
    });

    // ===== CLOSE MODAL ON OVERLAY CLICK & ESC =====
    document.addEventListener('click', function(e) {
        if (e.target.closest('.modal-overlay')) {
            closeDetailModal();
            closeManageModal();
            closeEditModal();
        }
    });
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeDetailModal();
            closeManageModal();
            closeEditModal();
        }
    });
</script>

</body>
</html>