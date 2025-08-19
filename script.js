
ymaps.ready(init);
function init(){
  const map = new ymaps.Map("map", {
    center: [55.7558, 37.6176], // Москва
    zoom: 15
  });

  const placemark = new ymaps.Placemark([55.7558, 37.6176], {
    balloonContent: 'Medyatina, ул. Медовая, д. 10'
  });

  map.geoObjects.add(placemark);
}

document.addEventListener("DOMContentLoaded", function () {
  const burger = document.querySelector(".menu__burger");
  const menu = document.querySelector(".menu");
  const body = document.body;

  if (burger && menu) {
    burger.addEventListener("click", () => {
      menu.classList.toggle("menu--active");
      body.classList.toggle("menu-open");
    });
  }
});

