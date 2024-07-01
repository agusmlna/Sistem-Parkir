let inputBiaya = document.getElementById("inputBiaya");

function selectBox(e) {
    let biaya = 0;
    let kategori = (document.getElementById("jenisMotor").value =
        e.target.value);
    console.log(kategori);

    if (kategori == 1) {
        // tipeMotor = "Motor Kecil";
        biaya = 5000;
    } else if (kategori == 2) {
        // tipeMotor = "Motor Besar";
        biaya = 7000;
    }

    inputBiaya.value = biaya;
}
