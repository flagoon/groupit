import React from 'react';
import './App.css';

const makeDivs = () => {
    const input = document.querySelector('input');
    const count = Number(input.value);
    createFibonacciBoxes(count);
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

const App = () => {
    return (
        <div>
            <button type="button" onClick={makeDivs}>
                click me
            </button>
            <input type="number" min="0" />
            <div id="box" />
        </div>
    );
};

export default App;
