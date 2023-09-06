// @ts-check

(() => {
  const TRIGGER_CLASS_NAME = "typewriter"
  const ACTIVE_CLASS_NAME = "typewriter--active"
  const KEEP_CURSOR_CLASS_NAME = "typewriter--keep-cursor"

  const SPAN_SHOWN_CLASS_NAME = "typewriter-text--shown"
  const SPAN_HIDDEN_CLASS_NAME = "typewriter-text--hidden"
  const SPAN_CURSOR_CLASS_NAME = "typewriter-text--cursor"

  const elements = /** @type {NodeListOf<HTMLElement>}*/ (document.querySelectorAll(`.${TRIGGER_CLASS_NAME}`))

  /**
   * @param {HTMLElement} element
   */
  const isElementInView = element => element.getBoundingClientRect().top < window.innerHeight

  /**
   * @param {number} ms
   * @returns {Promise<number>}
   */
  const delay = ms => new Promise(resolve => setTimeout(resolve, ms))

  /**
   * @param {ChildNode} element
   * @returns {Text[]}
   */
  const extractTextNodes = element =>
    [...element.childNodes.values()].flatMap(childNode => {
      if (childNode.nodeType === Node.TEXT_NODE) {
        return /** @type {Text} */ (childNode)
      }
      else {
        return extractTextNodes(childNode)
      }
    })

  /**
   * @param {HTMLElement} element
   */
  const typewrite = async element => {
    await delay(100)

    const textParts = extractTextNodes(element)

    let cursorState = true

    /**
     * @type {undefined | ((state: boolean) => void)}
     */
    let listener = undefined

    const mediaQuery = window.matchMedia("(prefers-reduced-motion: reduce)")
    let reducedMotion = mediaQuery.matches
    mediaQuery.addEventListener("change", event => {
      reducedMotion = event.matches
    })

    const timer = setInterval(() => {
      if (listener) {
        listener(reducedMotion || cursorState)
      }
      cursorState = !cursorState
    }, 500)

    element.classList.add(ACTIVE_CLASS_NAME)

    const replacedTextParts = textParts.map(textPart => {
      const initialText = textPart.textContent ?? ""
      const showTextElement = document.createElement("span")
      showTextElement.classList.add(SPAN_SHOWN_CLASS_NAME)
      const hiddenTextElement = document.createElement("span")
      hiddenTextElement.classList.add(SPAN_HIDDEN_CLASS_NAME)
      hiddenTextElement.textContent = initialText
      textPart.replaceWith(showTextElement, hiddenTextElement)

      return {
        initialText,
        textPart,
        showTextElement,
        hiddenTextElement,
      }
    })

    for (const { initialText, textPart, showTextElement, hiddenTextElement } of replacedTextParts) {
      listener = state => {
        if (state) {
          showTextElement.classList.add(SPAN_CURSOR_CLASS_NAME)
        }
        else {
          showTextElement.classList.remove(SPAN_CURSOR_CLASS_NAME)
        }
      }

      listener(cursorState)

      for (let i = 0; i < initialText.length; i++) {
        showTextElement.textContent = initialText.slice(0, i + 1)
        hiddenTextElement.textContent = initialText.slice(i + 1)

        await delay(Math.random() * 30 + 15)
      }

      if (textPart !== textParts[textParts.length - 1] || !element.classList.contains(KEEP_CURSOR_CLASS_NAME)) {
        listener = undefined
        showTextElement.replaceWith(textPart)
        hiddenTextElement.remove()
      }
    }

    if (!element.classList.contains(KEEP_CURSOR_CLASS_NAME)) {
      clearInterval(timer)
    }
  }

  elements.forEach(element => {
    if (isElementInView(element)) {
      typewrite(element)
    }
    else {
      let isTriggered = false
      window.addEventListener("scroll", () => {
        if (!isTriggered && isElementInView(element)) {
          typewrite(element)
          isTriggered = true
        }
      })
    }
  })
})()
