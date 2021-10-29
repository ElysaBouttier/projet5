class Font {
  constructor(navColor, color, fontColor, fontText, background, temperature) {
    this.navColor = navColor;
    this.color = color;
    this.fontColor = fontColor;
    this.fontText = fontText;
    this.background = background;
    this.temperature = temperature;

    this.init();
  }

  init() {
    this.navBackground = document.getElementById("");
    this.mainBackground = document.getElementById("");
    this.fontColor = document.getElementById("");
    this.fontText = document.getElementById("");
    this.navBackground = document.getElementById("");
    this.background = document.getElementById("");

    this.temperature = this.getTemperature();
    this.changeStyle(this.temperature);

    
  }

  getTemperature() {
    const params = {
      access_key: "4e1451b8bd2c2090e4c386dc754342a3",
      query: "Los Angeles",
    };

    axios
      .get("http://api.weatherstack.com/current", { params })
      .then((response) => {
        const apiResponse = response.data;
        console.log(apiResponse.current.temperature);
        this.temperature = apiResponse.current.temperature;
      })
      .catch((error) => {
        console.log(error);
      });
  }

  changeStyle(temperature) {
    if (temperature < 12) {
      changeIntoCold();
    }
    if (temperature >= 12 && temperature <= 24) {
      changeIntoTemp();
    } else {
      changeIntoHot();
    }
  }
}
