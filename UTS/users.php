<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>AdminLTE 4 | Users</title>

  <!--begin::Theme Init (prevents flash of incorrect theme on load, #6043)-->
  <script>
    (() => {
      'use strict';
      const root = document.documentElement;

      // Applications with their own theming opt out of AdminLTE's color mode
      // entirely, here as well as in the bundle.
      if (root.getAttribute('data-lte-color-mode') === 'off') {
        return;
      }

      const STORAGE_KEY = 'lte-theme';
      let stored = null;
      try {
        stored = localStorage.getItem(STORAGE_KEY);
      } catch {
        // localStorage may be unavailable (private mode, sandboxed iframe).
      }
      // Mirror the precedence in color-mode.ts: the visitor's stored choice
      // wins, then a theme this page declared itself, then the OS preference.
      const authored = root.getAttribute('data-bs-theme');
      let resolved = 'light';
      if (stored === 'dark' || stored === 'light') {
        resolved = stored;
      } else if (authored === 'dark' || authored === 'light') {
        resolved = authored;
      } else if (globalThis.matchMedia('(prefers-color-scheme: dark)').matches) {
        resolved = 'dark';
      }
      root.setAttribute('data-bs-theme', resolved);
      root.style.colorScheme = resolved;
      // Flag values computed here, so the bundle does not mistake them for a
      // theme the page declared and stop following the OS preference.
      if (resolved !== authored) {
        root.setAttribute('data-lte-theme-resolved', '');
      }
    })();
  </script>
  <!--end::Theme Init-->

  <!--begin::Accessibility Meta Tags-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
  <meta name="color-scheme" content="light dark" />
  <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
  <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
  <!--end::Accessibility Meta Tags-->

  <!--begin::Primary Meta Tags-->
  <meta name="title" content="AdminLTE 4 | Users" />
  <meta name="author" content="ColorlibHQ" />
  <meta
    name="description"
    content="AdminLTE is a free Bootstrap 5 admin dashboard template with almost 50 example pages, built with vanilla JS and designed with accessibility in mind." />
  <meta
    name="keywords"
    content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel" />
  <!--end::Primary Meta Tags-->

  <!--begin::Accessibility Features-->
  <!-- Skip links will be dynamically added by accessibility.js -->
  <meta name="supported-color-schemes" content="light dark" />
  <link rel="preload" href="./css/adminlte.css" as="style" />
  <!--end::Accessibility Features-->

  <!--begin::Fonts-->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
    integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
    crossorigin="anonymous"
    media="print"
    onload="this.media = 'all'" />
  <!--end::Fonts-->

  <!--begin::Third Party Plugin(OverlayScrollbars)-->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
    crossorigin="anonymous" />
  <!--end::Third Party Plugin(OverlayScrollbars)-->

  <!--begin::Third Party Plugin(Bootstrap Icons)-->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
    crossorigin="anonymous" />
  <!--end::Third Party Plugin(Bootstrap Icons)-->

  <!--begin::Required Plugin(AdminLTE)-->
  <link rel="stylesheet" href="./css/adminlte.css" />
  <!--end::Required Plugin(AdminLTE)-->
</head>
<!--begin::App Main-->
<main class="app-main">
  <!--begin::App Content Header-->
  <div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
      <!--begin::Row-->
      <div class="row">
        <div class="col-sm-6">
          <h1 class="mb-0 fs-3">Data Nilai Mahasiswa</h1>
        </div>
        <div class="col-sm-6">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Users</li>
            </ol>
          </nav>
        </div>
      </div>
      <!--end::Row-->
    </div>
    <!--end::Container-->
  </div>
  <!--end::App Content Header-->
  <!--begin::App Content-->
  <div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
      <!--begin::Row-->
      <div class="row">
        <div class="col-12">
          <!--begin::Card-->
          <div class="card mb-4">
            <!--begin::Card Header-->
            <div class="card-header">
              <div class="row g-2 align-items-center">
                <div class="col-12 col-md-4">
                  <h3 class="card-title">Nilai Mahasiswa</h3>
                </div>
                <div class="col-12 col-md-8">
                  <div class="d-flex flex-wrap justify-content-md-end gap-2">
                    <div class="input-group input-group-sm w-auto">
                      <span class="input-group-text">
                        <i class="bi bi-search" aria-hidden="true"></i>
                      </span>
                      <input
                        type="search"
                        id="user-search"
                        class="form-control"
                        placeholder="Search users"
                        aria-label="Search users"
                        style="width: 180px" />
                    </div>
                    <select id="filter-predikat" class="form-select form-select-sm" style="width: 160px;">
                      <option value="">Semua Predikat</option>
                      <option value="Sangat Memuaskan">Sangat Memuaskan</option>
                      <option value="Memuaskan">Memuaskan</option>
                      <option value="Cukup">Cukup</option>
                      <option value="Kurang">Kurang</option>
                      <option value="Tidak Lulus">Tidak Lulus</option>
                    </select>

                    <select id="sort-nilai" class="form-select form-select-sm" style="width: 195px;">
                      <option value="">Urutkan Data (Default)</option>
                      <option value="nama-asc">Nama Mahasiswa (A - Z)</option>
                      <option value="nama-desc">Nama Mahasiswa (Z - A)</option>
                      <option value="nilai-asc">Nilai Terendah (Asc)</option>
                      <option value="nilai-desc">Nilai Tertinggi (Desc)</option>
                    </select>
                    <button
                      type="button"
                      class="btn btn-sm btn-primary"
                      data-bs-toggle="modal"
                      data-bs-target="#modal-add-user">
                      <i class="bi bi-person-plus-fill me-1" aria-hidden="true"> </i>
                      Tambah Data Nilai
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!--end::Card Header-->

            <?php
            // Create connection
            require_once __DIR__ . "/connect.php";
            // $sql = "SELECT id, firstname, lastname FROM MyGuests";
            $sql = "SELECT * FROM nilai_mahasiswa";
            // Execute the SQL query
            $result = mysqli_query($conn, $sql);



            // Process the result set
            if (mysqli_num_rows($result) > 0) {
            ?>
             <!--begin::Card Body-->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-hover align-middle m-0" id="tabel-mahasiswa">
                    <thead>
                      <tr>
                        <th>Nim</th>
                        <th id="th-nama" style="cursor: pointer; user-select: none;" title="Klik untuk mengurutkan nama">
                          Nama Mahasiswa <i id="sort-icon-nama" class="bi bi-arrow-down-up ms-1 text-secondary"></i>
                        </th>
                        <th id="th-nilai" style="cursor: pointer; user-select: none;" title="Klik untuk mengurutkan nilai">
                          Nilai Akhir <i id="sort-icon-nilai" class="bi bi-arrow-down-up ms-1 text-secondary"></i>
                        </th>
                        <th>Nilai Huruf</th>
                        <th>Predikat</th>
                        <th>Tanggal Dibuat</th>
                        <th>Tanggal Diubah</th>
                        <th class="text-end">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <!-- Tambahkan data-predikat, data-nama, dan data-nilai pada tr untuk filter & sorting -->
                        <tr
                          data-predikat="<?php echo htmlspecialchars($row['predikat']); ?>"
                          data-nama="<?php echo htmlspecialchars($row['nama_mhsw']); ?>"
                          data-nilai="<?php echo htmlspecialchars($row['nilai_akhir']); ?>">
                          <td>
                            <span class="fw-medium"><?php echo htmlspecialchars($row["nim"]); ?></span>
                          </td>
                          <td>
                            <div class="d-flex align-items-center">
                              <?php
                                // Cek apakah ada foto di folder uploads
                                if (!empty($row["foto"]) && file_exists(__DIR__ . "/uploads/" . $row["foto"])) {
                                  $src_foto = "./uploads/" . htmlspecialchars($row["foto"]);
                                } else {
                                  // Jika belum upload foto, tampilkan avatar default
                                  $src_foto = "https://ui-avatars.com/api/?name=" . urlencode($row["nama_mhsw"]) . "&background=0D8ABC&color=fff";
                                }
                              ?>
                              <img
                                src="<?php echo $src_foto; ?>"
                                alt="Foto <?php echo htmlspecialchars($row['nama_mhsw']); ?>"
                                class="rounded-circle me-2 flex-shrink-0"
                                style="width: 34px; height: 34px; object-fit: cover;" />
                              <span><?php echo htmlspecialchars($row["nama_mhsw"]); ?></span>
                            </div>
                          </td>
                          <td>
                            <span class="badge text-bg-danger">
                              <?php echo htmlspecialchars($row["nilai_akhir"]); ?>
                            </span>
                          </td>
                          <td>
                            <span class="badge text-bg-success">
                              <?php echo htmlspecialchars($row["nilai_huruf"]); ?>
                            </span>
                          </td>
                          <td class="kolom-predikat">
                            <?php echo htmlspecialchars($row["predikat"]); ?>
                          </td>
                          <td>
                            <?php echo date("d-m-Y H:i", strtotime($row["reg_date"])); ?>
                          </td>
                          <td>
                            <?php
                            // Menampilkan modify_date jika sudah pernah diedit
                            if (!empty($row["modify_date"]) && $row["modify_date"] !== "0000-00-00 00:00:00") {
                              echo date("d-m-Y H:i", strtotime($row["modify_date"]));
                            } else {
                              echo "<span class='text-secondary'>-</span>";
                            }
                            ?>
                          </td>
                          <td class="text-end">
                            <div class="btn-group btn-group-sm">
                              <button
                                type="button"
                                class="btn btn-outline-secondary"
                                data-bs-toggle="modal"
                                data-bs-target="#modal-edit-user"
                                data-nim="<?php echo htmlspecialchars($row['nim']); ?>"
                                data-nama="<?php echo htmlspecialchars($row['nama_mhsw']); ?>"
                                data-nilai="<?php echo htmlspecialchars($row['nilai_akhir']); ?>"
                                aria-label="Edit data mahasiswa">
                                <i class="bi bi-pencil" aria-hidden="true"></i>
                              </button>

                              <button
                                type="button"
                                class="btn btn-outline-danger"
                                data-bs-toggle="modal"
                                data-bs-target="#modal-delete-user"
                                data-nim="<?php echo htmlspecialchars($row['nim']); ?>"
                                aria-label="Hapus Nilai Ini">
                                <i class="bi bi-trash" aria-hidden="true"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
            <?php } else {
              echo "0 results - Data Not Found!";
            } ?>
            <?php mysqli_close($conn);
            ?>
            <!--end::Card Body-->
            <!--begin::Card Footer-->
            <div class="card-footer clearfix">
              <div id="pagination-info" class="float-start pt-1 fs-7 text-body-secondary">
                Showing 0 to 0 of 0 users
              </div>
              <ul id="pagination-controls" class="pagination pagination-sm m-0 float-end">
                <!-- Tombol halaman akan di-generate otomatis oleh JavaScript -->
              </ul>
            </div>
            <!--end::Card Footer-->
          </div>
          <!--end::Card-->
        </div>
        <!-- /.col -->
      </div>
      <!--end::Row-->

      <!--begin::Add User Modal-->
      <div
        class="modal fade"
        id="modal-add-user"
        tabindex="-1"
        aria-labelledby="modal-add-user-label"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Wajib tambahkan enctype="multipart/form-data" untuk upload file -->
            <form action="insert_data.php" method="post" enctype="multipart/form-data">
              <div class="modal-header">
                <h5 class="modal-title" id="modal-add-user-label">Tambah Data Nilai</h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label for="nim" class="form-label">NIM</label>
                  <input
                    type="text"
                    minlength="10"
                    maxlength="10"
                    class="form-control"
                    id="nim"
                    name="nim"
                    placeholder="Masukkan NIM"
                    required>
                </div>
                <div class="mb-3">
                  <label for="new-user-name" class="form-label"> Nama Lengkap </label>
                  <input
                    type="text"
                    class="form-control"
                    id="new-user-name"
                    name="nama"
                    placeholder="Masukkan Nama Lengkap Anda"
                    pattern="^[a-zA-Z\s]+$"
                    title="Nama hanya boleh berisi huruf dan spasi"
                    oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')"
                    required />
                </div>
                <div class="mb-3">
                  <label for="new-user-email" class="form-label"> Nilai Akhir </label>
                  <input
                    type="number"
                    class="form-control"
                    id="new-user-email"
                    name="nilai"
                    placeholder="00.00"
                    min="0"
                    max="100"
                    step="0.01"
                    required />
                </div>
                <!-- Input Tambahan untuk Upload Foto Profil -->
                <div class="mb-3">
                  <label for="new-user-foto" class="form-label">Foto Profil (Opsional)</label>
                  <input
                    type="file"
                    class="form-control"
                    id="new-user-foto"
                    name="foto"
                    accept="image/jpeg, image/png, image/webp" />
                  <div class="form-text">Format: JPG, PNG, atau WEBP (Maks. 2MB).</div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                  Batal
                </button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!--end::Add User Modal-->

      <!-- Modal Delete -->
      <div
        class="modal fade"
        id="modal-delete-user"
        tabindex="-1"
        aria-labelledby="modal-delete-user-label"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <form action="delete_data.php" method="post">

              <div class="modal-header">
                <h5 class="modal-title" id="modal-delete-user-label">
                  Hapus Data Mahasiswa
                </h5>

                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"></button>
              </div>

              <div class="modal-body">
                <p class="mb-0">
                  Apakah kamu yakin ingin menghapus data mahasiswa ini?
                  Data yang dihapus tidak dapat dikembalikan.
                </p>

                <input type="hidden" name="nim" id="delete-nim">
              </div>

              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal">
                  Batal
                </button>

                <button type="submit" class="btn btn-danger">
                  Hapus Data
                </button>
              </div>

            </form>

          </div>
        </div>
      </div>
      <!--end::Delete User Modal-->

      <!-- Modal Edit -->
      <div
        class="modal fade"
        id="modal-edit-user"
        tabindex="-1"
        aria-labelledby="modal-edit-user-label"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Wajib tambahkan enctype="multipart/form-data" untuk upload file -->
            <form action="edit_data.php" method="post" enctype="multipart/form-data">

              <div class="modal-header">
                <h5 class="modal-title" id="modal-edit-user-label">
                  Edit Data Mahasiswa
                </h5>

                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"></button>
              </div>

              <div class="modal-body">
                <!-- Pastikan id="edit-nim-lama" dan name="nim_lama" ada di sini -->
                <input type="hidden" name="nim_lama" id="edit-nim-lama" />

                <div class="mb-3">
                  <label for="edit-nim" class="form-label">NIM</label>
                  <input
                    type="text"
                    class="form-control"
                    name="nim"
                    id="edit-nim"
                    minlength="10"
                    maxlength="10"
                    required />
                </div>

                <div class="mb-3">
                  <label for="edit-nama" class="form-label">Nama Mahasiswa</label>
                  <input
                    type="text"
                    class="form-control"
                    name="nama"
                    id="edit-nama"
                    pattern="^[a-zA-Z\s]+$"
                    title="Nama hanya boleh berisi huruf dan spasi"
                    oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')"
                    required />
                </div>

                <div class="mb-3">
                  <label for="edit-nilai" class="form-label">Nilai Akhir</label>
                  <input
                    type="number"
                    class="form-control"
                    name="nilai"
                    id="edit-nilai"
                    min="0"
                    max="100"
                    step="0.01"
                    required />
                </div>

                <!-- Input Tambahan untuk Ganti Foto Profil -->
                <div class="mb-3">
                  <label for="edit-foto" class="form-label">Ganti Foto Profil (Opsional)</label>
                  <input
                    type="file"
                    class="form-control"
                    id="edit-foto"
                    name="foto"
                    accept="image/jpeg, image/png, image/webp" />
                  <div class="form-text">Kosongkan jika tidak ingin mengubah foto. (Maks. 2MB)</div>
                </div>
              </div>

              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal">
                  Batal
                </button>

                <button type="submit" class="btn btn-primary">
                  Simpan Perubahan
                </button>
              </div>

            </form>

          </div>
        </div>
      </div>
      <!-- End Modal Edit -->

    </div>
    <!--end::Container-->
  </div>
  <!--end::App Content-->
</main>
<!--end::App Main-->
<!--begin::Footer-->
<footer class="app-footer">
  <!--begin::To the end-->
  <div class="float-end d-none d-sm-inline">Anything you want</div>
  <!--end::To the end-->
  <!--begin::Copyright-->
  <strong>
    Copyright &copy; 2014-2026&nbsp;
    <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
  </strong>
  All rights reserved.
  <!--end::Copyright-->
</footer>
<!--end::Footer-->
</div>
<!--end::App Wrapper-->
<!--begin::Script-->
<!--begin::Third Party Plugin(OverlayScrollbars)-->
<script
  src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
  crossorigin="anonymous"></script>
<!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
<script
  src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
  crossorigin="anonymous"></script>
<!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
  crossorigin="anonymous"></script>
<!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
<script src="./js/adminlte.js"></script>
<!--end::Required Plugin(AdminLTE)-->
<!--begin::OverlayScrollbars Configure-->
<script>
  const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
  const Default = {
    scrollbarTheme: 'os-theme-light',
    scrollbarAutoHide: 'leave',
    scrollbarClickScroll: true,
  };
  document.addEventListener('DOMContentLoaded', function() {
    const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);

    // Disable OverlayScrollbars on mobile devices to prevent touch interference
    const isMobile = window.innerWidth <= 992;

    if (
      sidebarWrapper &&
      OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined &&
      !isMobile
    ) {
      OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
        scrollbars: {
          theme: Default.scrollbarTheme,
          autoHide: Default.scrollbarAutoHide,
          clickScroll: Default.scrollbarClickScroll,
        },
      });
    }
  });
