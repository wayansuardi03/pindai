<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Panel /</span> Users
    </h4>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="nav-align-top mb-4">
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-justified-users" aria-controls="navs-justified-users"
                            aria-selected="true">
                            Data Users
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-justified-password" aria-controls="navs-justified-pikkir"
                            aria-selected="false">Change Password
                        </button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-justified-users" role="tabpanel">
                        <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                            data-bs-target="#indexRb">Tambah</button>
                        <table id="dataTables" class="table table-responsive table-hover table-border-bottom-0"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Level</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sqlUsers = query("SELECT * FROM tbl_users ORDER BY idUser DESC");
                                foreach ($sqlUsers as $row) {
                                    $nama = $row['namaLengkap'];
                                    $username = $row['username'];
                                    $level = $row['level'];
                                    $status = $row['status'];
                                    $userId = $row['idUser'];
                                ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?= $nama; ?></td>
                                    <td class="text-center"><?= $username; ?></td>
                                    <td class="text-center"><?= $level; ?></td>
                                    <td class="text-center">
                                        <?php
                                            if ($status == 989898) {
                                                echo '<span class="badge bg-success">Aktif</span>';
                                            } elseif ($status == 1023) {
                                                echo '<span class="badge bg-secondary">Nonaktif</span>';
                                            }
                                            ?>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-dark" data-bs-toggle="modal"
                                            data-bs-target="#ubahUser-<?= $userId; ?>">Ubah</button>
                                        <button class="btn btn-sm btn-outline-danger" type="button"
                                            data-bs-toggle="modal"
                                            data-bs-target="#hapusDataRb-<?= $rbId; ?>">Hapus</button>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="navs-justified-password" role="tabpanel">
                        <p>
                            Donut dragée jelly pie halvah. Danish gingerbread bonbon cookie wafer candy oat cake ice
                            cream. Gummies halvah tootsie roll muffin biscuit icing dessert gingerbread. Pastry ice
                            cream
                            cheesecake fruitcake.
                        </p>
                        <p class="mb-0">
                            Jelly-o jelly beans icing pastry cake cake lemon drops. Muffin muffin pie tiramisu halvah
                            cotton candy liquorice caramels.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="indexRb" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <form action="?p=prosesDataUser" class="modal-content" method="POST" autocomplete="off">
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Tambah User
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col col-md-6 mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Enter nama"
                            required />
                    </div>
                    <div class="col col-md-6 mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control"
                            placeholder="Enter username" required />
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col col-md-6 mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" name="password" id="password" class="form-control" placeholder="Password"
                            required />
                    </div>
                    <div class="col col-md-6 mb-3">
                        <label for="cPassword" class="form-label">Confirm Password</label>
                        <input type="text" name="cPassword" id="cPassword" class="form-control"
                            placeholder="Confirm password" required />
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col col-md-6 mb-3">
                        <label for="level" class="form-label">Level</label>
                        <select name="level" id="level" class="form-select" required>
                            <option value="" selected>Pilih</option>
                            <option value="Juragan">Juragan</option>
                            <option value="Administrator">Administrator</option>
                            <option value="Operator">Operator</option>
                        </select>
                    </div>
                    <div class="col col-md-6 mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="" selected>Pilih</option>
                            <option value="989898">Aktif</option>
                            <option value="1023">Nonaktif</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                    Batal
                </button>
                <button type="submit" name="btnTambahUser" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?php
$sqlUsers = query("SELECT * FROM tbl_users ORDER BY idUser DESC");
foreach ($sqlUsers as $row) {
    $nama = $row['namaLengkap'];
    $username = $row['username'];
    $level = $row['level'];
    $status = $row['status'];
    $userId = $row['idUser'];
?>
<div class="modal fade" id="ubahUser-<?= $userId; ?>" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <form action="?p=prosesDataUser" class="modal-content" method="POST" autocomplete="off">
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Ubah Data <u><?= $nama; ?></u>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col col-md-6 mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $nama; ?>" required />
                    </div>
                    <div class="col col-md-6 mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?= $username; ?>"
                            required />
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col col-md-6 mb-3">
                        <label for="level" class="form-label">Level</label>
                        <select name="level" id="level" class="form-select" required>
                            <option value="" selected>Pilih</option>
                            <option value="Juragan" <?php if ($level === "Juragan") {
                                                            echo "selected";
                                                        } ?>>Juragan</option>
                            <option value="Administrator" <?php if ($level == "Administrator") {
                                                                    echo "selected";
                                                                } ?>>Administrator</option>
                            <option value="Operator" <?php if ($level == "Operator") {
                                                                echo "selected";
                                                            } ?>>Operator</option>
                        </select>
                    </div>
                    <div class="col col-md-6 mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="" selected>Pilih</option>
                            <option value="989898" <?php if ($status == 989898) {
                                                            echo "selected";
                                                        } ?>>Aktif</option>
                            <option value="1023" <?php if ($status == 1023) {
                                                            echo "selected";
                                                        } ?>>Nonaktif</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                    Batal
                </button>
                <button type="submit" name="btnEditUser" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
<?php } ?>