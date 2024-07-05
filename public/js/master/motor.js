let _idMotor;
let checkBoxEditMotor = document.getElementById("checkBoxEditMotor");

function takeIdMotor(id) {
    _idMotor = id;
    console.log(id);
}

function openModalEditMotor(motor) {
    console.log(motor);
    let inputEditNamaMotor = document.getElementById("inputEditNamaMotor");
    let selectEditMerek = document.getElementById("selectEditMerek");
    let selectEditJenis = document.getElementById("selectEditJenis");

    console.log(motor["merek"]);
    inputEditNamaMotor.value = motor["motor"];
    selectEditMerek.value = motor["id_merek"];
    selectEditJenis.value = motor["id_jenis"];

    // setiap buka modal checbox tidak di centang
    checkBoxEditMotor.checked = false;

    confirmEditMotor();
}

function confirmEditMotor() {
    let btnEditMotor = document.getElementById("btnEditMotor");

    if (checkBoxEditMotor.checked) {
        btnEditMotor.disabled = false;
    } else {
        btnEditMotor.disabled = true;
    }
}

function submitEditMotor(form) {
    form.action = `/motor/${_idMotor}`;
}

function submitDeleteMotor(form) {
    form.action = `/motor/${_idMotor}`;
}
