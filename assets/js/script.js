function handleCollapseElementClick(n) {
    let t = n.currentTarget,
        i = t.dataset.target || t.href || null;
    if (i) {
        let n = document.querySelector(i),
            t = n.classList.contains("show") || n.classList.contains("collapsing");
        t
            ? ((n.style.height = `${n.getBoundingClientRect().height}px`),
              n.offsetHeight,
              n.classList.add("collapsing"),
              n.classList.remove("collapse", "show"),
              (n.style.height = ""),
              setTimeout(() => {
                  n.classList.remove("collapsing"), n.classList.add("collapse");
              }, 350))
            : (n.classList.remove("collapse"),
              n.classList.add("collapsing"),
              (n.style.height = 0),
              n.classList.remove("collapsed"),
              setTimeout(() => {
                  n.classList.remove("collapsing"), n.classList.add("collapse", "show"), (n.style.height = "");
              }, 350),
              (n.style.height = n.scrollHeight + "px"));
    }
}
window.addEventListener("scroll", () => {
    window.scrollY > 50 ? document.querySelector("nav").classList.contains("scrolled") || document.querySelector("nav").classList.add("scrolled") : document.querySelector("nav").classList.remove("scrolled");
});