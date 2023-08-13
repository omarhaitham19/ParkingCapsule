
function toggleInputs() {
  var bookingType = document.getElementById("bookingType").value;
  var pricePerHourContainer = document.getElementById("pricePerHourContainer");
  var pricePerMonthContainer = document.getElementById("pricePerMonthContainer");

  if (bookingType === "hourly") {
    pricePerHourContainer.style.display = "flex";
    pricePerMonthContainer.style.display = "none";
  } else if (bookingType === "monthly") {
    pricePerHourContainer.style.display = "none";
    pricePerMonthContainer.style.display = "flex";
  } else if (bookingType === "both") {
    pricePerHourContainer.style.display = "flex";
    pricePerMonthContainer.style.display = "flex";
  }
}
