const videoElement = document.getElementById("videoElement");
const canvasElement = document.getElementById("canvasElement");
const photoElement = document.getElementById("photoElement");
const startButton = document.getElementById("startButton");
const captureButton = document.getElementById("captureButton");
const submitWebcamButton = document.getElementById("submitWebcamButton");
const closeWebcamButton = document.getElementById("closeWebcamButton");
const inputBuktiBayarElement = document.getElementById("buktiBayar");
const imageModal = document.querySelector(".image-modal");
const formElement = document.getElementById("form");

let stream;
let _id = "";

function dataToModal(id) {
    _id = id;
}

function submitBuktiBayar(form) {
    form.action = `/data-parkir/transfer/${_id}`;
}

async function startWebcam() {
    try {
        stream = await navigator.mediaDevices.getUserMedia({ video: true });
        videoElement.srcObject = stream;
        startButton.disabled = true;
        captureButton.disabled = false;
        photoElement.style.display = "none";
        videoElement.style.display = "block";
        submitWebcamButton.disabled = true;
    } catch (error) {
        console.error("Error accessing webcam:", error);
    }
}

startButton.addEventListener("click", startWebcam);

function capturePhoto() {
    canvasElement.width = videoElement.videoWidth;
    canvasElement.height = videoElement.videoHeight;
    canvasElement.getContext("2d").drawImage(videoElement, 0, 0);
    const photoDataUrl = canvasElement.toDataURL("image/jpeg");
    photoElement.src = photoDataUrl;
    canvasElement.toBlob((blob) => {
        let list = new DataTransfer();
        let file = new File([blob], `bukti-bayar-${_id}.jpg`, {
            type: "image/jpeg",
        });
        list.items.add(file);

        let myFileList = list.files;

        inputBuktiBayarElement.files = myFileList;
    }, "image/jpeg");
    console.log(inputBuktiBayarElement.files);
    photoElement.style.display = "block";
    videoElement.style.display = "none";
    submitWebcamButton.disabled = false;

    stopWebcam(stream);
}

captureButton.addEventListener("click", capturePhoto);

function stopWebcam(stream) {
    startButton.disabled = false;
    captureButton.disabled = true;

    stream.getTracks().forEach((track) => {
        if (track.readyState == "live") {
            track.stop();
        }
    });
}
closeWebcamButton.addEventListener("click", () => {
    submitWebcamButton.disabled = true;
    photoElement.style.display = "none";
    videoElement.style.display = "block";
    stopWebcam(stream);
});

//
//
//
let _idForComplain;
let komplainMotor = document.getElementById("inputKomplainMotor");
let komplainPlatNomor = document.getElementById("inputKomplainPlatNomor");
let komplainJenisMotor = document.getElementById("inputKomplainJenisMotor");

function dataToModalComplain(motor) {
    console.log(motor);
    _idForComplain = motor["id"];

    komplainMotor.value = motor["motor"];
    komplainPlatNomor.value = motor["plat_nomor"];

    if (motor["jenis"] == "Motor Kecil") {
        komplainJenisMotor.selectedIndex = 1;
    } else {
        komplainJenisMotor.selectedIndex = 2;
    }
}

function submitKomplain(form) {
    form.action = `/data-parkir/${_idForComplain}`;
}

function sendImageToModal(image) {
    console.log("image modal");
    console.log(image);
    console.log(imageModal);
    imageModal.src = image;
}

function submitCancelParkir(form) {
    form.action = `/data-parkir/${_id}`;
}

// edit data parkir
let filterDataEdit;

let selectNamaMotorEdit = document.getElementById("selectNamaMotorEdit");
let dataMotorEdit = JSON.parse(document.getElementById("dataMotorEdit").value);

function selectMerekEdit(e) {
    // reset option select nama motor
    selectNamaMotorEdit.length = 0;

    let selectMerekMotor = (document.getElementById("merekMotor").value =
        e.target.value);
    console.log(merekMotor);

    optionDataMotor(selectMerekMotor, null);

    // inputJenisDanBiaya();
}

function optionDataMotor(idMerek, idMotor) {
    console.log(dataMotorEdit);

    filterDataEdit = dataMotorEdit.filter(
        (data) => data["id_merek"] == idMerek
    );

    console.log(filterDataEdit);

    filterDataEdit.forEach((data) => {
        var opt = document.createElement("option");
        opt.value = data["id"];
        opt.innerHTML = data["motor"];
        selectNamaMotorEdit.appendChild(opt);
    });

    if (idMotor != null) {
        selectNamaMotorEdit.value = idMotor;
    }
}

function selectMotorEdit(e) {
    // inputJenisDanBiaya();
}

// function inputJenisDanBiaya() {
//     let inputJenisMotor = document.getElementById("jenisMotor");
//     let inputBiaya = document.getElementById("biaya");
//     let motor = filterDataEdit.find(
//         (data) => data["motor"] === selectNamaMotorEdit.value
//     );
//     console.log(motor);

//     inputJenisMotor.value = motor["jenis"];
//     inputBiaya.value = motor["biaya"];
//     inputIdMotor(motor["id"]);
// }

// function inputIdMotor(id) {
//     let inputIdMotor = document.getElementById("idMotor");
//     inputIdMotor.value = id;
// }

let _idEditParkir;

function editModal(data) {
    let platNomor = document.getElementById("platNomor");
    let properti = document.getElementById("properti");
    let merekMotor = document.getElementById("merekMotor");

    platNomor.value = data["plat_nomor"];
    properti.value = data["properti"];
    merekMotor.value = data["id_merek"];
    optionDataMotor(data["id_merek"], data["id_motor"]);

    _idEditParkir = data["id"];

    console.log(data);
}

function confirmEditParkir() {
    let btnEditParkir = document.getElementById("btnEditParkir");

    if (checkBoxEditMotor.checked) {
        btnEditParkir.disabled = false;
    } else {
        btnEditParkir.disabled = true;
    }
}

function onSubmitEditParkir(form) {
    form.action = `/data-parkir/edit-parkir/${_idEditParkir}`;
}
