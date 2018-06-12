const makeDivs = () => {
    clearBox();
    const input = document.querySelector('input');
    const count = Number(input.value);
    if (checkInputRange(count)) {
        createFibonacciBoxes(count);
    } else {
        alert('Number should be between 1 and 20');
    }
};

const checkInputRange = number => {
    return number > 0 && number < 21;
};

const clearBox = () => {
    const screen = document.querySelector('#box');
    screen.innerHTML = '';
};

const createFibonacciBoxes = count => {
    for (let i = 1; i <= count; i++) {
        const side = fibonacci(i);
        const box = createBox(side);
        const screen = document.querySelector('#box');
        screen.appendChild(box);
    }
};

const createBox = side => {
    const box = document.createElement('div');
    box.setAttribute('style', `width: ${side}px; height: ${side}px; background: red; border: 1px solid black;`);
    box.textContent = side;
    return box;
};

const fibonacci = value => {
    if (value <= 2) {
        return 1;
    } else {
        return fibonacci(value - 1) + fibonacci(value - 2);
    }
};

const button = document.querySelector('button');
button.addEventListener('click', makeDivs);
