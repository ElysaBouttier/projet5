// apiRequest(){

// }


// function changeIntoCold(){
// bleue claire,
//     image glace
// }
// function changeIntoTemp(){
// Beige
// }
// function changeIntoHot(){
//     rgb(180,75,133)  violet
// }

// function changeStyle(){
//     if (temperature < 12){
//         changeIntoCold();
//     }
//     if (temperature >= 12 && temperature <= 24) {
//         changeIntoTemp();
//     } 
//     else {
//         changeIntoHot();
//     }
// }

// document.getElementsByClassName("img-home")[0].src="/public/img/beige.jpg"
// a = setInterval(function(){document.getElementsByClassName("img-home")[0].src="/public/img/beige"+Math.ceil(Math.random()*4)+".jpg"}, 5000)
// API Access Key : 4e1451b8bd2c2090e4c386dc754342a3
// http://api.weatherstack.com/
// // Current Weather API Endpoint

// http://api.weatherstack.com/current
//     ? access_key = 4e1451b8bd2c2090e4c386dc754342a3
//     & query = New York

// // optional parameters:

//     & units = m
//     & language = en
//     & callback = MY_CALLBACK

// current => weather_descriptions
// async function apiRequest() {
// const params = {
//   access_key: "4e1451b8bd2c2090e4c386dc754342a3",
//   query: "Los Angeles",
// };

// axios
//   .get("http://api.weatherstack.com/current", { params })
//   .then((response) => {
//     const apiResponse = response.data;
//     console.log(apiResponse.current.temperature);
//     console.log(
//       `Current temperature in ${apiResponse.location.name} is ${apiResponse.current.temperature}℃`
//     );
//   })
//   .catch((error) => {
//     console.log(error);
//   });

//   let temperature = apiResponse.current.weather_descriptions[0];
  

  
// // }

// //
// //  DOMS
// //
// //au passage : titre apparait

// let title = document.getElementById("author_name");
// let animation = anime({
//   targets: title,
//   loop: true,
//   direction: "alternate",
//   strokeDashoffset: [anime.setDashoffset, 0],
//   easing: "easeInOutSine",
//   duration: 700,
//   delay: (el, i) => {
//     return i * 500;
//   },
// });

// console.log(title);