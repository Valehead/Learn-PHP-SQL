function hideNewCustInfo(){
    var newInfo = document.getElementById("newCustInfo");
    newInfo.style.display = "none";
    var newGames = document.getElementById("newCustGames");
    newGames.style.display = "block";
};
function showNewCustInfo(){
    var newGames = document.getElementById("newCustGames");
    newGames.style.display = "none";
    var newInfo = document.getElementById("newCustInfo");
    newInfo.style.display = "block";
};