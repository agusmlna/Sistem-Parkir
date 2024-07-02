let _idJenisMotor;
let checkBoxEditJenis = document.getElementById("checkBoxEditJenis");

function takeId(id) {
    _idJenisMotor = id;
}

function openModalEditJenis(jenis) {
    let editInputJenis = document.getElementById("editInputJenis");
    let editInputBiaya = document.getElementById("editInputBiaya");

    editInputJenis.value = jenis["jenis"];
    editInputBiaya.value = jenis["biaya"];

    // setiap buka modal checbox tidak di centang
    checkBoxEditJenis.checked = false;

    confirmEditJenis();
}

function confirmEditJenis() {
    let btnEditJenis = document.getElementById("btnEditJenis");

    if (checkBoxEditJenis.checked) {
        btnEditJenis.disabled = false;
    } else {
        btnEditJenis.disabled = true;
    }
}

function submitEditJenis(form) {
    form.action = `/jenis-motor/${_idJenisMotor}`;
}

function submitDeleteJenis(form) {
    form.action = `/jenis-motor/${_idJenisMotor}`;
}
