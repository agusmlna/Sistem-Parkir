let _idPegawai;
let checkBoxEditPegawai = document.getElementById("checkBoxEditPegawai");
const userFoto = document.getElementById("userFoto");

function modalUserFoto(image) {
    console.log("image modal");
    console.log(image);
    console.log(imageModal);
    userFoto.src = image;
}

function takeIdPegawai(id) {
    _idPegawai = id;
    console.log(id);
}

function openModalEditPegawai(pegawai) {
    console.log(pegawai);
    let inputEditEmail = document.getElementById("inputEditEmail");
    let inputEditPassword = document.getElementById("inputEditPassword");
    let inputEditNama = document.getElementById("inputEditNama");
    let inputEditTTL = document.getElementById("inputEditTTL");
    let listJenisKelamin = document.querySelectorAll(
        'input[name="radioJenisKelamin"]'
    );
    let inputEditAlamat = document.getElementById("inputEditAlamat");
    let inputEditNoHP = document.getElementById("inputEditNoHP");

    inputEditEmail.value = pegawai["email"];
    inputEditPassword.value = pegawai["password"];
    inputEditNama.value = pegawai["name"];
    inputEditTTL.value = pegawai["tempat_tanggal_lahir"];
    inputEditAlamat.value = pegawai["alamat"];
    inputEditNoHP.value = pegawai["no_handphone"];
    for (const jenisKelamin of listJenisKelamin) {
        if (jenisKelamin.value == pegawai["jenis_kelamin"]) {
            jenisKelamin.checked = true;
        }
    }

    // setiap buka modal checbox tidak di centang
    checkBoxEditPegawai.checked = false;

    confirmEditPegawai();
}

function confirmEditPegawai() {
    let btnEditPegawai = document.getElementById("btnEditPegawai");

    if (checkBoxEditPegawai.checked) {
        btnEditPegawai.disabled = false;
    } else {
        btnEditPegawai.disabled = true;
    }
}

function submitEditPegawai(form) {
    form.action = `/data-pegawai/${_idPegawai}`;
}

function submitDeletePegawai(form) {
    form.action = `/data-pegawai/${_idPegawai}`;
}
