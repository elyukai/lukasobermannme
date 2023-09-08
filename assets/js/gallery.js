// @ts-check

/**
 * @see https://www.w3.org/WAI/ARIA/apg/patterns/carousel/examples/carousel-1-prev-next/
 * @see https://www.w3.org/WAI/ARIA/apg/patterns/carousel/examples/carousel-2-tablist/
 */

;(() => {
  const MAIN_ID = "slideshow"
  const PREV_BUTTON_ID = "slideshow-previous"
  const NEXT_BUTTON_ID = "slideshow-next"
  const ACTIVE_CLASS_NAME = "active"

  const galleries = document.querySelectorAll("figure.gallery")

  /**
   * @param {Element} toWrap
   * @param {Element} wrapper
   */
  const wrap = (toWrap, wrapper = document.createElement("div")) => {
    toWrap.parentNode?.insertBefore(wrapper, toWrap)
    return wrapper.appendChild(toWrap)
  }

  for (const gallery of galleries) {
    const tablistLabel = gallery.getAttribute("data-tab-list-label")
    const prevButtonLabel = gallery.getAttribute("data-prev-button-label")
    const nextButtonLabel = gallery.getAttribute("data-next-button-label")
    const tabPanelRoleDescription = gallery.getAttribute("data-tab-panel-role-description")
    const tabPanelLabel = gallery.getAttribute("data-tab-panel-label")
    const tabLabel = gallery.getAttribute("data-tab-label")

    const id = gallery.getAttribute("data-id")
    const container = gallery.querySelector("ul")

    if (!container) {
      continue
    }

    const iconArrowLeft = gallery.querySelector(".icon--arrow-left")
    const iconArrowRight = gallery.querySelector(".icon--arrow-right")

    const galleryMain = document.createElement("div")
    galleryMain.classList.add("gallery-main")

    wrap(container, galleryMain)

    // Initialize interaction elements and accessibility

    const tablist = document.createElement("div")
    tablist.setAttribute("role", "tablist")
    tablist.setAttribute("aria-label", tablistLabel || "")

    const prevButton = document.createElement("button")
    prevButton.classList.add("gallery-previous")
    prevButton.setAttribute("aria-hidden", "true")
    prevButton.setAttribute("aria-label", prevButtonLabel || "")
    prevButton.tabIndex = -1
    if (iconArrowLeft) {
      gallery.removeChild(iconArrowLeft)
      prevButton.appendChild(iconArrowLeft)
    }

    const nextButton = document.createElement("button")
    nextButton.classList.add("gallery-next")
    nextButton.setAttribute("aria-hidden", "true")
    nextButton.setAttribute("aria-label", nextButtonLabel || "")
    nextButton.tabIndex = -1
    if (iconArrowRight) {
      gallery.removeChild(iconArrowRight)
      nextButton.appendChild(iconArrowRight)
    }

    galleryMain.prepend(tablist, prevButton, nextButton)

    /**
     * @typedef {{ tab: HTMLButtonElement; tabPanel: HTMLLIElement }} TabPair
     * @param {number} index
     */
    const prepareTabPair = (index) => {
      const tabPanel = /** @type {HTMLLIElement} */(container.children[index])
      tabPanel.id = `${id}-tabpanel-${index + 1}`
      tabPanel.setAttribute("role", "tabpanel")
      tabPanel.setAttribute("aria-role-description", tabPanelRoleDescription || "")
      tabPanel.setAttribute(
          "aria-label",
          (tabPanelLabel || "")
            .replace("{0}", (index + 1).toFixed())
            .replace("{1}", container.children.length.toFixed())
        )

      const tab = document.createElement("button")
      tab.id = `${id}-tab-${index + 1}`
      tab.setAttribute("aria-label", (tabLabel || "").replace("{0}", (index + 1).toFixed()))
      tab.setAttribute("aria-controls", tabPanel.id)
      tab.tabIndex = -1

      if (index === 0) {
        tabPanel.setAttribute("aria-selected", "true")
        tab.tabIndex = 0
        tabPanel.classList.add("active")
      }

      tablist.appendChild(tab)

      return { tab, tabPanel }
    }

    /** @type {TabPair[]} */
    const tabPairs = Array.from(
      { length: container.children.length },
      (_, index) => prepareTabPair(index)
    )

    let currentIndex = 0

    // Actions

    /**
     * @param {number} index
     * @param {boolean} [moveFocus]
     */
    const showTabPanel = (index, moveFocus) => {
      const { tab, tabPanel } = tabPairs[index]
      nextButton.setAttribute("aria-selected", "true")
      tab.tabIndex = 0
      tabPanel.classList.add("active")
      if (moveFocus) {
        tab.focus()
      }
    }

    /**
     * @param {number} index
     */
    const hideTabPanel = (index) => {
      const { tab, tabPanel } = tabPairs[index]
      nextButton.setAttribute("aria-selected", "false")
      tab.tabIndex = -1
      tabPanel.classList.remove("active")
    }

    /**
     * @param {number} index
     * @param {boolean} [moveFocus]
     */
    const setSelectedTab = (index, moveFocus) => {
      if (index === currentIndex) {
        return
      }

      hideTabPanel(currentIndex)
      currentIndex = index
      showTabPanel(index, moveFocus)
    }

    /**
     * @param {boolean} [moveFocus]
     */
    const setSelectedTabToFirst = (moveFocus) => {
      var nextIndex = 0
      setSelectedTab(nextIndex, moveFocus)
    }

    /**
     * @param {boolean} [moveFocus]
     */
    const setSelectedTabToPrevious = (moveFocus) => {
      var nextIndex = (currentIndex - 1 + tabPairs.length) % tabPairs.length
      setSelectedTab(nextIndex, moveFocus)
    }

    /**
     * @param {boolean} [moveFocus]
     */
    const setSelectedTabToNext = (moveFocus) => {
      var nextIndex = (currentIndex + 1) % tabPairs.length
      setSelectedTab(nextIndex, moveFocus)
    }

    /**
     * @param {boolean} [moveFocus]
     */
    const setSelectedTabToLast = (moveFocus) => {
      var nextIndex = tabPairs.length - 1
      setSelectedTab(nextIndex, moveFocus)
    }

    // Events

    /**
     * @param {KeyboardEvent} event
     */
    const onTabKeydown = (event) => {
      const { currentTarget, key } = event
      const target = /** @type{HTMLButtonElement} */ (currentTarget)

      const matched = (() => {
        switch (key) {
          case "ArrowLeft":
            setSelectedTabToPrevious(true)
            return true

          case "ArrowRight":
            setSelectedTabToNext(true)
            return true

          case "Home":
            setSelectedTabToFirst(true)
            return true

          case "End":
            setSelectedTabToLast(true)
            return true

          default:
            return false
        }
      })()

      if (matched) {
        event.stopPropagation()
        event.preventDefault()
      }
    }

    /**
     * @param {MouseEvent} event
     */
    const onTabClick = (event) => {
      const index = tabPairs.findIndex(({ tab }) => tab === event.currentTarget)
      if (index > -1) {
        setSelectedTab(index, true)
      }
    }

    /**
     * @param {MouseEvent} event
     */
    const onPreviousButtonClick = (event) => {
      setSelectedTabToPrevious()
    }

    /**
     * @param {MouseEvent} event
     */
    const onNextButtonClick = (event) => {
      setSelectedTabToNext()
    }

    let startX = 0

    /**
     * @param {TouchEvent} event
     */
    const onTouchStart = (event) => {
      startX = event.changedTouches[0].clientX
    }

    /**
     * @param {number} value
     */
    const updateTouchTransform = (value) => {
      galleryMain.style.setProperty("--tx", `${value / (window.devicePixelRatio ?? 1)}px`)
    }

    /**
     * @param {TouchEvent} event
     */
    const onTouchMove = (event) => {
      event.preventDefault()

      const moveX = event.changedTouches[0].screenX
      const diffX = moveX - startX

      updateTouchTransform(diffX)
    }

    /**
     * @param {TouchEvent} event
     */
    const onTouchEnd = (event) => {
      const endX = event.changedTouches[0].clientX
      const diffX = endX - startX
      startX = 0
      updateTouchTransform(startX)

      if (diffX > 0) {
        setSelectedTabToPrevious()
      } else if (diffX < 0) {
        setSelectedTabToNext()
      }
    }

    prevButton.addEventListener("click", onPreviousButtonClick)
    nextButton.addEventListener("click", onNextButtonClick)

    tabPairs.forEach(({ tab, tabPanel }) => {
      tab.addEventListener("keydown", onTabKeydown)
      tab.addEventListener("click", onTabClick)

      let startX = 0

      tabPanel.addEventListener("touchstart", onTouchStart, false)
      tabPanel.addEventListener("touchmove", onTouchMove, false)
      tabPanel.addEventListener("touchend", onTouchEnd, false)
    })
  }
})()
