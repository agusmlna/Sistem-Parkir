let filterData;

let selectNamaMotor = document.getElementById("selectNamaMotor");
let dataMotor = JSON.parse(document.getElementById("dataMotor").value);

function selectMerek(e) {
    // reset option select nama motor
    selectNamaMotor.length = 0;

    let selectMerekMotor = (document.getElementById("merekMotor").value =
        e.target.value);
    console.log(merekMotor);

    filterData = dataMotor.filter(
        (data) => data["id_merek"] == selectMerekMotor
    );

    console.log(filterData);

    filterData.forEach((data) => {
        var opt = document.createElement("option");
        opt.value = data["motor"];
        opt.innerHTML = data["motor"];
        selectNamaMotor.appendChild(opt);
    });

    inputJenisDanBiaya();
}

function selectMotor(e) {
    inputJenisDanBiaya();
}

function inputJenisDanBiaya() {
    let inputJenisMotor = document.getElementById("jenisMotor");
    let inputBiaya = document.getElementById("biaya");
    let motor = filterData.find(
        (data) => data["motor"] === selectNamaMotor.value
    );
    console.log(motor);

    inputJenisMotor.value = motor["jenis"];
    inputBiaya.value = motor["biaya"];
    inputIdMotor(motor["id"]);
}

function inputIdMotor(id) {
    let inputIdMotor = document.getElementById("idMotor");
    inputIdMotor.value = id;
}
