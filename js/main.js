
window.addEventListener("load", function() {
    // document.querySelector(".mBars").addEventListener('click', function() {
    //     document.querySelector(".menu").classList.toggle("active");
    // });
    
    
    document.querySelector("#user").addEventListener("click", function() {
        var x = document.getElementById("user-options");
        if (x.style.display === "none") {
            x.style.display = "block";
            x.style.transition = "1s";
        } else {
            x.style.display = "none";
        }
    });
    
});