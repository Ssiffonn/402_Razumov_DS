let n = Math.floor(Math.random() * (1000 - 100)) + 100;
export var hiddenNumber = n.toString().split('').map(Number);
console.log(hiddenNumber);