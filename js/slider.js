const kornizaEBrendeve = [...document.querySelectorAll('.kornizaEBrendeve')];
const shkoDjathtas = [...document.querySelectorAll('.shkoDjathtas')];
const shkoMajtas = [...document.querySelectorAll('.shkoMajtas')];

kornizaEBrendeve.forEach((item, i) => {
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;

    shkoDjathtas[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;
    })

    shkoMajtas[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
    })
})