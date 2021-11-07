class Font {
  constructor(body, img) {
    this.body = body;
    this.img = img;

    // body
    this.bodyElement = document.getElementsByTagName(this.body);
    // img
    this.imgInHomePage = document.getElementById(this.img);
  }

  changeIntoCold() {
    // changer image winter
    this.imgInHomePage.src = "../../public/wallepaper/winter.jpg";
    document.querySelector("body").classList.remove("temperate");
    document.querySelector("body").classList.remove("summer");
    document.querySelector("body").classList.add("cold");
  }

  changeIntoTemp() {
    // changer image temp
    this.imgInHomePage.src = "../../public/wallepaper/temperate.jpg";
    document.querySelector("body").classList.remove("cold");
    document.querySelector("body").classList.remove("summer");
    document.querySelector("body").classList.add("temperate");
  }
  changeIntoHot() {
    // changer image sum.jpg
    this.imgInHomePage.src = "../../public/wallepaper/sum.jpg";
    document.querySelector("body").classList.remove("temperate");
    document.querySelector("body").classList.remove("cold");
    document.querySelector("body").classList.add("summer");
  }
}
