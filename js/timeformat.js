hh:mm
//HH:mm
function (timeStr) {
  let newStr = '';
  let night = false;
  let timeArr = explode(':', timeStr);

  if (timeArr[0] > 12) {
    newStr = `${timeArr[0] - 12}`
    night = true
  } else {
    newStr = `${timeArr[0]}`
  }

  if (timeArr[1] > 0) {
    newStr += `:timeArr[1]`
  }

  if (night) newStr += ' pm'
  else newStr += ' am'

  return newStr
}
