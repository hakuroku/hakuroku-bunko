let createField = document.getElementsByClassName('comics-create_field')
let dropZone = document.getElementsByClassName('comics-create_dropzone')
let dt = new DataTransfer();

const drop = (event) => {
    event.preventDefault();
    dt.items.add(event.dataTransfer.files[0]);
    createField.files = dt.files;
}

dropZone.addEventListener('drop', drop);