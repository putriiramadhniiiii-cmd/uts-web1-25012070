```css
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #fff0f6;
    color: #4a2435;
}

/* HEADER */
.header {
    background: linear-gradient(135deg, #db2777, #f472b6);
    color: white;
    text-align: center;
    padding: 25px 15px;
}

.header h1 {
    margin: 0 0 8px;
}

.header nav {
    margin-top: 18px;
}

.header nav a {
    color: white;
    text-decoration: none;
    margin: 0 12px;
    font-weight: bold;
}

.header nav a:hover {
    color: #fce7f3;
    text-decoration: underline;
}

/* CONTAINER */
.container {
    max-width: 1100px;
    margin: 25px auto;
    padding: 0 18px;
    min-height: 55vh;
}

/* PANEL */
.hero, .panel, .ringkasan {
    background: white;
    padding: 22px;
    border-radius: 12px;
    margin-bottom: 22px;
    box-shadow: 0 3px 12px rgba(219, 39, 119, 0.10);
}

.hero h2, .panel h2, .panel h3 {
    color: #be185d;
}

/* FORM PENCARIAN */
.form-cari, .favorit {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    align-items: center;
    margin: 12px 0;
}

input, select {
    padding: 10px;
    border: 1px solid #f3b5d0;
    border-radius: 7px;
    font-size: 15px;
    background: #fffafd;
    color: #4a2435;
}

input:focus, select:focus {
    outline: 2px solid #f9a8d4;
    border-color: #db2777;
}

/* TOMBOL */
button, .tombol {
    display: inline-block;
    border: none;
    background: #db2777;
    color: white;
    padding: 10px 15px;
    border-radius: 7px;
    cursor: pointer;
    text-decoration: none;
    font-size: 14px;
    transition: background 0.2s ease;
}

button:hover, .tombol:hover {
    background: #9d174d;
}

.tombol-abu {
    background: #9ca3af;
}

.tombol-abu:hover {
    background: #6b7280;
}

/* DAFTAR MENU */
.menu-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
    gap: 18px;
}

.menu-card {
    background: white;
    border: 1px solid #fbcfe8;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 3px 12px rgba(219, 39, 119, 0.10);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.menu-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 7px 18px rgba(219, 39, 119, 0.15);
}

.menu-card h3 {
    margin-bottom: 8px;
    color: #9d174d;
}

/* LABEL KATEGORI */
.kategori {
    display: inline-block;
    background: #fce7f3;
    color: #9d174d;
    padding: 5px 9px;
    border-radius: 20px;
    font-size: 12px;
}

/* HARGA */
.harga {
    font-size: 20px;
    font-weight: bold;
    color: #db2777;
}

/* INPUT JUMLAH */
.menu-card input[type="number"] {
    width: 100%;
    margin: 8px 0 12px;
}

.tombol-penuh {
    width: 100%;
}

/* PESAN NOTIFIKASI */
.pesan {
    background: #fce7f3;
    border-left: 5px solid #db2777;
    color: #831843;
    padding: 14px;
    margin-bottom: 18px;
    border-radius: 6px;
}

/* KERANJANG KOSONG */
.kosong {
    background: white;
    border: 1px dashed #f9a8d4;
    padding: 20px;
    border-radius: 10px;
    margin: 15px 0;
    color: #9d174d;
}

/* TABEL */
.table-wrap {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: white;
}

th, td {
    padding: 13px;
    border-bottom: 1px solid #fbcfe8;
    text-align: left;
}

th {
    background: #fce7f3;
    color: #9d174d;
}

tbody tr:hover {
    background: #fff5f9;
}

/* TOMBOL HAPUS */
.tombol-hapus {
    background: #e11d48;
}

.tombol-hapus:hover {
    background: #9f1239;
}

/* RINGKASAN PESANAN */
.ringkasan {
    margin-top: 22px;
    border: 1px solid #fbcfe8;
}

.ringkasan h2, .ringkasan h3 {
    color: #be185d;
}

.diskon {
    color: #15803d;
    font-weight: bold;
}

/* FOOTER */
.footer {
    text-align: center;
    background: #fce7f3;
    padding: 18px;
    margin-top: 35px;
    color: #9d174d;
}

/* TAMPILAN HP */
@media (max-width: 600px) {
    .form-cari, .favorit {
        flex-direction: column;
        align-items: stretch;
    }

    .form-cari input, .form-cari select,
    .favorit select {
        width: 100%;
    }

    .header nav a {
        display: inline-block;
        margin: 6px;
    }

    .container {
        padding: 0 12px;
    }

    .hero, .panel, .ringkasan {
        padding: 16px;
    }
}
```