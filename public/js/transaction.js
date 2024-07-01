const videoElement = document.getElementById("videoElement");
const canvasElement = document.getElementById("canvasElement");
const photoElement = document.getElementById("photoElement");
const startButton = document.getElementById("startButton");
const captureButton = document.getElementById("captureButton");
const inputBuktiBayarElement = document.getElementById("buktiBayar");
const formElement = document.getElementById("form");

let stream;
let _id = "";

function dataToModal(id) {
    _id = id;
}

function submitBuktiBayar(form) {
    form.action = `/datamotor/transfer/${_id}`;
}

async function startWebcam() {
    try {
        stream = await navigator.mediaDevices.getUserMedia({ video: true });
        videoElement.srcObject = stream;
        startButton.disabled = true;
        captureButton.disabled = false;
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
}

captureButton.addEventListener("click", capturePhoto);

//
//
//
let _idForComplain;
let komplainMotor = document.getElementById("inputKomplainMotor");
let komplainPlatNomor = document.getElementById("inputKomplainPlatNomor");
let komplainTipeMotor = document.getElementById("inputKomplainTipeMotor");

function dataToModalComplain(motor) {
    console.log(motor);
    _idForComplain = motor["id"];

    komplainMotor.value = motor["motor"];
    komplainPlatNomor.value = motor["plat_nomor"];

    if (motor["tipe_motor"] == "Motor Kecil") {
        komplainTipeMotor.selectedIndex = 1;
    } else {
        komplainTipeMotor.selectedIndex = 2;
    }
}

function submitKomplain(form) {
    form.action = `/datamotor/komplain/${_idForComplain}`;
}
