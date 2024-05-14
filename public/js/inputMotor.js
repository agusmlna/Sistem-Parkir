let tipeMotor;
let biaya;

let inputBiaya = document.querySelector("#biaya");
let inputTipeMotor = document.querySelector("#tipeMotor");

function selectBox(e) {
    let kategori = (document.querySelector("#kategori").value = e.target.value);
    console.log(kategori);

    if (kategori == 1) {
        tipeMotor = "Motor Kecil";
        biaya = 5000;
    } else if (kategori == 2) {
        tipeMotor = "Motor Gede";
        biaya = 7000;
    }

    inputBiaya.value = biaya;
    inputBiaya.text = biaya;
    inputTipeMotor.value = tipeMotor;
}
