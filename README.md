## <p align="center" style="margin-top: 0;">SISTEM PENYEWAAN ALAT MUSIK</p>

<p align="center">

  <img src="/public/LogoUnsulbar.png" width="300" alt="LogoUnsulbar" />

</p>

### <p align="center">WINDI</p>

### <p align="center">D0222043</p></br>

### <p align="center">FRAMEWORK WEB BASED</p>

### <p align="center">2025</p>

---
---

## 🎶 SISTEM PENYEWAAN ALAT MUSIK

### 👤 Role dan Hak Akses

| Role       | Akses                                                               |
| ---------- | ------------------------------------------------------------------- |
| *Admin*    | Mengelola data pengguna, alat musik, dan transaksi penyewaan        |
| *Penyewa*  | Melihat alat musik, melakukan penyewaan, melihat status penyewaan   |
| *Penyedia* | Menambahkan/mengelola alat musik yang tersedia                      |

---

## 🗃 Struktur Database

### 1. Tabel `users`

| Field               | Tipe Data        | Keterangan                                  |
| ------------------- | ---------------- | ------------------------------------------- |
| id                  | bigint (PK)      | ID unik                                     |
| name                | varchar          | Nama lengkap pengguna                       |
| email               | varchar (unique) | Alamat email                                |
| email_verified_at   | timestamp        | Waktu verifikasi email                      |
| password            | varchar          | Password terenkripsi                        |
| phone               | varchar          | Nomor telepon (opsional)                    |
| address             | text             | Alamat lengkap (opsional)                   |
| role                | enum             | admin, penyewa, penyedia (default: penyewa) |
| remember_token      | varchar          | Token untuk "remember me"                   |
| created_at          | timestamp        | Tanggal dibuat                              |
| updated_at          | timestamp        | Tanggal diperbarui                          |

---

### 2. Tabel `instruments`

| Field       | Tipe Data   | Keterangan                             |
| ----------- | ----------- | -------------------------------------- |
| id          | bigint (PK) | ID alat musik                          |
| name        | varchar     | Nama alat musik                        |
| slug        | varchar     | URL-friendly name                      |
| description | text        | Deskripsi alat musik                   |
| stock       | integer     | Jumlah alat musik tersedia             |
| kode_alat   | varchar     | Kode unik untuk alat musik             |
| image       | varchar     | Path ke gambar utama alat musik        |
| gallery     | json        | Kumpulan gambar alat musik (opsional)  |
| status      | enum        | tersedia, dipinjam (default: tersedia) |
| created_at  | timestamp   | Tanggal dibuat                         |
| updated_at  | timestamp   | Tanggal diperbarui                     |

---

### 3. Tabel `borrowings`

| Field            | Tipe Data   | Keterangan                                   |
| ---------------- | ----------- | -------------------------------------------- |
| id               | bigint (PK) | ID peminjaman                                |
| user_id          | bigint (FK) | Relasi ke pengguna (`users`)                 |
| kode_peminjaman  | varchar     | Kode unik peminjaman                         |
| tanggal_pinjam   | date        | Tanggal mulai pinjam                         |
| tanggal_kembali  | date        | Tanggal pengembalian (opsional)              |
| status           | enum        | menunggu, diproses, dikembalikan, dibatalkan |
| catatan          | text        | Catatan tambahan (opsional)                  |
| created_at       | timestamp   | Tanggal dibuat                               |
| updated_at       | timestamp   | Tanggal diperbarui                           |

---

### 4. Tabel `borrowing_items`

| Field          | Tipe Data   | Keterangan                           |
| -------------- | ----------- | ------------------------------------ |
| id             | bigint (PK) | ID detail penyewaan                  |
| borrowing_id   | bigint (FK) | Relasi ke penyewaan (`borrowings`)   |
| instrument_id  | bigint (FK) | Relasi ke alat musik (`instruments`) |
| jumlah         | integer     | Jumlah alat musik yang dipinjam      |
| created_at     | timestamp   | Tanggal dibuat                       |
| updated_at     | timestamp   | Tanggal diperbarui                   |

---

## 🔗 Relasi Antar Tabel

| Tabel Asal  | Tabel Tujuan     | Relasi      | Penjelasan                                           |
| ----------- | ---------------- | ----------- | ---------------------------------------------------- |
| users       | borrowings       | one-to-many | Satu user bisa membuat banyak penyewaaan             |
| instruments | borrowing_items | one-to-many | Satu alat musik bisa muncul di banyak transaksi       |
| borrowings  | borrowing_items | one-to-many | Satu penyewa bisa memiliki banyak item alat musik     |

---

