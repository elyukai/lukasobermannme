// @ts-check

(() => {
  const MAIN_ID = "slideshow"
  const PREV_BUTTON_ID = "slideshow-previous"
  const NEXT_BUTTON_ID = "slideshow-next"
  const ACTIVE_CLASS_NAME = "active"

  const container = document.querySelector(`#${MAIN_ID}`)

  if (container && container.childElementCount > 1) {
    // Slideshow must have more than one image, since it's children are the
    // image list, controls list and two buttons then.

    /** @type {HTMLLIElement[]} */
    const images = ([...document.querySelectorAll(`#${MAIN_ID} > ul.images > li`).values()])

    /** @type {HTMLUListElement} */
    const controls = document.querySelector(`#${MAIN_ID} > ul.controls`)

    /** @type {HTMLButtonElement} */
    const prevBtn = document.querySelector(`#${PREV_BUTTON_ID}`)

    /** @type {HTMLButtonElement} */
    const nextBtn = document.querySelector(`#${NEXT_BUTTON_ID}`)

    const elementsCount = images.length

    let currentActiveIndex = 0

    const controlElements =
      Array.from(
        { length: elementsCount },
        (_, index) => {
          const linkElement = document.createElement("a")

          linkElement.href = `#image-${index + 1}`
          linkElement.innerText = (index + 1).toString(10)

          const listElement = document.createElement("li")

          listElement.appendChild(linkElement)
          controls.appendChild(listElement)

          return listElement
        }
      )

    const setActiveImage = index => {
      images[currentActiveIndex].classList.remove (ACTIVE_CLASS_NAME)
      images[index].classList.add (ACTIVE_CLASS_NAME)

      controlElements[currentActiveIndex].classList.remove (ACTIVE_CLASS_NAME)
      controlElements[index].classList.add (ACTIVE_CLASS_NAME)

      prevBtn.disabled = index === 0
      nextBtn.disabled = index === elementsCount - 1

      currentActiveIndex = index
    }

    setActiveImage (currentActiveIndex)

    prevBtn.addEventListener ("click", () => {
      if (currentActiveIndex > 0) {
        setActiveImage (currentActiveIndex - 1)
      }
    })

    nextBtn.addEventListener ("click", () => {
      if (currentActiveIndex < elementsCount - 1) {
        setActiveImage (currentActiveIndex + 1)
      }
    })

    controlElements.forEach((listElement, index) => {
      listElement.addEventListener("click", event => {
        event.preventDefault()
        setActiveImage (index)
      })
    })
  }
})()
