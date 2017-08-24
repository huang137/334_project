
canvas               = O('logo')
context              = canvas.getContext('2d')
context.font         = 'bold italic 78px Arial'
context.textBaseline = 'top'
image                = new Image()
image.src            = '../pic/logo2.jpg'

image.onload = function()
{
  gradient = context.createLinearGradient(0, 0, 0, 89)
  gradient.addColorStop(0.00, '#faa')
  gradient.addColorStop(0.66, '#f00')
  context.fillStyle = gradient
  context.fillText(  "    indsor Library", 0, 0)
  context.strokeText("    indsor Library", 0, 0)
  context.drawImage(image, 18, 10)
}

function O(i) { return typeof i == 'object' ? i : document.getElementById(i) }
function S(i) { return O(i).style                                            }
function C(i) { return document.getElementsByClassName(i)                    }
