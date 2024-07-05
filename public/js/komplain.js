let _idKomplain;

function takeIdKomplain(id) {
    _idKomplain = id;
    console.log(id);
}

function openModalGantiRugi(komplain) {
    let inputGantiRugi = document.getElementById("inputGantiRugi");

    inputGantiRugi.value = komplain["komplain"];
}

function submitGantiRugi(form) {
    form.action = `/komplain/${_idKomplain}`;
}
