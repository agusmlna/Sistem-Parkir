let _idMerekMotor;
let checkBoxEditMerek = document.getElementById("checkBoxEditMerek");

function takeIdMerek(id) {
    _idMerekMotor = id;
    console.log(id);
}

function openModalEditMerek(merek) {
    console.log(merek);
    let editInputMerek = document.getElementById("editInputMerek");

    editInputMerek.value = merek["merek"];

    // setiap buka modal checbox tidak di centang
    checkBoxEditMerek.checked = false;

    confirmEditMerek();
}

function confirmEditMerek() {
    let btnEditMerek = document.getElementById("btnEditMerek");

    if (checkBoxEditMerek.checked) {
        btnEditMerek.disabled = false;
    } else {
        btnEditMerek.disabled = true;
    }
}

function submitEditMerek(form) {
    form.action = `/merek-motor/${_idMerekMotor}`;
}

function submitDeleteMerek(form) {
    form.action = `/merek-motor/${_idMerekMotor}`;
}
