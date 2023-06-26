const dropDownIndex = document.querySelector("#dropDownIndex")
const decisionIndex = document.querySelector("#decisionIndex")
const dropDownYear  = document.querySelector("#dropDownYear ")
const decisionYear  = document.querySelector("#decisionYear")
const nav  = document.querySelector("#nav")
const navBtn  = document.querySelector("#nav-btn")
const body  = document.querySelector("#body")


let elementsToNotClick = ""
let elementReffrence
let isOverflowHidden = false

if (decisionIndex != null)  decisionIndex.addEventListener('click', (e) => triggerEvent(e, dropDownIndex, "#decisionIndex", dropDownIndex))
if (decisionYear != null) decisionYear.addEventListener('click', (e) => triggerEvent(e, dropDownYear, "#decisionYear", dropDownYear))

function triggerEvent(e, dropElement, parentElement, elementReffrenceParam) {
  if (e.target === dropElement) return
  
  for (let i = 0; i < dropElement.childNodes.length; i++) {
    if (e.target === dropElement.childNodes[i])  return
  }

  dropElement.classList.toggle("dropDown")
  // elementsToNotClick = parentElement
  elementsToNotClick = parentElement
  elementReffrence = elementReffrenceParam
}

window.addEventListener('click', function (e) {

  // if (e.target === elementsToNotClick) return

  // let clickedOut = true
  // for (let i = 0; i < elementsToNotClick.childNodes.length; i++) {
  //   if (e.target == elementsToNotClick.childNodes[i] || elementsToNotClick.childNodes[i].contains(e.target)) {
  //     clickedOut = false
  //   }
  // }
  // if (clickedOut) dropDownIndex.classList.remove("dropDown")

  if (elementsToNotClick) {
    if (!document.querySelector(elementsToNotClick).contains(e.target)) {
       elementReffrence.classList.remove("dropDown")
    }
    
  }
});

navBtn.addEventListener('click', () => {
  nav.classList.toggle("translate-x-0")
  body.style.overflowY = isOverflowHidden ? "scroll" : "hidden"
  isOverflowHidden = !isOverflowHidden;
})







