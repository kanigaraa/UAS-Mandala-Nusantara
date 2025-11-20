<style>
.rekomendasi {
    background-image: url('assets/rekomendasi_bg.png');
    background-size: cover;
    background-position: center;
    padding: 80px 20px;
    margin-top: -7px;
}

.rekomendasiContainer h1 {
    text-align: center;
    color: #4b0000;
}

.rekomendasiContainer p {
    text-align: center;
    color: #8b6f47;
}

.rekomendasiGrid {
    margin-top: 40px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(290px, 1fr));
    gap: 30px;
    justify-items: center;
}

/* CARD */
.card-rekomendasi {
    background: white;
    border-radius: 16px;
    outline: 4px rgba(212, 175, 55, 0.2) solid;
    outline-offset: -4px;
    box-shadow: 0 10px 15px rgba(0, 0, 0, .1);
    overflow: hidden;
    width: 290px;
}

.card-image img {
    width: 100%;
    height: 192px;
    object-fit: cover;
}

.card-content {
    padding: 20px;
}

.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.tag {
    background: #d4af37;
    color: white;
    padding: 6px 16px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 600;
}

.lokasi {
    color: #8b6f47;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 6px;
    font-weight: 500;
}

.lokasi-icon {
    width: 10px;
    height: 14px;
    background: #8b6f47;
    border-radius: 2px;
}

.card-title {
    margin-top: 18px;
    font-size: 24px;
    color: #3d2817;
    font-weight: 700;
}

.card-desc {
    margin-top: 10px;
    color: #8b6f47;
    font-size: 14px;
    line-height: 22px;
}

.btn-selengkapnya {
    margin-top: 18px;
    width: 100%;
    padding: 10px 0;
    border: none;
    border-radius: 9999px;
    background: linear-gradient(90deg, #d4af37, #8b6f47);
    color: white;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
}

.btn-icon {
    width: 18px;
    height: 16px;
    background: white;
    border-radius: 3px;
}
</style>