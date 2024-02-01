const burger = document.getElementById("burger");
const content = document.querySelector(".content-left"); 
burger.addEventListener("click", () => {
    content.classList.toggle("open");
});
document.addEventListener("DOMContentLoaded", function () {
    let snowflakesContainer = document.querySelector(".snowflakes");
  
    for (let i = 0; i < 60; i++) {
        let snowflake = document.createElement("div");
        snowflake.className = "snowflake";
        snowflake.style.left = Math.random() * 100 + "vw";
        snowflake.style.animationDuration = Math.random() * 3 + 2 + "s";
        snowflakesContainer.appendChild(snowflake);
        
    }
  });
  
