let createField = document.getElementsByClassName('comics-create_field')
let dropZone = document.getElementsByClassName('comics-create_dropzone')

console.log(createField)
console.log(dropZone[0])
let dt = new DataTransfer();

window.addEventListener('dragover', (event) => {
    event.preventDefault();
});

dropZone[0].addEventListener('drop', (event) => {
    event.preventDefault();
    console.log(event)
    
    dt.items.add(event.dataTransfer.files[0]);
    createField[0].files = dt.files;
});