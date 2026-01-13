const value = document.querySelector("#price-value");
const input = document.querySelector("#pi_input");
const formFilter = document.getElementsByName("f")
const filter = document.querySelector("#sort-filter")

value.textContent = input.value;

input.addEventListener("input", (event) => {
  value.textContent = event.target.value;
});