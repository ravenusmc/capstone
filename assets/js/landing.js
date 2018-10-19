

function showAdvSearch() {
     var advSearchSection = document.getElementById('advSearchHidden');
     
     advSearchSection.style.visibility = "visible";
}

var advSearchBtn = document.getElementById('advSearchBtn');
if (advSearchBtn.addEventListener) {                       advSearchBtn.addEventListener("click", showAdvSearch);
 } else if (advSearchBtn.attachEvent) {                    advSearchBtn.attachEvent("onclick", showAdvSearch);
 }