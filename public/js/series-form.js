const createButtons = document.querySelectorAll(".series-button");
const seriesForm = document.querySelector(".series-form")
console.log(createButtons);
console.log(seriesForm);

    for (const createButton of createButtons) {
        const formAppend = (e) => {
            e.preventDefault();
            seriesForm.classList.toggle('display-none')
        }

        createButton.addEventListener('click', formAppend);
    }


