"use strict";

let dropFileForm = document.getElementById("dropFileForm");
let dropFileDiv = document.getElementById("dropFileDiv");
let fileLabelText = document.getElementById("fileLabelText");
let uploadStatus = document.getElementById("uploadStatus");
let fileInput = document.getElementById("fileInput");
let droppedFiles;

function overrideDefault(event){
    event.preventDefault();
    event.stopPropagation();
}

function fileHover(){
    dropFileDiv.classList.add("fileHover");
}

function fileHoverEnd(){
    dropFileDiv.classList.remove("fileHover");
}

function addFiles(event){
    console.log('addFiles');
    droppedFiles = event.target.files || event.dataTransfer.files;
    showFiles(droppedFiles);
}

function showFiles(files){
    console.log('showFiles');
    if(files.length > 1){
        fileLabelText.innerText = files.length + " files selected";
    }
    else{
        fileLabelText.innerText = files[0].name;
    }
}

function changeStatus(text){
    console.log('changeStatus');
    uploadStatus.innerText = text;
}

function uploadFiles(event){
    // console.log(droppedFiles);
    //
    // event.preventDefault();  // Stop redirect to PHP
    // if(typeof droppedFiles === 'undefined'){
    //     console.log('no such files');
    //     return false;
    // }
    //
    // console.log('uploadFiles');
    // changeStatus("Uploading...");
    //
    // console.log("SubmitXHR");
    // let xhr = new XMLHttpRequest();
    // xhr.open('POST', 'https://dev-21606393.users.info.unicaen.fr/M1/ProjetLibPhp/TestApp/index.php?action=upload');
    // xhr.responseType = 'json';
    //
    // let formData = new FormData();
    // for(let i = 0; i < droppedFiles.length; i++) {
    //     formData.append('files', droppedFiles[i])
    // }
    //
    // xhr.addEventListener('load', function(e) {
    //     console.log('xhr response load : ', xhr.response);
    // });
    //
    // xhr.upload.addEventListener('progress', function (e) {
    //     console.log('Progress Bar : ', e);
    //     document.getElementById("progressBar").value = e.loaded  / e.total;
    // });
    //
    // xhr.onreadystatechange = function(){
    //     if(xhr.readyState == 4 && xhr.status == 200) {
    //         window.location = "https://dev-21606393.users.info.unicaen.fr/M1/ProjetLibPhp/TestApp/index.php?action=displayUploadSucces";
    //     }
    // }
    //
    // xhr.onerror = function () {
    //   console.log("** An error occurred during the transaction");
    // };
    //
    // xhr.send(formData);

    // Affiche la preview
    // setVisiblePreview();
}

function setVisiblePreview(){
    // Invisible upload section
    let upload = document.querySelector('.upload');
    upload.classList.add('fantome');

    // Show metadata of file upload
    let previewInfo = document.querySelector('.previewInfo');
    previewInfo.classList.remove('fantome');

    // Show actions dispo
    let previewAction = document.querySelector('.previewAction');
    previewAction.classList.remove('fantome');

    // Add multiple action for users
}