</script>
<!--end::OverlayScrollbars Configure-->

<!--begin::Color Mode Toggle-->
<!-- The light/dark/auto switcher ships in adminlte.js as the ColorMode
     module (since 4.1) — no page script needed. Only the no-flash snippet
     in <head> stays inline, because it must run before first paint. -->
<!--end::Color Mode Toggle-->

<!--end::Script-->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const filterPredikat = document.getElementById('filter-predikat');
    const searchInput = document.getElementById('user-search');
    const sortSelect = document.getElementById('sort-nilai');

    const thNama = document.getElementById('th-nama');
    const sortIconNama = document.getElementById('sort-icon-nama');
    const thNilai = document.getElementById('th-nilai');
    const sortIconNilai = document.getElementById('sort-icon-nilai');

    const tableBody = document.querySelector('#tabel-mahasiswa tbody');
    // Simpan urutan asli dari database untuk mode "Default"
    const originalRows = Array.from(tableBody ? tableBody.querySelectorAll('tr') : []);

    const paginationInfo = document.getElementById('pagination-info');
    const paginationControls = document.getElementById('pagination-controls');

    const rowsPerPage = 9; // Maksimal 9 user per halaman
    let currentPage = 1;
    let currentSort = ''; // '', 'nama-asc', 'nama-desc', 'nilai-asc', 'nilai-desc'
    let filteredRows = [...originalRows];

    // 1. Fungsi utama untuk Filter + Search + Sort
    function applyFilterAndSort() {
      const selectedPredikat = filterPredikat ? filterPredikat.value.toLowerCase().trim() : '';
      const searchText = searchInput ? searchInput.value.toLowerCase().trim() : '';

      // A. Saring data dari urutan asli
      filteredRows = originalRows.filter(row => {
        const rowPredikat = (row.getAttribute('data-predikat') || '').toLowerCase().trim();
        const rowText = row.textContent.toLowerCase();

        const matchPredikat = selectedPredikat === "" || rowPredikat === selectedPredikat;
        const matchSearch = searchText === "" || rowText.includes(searchText);

        return matchPredikat && matchSearch;
      });

      // B. Urutkan data berdasarkan Nama atau Nilai Akhir
      if (currentSort === 'nama-asc' || currentSort === 'nama-desc') {
        filteredRows.sort((a, b) => {
          const namaA = (a.getAttribute('data-nama') || '').toLowerCase().trim();
          const namaB = (b.getAttribute('data-nama') || '').toLowerCase().trim();

          return currentSort === 'nama-asc' ?
            namaA.localeCompare(namaB, 'id') :
            namaB.localeCompare(namaA, 'id');
        });
      } else if (currentSort === 'nilai-asc' || currentSort === 'nilai-desc') {
        filteredRows.sort((a, b) => {
          const nilaiA = parseFloat(a.getAttribute('data-nilai')) || 0;
          const nilaiB = parseFloat(b.getAttribute('data-nilai')) || 0;

          return currentSort === 'nilai-asc' ? nilaiA - nilaiB : nilaiB - nilaiA;
        });
      }

      // C. Susun ulang urutan elemen <tr> di dalam <tbody>
      if (tableBody) {
        filteredRows.forEach(row => tableBody.appendChild(row));
      }

      // Reset ke halaman 1 setiap kali filter/sort berubah
      currentPage = 1;
      updateSortUI();
      renderTable();
    }

    // 2. Fungsi untuk memperbarui ikon panah di header tabel dan dropdown
    function updateSortUI() {
      if (sortSelect && sortSelect.value !== currentSort) {
        sortSelect.value = currentSort;
      }

      // Reset kedua ikon terlebih dahulu
      if (sortIconNama) sortIconNama.className = 'bi bi-arrow-down-up ms-1 text-secondary';
      if (sortIconNilai) sortIconNilai.className = 'bi bi-arrow-down-up ms-1 text-secondary';

      // Ubah ikon sesuai kolom yang sedang aktif di-sort
      if (currentSort === 'nama-asc' && sortIconNama) {
        sortIconNama.className = 'bi bi-sort-alpha-down ms-1 text-primary';
      } else if (currentSort === 'nama-desc' && sortIconNama) {
        sortIconNama.className = 'bi bi-sort-alpha-up-alt ms-1 text-primary';
      } else if (currentSort === 'nilai-asc' && sortIconNilai) {
        sortIconNilai.className = 'bi bi-sort-numeric-down ms-1 text-primary';
      } else if (currentSort === 'nilai-desc' && sortIconNilai) {
        sortIconNilai.className = 'bi bi-sort-numeric-up-alt ms-1 text-primary';
      }
    }

    // 3. Fungsi untuk menampilkan baris sesuai halaman aktif
    function renderTable() {
      originalRows.forEach(row => row.style.display = 'none');

      const totalRows = filteredRows.length;
      const totalPages = Math.ceil(totalRows / rowsPerPage) || 1;

      if (currentPage > totalPages) currentPage = totalPages;

      const startIndex = (currentPage - 1) * rowsPerPage;
      const endIndex = Math.min(startIndex + rowsPerPage, totalRows);

      for (let i = startIndex; i < endIndex; i++) {
        filteredRows[i].style.display = '';
      }

      if (paginationInfo) {
        if (totalRows > 0) {
          paginationInfo.textContent = `Showing ${startIndex + 1} to ${endIndex} of ${totalRows} users`;
        } else {
          paginationInfo.textContent = `Showing 0 to 0 of 0 users`;
        }
      }

      renderPaginationControls(totalPages);
    }

    // 4. Fungsi untuk membuat tombol navigasi halaman
    function renderPaginationControls(totalPages) {
      if (!paginationControls) return;
      paginationControls.innerHTML = '';

      const prevLi = document.createElement('li');
      prevLi.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
      prevLi.innerHTML = `<a class="page-link" href="#" aria-label="Previous">&laquo;</a>`;
      prevLi.addEventListener('click', function(e) {
        e.preventDefault();
        if (currentPage > 1) {
          currentPage--;
          renderTable();
        }
      });
      paginationControls.appendChild(prevLi);

      for (let i = 1; i <= totalPages; i++) {
        const pageLi = document.createElement('li');
        pageLi.className = `page-item ${i === currentPage ? 'active' : ''}`;
        pageLi.innerHTML = `<a class="page-link" href="#">${i}</a>`;
        pageLi.addEventListener('click', function(e) {
          e.preventDefault();
          currentPage = i;
          renderTable();
        });
        paginationControls.appendChild(pageLi);
      }

      const nextLi = document.createElement('li');
      nextLi.className = `page-item ${currentPage === totalPages ? 'disabled' : ''}`;
      nextLi.innerHTML = `<a class="page-link" href="#" aria-label="Next">&raquo;</a>`;
      nextLi.addEventListener('click', function(e) {
        e.preventDefault();
        if (currentPage < totalPages) {
          currentPage++;
          renderTable();
        }
      });
      paginationControls.appendChild(nextLi);
    }

    // Event Listener untuk Search & Filter Predikat
    if (filterPredikat) filterPredikat.addEventListener('change', applyFilterAndSort);
    if (searchInput) searchInput.addEventListener('input', applyFilterAndSort);

    // Event Listener saat Dropdown Sort diubah
    if (sortSelect) {
      sortSelect.addEventListener('change', function() {
        currentSort = this.value;
        applyFilterAndSort();
      });
    }

    // Event Listener saat Header Kolom "Nama Mahasiswa" diklik langsung
    if (thNama) {
      thNama.addEventListener('click', function() {
        if (currentSort === 'nama-asc') {
          currentSort = 'nama-desc';
        } else if (currentSort === 'nama-desc') {
          currentSort = '';
        } else {
          currentSort = 'nama-asc';
        }
        applyFilterAndSort();
      });
    }

    // Event Listener saat Header Kolom "Nilai Akhir" diklik langsung
    if (thNilai) {
      thNilai.addEventListener('click', function() {
        if (currentSort === 'nilai-asc') {
          currentSort = 'nilai-desc';
        } else if (currentSort === 'nilai-desc') {
          currentSort = '';
        } else {
          currentSort = 'nilai-asc';
        }
        applyFilterAndSort();
      });
    }

    // Jalankan pertama kali saat halaman dimuat
    applyFilterAndSort();
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // 1. Script untuk Modal Delete
    const modalDelete = document.getElementById('modal-delete-user');
    if (modalDelete) {
      modalDelete.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget.closest('button');
        const nim = button ? button.getAttribute('data-nim') : '';
        document.getElementById('delete-nim').value = nim;
      });
    }

    // 2. Script untuk Modal Edit
    const modalEdit = document.getElementById('modal-edit-user');
    if (modalEdit) {
      modalEdit.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget.closest('button');
        if (!button) return;

        const nim = button.getAttribute('data-nim');
        const nama = button.getAttribute('data-nama');
        const nilai = button.getAttribute('data-nilai');

        document.getElementById('edit-nim-lama').value = nim;
        document.getElementById('edit-nim').value = nim;
        document.getElementById('edit-nama').value = nama;
        document.getElementById('edit-nilai').value = nilai;
      });
    }
  });
</script>

</body>
<!--end::Body-->

</html>