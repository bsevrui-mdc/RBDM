const CARDS = document.querySelectorAll(".carta");
var parejas = 0;
var carta1, carta2;
var disabledDeck = false;

function flipCard(e) {
    let carta = e.target;
    if (carta !== carta1 && !disabledDeck) {
        carta.classList.add("flip");
        if (!carta1) {
            return carta1 = carta;
        }
        carta2 = carta;
        disabledDeck = true;
        let carta1Img = carta1.querySelector("img").src;
        let carta2Img = carta2.querySelector("img").src;
        matchCards(carta1Img, carta2Img);
    }
}

function matchCards(img1, img2) {
    if (img1 === img2) {
        parejas++;
        if (parejas == 8) {
            setTimeout(() => {
                return shuffleCard();
            }, 1000);
        }
        carta1.removeEventListener("click", flipCard);
        carta2.removeEventListener("click", flipCard);
        carta1 = null;
        carta2 = null;
        return disabledDeck = false;
    }
    setTimeout(() => {
        carta1.classList.add("shake");
        carta2.classList.add("shake");
    }, 400);
    setTimeout(() => {
        carta1.classList.remove("shake", "flip");
        carta2.classList.remove("shake", "flip");
        carta1 = null;
        carta2 = null;
        disabledDeck = false;
    }, 1200);
}

function shuffleCard() {
    parejas = 0;
    carta1 = null;
    carta2 = null;
    disabledDeck = false;
    let array = [1, 2, 3, 4, 5, 6, 7, 8, 1, 2, 3, 4, 5, 6, 7, 8];
    array.sort(() => Math.random() > 0.5 ? 1: -1);
    CARDS.forEach((carta, index) => {
        carta.classList.remove("flip");
        let imgTag = carta.querySelector("img");
        imgTag.src = `./assets/img/juegoMemoria/img-${array[index]}.png`;
        carta.addEventListener("click", flipCard);
    });
}

shuffleCard();

CARDS.forEach(carta => {
    carta.addEventListener("click", flipCard);
});