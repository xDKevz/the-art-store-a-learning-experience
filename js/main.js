window.addEventListener("load", function() {
    // Action for clicking  the user icon on the nav bar.
    document.querySelector("#user").addEventListener("click", function() {
        var x = document.getElementById("user-options");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    });
    
    
    // Action for toggling the hamburger icon
    document.querySelector("#toggle").addEventListener("click", function() {
        var x = document.getElementById("menu");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    })
});