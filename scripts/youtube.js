function vidon(urlink) {
    console.log(urlink)
    linkyou = createYouTubeEmbedLink(urlink);
    var div = document.createElement('div');
    div.setAttribute("id", "overlay");
    div.innerHTML = "<i class='fas fa-times' onclick='vidoff()'></i>";
    div.innerHTML += "<iframe  max-width='1900' max-height='950' min-width='600' min-height='250' frameborder='0' src='" + linkyou + "'></iframe>";
    div.style.display = "block";
    document.body.appendChild(div);

}

function vidoff() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("overlay").remove();
}

function createYouTubeEmbedLink(link) {
    return link.replace("https:\/\/www.youtube.com\/watch?v=", "http:\/\/www.youtube.com\/embed\/");
}