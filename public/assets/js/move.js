document.addEventListener('keydown', (event) => {
    const keyName = event.key;
    const directions = { ArrowUp: 'N', ArrowDown: 'S', ArrowRight: 'E', ArrowLeft: 'W' };
    if (keyName in directions) {
        event.preventDefault();
        fetch('/heracles4/heracles4.php?move=' + directions[keyName])
            .then(response => response.text())
            .then(html => document.documentElement.innerHTML = html);
    }
});
