const CARDS = document.querySelectorAll(".carta");
var carta1, carta2;

function matchCards(img1, img2) {
    if (img1 === img2) {
        return console.log("cards matched");
    } else {
        console.log("cards don't match");
        carta1.classList.add("shake");
        carta2.classList.add("shake");
    }
}

function flipCard(e) {
    let carta = e.target;
    if (carta !== carta1) {
        carta.classList.add("flip");
        if (!carta1) {
            return carta1 = carta;
        }
        carta2 = carta;
        let carta1Img = carta1.querySelector("img").src;
        let carta2Img = carta2.querySelector("img").src;
        matchCards(carta1Img, carta2Img);
    }
}

CARDS.forEach(carta => {
    carta.addEventListener("click", flipCard);
});