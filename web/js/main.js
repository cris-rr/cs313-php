let i = 0;
const speed = 50;
const quote = '"Do not pray for an easy life; pray for the strength to endure a difficult one"';

function writeMotto() {
  const motto = document.getElementById("motto");
  if (i < quote.length) {
    motto.innerHTML += quote.charAt(i);
    i++;
    setTimeout(writeMotto, speed);
  }
}