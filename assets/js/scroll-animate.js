// @ts-check

(() => {
  const TRIGGER_CLASS_NAME = "aos"
  const PARENT_TRIGGER_CLASS_NAME = "aos-parent"
  const READY_CLASS_NAME = `${TRIGGER_CLASS_NAME}--pending`
  const IN_VIEW_CLASS_NAME = `${TRIGGER_CLASS_NAME}--in-view`

  const elementQueries = [
    `.${TRIGGER_CLASS_NAME}`,
    `.${PARENT_TRIGGER_CLASS_NAME} > h1`,
    `.${PARENT_TRIGGER_CLASS_NAME} > h2`,
    `.${PARENT_TRIGGER_CLASS_NAME} > h3`,
    `.${PARENT_TRIGGER_CLASS_NAME} > h4`,
    `.${PARENT_TRIGGER_CLASS_NAME} > h5`,
    `.${PARENT_TRIGGER_CLASS_NAME} > h6`,
    `.${PARENT_TRIGGER_CLASS_NAME} > p`,
    `.${PARENT_TRIGGER_CLASS_NAME} > ul > li`,
    `.${PARENT_TRIGGER_CLASS_NAME} > ol > li`,
  ]

  const elements = /** @type {NodeListOf<HTMLElement>}*/ (document.querySelectorAll(elementQueries.join(", ")))

  /**
   * @param {HTMLElement} element
   */
  const isElementScrolledBy = element => {
    const elementBounds = element.getBoundingClientRect()
    return element.getBoundingClientRect().bottom <= 0
  }

  /**
   * @param {HTMLElement} element
   */
  const isElementInView = element => {
    const elementBounds = element.getBoundingClientRect()
    return elementBounds.bottom > 0 && elementBounds.top < window.innerHeight
  }

  elements.forEach(element => {
    element.classList.add(TRIGGER_CLASS_NAME)

    if (!isElementScrolledBy(element) && !isElementInView(element)) {
      element.classList.add(READY_CLASS_NAME)

      const animate = () => {
        if (isElementInView(element)) {
          element.classList.remove(READY_CLASS_NAME)
          element.classList.add(IN_VIEW_CLASS_NAME)
          window.removeEventListener("scroll", animate)
          window.removeEventListener("resize", animate)
        }
      }

      window.addEventListener("scroll", animate)
      window.addEventListener("resize", animate)
    }
  })
})()
