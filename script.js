const sectioning = document.getElementById("sectioning");
const menu = document.querySelector(".menu");

sectioning.addEventListener("click", function () {
  const hamIcon = this.querySelector(".navigation");
  const crossIcon = this.querySelector(".cross-icon");
  if (hamIcon.style.display === "none") {
    hamIcon.style.display = "inline-block";
    menu.style.display = "none";
    crossIcon.style.display = "none";
  } else {
    crossIcon.style.display = "inline-block";
    hamIcon.style.display = "none";
    menu.style.display = "block";
  }
});
