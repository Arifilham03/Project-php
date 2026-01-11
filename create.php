<!-- Button trigger for Extra Large modal -->
<button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#xlarge">
    Tambah Data Siswa
</button>

<!-- Extra Large Modal -->
<div class="modal fade text-left w-100" id="xlarge" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel16">Tambah Data Siswa Baru</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form id="formTambahSiswa" method="POST" action="proses_tambah_siswa.php">
                <div class="modal-body">
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="nama_siswa" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="nis" class="form-label">NIS (Nomor Induk Siswa) <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nis" name="nis" required>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="nisn" class="form-label">NISN (Nomor Induk Siswa Nasional) <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nisn" name="nisn" required>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        
                        <!-- Kolom Kanan -->
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="alamat" class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="no_telepon" class="form-label">Nomor Telepon</label>
                                <input type="tel" class="form-control" id="no_telepon" name="no_telepon" placeholder="08xxxxxxxxxx">
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com">
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="kelas" class="form-label">Kelas <span class="text-danger">*</span></label>
                                <select class="form-select" id="kelas" name="kelas" required>
                                    <option value="">Pilih Kelas</option>
                                    <option value="Kelas reguler pagi Senin - Jumat (08.00 - 12.00)">Kelas reguler pagi Senin - Jumat (08.00 - 12.00)</option>
                                    <option value="Kelas reguler siang Senin - Jumat (13.00 - 17.00)">Kelas reguler siang Senin - Jumat (13.00 - 17.00)</option>
                                    <option value="Kelas weekend Sabtu - Minggu (08.00 - 16.00)">Kelas weekend Sabtu - Minggu (08.00 - 16.00)</option>
                                    <option value="Kelas intensif Senin - Sabtu (08.00 - 14.00)">Kelas intensif Senin - Sabtu (08.00 - 14.00)</option>
                                </select>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="tahun_masuk" class="form-label">Tahun Masuk <span class="text-danger">*</span></label>
                                <select class="form-select" id="tahun_masuk" name="tahun_masuk" required>
                                    <option value="">Pilih Tahun Masuk</option>
                                    <?php 
                                    $currentYear = date('Y');
                                    for($i = $currentYear; $i >= $currentYear - 10; $i--) {
                                        echo "<option value='$i'>$i</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="status" class="form-label">Status Siswa <span class="text-danger">*</span></label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="">Pilih Status</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                    <option value="Lulus">Lulus</option>
                                    <option value="Pindah">Pindah</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Informasi Orang Tua/Wali -->
                    <hr class="my-4">
                    <h5 class="text-primary">Informasi Orang Tua/Wali</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="nama_ayah" class="form-label">Nama Ayah</label>
                                <input type="text" class="form-control" id="nama_ayah" name="nama_ayah">
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
                                <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="nama_ibu" class="form-label">Nama Ibu</label>
                                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu">
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
                                <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu">
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Modal Footer dengan Button Simpan dan Batal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i>Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i>Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript untuk validasi form -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formTambahSiswa');
    const modal = document.getElementById('xlarge');
    
    // Validasi form saat submit
    form.addEventListener('submit', function(e) {
        // Validasi NIS dan NISN harus berupa angka
        const nis = document.getElementById('nis').value.trim();
        const nisn = document.getElementById('nisn').value.trim();
        
        if (!/^\d+$/.test(nis)) {
            alert('NIS harus berupa angka!');
            document.getElementById('nis').focus();
            e.preventDefault();
            return false;
        }
        
        if (!/^\d+$/.test(nisn)) {
            alert('NISN harus berupa angka!');
            document.getElementById('nisn').focus();
            e.preventDefault();
            return false;
        }
        
        // Validasi email jika diisi
        const email = document.getElementById('email').value.trim();
        if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            alert('Format email tidak valid!');
            document.getElementById('email').focus();
            e.preventDefault();
            return false;
        }
        
        // Validasi nomor telepon jika diisi
        const noTelepon = document.getElementById('no_telepon').value.trim();
        if (noTelepon && !/^08\d{8,12}$/.test(noTelepon)) {
            alert('Nomor telepon harus diawali dengan 08 dan terdiri dari 10-14 digit!');
            document.getElementById('no_telepon').focus();
            e.preventDefault();
            return false;
        }
        
        // Konfirmasi sebelum menyimpan
        if (!confirm('Apakah Anda yakin ingin menyimpan data siswa ini?')) {
            e.preventDefault();
            return false;
        }
    });
    
    // Reset form ketika modal ditutup
    modal.addEventListener('hidden.bs.modal', function () {
        form.reset();
        // Hapus class validasi error jika ada
        const invalidInputs = form.querySelectorAll('.is-invalid');
        invalidInputs.forEach(input => input.classList.remove('is-invalid'));
    });
    
    // Validasi real-time untuk NIS
    document.getElementById('nis').addEventListener('input', function() {
        const value = this.value;
        if (value && !/^\d+$/.test(value)) {
            this.classList.add('is-invalid');
        } else {
            this.classList.remove('is-invalid');
        }
    });
    
    // Validasi real-time untuk NISN
    document.getElementById('nisn').addEventListener('input', function() {
        const value = this.value;
        if (value && !/^\d+$/.test(value)) {
            this.classList.add('is-invalid');
        } else {
            this.classList.remove('is-invalid');
        }
    });
    
    // Validasi real-time untuk email
    document.getElementById('email').addEventListener('blur', function() {
        const email = this.value.trim();
        if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            this.classList.add('is-invalid');
        } else {
            this.classList.remove('is-invalid');
        }
    });
    
    // Validasi dan format nomor telepon
    document.getElementById('no_telepon').addEventListener('input', function() {
        let value = this.value.replace(/\D/g, ''); // Hapus semua karakter non-digit
        this.value = value;
        
        if (value && (!value.startsWith('08') || value.length < 10 || value.length > 14)) {
            this.classList.add('is-invalid');
        } else {
            this.classList.remove('is-invalid');
        }
    });
});
</script>