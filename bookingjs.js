function togglePopup(){
    document.getElementById("popup-1").classList.toggle("active");
  }

 // Select all elements with the "i" tag and store them in a NodeList called "stars"
 const stars = document.querySelectorAll(".fa-solid");

 // Loop through the "stars" NodeList
 stars.forEach((star, index1) => {
   // Add an event listener that runs a function when the "click" event is triggered
   star.addEventListener("click", () => {
     // Loop through the "stars" NodeList Again
     stars.forEach((star, index2) => {
       // Add the "active" class to the clicked star and any stars with a lower index
       // and remove the "active" class from any stars with a higher index
       index1 >= index2 ? star.classList.add("active") : star.classList.remove("active");
     });
   });
 });
 var buttons = document.querySelectorAll(".underline-btn");

  // Add a click event listener to each button
  buttons.forEach(function(button) {
    button.addEventListener("click", function() {
      // Remove the underline class from all buttons
      buttons.forEach(function(btn) {
        btn.classList.remove("underline");
      });

      // Add the underline class to the clicked button
      this.classList.add("underline");
    });
  });
  
