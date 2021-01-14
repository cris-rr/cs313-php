function buttonClicked() {
  alert("Clicked!");
}

function setColor() {
  const textColor = document.getElementById("color");
  const divOne = document.getElementById("divOne");
  divOne.style.background = textColor.value;
}

function setColorJQuery() {
  $("#divOne").css("background-color", $("#color").val());
}